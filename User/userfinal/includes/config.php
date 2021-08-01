<?php

require_once 'vendor/autoload.php';





//     goggle login configuration
$google_client = new Google_Client();

// client id 
$google_client->setClientId('Enter a Cient id');

//api scret id  
$google_client->setClientSecret('g41lqVUdcLEC99NxGrPg2r_D');


$google_client->setRedirectUri('http://localhost/website%20my/User/userfinal/gmaillogin.php');

$google_client->addScope('email');

$google_client->addScope('profile');





require_once 'facebookvendor/autoload.php';



// facebook login configuration

$facebook = new \Facebook\Facebook([
  
    'app_id'      => 'Eneter App_id',
    'app_secret'     => 'enter app_secret key',
    'default_graph_version'  => 'v2.10'
  ]);
?>