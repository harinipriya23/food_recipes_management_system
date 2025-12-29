<?php

namespace Core\Service;

use Core\Validator;

class AboutService
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function save($value)
    {
        $errors = [];
        $existsData = $this->db->query("SELECT id, social_img, food_img FROM about LIMIT 1", [])->fetch();

        $data = [
            'subtitle' => trim($value['subtitle']),
            'description' => trim($value['description']),
        ];
        if (!$existsData) {
            $errors = $this->validation($data);
        }
        if ($errors) {
            return ['success' => false, 'errors' => $errors];
        }
        if ($existsData) {
            $about_id = $existsData['id'];
            $this->db->query(
                "UPDATE about SET subtitle=:subtitle, description = :description WHERE id = :id",
                [
                    ':subtitle' => $data['subtitle'],
                    ':description' => $data['description'],
                    ':id' => $about_id,
                ]
            );
        } else {
            $this->db->query(
                "INSERT INTO about (subtitle, description) VALUES 
            (:subtitle, :description)",
                [
                    ':subtitle' => $data['subtitle'],
                    ':description' => $data['description'],
                ]
            );
            $about_id = $this->db->lastInsertId();
        }

        if (isset($_FILES['social_img']) && $_FILES['social_img']['error'] === UPLOAD_ERR_OK) {
            $social_img = $this->imgPath('social_img', $about_id, 'social_');
            $this->db->query("UPDATE about SET social_img = :social_img WHERE id = :id", [':social_img' => $social_img, ':id' => $about_id]);
        }
        if (isset($_FILES['food_img']) && $_FILES['food_img']['error'] === UPLOAD_ERR_OK) {
            $food_img = $this->imgPath('food_img', $about_id, 'food_');
            $this->db->query("UPDATE about SET food_img = :food_img WHERE id = :id", [':food_img' => $food_img, ':id' => $about_id]);
        }

        return ['success' => true];
    }
    private function imgPath($img, $id, $key)
    {
        if (empty($_FILES[$img]['name'])) {
            return null;
        }
        var_dump($_FILES[$img]);
        $temp = $_FILES[$img]['tmp_name'];
        $extension = strtolower(pathinfo($_FILES[$img]['name'], PATHINFO_EXTENSION));

        $renamed = $key . $id . "." . $extension;
        $uploadPath = base_path('uploads/features/') . $renamed;
        if (move_uploaded_file($temp, $uploadPath)) {
            return $renamed;
        }
        return null;
    }
    private function validation($data)
    {
        $errors = [];
        $validate = new Validator();

        if ($msg = $validate->isTextValid('Subtitle', $data['subtitle'])) {
            $errors['subtitle'] = $msg;
        }
        if ($msg = $validate->isTextValid('Description', $data['description'], 10, 500)) {
            $errors['description'] = $msg;
        }
        if ($msg = $validate->isImgValid('social_img')) {
            $errors['social_img'] = $msg;
        }
        if ($msg = $validate->isImgValid('food_img')) {
            $errors['food_img'] = $msg;
        }
        return $errors;
    }
}
