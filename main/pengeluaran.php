<?php
    include $_SERVER['DOCUMENT_ROOT'].'/catatanuang/main/awal.php';
    $list = json_decode(pengeluaran($con));
    if (isset($_GET['hapus']))
    {
        $id = $_GET['hapus'];
        $result = hapus_pengeluaran($con, $id);
        if ($result == "ok") 
        {
            echo '<script language="javascript">
                alert("Data Berhasil DiHapus");
            window.open("'.$url.'/main/pengeluaran.php","_self");
            </script>';
        }
        elseif ($result == "not") 
        {
            echo '<script language="javascript">
                alert("GAGAL Menghapus Data, Coba Lagi !");
            window.open("'.$url.'/main/pengeluaran.php","_self");
            </script>';
        }
    }
?>
        <!-- <div id="layoutSidenav"> -->
            <p id="demo"></p>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid" id="pagenow" data-page="pengeluaran">
                        <h3 class="mt-4"><b>Pengeluaran</b></h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo $url."/main/index.php" ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pengeluaran</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="card-header text-light bg-primary-sd-dark">
                                    <i class="fas fa-wallet mr-1"></i>
                                    Pengeluaran
                                    &emsp;
                                    <a href="<?php echo $url."/main/input_pengeluaran.php"?>" class="btn btn btn-primary">
                                        Tambah data Pengeluaran
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Nama Pengeluaran</th>
                                                    <th>Nominal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                if ($list != null) 
                                                {
                                                    foreach ($list as $value) 
                                                    {
                                            ?>
                                                <tr>
                                                    <td><?php echo tanggal_2($value->timestamp)?></td>
                                                    <td><?=$value->nama?></td>
                                                    <td><?php echo tanpa_rupiah($value->nominal)?></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-danger" onclick="window.location = '<?php echo $url; ?>/main/pengeluaran.php?hapus=<?=$value->id?>'">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            </tbody>
                                        </table>
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