<?php

include_once 'model/user_model.php';
include_once 'model/masyarakat_model.php';

class ProfilMasyarakatController {
    private $model;

    public function __construct() {
        $this->model = new MasyarakatModel();
        $this->model = new User();
    }

    // View profile by ID
    public static function viewProfile($id) {
        $data = MasyarakatModel::getMasyarakatById($id);
        return $data;
    }

    // // Update profile
    // public static function updateProfile($id, $telepon, $nik, $id_users, $name, $email, $password) {
    //     $data = MasyarakatModel::updateMasyarakat($id, $telepon, $nik);
    //     $data = User::updateUser($id, $email, $password);
    //     return $data;
    // }

    // public static function showProfil() {
    //     $data = MasyarakatModel::getMasyarakat();
    //     $data = User::getUser();
    //     return $data;

    // }


}

