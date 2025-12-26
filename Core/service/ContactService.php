<?php

namespace Core\Service;

use Core\Validator;

class ContactService
{
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function save($value)
    {
        $existsId = $this->db->query("SELECT id FROM contact LIMIT 1", [])->fetch();

        $data = [
            'email' => trim($value['email']),
            'phone' => trim($value['phone']),
            'address' => trim($value['address']),
        ];
        $errors = $this->validation($data);
        if ($errors) {
            return ['success' => false, 'errors' => $errors];
        }
        if ($existsId) {
            $contact_id = $existsId['id'];
            $this->db->query(
                "UPDATE contact SET email=:email, address = :address, mobile = :mobile WHERE id = :id",
                [
                    ':email' => $data['email'],
                    ':address' => $data['address'],
                    ':mobile' => $data['phone'],
                    ':id' => $contact_id,
                ]
            );
        } else {
            $this->db->query(
                "INSERT INTO contact (email,address, mobile) VALUES 
            (:email,:address, :mobile)",
                [
                    ':email' => $data['email'],
                    ':address' => $data['address'],
                    ':mobile' => $data['phone']
                ]
            );
        }
        return ['success' => true];
    }
    private function validation($data)
    {
        $errors = [];
        $validate = new Validator();

        if ($msg = $validate->isEmailValid('Email', $data['email'])) {
            $errors['email'] = $msg;
        }
        if ($msg = $validate->isNumberValid('Phone Number', $data['phone'])) {
            $errors['phone'] = $msg;
        }
        if ($msg = $validate->isTextValid('Address', $data['address'])) {
            $errors['address'] = $msg;
        }
        return $errors;
    }
}
