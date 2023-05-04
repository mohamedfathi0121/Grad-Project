<?php
require_once "db.php";
require_once "functions.php";

if(session_status() === PHP_SESSION_NONE)
{
	session_start();
}
if (isset($_POST["confirm_btn"]))
{
	$confirm_stmt = $conn->prepare("UPDATE p39_meeting SET status = ? WHERE meeting_id = ?");
	$status = "confirmed";
	$confirm_stmt->bind_param("si", $status, $_POST["meeting_id"]);
	$confirm_stmt->execute();
	header("location: meetings.php", true, 303);
}
?>