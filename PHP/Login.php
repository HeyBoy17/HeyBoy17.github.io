<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Read the credentials from the text file
    $credentials = file('../Documents/Login_Credentials.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $isValid = false;

    foreach ($credentials as $credential) {
        list($fileUser , $filePass) = explode(':', $credential);
        if ($fileUser  === $username && $filePass === $password) {
            $isValid = true;
            break;
        }
    }

    if ($isValid) {
        header("Location: /Buitenhuis/HiLo_Game/Home.html");
        exit();
    } else {
        echo "Invalid username or password.";
    }
} else {
    echo "Please submit the form.";
}

?>
