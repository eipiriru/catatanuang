<?php
    include $_SERVER['DOCUMENT_ROOT'].'/catatanuang/db.php';
    require $_SERVER['DOCUMENT_ROOT'].'/catatanuang/source.php';
    session_start();
   
    if (isset($_SESSION['username'])) 
    {
        is_login($url, $_SESSION['username']);
    }
    elseif (isset($_POST['login']))
    {
        $login = login($con, $url, $_POST['username'], $_POST['password']);
        if ($login == "gagal") 
        {
            echo '<script language="javascript">
              alert ("Username atau password salah");
              </script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LOGIN</title>
        <link rel="shortcut icon" href="<?php echo $url;?>assets/favicon/logopbg.ico">
        <link href="<?php echo $url;?>/css/styles.css" rel="stylesheet" />
        <link href="<?php echo $url;?>/css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo $url;?>/css/font-awesome.min.css" rel="stylesheet">
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script> -->
    </head>
    <body class="bg-sd">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6" style="opacity: 1.9">
                                <div class="card shadow-lg border-0 rounded-lg mt-5  bg-primary-sd">
                                    <div class="card-header bg-primary-sd-dark text-light">
                                        <div class="row">
                                            <div class="col-4">
                                                <br>
                                            <img src="<?php echo $url;?>/assets/img/download.png" class="img-fluid">        
                                            </div>
                                            <div class="col-8">
                                                <h3 class="text-left font-weight-light my-4">
                                                    <b>Pencatatan Keuangan Pribadi<br></b>
                                                    <i>Version 0.0.1</i><br>
                                                    <b>
                                                        Login<br>
                                                        
                                                    </b>
                                                </h3>
                                                <i>Masukan Username dan password</i>  
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php echo $url;?>/index.php" method="POST">
                                            <div class="form-group">
                                                <label class="mb-1" for="inputEmailAddress">Username</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="text" name="username" placeholder="Masukan Username"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Masukan Password" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-start">
                                                <input type="submit" name="login" class="btn btn-block btn-primary" value="LOGiN">
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-start">
                                                <a href="google.php" class="btn btn-block btn-danger"><i class="fas fa-google"></i> &nbsp;LOGIN WITH GOOGLE</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><i><a href="regis.php" class="link-secondary">Buat Akun</a></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="<?php echo $url;?>/js/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo $url;?>/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo $url;?>/js/scripts.js"></script>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function()
    {
        var bg=[0,1,2,3];
        var index=0;
        setInterval(function()
        {
            index=(index + 1) % bg.length;
            $('body').css('background-image','url("/catatanuang/assets/img/'+index+'.jpg")');
        },5000);
    });
</script>