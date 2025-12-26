<?php

namespace Core\Service;

use Core\Session;
use Core\Validator;

class AuthService
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function register($data)
    {
        $action = 'register';
        $errors = $this->validation($data, $action);

        if ($this->nameExist($data['username'])) {
            $errors['username'] = "Username Already exists.";
        }
        if ($this->mobileExist($data['mobile'])) {
            $errors['mobile'] = "Mobile number Already exists.";
        }

        if ($errors) {
            return ['success' => false, 'errors' => $errors];
        }

        $this->db->query(
            "INSERT INTO users (name, mobile, username, password, role) VALUES (:name,:mobile,:username,:password, :role)",
            [':name' => $data['name'], ':mobile' => $data['mobile'], ':username' => $data['username'], ':password' => password_hash($data['password'], PASSWORD_BCRYPT), ':role' => "user"]
        );
        $user = $this->db->query(
            "SELECT name, mobile, username, password, role FROM users WHERE username = :username",
            [':username' => $data['username']]
        )->fetch();
        Session::put('type', $user['role']);
        return ['success' => true];
    }
    public function login($data)
    {
        $action = 'login';
        $errors = $this->validation($data, $action);
        $user = $this->db->query(
            "SELECT name, mobile, username, password,role FROM users WHERE username = :username",
            [':username' => $data['username']]
        )->fetch();

        if (!$user) {
            $errors['username'] = "Username not found.";
        }
        if ($user && !$this->verifyPassword($data['password'], $user['password'])) {
            $errors['password'] = "Incorrect password";
        }

        if ($errors) {
            return ['success' => false, 'errors' => $errors, 'action' => $action];
        }
        Session::put('type', $user['role']);
        return ['success' => true];
    }

    private function validation($data, $action = '')
    {

        $validate = new Validator();
        $errors = [];

        $name = $data['name'] ?? "";
        $mobile = $data['mobile'] ?? '';
        $username = $data['username'];
        $password = $data['password'];
        if (isset($action) && $action === "register") {
            if ($msg = $validate->isTextValid("Name", $name)) {
                $errors['name'] = $msg;
            }
            if ($msg = $validate->isNumberValid("Mobile Number", $mobile)) {
                $errors['mobile'] = $msg;
            }
        }
        if ($msg = $validate->isTextValid("Username", $username)) {
            $errors['username'] = $msg;
        }
        if ($msg = $validate->isPasswordValid("Password", $password)) {
            $errors['password'] = $msg;
        }

        return $errors;
    }
    private function nameExist($name)
    {
        return  $this->db->query("SELECT id FROM users WHERE username = :username", [':username' => $name])->fetch();
    }
    private function mobileExist($mobile)
    {
        return  $this->db->query("SELECT id FROM users WHERE mobile = :mobile", [':mobile' => $mobile])->fetch();
    }
    private function verifyPassword($new, $old)
    {
        if (password_verify($new, $old)) {
            return true;
        }
    }
}
