<?php
date_default_timezone_set('UTC');

function getAllData($url,$user,$pass){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"$url/cgi-bin/statusjson.cgi?query=servicelist");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_USERPWD, "$user:$pass");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);

    $response = json_decode(curl_exec($curl),true);
    return $response['data']['servicelist'];
}


function getOk($url,$user,$pass){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"$url/cgi-bin/statusjson.cgi?query=servicelist&details=true&servicestatus=ok");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_USERPWD, "$user:$pass");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);

    $response = json_decode(curl_exec($curl),true);
    return $response['data']['servicelist'];
}


function getCritical($url,$user,$pass){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"$url/cgi-bin/statusjson.cgi?query=servicelist&details=true&servicestatus=critical");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_USERPWD, "$user:$pass");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);

    $response = json_decode(curl_exec($curl),true);
    return $response['data']['servicelist'];
}

function getWarning($url,$user,$pass){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"$url/cgi-bin/statusjson.cgi?query=servicelist&details=true&servicestatus=warning+unknown+pending");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_USERPWD, "$user:$pass");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);

    $response = json_decode(curl_exec($curl),true);
    return $response['data']['servicelist'];
}

function getHost($host,$url,$user,$pass){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"$url/cgi-bin/statusjson.cgi?query=servicelist&details=true&hostname=$host");
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_USERPWD, "$user:$pass");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);

    $response = json_decode(curl_exec($curl),true);
    return $response['data']['servicelist'];
}

function time2string($ntime) {
    $timeline = time() - $ntime/1000;
    $periods = array('d' => 86400, 'h' => 3600, 'm' => 60, 's' => 1);
    $ret = "";
    foreach($periods AS $name => $seconds){
        $num = floor($timeline / $seconds);
        $timeline -= ($num * $seconds);
        $ret .= $num.''.$name.' ';
    }

    return trim($ret);
}
?>