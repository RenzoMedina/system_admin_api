<?php 

use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function getToken($data,$admin){
    $now = strtotime("now");
    $key = $_ENV['TOKEN'];
    $payload = [
        'exp'=>$now + 3600,
        'admin'=>$admin,
        'data'=> $data
    ];
    $jwt = JWT::encode($payload, $key, 'HS256');
    return $jwt;
}

function validatedToken($token,$key){
    try {
        $decodeJWT = JWT::decode($token, new Key($key, 'HS256'));
        return $decodeJWT;
    } catch (ExpiredException $e) {
        Flight::jsonHalt([
            "error"=>"Expired token",
            "details"=>$e->getMessage()
        ],401);
    }catch(Exception $e) {
        Flight::jsonHalt([
            "error"=>"Invalid token",
            "details"=>$e->getMessage()
        ],401);
    }
}