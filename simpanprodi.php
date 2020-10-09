<?php
  require_once('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {
   $id_mahasiswa = $_POST['id_mahasiswa'];
   $fakultas = $_POST['fakultas'];
   $prodi = $_POST['prodi'];

   $sql = "INSERT INTO prodi (id_mahasiswa, fakultas, prodi) VALUES('$id_mahasiswa','$fakultas','$prodi')";

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