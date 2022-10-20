<?php

class Database
{
    // variabel untuk menyimpan koneksi
    private static $INSTANCE = null; // static variabel digunakan untuk menyimpan nilai yang sama untuk semua objek yang dibuat dari kelas yang sama
    private $mysqli, // variabel untuk menyimpan koneksi
        $HOST = '10.1.1.7', // host database
        $USER = 'root', // username database
        $PASS = 'abogoboga', // password database
        $DBNAME = 'tolonto'; // nama database

    // membuat public constructor 
    public function __construct()
    {
        // melakukan koneksi ke database
        $this->mysqli = new mysqli($this->HOST, $this->USER, $this->PASS, $this->DBNAME);
        if (mysqli_connect_error()) // mengecek apakah terjadi error saat koneksi
        {
            die("gagal koneksi");  // jika terjadi error maka akan menampilkan pesan gagal koneksi
        }
    }

    /*============================================================
    singleton pattern ,  digunakan untuk menguji koneksi agar tidak double
    ================================================================*/

    public static function getInstance() //membuat static supaya bisa di panggil tanpa membuat object
    {
        if (!isset(self::$INSTANCE)) // self artinya mengambil variabel dari class itu sendiri
        {
            self::$INSTANCE = new Database(); // jika variabel instance belum ada maka akan membuat object baru
        }
        return self::$INSTANCE; // mengembalikan instance
    }

    public function get_info($table, $column, $value)
    {
        if (!is_int($value)) // mengecek apakah value yang di input adalah integer
        {
            $value = "'" . $value . "'"; // jika value bukan integer maka akan menambahkan tanda petik

            if ($column != '') // mengecek apakah column tidak kosong
            {
                $query = "SELECT `username`, `password` FROM $table WHERE $column = $value"; // membuat query untuk mengecek apakah data ada di database
                $result = $this->mysqli->query($query); // mengeksekusi query

                while ($row = $result->fetch_assoc()) // fetch_assoc() digunakan untuk mengambil data dari database
                {
                    return $row; // mengembalikan nilai row
                }
            }
            // else // jika column kosong 
            // {
            //     $query = "SELECT * FROM $table"; // membuat query untuk mengecek apakah data ada di database
            //     $result = $this->mysqli->query($query); // mengeksekusi query

            //     while ($row = $result->fetch_assoc()) //
            //     {
            //         $results[] = $row; // mengembalikan nilai row
            //     }
            // }
            // return $results;
        }
    }
}
