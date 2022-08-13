<?php
error_reporting(0);
//header("content-type: application/vnd.apple.mpegurl");
header("pragma: no-cache");
header("Connection: keep-alive");
$json = json_decode(file_get_contents("red.json"), true);

$id = $_GET['id'];
foreach($json as $values) {
    if ($values["id"] == "$id") {
        $url = $values["link"];
        }
		}
		
		$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, "REDLINECLIENT RED360 V0.1.49");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$curl= curl_exec($ch);
$url1 = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);
$rey="aHR0cDovL3JleWFuY2UwLndlYmQucHJvL21wLnBocC8=";
$pxy= base64_decode($rey);
$burl = str_replace("index.m3u8", "tracks-v1a1/mono.m3u8", $url1);
$blink = $burl;
//echo $blink;
$date = (new DateTime('2023-05-07 12:00:08'))->getTimestamp();
//$date = (new DateTime)->getTimestamp();
$clink= str_replace("1650823984","$date",$blink);
//echo $clink;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $clink);
curl_setopt($ch, CURLOPT_USERAGENT, "REDLINECLIENT GOLDENBOX V2.8.89");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
$html = curl_exec($ch);
$dlink = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);
//echo $dlink;
header("Location: ".$dlink);