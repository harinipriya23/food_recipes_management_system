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
        $errors = $this->validation($data);
        if ($errors) {
            return ['success' => false, 'errors' => $errors];
        }

        $ingredientArr = $value['ingredients']['ingredient'] ?? [];
        $quantityArr = $value['ingredients']['quantity'] ??  [];
        $unitArr =  $value['ingredients']['unit'] ?? [];

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
                ':status' => 'pending',
                ':user_id' => $user_id
            ]
        );


        $recipe_id = $this->db->lastInsertId();
        if (isset($_FILES['recipe_img']) && $_FILES['recipe_img']['error'] === UPLOAD_ERR_OK) {
            $imgPath = $this->imgPath('recipe_img', $recipe_id, 'recipe_');
            $this->db->query("UPDATE recipes SET img = :img WHERE id = :id", [
                ':img' => $imgPath,
                ':id'  => $recipe_id
            ]);
        }
        return ['success' => true];
    }
    public function update($value, $user_id)
    {
        $data = [
            'recipe_id' => $value['recipe_id'],
            'title' => trim($value['recipe-title']),
            'description' => trim($value['recipe-description']),
            'prepareTime' => trim($value['pre-time']),
            'cookTime' => trim($value['cook-time']),
            'yields' => trim($value['yields']),
            'ingredients' => $value['ingredients'],
        ];

        $errors = $this->validation($data, "update");
        if ($errors) {
            return ['success' => false, 'errors' => $errors];
        }
        $ingredientArr = $value['ingredients']['ingredient'] ?? [];
        $quantityArr = $value['ingredients']['quantity'] ?? [];
        $unitArr = $value['ingredients']['unit'] ?? [];

        $ingredient = implode(",", $ingredientArr);
        $quantity = implode(",", $quantityArr);
        $unit = implode(",", $unitArr);


        $this->db->query(
            "UPDATE recipes SET title = :title,description = :description,
             preparation_time = :preparation_time, cooking_time = :cooking_time,
              yields = :yields, ingredients = :ingredients, quantities = :quantities, 
              units =:units, status = :status, user_id =:user_id WHERE id = :recipe_id",
            [
                ':title' => $data['title'],
                ':description' => $data['description'],
                ':preparation_time' => $data['prepareTime'],
                ':cooking_time' => $data['cookTime'],
                ':yields' => $data['yields'],
                ':ingredients' => $ingredient,
                ':units' => $unit,
                ':quantities' => $quantity,
                ':status' => 'pending',
                ':user_id' => $user_id,
                ':recipe_id' => $data['recipe_id']
            ]
        );

        if (isset($_FILES['recipe_img']) && $_FILES['recipe_img']['error'] === UPLOAD_ERR_OK) {
            $imgPath = $this->imgPath('recipe_img', $data['recipe_id'], 'recipe_');
            $this->db->query("UPDATE recipes SET img = :img WHERE id = :id", [':img' => $imgPath, ':id' => $data['recipe_id']]);
        }
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
    private function validation($data, $action = "store")
    {
        $errors = [];
        $validate = new Validator();

        if ($action === "store") {
            if ($msg = $validate->isImgValid('recipe_img')) {
                $errors['recipe_img'] = $msg;
            }
        } else if ($action === "update") {
            if (!empty($_FILES['recipe_img']['tmp_name'])) {
                if ($msg = $validate->isImgValid('recipe_img')) {
                    $errors['recipe_img'] = $msg;
                }
            }
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

        for ($i = 0; $i < count($data['ingredients']['ingredient']); $i++) {
            $rowErrors = [];
            // $recipeItem = $data['ingredients'][$i];
            $ingredient = $data['ingredients']['ingredient'][$i];
            $quantity = $data['ingredients']['quantity'][$i];
            $unit = $data['ingredients']['unit'][$i];

            if ($msg = $validate->onlyText('Ingredient name', $ingredient)) {
                $rowErrors['ingredient'] = $msg;
            }
            if ($msg = $validate->isNumberValid('Quantity', $quantity, 1, 10000)) {
                $rowErrors['quantity'] = $msg;
            }
            if (empty($unit)) {
                $rowErrors['unit'] = "Unit is required";
            }
            if ($rowErrors) {
                $errors['rows'][$i] = $rowErrors;
            }
        }
        return $errors;
    }
}
