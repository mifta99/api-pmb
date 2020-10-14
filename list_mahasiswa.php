<?php
  require_once('koneksi.php');
  include 'protection.php';

 if($_SERVER['REQUEST_METHOD']=='GET') {
   $isAuthorize = isAuthorize();
   
   if ($isAuthorize) {
      $result = mysqli_query($con,"SELECT * FROM mahasiswa") or die(mysqli_error());
      if (mysqli_num_rows($result) > 0){
        $response["result"] = array();
        while($row = mysqli_fetch_array($result)){
          $hasil = array();
          $hasil["id_mahasiswa"] = $row["id_mahasiswa"];
          $hasil["nama"] = $row["nama"];
          $hasil["tanggal_lahir"] = $row["tanggal_lahir"];
          $hasil["jenis_kelamin"] = $row["jenis_kelamin"];
          $hasil["alamat"] = $row["alamat"];
          $hasil["asal_sekolah"] = $row["asal_sekolah"];
          $hasil["nomor"] = $row["nomor"];
          $hasil["email"] = $row["email"];
          array_push($response["result"],$hasil);
          $response["value"] = 1;
        }
        echo json_encode($response);
      }else{
        $response["value"] = 0;
        $response["message"] = "Hasil Tidak Di Ditemukan";
        echo json_encode($response);
      }
      mysqli_close($con);
   }
   // panggil fungsi isAuthorize
   } else {
     $response["value"] = 0 ;
     $response["message"] = "Error";
     echo json_encode($response);
   }
?>
