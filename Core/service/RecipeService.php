<?php

namespace Core\Service;

use Core\Validator;

class RecipeService
{

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function store($value, $user_id)
    {

        $data = [
            'title' => trim($value['recipe-title']),
            'description' => trim($value['recipe-description']),
            'prepareTime' => trim($value['pre-time']),
            'cookTime' => trim($value['cook-time']),
            'yields' => trim($value['yields']),
            'ingredients' => $value['ingredients'] ?? [],
        ];
        $ingredientArr = [];
        $quantityArr = [];
        $unitArr = [];
        $errors = $this->validation($data);
        if ($errors) {
            return ['success' => false, 'errors' => $errors];
        }
        foreach ($data['ingredients'] as $item) {
            $ingredientArr[] = $item['ingredient'];
            $quantityArr[] = $item['quantity'];
            $unitArr[] = $item['unit'];
        }
        $ingredient = implode(",", $ingredientArr);
        $quantity = implode(",", $quantityArr);
        $unit = implode(",", $unitArr);


        $this->db->query(
            "INSERT INTO recipes (title,description, preparation_time, cooking_time, yields, ingredients, quantities, units, status, user_id) VALUES 
            (:title,:description, :preparation_time, :cooking_time,:yields, :ingredients, :quantities, :units, :status, :user_id)",
            [
                ':title' => $data['title'],
                ':description' => $data['description'],
                ':preparation_time' => $data['prepareTime'],
                ':cooking_time' => $data['cookTime'],
                ':yields' => $data['yields'],
                ':ingredients' => $ingredient,
                ':units' => $unit,
                ':quantities' => $quantity,
                ':status' => 'Pending',
                ':user_id' => $user_id
            ]
        );
        $recipe_id = $this->db->lastInsertId();
        $imgPath = $this->imgPath('recipe_img', $recipe_id, 'recipe_');
        $this->db->query("UPDATE recipes SET img = :img WHERE id = :id", [':img' => $imgPath, ':id' => $recipe_id]);
        return ['success' => true];
    }
    private function imgPath($img, $id, $key)
    {
        $name = $_FILES[$img]['name'];
        $temp = $_FILES[$img]['tmp_name'];
        $extension = strtolower(pathinfo($_FILES[$img]['name'], PATHINFO_EXTENSION));

        $renamed = $key . $id . "." . $extension;
        $uploadPath = base_path('uploads/recipes/') . $renamed;

        move_uploaded_file($temp, $uploadPath);
        return $renamed;
    }
    private function validation($data)
    {
        $errors = [];
        $validate = new Validator();

        if ($msg = $validate->isImgValid('recipe_img')) {
            $errors['recipe_img'] = $msg;
        }
        if ($msg = $validate->isTextValid('Recipe title', $data['title'])) {
            $errors['recipe-title'] = $msg;
        }
        if ($msg = $validate->isTextValid('Description', $data['description'], 3, 500)) {
            $errors['recipe-description'] = $msg;
        }
        if ($msg = $validate->isTimeValid('Preparation Time', $data['prepareTime'])) {
            $errors['pre-time'] = $msg;
        }
        if ($msg = $validate->isTimeValid('Cooking Time', $data['cookTime'])) {
            $errors['cook-time'] = $msg;
        }
        if ($msg = $validate->isNumberValid('Yields', $data['yields'], 1, 1000)) {
            $errors['yields'] = $msg;
        }

        for ($i = 0; $i < count($data['ingredients']); $i++) {
            $rowErrors = [];
            $recipeItem = $data['ingredients'][$i];
            if ($msg = $validate->onlyText('Ingredient name', $recipeItem['ingredient'])) {
                $rowErrors['ingredient'] = $msg;
            }
            if ($msg = $validate->isNumberValid('Quantity', $recipeItem['quantity'], 1, 10000)) {
                $rowErrors['quantity'] = $msg;
            }
            if (empty($recipeItem['unit'])) {
                $rowErrors['unit'] = "Unit is required";
            }
            if ($rowErrors) {
                $errors['rows'][$i] = $rowErrors;
            }
        }
        return $errors;
    }
}
