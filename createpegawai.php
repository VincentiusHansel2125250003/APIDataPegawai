<?php
require("koneksipegawai.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST["nama"];
    $umur = $_POST["umur"];
    $asal = $_POST["asal"];
    $pendidikan = $_POST["pendidikan"];
    $jeniskelamin = $_POST["jeniskelamin"];
    $gambarpegawai = $_POST["gambarpegawai"];
    
    $perintah ="INSERT INTO tbl_pegawai(nama, umur, asal, pendidikan, jeniskelamin, gambarpegawai) values ('$nama', '$umur', '$asal', '$pendidikan', '$jeniskelamin', '$gambarpegawai')";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek =  mysqli_affected_rows ($connect);
    
    if($cek >0 ){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Menyimpan Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Menyimpan Data";
    }
}
else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Post Data";
}
echo json_encode($response);
mysqli_close($connect);