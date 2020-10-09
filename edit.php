<?php
  require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
   $id_mahasiswa = $_POST['id_mahasiswa'];
   $nama = $_POST['nama'];
   $alamat = $_POST['alamat'];
   $tanggal_lahir = $_POST['tanggal_lahir'];
   $jenis_kelamin = $_POST['jenis_kelamin'];
   $asal_sekolah = $_POST['asal_sekolah'];
   $nomor = $_POST['nomor'];
   $email = $_POST['email'];

   $sql = "UPDATE mahasiswa SET nama = '$nama', tanggal_lahir='$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', asal_sekolah = '$asal_sekolah', 
    nomor = '$nomor', email='$email' WHERE id_mahasiswa = '$id_mahasiswa'";

     if(mysqli_query($con,$sql)) {
       $response["value"] = 1;
       $response["message"] = "Berhasil";
       echo json_encode($response);
     } else {
        $response["value"] = 0;
        $response["message"] = "Gagal";
        echo json_encode($response);
     }
   mysqli_close($con);
  } else {
      $response["value"] = 0 ;
      $response["message"] = "Error";
      echo json_encode($response);
  }
?>