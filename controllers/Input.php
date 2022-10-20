<?php

class Input
{

  public static function get($name) // mengambil data dari form
  {
    if (isset($_POST[$name]))  // mengecek apakah variable sudah di set sebagai POST
    {
      return $_POST[$name]; // mengembalikan nilai dari variable POST
    } else if (isset($_GET[$name])) // mengecek apakah variable sudah di set sebagai GET
    {
      return $_GET[$name]; // mengembalikan nilai dari variable GET
    }
    return false; // mengembalikan nilai false
  }
}
