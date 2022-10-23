<?php


class Database
{

    private static $INSTANCE = null;
    private $mysqli,
        $HOST = '10.1.1.7',
        $USER = 'root',
        $PASS = 'abogoboga',
        $DBNAME = 'tolonto';

    public function __construct()
    {

        $this->mysqli = new mysqli($this->HOST, $this->USER, $this->PASS, $this->DBNAME);
        if (mysqli_connect_error()) {
            die("gagal koneksi");
        }
    }

    /*
  singleton pattern ,
  agar menguji koneksi agar tidak double
*/
    public static function getInstance()
    {
        if (!isset(self::$INSTANCE)) {
            self::$INSTANCE = new Database();
        }
        return self::$INSTANCE;
    }


    public function get_info($table, $column = '', $value = '')
    {
        if (!is_int($value)) {
            $value = "'" . $value . "'";

            if ($column != '') {
                $query = "SELECT `username`, `password` FROM $table WHERE $column = $value";
                $result = $this->mysqli->query($query);

                while ($row = $result->fetch_assoc()) {
                    return $row;
                }
            } else {
                $query = "SELECT * FROM $table";
                $result = $this->mysqli->query($query);

                while ($row = $result->fetch_assoc()) {
                    $results[] = $row;
                }
            }
            return $results;
        }
    }
}

// class Database
// {
//     private $host = "localhost";
//     private $user = "root";
//     private $pass = "";
//     private $db = "tolonto";
//     protected $Database;
//     public function __construct()
//     {
//         try {
//             $this->Database = new PDO("mysql:host=$this->host;
//              dbname=$this->db", $this->user, $this->pass);
//             $this->Database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         } catch (PDOException $e) {
//             echo "Koneksi Gagal : " . $e->getMessage();
//         }
//         return $this->Database;
//     }
//     public function getUser($table, $field, $value)
//     {
//         try {
//             $sql = "SELECT * FROM $table WHERE $field = :value";
//             $stmt = $this->Database->prepare($sql);
//             $stmt->bindParam(':value', $value);
//             $stmt->execute();
//             $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//             return $result;
//             // $userVal = $result['username'];
//             // $passVal = $result['password'];
//             // return $userVal . $passVal;
//         } catch (PDOException $e) {
//             echo "Koneksi Gagal : " . $e->getMessage();
//         }
//     }
// }
