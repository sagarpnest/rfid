<?php

    session_start();
    if(!isset($_SESSION['loggedin']))
        $_SESSION['loggedin']=false;

    $link = "http://172.16.12.244:5349";
    $site = "/RFIDAttendanceAPI/web/";

    function getSalt($username) {

        global $link;
        global $site;

        $url = $link . $site . "get-user-hash?username=" . $username;
        $json = file_get_contents($url);
        $json = json_decode($json);
        if($json->result == 0){
            $res = $json->salt;
        }else{
            $res = '';
        }
        return $res;
    }

?>