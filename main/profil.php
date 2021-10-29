<?php
    include $_SERVER['DOCUMENT_ROOT'].'/catatanuang/main/awal.php';    
?>
        <!-- <div id="layoutSidenav"> -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid" id="pagenow" data-page="profil">
                        <h3 class="mt-4"><b>Informasi Profil</b></h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo $url."/main/index.php" ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profil</li>
                        </ol> 
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="card mb-4">
                                    <div class="card-header text-light bg-primary-sd-dark">
                                        <i class="fas fa-user mr-1"></i>
                                        Profil
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless" width="100%" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <th>Username</th>
                                                        <td><input type="text" class="form-control form-control-sm" value="<?php echo $_SESSION['username'];?>" readonly></td>
                                                        <!-- <td>
                                                            <a href="" class="btn btn-sm btn-primary uname-edit" data-toggle="modal" data-target="#ubah-uname"><i class="fas fa-edit"></i></a>
                                                        </td> -->
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td><input type="text" class="form-control form-control-sm" value="<?php echo $_SESSION['email'];?>" readonly></td>
                                                        <!-- <td>
                                                            <a href="" class="btn btn-sm btn-primary uname-edit" data-toggle="modal" data-target="#ubah-email"><i class="fas fa-edit"></i></a>
                                                        </td> -->
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Lengkap</th>
                                                        <td><input type="text" class="form-control form-control-sm" value="<?php echo $_SESSION['nama'];?>" readonly></td>
                                                        <!-- <td>
                                                            <a href="" class="btn btn-sm btn-primary uname-edit" data-toggle="modal" data-target="#ubah-nama"><i class="fas fa-edit"></i></a>
                                                        </td> -->
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/catatanuang/main/akhir.php';
?>