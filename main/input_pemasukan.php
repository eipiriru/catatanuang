<?php
    include $_SERVER['DOCUMENT_ROOT'].'/catatanuang/main/awal.php';
    if (isset($_POST['simpan'])) 
    {
        $nama= $_POST['nama'];
        $nominal = $_POST['nominal'];
        
        $status = input_pemasukan($con, $nama, $nominal);
        
        if ($status == "ok")
        {
            echo "<script language='javascript'>window.location.href = '".$url."/main/pemasukan.php'</script>";
        }
        else
        {
            echo '<script language="javascript">
              alert ("gagal");
              </script>';
        }
    }    
?>
        <!-- <div id="layoutSidenav"> -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid" id="pagenow" data-page="pemasukan">
                        <h3 class="mt-4"><b>Pemasukan</b></h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo $url."/main/index.php" ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo $url."/main/pemasukan.php" ?>">Pemasukan</a></li>
                            <li class="breadcrumb-item active">Input Pemasukan</li>
                        </ol>
                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header text-light bg-primary-sd-dark">
                                        <i class="fas fa-wallet mr-1"></i>
                                        Tambah data Pemasukan
                                        &emsp;
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="input_pemasukan.php">
                                            <div class="form-group">
                                                <label for="exampleTextarea">Nama Pemasukan</label>
                                                <input class="form-control" type="text" name="nama" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea">Nominal</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Rp.</div>
                                                    </div>
                                                    <input type="number" min="0" class="form-control" name="nominal" id="nominal" placeholder="nominal" required="">
                                                </div>
                                                <small id="passwordHelpBlock" class="form-text text-muted">
                                                    Hanya masukan angka tanpa titik atau koma
                                                </small>
                                                <small id="passwordHelpBlock" class="form-text text-muted">
                                                    <i id="peringatan" class="text-danger"></i>
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea">Tanggal</label>
                                                <input class="form-control" type="date" name="date" value="<?php echo date('Y-m-d') ?>"readonly>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-success" name="simpan" value="Simpan" id="save">
                                                <button type="button" class="btn btn-danger" name="batal" id="batal" onclick="window.location = '<?php echo $url; ?>/main/pemasukan.php'">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/catatanuang/main/akhir.php';
?>