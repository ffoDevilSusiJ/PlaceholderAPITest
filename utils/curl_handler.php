<?php

class CurlHandler {
    public function get($url) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1); 
        curl_setopt($curl, CURLOPT_POST, 0);
        
        $json = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        curl_close($curl);
        
        if($json == "{}") {
            throw new Exception("Error with code: " . $code);
        }
        return ["body" => json_decode($json), "code" => $code];
    }
    public function post($url, $body) {
        $body->id = "";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1); 
        curl_setopt($curl, CURLOPT_POST, 1);

        $payload = json_encode($body);
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $payload );

        $json = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        
        curl_close($curl);

        if($json == "{}") {
            throw new Exception("Error with code: " . $code);
        }
        return ["body" => json_decode($json), "code" => $code];
    }
    public function put($url, $body) {
        $body->id = "";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1); 
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");

        $payload = json_encode($body);
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $payload );

        $json = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);
        if($json == "{}") {
            throw new Exception("Error with code: " . $code);
        }
        return ["body" => json_decode($json), "code" => $code];
    }
}