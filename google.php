<?php
    // Include file gpconfig
    include_once 'gpconfig.php';

    if(isset($_GET['code'])){
        $gclient->authenticate($_GET['code']);
        $_SESSION['token'] = $gclient->getAccessToken();
        header('Location: ' . filter_var($redirect_url, FILTER_SANITIZE_URL));
    }

    if (isset($_SESSION['token'])) {
        $gclient->setAccessToken($_SESSION['token']);
    }

    if ($gclient->getAccessToken()) 
    {
        include 'db.php';

        // Get user profile data from google
        $gpuserprofile = $google_oauthv2->userinfo->get();

        $nama = $gpuserprofile['given_name']." ".$gpuserprofile['family_name']; // Ambil nama dari Akun Google
        $email = $gpuserprofile['email']; // Ambil email Akun Google nya

        $sql = mysqli_query($con, "SELECT id_user, username, nama_lengkap FROM user WHERE email='".$email."'");
        $user = mysqli_fetch_array($sql); // Ambil datanya dari hasil query tadi

        if(empty($user))
        {
            $ex = explode('@', $email);
            $username = $ex[0];

            mysqli_query($con, "INSERT INTO user(username, nama_lengkap, email) VALUES('".$username."', '".$nama."', '".$email."')");

            $id = mysqli_insert_id($con); // Ambil id user yang baru saja di insert
        }
        else
        {
            $id = $user['id_user']; // Ambil id pada tabel user
            $username = $user['username']; // Ambil username pada tabel user
            $nama = $user['nama']; // Ambil username pada tabel user
        }

        $_SESSION['id_us'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $nama;
        $_SESSION['email'] = $email;

        header("location:$url");
    }
    else 
    {
        $authUrl = $gclient->createAuthUrl();
        header("location: ".$authUrl);
    }
?>
