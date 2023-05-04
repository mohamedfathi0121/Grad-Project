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

if (isset($_POST["pending_btn"]))
{
	$pending_stmt = $conn->prepare("UPDATE p39_meeting SET status = ? WHERE meeting_id = ?");
	$status = "pending";
	$pending_stmt->bind_param("si", $status, $_POST["meeting_id"]);
	$pending_stmt->execute();
	header("location: meetings.php", true, 303);
}

if (isset($_POST["finished_btn"]))
{
	$finished_stmt = $conn->prepare("UPDATE p39_meeting SET status = ? WHERE meeting_id = ?");
	$status = "finished";
	$finished_stmt->bind_param("si", $status, $_POST["meeting_id"]);
	$finished_stmt->execute();
	header("location: meetings.php", true, 303);
}

if (isset($_POST["past_btn"]))
{
	$finished_stmt = $conn->prepare("UPDATE p39_meeting SET is_current = ? WHERE meeting_id = ?");
	$is_current = 0;
	$finished_stmt->bind_param("si", $is_current, $_POST["meeting_id"]);
	$finished_stmt->execute();
	header("location: meetings.php", true, 303);
}