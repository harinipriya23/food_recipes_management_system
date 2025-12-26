<?php

namespace Core;

class Validator
{
    public function onlyText($key, $value, $min = 3, $max = 98,)
    {
        $value = trim($value);
        if ($value === "") {
            return "{$key} is required";
        }
        if (strlen($value) < $min) {
            return "{$key} must be at least {$min} characters long";
        }
        if (strlen($value) > $max) {
            return "{$key} must be less than {$max} characters long";
        }
        if (!preg_match("/^[A-Za-z ]+$/", $value)) {
            return "Invalid {$key}.  Only alphabets and spaces are allowed";
        }
        return '';
    }
    public function isTextValid($key, $value, $min = 3, $max = 98,)
    {
        $value = trim($value);
        if ($value === "") {
            return "{$key} is required";
        }
        if (strlen($value) < $min) {
            return "{$key} must be at least {$min} characters long";
        }
        if (strlen($value) > $max) {
            return "{$key} must be less than {$max} characters long";
        }
        if (!preg_match("/^(?![0-9])(?![0-9 ]+$)[A-Za-z0-9 _.,-]+$/", $value)) {
            return "Invalid {$key}.  Only letters, numbers, spaces, hyphens and underscores are allowed";
        }
        return '';
    }
    public function isNumberValid($key, $value, $min = 10, $max = 11)
    {
        $value = trim($value);
        if ($value === "") {
            return "{$key} is required";
        }
        if (!preg_match("/^[0-9]+$/", $value)) {
            return "Invalid {$key}. Only numbers are allowed";
        }
        if (strlen($value) < $min) {
            return "{$key} must be at least {$min} digits";
        }
        if (strlen($value) > $max) {
            return "{$key} must not be greater than {$min} digits";
        }
        return '';
    }
    public function isPasswordValid($key, $value, $min = 7, $max = 255,)
    {
        $value = trim($value);
        if ($value === "") {
            return "{$key} is required";
        }
        if (strlen($value) < $min) {
            return "{$key} must be at least {$min} characters long";
        }
        if (strlen($value) > $max) {
            return "{$key} must be less than {$max} characters long";
        }
        if (!preg_match("/^[A-Za-z0-9_-]+$/", $value)) {
            return "Invalid {$key}.  Only letters, numbers, hyphens and underscores are allowed";
        }
        return '';
    }

    public function isTimeValid($key, $value, $min = 1, $max = 1440)
    {
        $value = trim($value);
        if ($value === "") {
            return "{$key} is required";
        }
        if (!preg_match("/^[1-9][0-9]*$/", $value)) {
            return "Invalid {$key}.  Only numbers allowed";
        }
        if ((int)$value < $min) {
            return "{$key} must be minimum of {$min} mins. ";
        }
        if ((int)$value > $max) {
            return "{$key} must not be greater than {$max} mins";
        }

        return '';
    }
    public function isImgValid($img_id)
    {
        if (!isset($_FILES[$img_id]) || $_FILES[$img_id]['error'] !== UPLOAD_ERR_OK) {
            return "File upload failed!";
        }
        if (!empty($_FILES[$img_id]['name'])) {

            $allowedExtension = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $extension = strtolower(pathinfo($_FILES[$img_id]['name'], PATHINFO_EXTENSION));

            if (!in_array($extension, $allowedExtension)) {
                return 'Invalid Image Type. Only jpg, jpeg, png, gif, webp type are allowed!';
            }
            if (($_FILES[$img_id]['size']) > 2 * 1024 * 1024) {
                return "File size must be less than 2MB";
            }
        }
        return "";
    }
    public function isEmailValid($key, $value)
    {
        $value = trim($value);

        if ($value === "") {
            return "{$key} is required";
        }
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return "Invalid {$key} format. Please enter a valid email address.";
        }
        if (strlen($value) > 254) {
            return "{$key} is too long";
        }
        return '';
    }
}
