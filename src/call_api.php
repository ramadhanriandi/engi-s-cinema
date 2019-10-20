<?php
function callAPI($method, $url, $data = false)
{
    if ($data) {
        $postdata = http_build_query($data);
    }
    switch ($method) {
    case 'POST':
        if ($data) {
            $opts = array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/json',
                    'content' => $postdata
                )
            );
        } else {
            $opts = array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/json'
                )
            );
        }
        break;
    case 'GET':
        if ($data) {
            $opts = array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/json',
                    'content' => $postdata
                )
            );
        } else {
            $opts = array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/json'
                )
            );
        }
        break;
    case 'PUT':
        if ($data) {
            $opts = array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/json',
                    'content' => $postdata
                )
            );
        } else {
            $opts = array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/json'
                )
            );
        }
        break;
    case 'DELETE':
        if ($data) {
            $opts = array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/json',
                    'content' => $postdata
                )
            );
        } else {
            $opts = array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/json'
                )
            );
        }
        break;
    }
    $context  = stream_context_create($opts);
    $result = file_get_contents($url, true, $context);
    $result = json_decode($result);
    return $result;
}

function callAPI2($method, $url, $data = false)
{
    $curl = curl_init();
 
    switch ($method){
    case "POST":
        curl_setopt($curl, CURLOPT_POST, 1);
        if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        break;
    case "PUT":
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
        break;
    // default:
    //     if ($data)
    //         $url = sprintf("%s?%s", $url, http_build_query($data));
    }
 
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json'
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_TIMEOUT, 40);
    // curl_setopt($curl, CURLOPT_PORT, 1100);//$_SERVER['SERVER_PORT']);
    curl_setopt($curl, CURLOPT_VERBOSE, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
 
    // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}