<?php
include_once 'IpInfo.php';

$ip = false;
if (isset($_GET['ip'])) {
    $ip = $_GET['ip'];
}

$ipInfo = new IpInfo();
$ipInfo->setIp($ip);

header('Content-Type: application/json');
echo json_encode($ipInfo->getDetails());