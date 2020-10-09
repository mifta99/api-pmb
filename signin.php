<?php
  require_once('koneksi.php');
  require "php-jwt-example/api/vendor/autoload.php";
  use \Firebase\JWT\JWT;

 if($_SERVER['REQUEST_METHOD']=='POST') {
    $response = array();
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $result = mysqli_query($con,"SELECT * FROM mahasiswa where email='$email' and password='$password'") or die(mysqli_error());
    if (mysqli_num_rows($result) > 0){
      $res = array();
      while($row = mysqli_fetch_array($result)){
        $hasil = array();
        $res["id_mahasiswa"] = $row["id_mahasiswa"];
        $res["nama"] = $row["nama"];
        $res["email"] = $row["email"];
        // array_push($res,$hasil);
        // $response["value"] = 1;
      }
      // echo json_encode($res); 
      // return
      $secret_key = "miftah";
      $issuer_claim = "miftah";
      $audience_clain = $res["nama"];
      $issuedat_claim = time();
      $notbefore_claim = $issuedat_claim + 10;
      $expire_claim = $issuedat_claim + 60;
      $token = array(
        "iss" => $issuer_claim,
        "aud" => $audience_clain,
        "iat" => $issuedat_claim,
        "nbf" => $notbefore_claim,
        "exp" => $expire_claim,
        "data" => array(
          "id" => $res["id_mahasiswa"],
          "nama" => $res["nama"],
          "email" => $res["email"]
        )
      );

      $jwt = JWT::encode($token, $secret_key);
      echo json_encode(
        array(
          "message" => "Sukses",
          "jwt" => $jwt,
        )
      ); 
    }else{
      $response["value"] = 0;
      $response["message"] = "Hasil Tidak Di Ditemukan";
      echo json_encode($response);
    }
    mysqli_close($con);
   } else {
     $response["value"] = 0 ;
     $response["message"] = "Error";
     echo json_encode($response);
   }
?>
