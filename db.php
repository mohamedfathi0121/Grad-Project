<?php
$server = "localhost";
$user = "root";
$password = "";
$db = "faculty_meeting_system";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
	die("فشل في الإتصال بقاعدة البيانات " . $conn->connect_error);
}