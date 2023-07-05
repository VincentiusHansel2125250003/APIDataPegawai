<?php
require("koneksipegawai.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST ["id"];
    $nama = $_POST["nama"];
    $umur = $_POST["umur"];
    $asal = $_POST["asal"];
    $pendidikan = $_POST["pendidikan"];
    $jeniskelamin = $_POST["jeniskelamin"];
    $gambarpegawai = $_POST["gambarpegawai"];
    
    $perintah ="UPDATE tbl_pegawai SET nama ='$nama', umur = '$umur', asal = '$asal', pendidikan ='$pendidikan', jeniskelamin ='$jeniskelamin', gambarpegawai = '$gambarpegawai' WHERE
    id = '$id'";
    $eksekusi = mysqli_query($connect, $perintah);
    $cek =  mysqli_affected_rows ($connect);
    
    if($cek >0 ){
        $response["kode"] = 1;
        $response["pesan"] = "Sukses Mengubah Data";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Gagal Mengubah Data";
    }
}
else {
    $response["kode"] = 0;
    $response["pesan"] = "Tidak Ada Data diUpdate";
}
echo json_encode($response);
mysqli_close($connect);