<?php

namespace Core\Service;

use Core\Validator;

class FeedbackService
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function save($value)
    {
        $data = [
            'name' => trim($value['name']),
            'email' => trim($value['email']),
            'message' => trim($value['message']),
        ];
        $errors = $this->validation($data);
        if ($errors) {
            return ['success' => false, 'errors' => $errors];
        }
        $this->db->query(
            "INSERT INTO feedback (email,name, message) VALUES 
            (:email,:name, :message)",
            [
                ':email' => $data['email'],
                ':name' => $data['name'],
                ':message' => $data['message']
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
        if ($msg = $validate->isEmailValid('Email', $data['email'])) {
            $errors['email'] = $msg;
        }
        if ($msg = $validate->isTextValid('Message', $data['message'], 10, 200)) {
            $errors['message'] = $msg;
        }
        return $errors;
    }
}
