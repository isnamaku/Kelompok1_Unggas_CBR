<?php
$host="localhost";
$user="root";
$pass="";
$dbName="unggas_cbr";
$koneksi=mysqli_connect($host,$user,$pass,$dbName);
$db=mysqli_select_db($koneksi, $dbName)or die("<center color='red'><strong>" .mysqli_error($koneksi)."</strong></center>"
."<center><font color='red'><strong>Koneksi Gagal...! karena database tidak ada</strong></font></center><center><p align='center'>Informasi Pemesanan database : </p>
"
);
if(!$koneksi){
	echo"<center><font color='red'><strong>Koneksi Gagal...!</strong></font></center>";
	echo"<center><font color='red'><strong>DATABASE $dbName tidak ditemukan...!</strong></font></center>";
	}
?>