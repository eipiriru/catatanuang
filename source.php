<?php
	// USER -- USER -- USER -- USER -- USER -- USER -- USER -- USER -- USER -- USER -- USER -- USER -- USER -- USER -- USER -- USER

	function cek_user($con, $username)
	{
		$cari = mysqli_query($con, "SELECT * from user WHERE username = '$username'");
		$cek = mysqli_num_rows($cari);
		if($cek > 0)
        {
        	$status = "notsave";
        }
        else
        {
        	$status = "save";
        }
		return $status;
	}

	function daftar_user($con)
	{
		$user;
		$cari = mysqli_query($con, "SELECT * from user");
		while ($hasil = mysqli_fetch_array($cari)) 
		{
			$user []= 
			[
				'id_user' => $hasil['id_user'],
				'username' => $hasil['username'],
				'email' => $hasil['email'],
				'kategori_user' => $hasil['kategori_user'],
				'nama_lengkap' => $hasil['nama_lengkap'],
			];
		}
		return $user;
	}

	function user_onid($con, $id)
	{
		$cari = mysqli_query($con, "SELECT * from user WHERE id_user = '$id'");
		$hasil = mysqli_fetch_array($cari);
		$user []= 
			[
				'id_user' => $hasil['id_user'],
				'username' => $hasil['username'],
				'email' => $hasil['email'],
				'kategori_user' => $hasil['kategori_user'],
				'nama_lengkap' => $hasil['nama_lengkap'],
			];
		return $user;
	}

	function regis($con, $nama_lengkap, $username, $email, $password)
	{
		$status = cek_user($con, $username);
		if ($status == "save") 
		{
			$pass = md5($password);
			mysqli_query($con, "INSERT INTO user (username, password, nama_lengkap, email) VALUES ('$username', '$pass', '$nama_lengkap', '$email')");
			return $status;
		}
		else
		{
			return $status;
		}
	}

	function edit($con, $id_user, $nama_lengkap, $username, $email)
	{
		$status = cek_user($con, $username);
		if ($status == "save") 
		{
			mysqli_query($con, "UPDATE user SET username = '$username', nama_lengkap = '$nama_lengkap', email = '$email'  WHERE id_user = '$id_user';");
			return $status;
		}
		else
		{
			return $status;
		}
	}

	function hapus($con, $id_user)
	{
		mysqli_query($con, "DELETE FROM user WHERE id_user = '$id_user';");
	}

	function get_username($con, $id_user)
	{
		$cari = mysqli_query($con, "SELECT username from user WHERE id_user = '$id_user'");
		$hasil = mysqli_fetch_array($cari);
		return $hasil['username'];
	}

	function is_login($url, $role)
	{
		echo "<script language='javascript'>window.location.href = '".$url."/main/'</script>";
	}

	function login($con, $url, $username, $password)
	{
		$password = md5($password);

		$cari = mysqli_query($con, "SELECT * from user where username='$username' and password='$password'");
        $cek = mysqli_num_rows($cari);
        if($cek > 0)
        {
        	$result = mysqli_fetch_array($cari);
        	$_SESSION['username'] = $result['username'];
			$_SESSION['id_us'] = $result['id_user'];
			$_SESSION['nama'] = $result['nama_lengkap'];
			$_SESSION['email'] = $result['email'];
        	echo "<script language='javascript'>window.location.href = '".$url."'</script>";	
        }
        else
        {
        	return "gagal";
        }
	}

	function ubah_uname($con, $id_user, $uname)
	{
		$status = cek_user($con, $uname);
		if ($status == "save") 
		{
			mysqli_query($con, "UPDATE user SET username = '$uname' WHERE id_user = '$id_user';");
			$_SESSION['username'] = $uname;
			return $status;
		}
		else
		{
			return $status;
		}
	}

	function ubah_email($con, $id_user, $email)
	{
		mysqli_query($con, "UPDATE user SET email = '$email' WHERE id_user = '$id_user';");
		$_SESSION['email'] = $email;
	}

	function ubah_nama($con, $id_user, $nama_lengkap)
	{
		mysqli_query($con, "UPDATE user SET nama_lengkap = '$nama_lengkap' WHERE id_user = '$id_user';");
		$_SESSION['nama'] = $nama_lengkap;
	}

	function ubah_pass($con, $id_user, $password)
	{
		$pass = md5($password);
		mysqli_query($con, "UPDATE user SET password = '$pass' WHERE id_user = '$id_user';");
	}

	function rupiah($uang)
	{
		$hasil_rupiah ="Rp. " . number_format($uang,2,',','.');
		return $hasil_rupiah;
	}

	function tanpa_rupiah($uang)
	{
		$hasil_rupiah =number_format($uang,0,",",".");
		return $hasil_rupiah;
	}

	function tanggal($timestamp)
	{
		setlocale(LC_ALL, 'id-ID', 'id_ID');
		return strftime("%A, %d %B %Y", strtotime($timestamp));
	}

	function tanggal_1($timestamp)
	{
		return date("m/d/Y", strtotime($timestamp));
	}

	function tanggal_2($timestamp)
	{
		setlocale(LC_ALL, 'id-ID', 'id_ID');
		return strftime("%d-%b-%y", strtotime($timestamp));
	}

	function waktu($timestamp)
	{
		setlocale(LC_ALL, 'id-ID', 'id_ID');
		return strftime("%H:%M", strtotime($timestamp));
	}

	function get_date_indo($timestamp)
	{
		$tanggal = tanggal($timestamp);
		$waktu = waktu($timestamp);
		return $tanggal.", Pukul ".$waktu;
	}

	function rand_color() {
    	return sprintf('#%06X', mt_rand(0.5, 0xFFFFFF));
	}

	function nama_bulan($angka)
	{
		$bulan = ["Januari - Desember", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
		return $bulan[$angka];
	}

	function romawi_bulan($tanggal)
	{
		$bulan = date("m",strtotime($tanggal));
		$int = (int)$bulan;
		$romawi = ["0", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];
		return $romawi[$int];
	}


	//PEMASUKAN
	function input_pemasukan($con, $nama, $nominal)
	{
		$user = $_SESSION['id_us'];
		$insert = mysqli_query($con, "INSERT INTO pemasukan (nama_pemasukan, nominal, id_user) VALUES ('$nama', '$nominal', '$user')");
		if ($insert)
		{
			$result = "ok";
		}
		else
		{
			$result = "not";
		}
		
		return $result;
	}

	function pemasukan($con)
	{
		$user = $_SESSION['id_us'];
		$cari = mysqli_query($con, "SELECT * FROM `pemasukan` WHERE id_user = $user ORDER BY `timestamp` ASC");
		$cek = mysqli_num_rows($cari);
		
		if ($cek > 0) 
		{
			$result=[];
			while ($hasil = mysqli_fetch_array($cari)) 
			{
				array_push($result, ["id" => $hasil["id_pemasukan"], "nama" => $hasil["nama_pemasukan"], "nominal" => $hasil["nominal"], "timestamp" => $hasil["timestamp"]]);
			}
			$result = json_encode($result);
		}
		else
		{
			$result = "null";
		}
		return $result;
	}

	function hapus_pemasukan($con, $id)
	{
		$hapus = mysqli_query($con, "DELETE FROM pemasukan WHERE id_pemasukan = '$id';");
		if ($hapus)
		{
			$result = "ok";
		}
		else
		{
			$result = "not";
		}
		
		return $result;	
	}

	function total_pemasukan($con)
	{
		$user = $_SESSION['id_us'];
		$cari = mysqli_query($con, "SELECT SUM(nominal) AS nominal FROM pemasukan WHERE id_user = '$user'");
		$cek = mysqli_num_rows($cari);
		if ($cek > 0) 
		{
			$hasil = mysqli_fetch_array($cari);
			$result = $hasil['nominal'];
		}
		else
		{
			$result = 0;
		}
		return $result;
	}

	//PENGELUARAN
	function input_pengeluaran($con, $nama, $nominal)
	{
		$user = $_SESSION['id_us'];
		$insert = mysqli_query($con, "INSERT INTO pengeluaran (nama_pengeluaran, nominal, id_user) VALUES ('$nama', '$nominal', '$user')");
		if ($insert)
		{
			$result = "ok";
		}
		else
		{
			$result = "not";
		}
		
		return $result;
	}

	function pengeluaran($con)
	{
		$user = $_SESSION['id_us'];
		$cari = mysqli_query($con, "SELECT * FROM `pengeluaran` WHERE id_user = $user ORDER BY `timestamp` ASC");
		$cek = mysqli_num_rows($cari);
		
		if ($cek > 0) 
		{
			$result=[];
			while ($hasil = mysqli_fetch_array($cari)) 
			{
				array_push($result, ["id" => $hasil["id_pengeluaran"], "nama" => $hasil["nama_pengeluaran"], "nominal" => $hasil["nominal"], "timestamp" => $hasil["timestamp"]]);
			}
			$result = json_encode($result);
		}
		else
		{
			$result = null;
		}
		return $result;
	}

	function hapus_pengeluaran($con, $id)
	{
		$hapus = mysqli_query($con, "DELETE FROM pengeluaran WHERE id_pengeluaran = '$id';");
		if ($hapus)
		{
			$result = "ok";
		}
		else
		{
			$result = "not";
		}
		
		return $result;	
	}

	function total_pengeluaran($con)
	{
		$user = $_SESSION['id_us'];
		$cari = mysqli_query($con, "SELECT SUM(nominal) AS nominal FROM pengeluaran WHERE id_user = '$user'");
		$cek = mysqli_num_rows($cari);
		if ($cek > 0) 
		{
			$hasil = mysqli_fetch_array($cari);
			$result = $hasil['nominal'];
		}
		else
		{
			$result = 0;
		}
		return $result;
	}

?>