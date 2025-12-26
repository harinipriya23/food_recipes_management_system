<?php

namespace Core\Service;

use Core\Validator;

class CommentService
{

    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function store($value)
    {
        $data = [
            'id' => $value['recipe_id'],
            'name' => trim($value['name']),
            'mobile' => trim($value['mobile']),
            'comment' => trim($value['comment']),
        ];

        $errors = $this->validation($data);
        if ($errors) {
            return ['success' => false, 'errors' => $errors];
        }

        $this->db->query(
            "INSERT INTO comments (name, mobile, comment,recipe_id, status) VALUES 
            (:name, :mobile, :comment,:recipe_id, :status)",
            [
                ':name' => $data['name'],
                ':mobile' => $data['mobile'],
                ':comment' => $data['comment'],
                ':recipe_id' => $data['id'],
                ':status' => 'pending',
            ]
        );
        return ['success' => true];
    }
    private function validation($data)
    {
        $errors = [];
        $validate = new Validator();

        if ($msg = $validate->isTextValid('Name', $data['name'])) {
            $errors['name'] = $msg;
        }
        if ($msg = $validate->isNumberValid('Mobile number', $data['mobile'])) {
            $errors['mobile'] = $msg;
        }
        if ($msg = $validate->isTextValid('Comment', $data['comment'])) {
            $errors['comment'] = $msg;
        }
        return $errors;
    }
}
