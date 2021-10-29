<?php
    session_start();
    // Include Librari Google Client (API)
    include_once 'libraries/Google_Client.php';
    include_once 'libraries/contrib/Google_Oauth2Service.php';
    $client_id = '959533366240-a4d1amv6pa8dj6kk1hs9fn79lt96p95n.apps.googleusercontent.com'; // Google client ID
    $client_secret = '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'; // Google Client Secret
    $redirect_url = 'http://localhost/catatanuang/google.php'; // Callback URL
    // Call Google API
    $gclient = new Google_Client();
    $gclient->setApplicationName('Google Login'); // Set dengan Nama Aplikasi Kalian
    $gclient->setClientId($client_id); // Set dengan Client ID
    $gclient->setClientSecret($client_secret); // Set dengan Client Secret
    $gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login
    $google_oauthv2 = new Google_Oauth2Service($gclient);
?>