<?php session_start();
$_SESSION['logged_in_customer_id'] = 64;
setlocale(LC_MONETARY, 'en_US');
error_reporting(-1);
require_once __DIR__ . '/../QuickDB.class.php';
$pdo = QuickDB::getInstance();
$flash_msgs = '';
foreach($_SESSION['flash_msgs'] as $msg) $flash_msgs.=$msg;

$_SESSION['flash_msgs'] = null;
