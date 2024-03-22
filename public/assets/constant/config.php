<?php
ini_set('display_errors','off');

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "petrol_pump1";
date_default_timezone_set("Asia/Ho_Chi_Minh");

try {

	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// echo "Connected successfully";
} catch (PDOException $e) {

	echo "Connection failed: " . $e->getMessage();
}
