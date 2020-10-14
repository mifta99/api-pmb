<?php
require_once('koneksi.php');
require "php-jwt-example/api/vendor/autoload.php";
use \Firebase\JWT\JWT;

function isAuthorize() {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $secret_key = "miftah";

    $headers = apache_request_headers();

    if($headers['Authorization']){

        try {

            $decoded = JWT::decode($headers['Authorization'], $secret_key, array('HS256'));

            // Access is granted. Add code of the operation here 

            return true;
            // echo json_encode(array(
            //     "message" => "Access granted:",
            //     // "error" => $e->getMessage()
            // ));

        }catch (Exception $e){

            http_response_code(401);

            echo json_encode(array(
                "message" => "Access denied.",
                "error" => $e->getMessage()
            ));
        }
    }
}
?>