<?php 

include "koneksi.php";
# Baca variabel Form (If Register Global ON)
$TxtNama 	= $_REQUEST['TxtNama'];
$RbKelamin 	= $_POST['cbojk'];
$TxtUmur	= $_REQUEST['TxtUmur'];
$TxtAlamat 	= $_REQUEST['TxtAlamat'];
$NOIP = $_SERVER['REMOTE_ADDR'];

# Validasi Form
if (trim($TxtNama)=="") {
	include "PasienAddFm.php";
	echo "Nama belum diisi, ulangi kembali";
}
elseif (trim($TxtUmur)=="") {
	include "PasienAddFm.php";
	echo "Umur masih kosong, ulangi kembali";
}
elseif (trim($TxtAlamat)=="") {
	include "PasienAddFm.php";
	echo "Alamat masih kosong, ulangi kembali";
}
else {
    $NOIP = $_SERVER['REMOTE_ADDR'];

	$sqldel = "DELETE FROM tmp_pasien WHERE noip='$NOIP'";	mysqli_query($koneksi,$sqldel);
	
	$sql  = " INSERT INTO tmp_pasien (nama,kelamin,umur,alamat,noip,tanggal) 
		 	  VALUES ('$TxtNama','$RbKelamin','$TxtUmur','$TxtAlamat','$NOIP',NOW())";
	mysqli_query($koneksi,$sql) 
		  or die ("SQL Error 2".mysqli_error($koneksi));
	
	$sqlhapus = "DELETE FROM tmp_penyakit WHERE noip='$NOIP'";
	mysqli_query($koneksi,$sqlhapus) or die ("SQL Error 1".mysqli_error($koneksi));
	
	$sqlhapus2 = "DELETE FROM tmp_analisa WHERE noip='$NOIP'";
	mysqli_query($koneksi,$sqlhapus2) or die ("SQL Error 2".mysqli_error($koneksi));
			
	$sqlhapus3 = "DELETE FROM tmp_gejala WHERE noip='$NOIP'";
	mysqli_query($koneksi,$sqlhapus3) or die ("SQL Error 3".mysqli_error($koneksi));
	//diarahkan ke konsultasifm
	echo "<meta http-equiv='refresh' content='0; url=index.php?top=konsultasifm.php'>";
}
?>
	