<?php
require_once "../core/init.php";

/* mengetes spl autoload
mengambil file di classses Database.php
$data = new Database(); */

// pengujian session logout

// untuk menampung error
$errors = array();


// validasi :
// memanggil objek validasi
$validation = new Validation();

// metode check
$validation = $validation->check(array(
    'username' => array(
        'required' => true,
        'min'      => 3,
        'max'      => 50,
    ),
    'password' => array(
        'required' => true,
        'min'      => 3,
    )

));
if ($validation->passed()) {
    // pengujian cek nama

    if ($user->login(Input::get('username'), Input::get('password'))) {
        // Session::set('username', Input::get('username'));
        Redirect::to('dashboard');
    } else {
        $errors[] = "Username Belum Terdaftar Silahkan Register Dahulu";
    }
} else {
    $errors[] = "Nama Belum Terdaftar";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Login</title>
</head>

<body>
    <form action="login.php" method="post">
        <div class="min-h-screen flex flex-col items-center justify-center bg-neutral_900">
            <div class="flex flex-col shadow-xl bg-neutral_800 px-4 sm:px-6 lg:px-10 py-8 rounded-xl w-[476px] h-[382px] max-w-md">
                <div class="font-noto font-semibold self-center text-2xl sm:text-3xl text-neutral_050">
                    Login
                </div>
                <div class="mt-4 self-center text-xl sm:text-sm text-neutral_050">
                    Silahkan login untuk melanjutkan
                </div>
                <div class="mt-10">
                    <form action="#">
                        <div class="flex flex-col mb-5">
                            <label for="username" class="mb-1 text-mdtracking-wide relative">
                                <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                                <input id="text" type="text" name="username" class="text-neutral_900 text-sm pl-10 pr-4 rounded-md border border-gray-400 w-full h-[64px] py-2 focus:outline-none focus:border-blue-400" />
                                <!-- <span class="text-sm text-neutral_800 absolute left-5 top-6 mx-6 px-2 transition duration-200">Username</span> -->
                            </label>

                        </div>
                        <label for="password" class="mb-1 text-mdtracking-wide relative">
                            <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <input id="password" type="password" name="password" class="text-neutral_900 text-sm pl-10 pr-4 rounded-md border border-gray-400 w-full h-[64px] py-2 focus:outline-none focus:border-blue-400" />
                            <!-- <span class="text-sm text-neutral_800 absolute left-5 top-6 mx-6 px-2 transition duration-200">Username</span> -->
                        </label>
                        <div class="flex w-full">
                            <button type="submit" name="submit" class="flex mt-2 items-center justify-center focus:outline-none text-white text-sm sm:text-base bg-blue-500 hover:bg-blue-600 rounded-2xl py-2 w-full transition duration-150 ease-in">
                                <span class="mr-2 text-neutral_050 uppercase">Login</span>
                                <span>
                                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex justify-center items-center mt-6">
                <a href="#" target="_blank" class="inline-flex items-center text-gray-700 font-medium text-xs text-center">
                    <span class="ml-2">You have an account?
                        <a href="#" class="text-xs ml-2  font-semibold">Login here</a></span>
                </a>
            </div>
        </div>

    </form>
</body>

</html>