<?php
    include $_SERVER['DOCUMENT_ROOT'].'/catatanuang/main/awal.php'; 
	$user = $_SESSION['username'];
    $id_us = $_SESSION['id_us'];
    $nama = $_SESSION['nama'];
    $email = $_SESSION['email'];
    if ($id_us == 0){
		mysqli_query($con, "INSERT INTO user (username, password, nama_lengkap, email) VALUES ('$user', ' ', '$nama', '$email')");
		$id = mysqli_insert_id($con);
		$_SESSION['id_us'] = $id;
    }
	$pemasukan = total_pemasukan($con);
	$pengeluaran = total_pengeluaran($con);
	$saldo = $pemasukan - $pengeluaran;
?>
        <!-- <div id="layoutSidenav"> -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid" id="pagenow" data-page="main">
                        <h3 class="mt-4"><b>Dashboard</b></h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
						<div class="row">
							<div class="col">
								<div class="card text-white bg-success mb-3" style="max-width: 20rem;">
									<div class="card-header">Pemasukan</div>
									<div class="card-body">
										<h4 class="card-title"><?php echo rupiah($pemasukan) ?></h4>
										<!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
									<div class="card-header">Pengeluaran</div>
									<div class="card-body">
										<h4 class="card-title"><?php echo rupiah($pengeluaran) ?></h4>
										<!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card text-black bg-secondary mb-3" style="max-width: 20rem;">
									<div class="card-header">Saldo</div>
									<div class="card-body">
										<h4 class="card-title"><?php echo rupiah($saldo) ?></h4>
										<!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
									</div>
								</div>
							</div>
						</div>
                    </div>
                </main>
<?php
    include $_SERVER['DOCUMENT_ROOT'].'/catatanuang/main/akhir.php';
?>