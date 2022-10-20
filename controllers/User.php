<?php

class User
{
    private $_db;

    public function __construct() // membuat cunstructur supaya otomatis terpanggil ketika object dibuat
    {
        $this->_db = Database::getInstance(); // melakukan koneksi ke database
    }

    public function login($username, $password)
    {
        $data = $this->_db->get_info('admin', 'username', $username);
        print_r($data);
        die();

        if (password_verify($password, $data['password'])) { // mengecek apakah password yang di input sama dengan password yang ada di database
            return true; // jika sama maka akan mengembalikan nilai true
        } else return false; // jika tidak sama maka akan mengembalikan nilai false
    }
}
