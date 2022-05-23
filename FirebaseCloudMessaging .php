<?php
 

    $url = "https://fcm.googleapis.com/fcm/send";
    $token = "/topics/YourTopic";  
    $serverKey = 'ApiKey';


$title="ADACO";
$body="Avant d épouser une femme, regarde la tête de sa mère";
$image="https://smaller-pictures.appspot.com/images/dreamstime_xxl_65780868_small.jpg";
 /* envoi de notification via CURL  */

    $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'image' => $image, 'badge' => '1', 'priority' => 'high', 'icon' => 'ic_launcher');
     $data = array('lien' =>'www.iphametra.org');
    $arrayToSend = array('to' => $token, 'notification' => $notification, 'data' => $data,'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //Send the request
    $response = curl_exec($ch);
    //Close request
    if ($response === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
    }
    curl_close($ch);




?>