<?php

class User
{
    private $_db;

    public function __construct() // membuat cunstructur supaya otomatis terpanggil ketika object dibuat
    {
        $this->_db = Database::getInstance(); // melakukan koneksi ke database
    }

    public function login($username , $password)
    {
      $data = $this->_db->get_info('admin','username' , $username);
        // if ($data) {
        //     if (password_verify($password, 'password')) {
        //         echo "password benar";
        //         return true;
        //     }
        // }
        // die();
      if(password_verify($password , $data['password']) )
        {
            echo "password benar";
            
        }
        else
        {
            return false;
        }
    //   return true;
    //   else return false;
  
    }
}
