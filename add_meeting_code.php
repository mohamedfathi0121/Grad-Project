<?php
require_once "db.php";
require_once "functions.php";

if (session_status() === PHP_SESSION_NONE)
{
	session_start();
}

if (isset($_POST["add_meeting_btn"]))
{
	$number = clean_data($_POST["number"]);
	$month = clean_data($_POST["month"]);
	$year = clean_data($_POST["year"]);
	$is_current = clean_data($_POST["is_current"]);
	$status = clean_data($_POST["status"]);
	$formation_id = clean_data($_POST["formation_id"]);
	$memeting_insert_stmt = $conn->prepare("INSERT INTO 
                                                    `p39_meeting`
                                                        (`meeting_number`, 
                                                         `meeting_month`, 
                                                         `meeting_year`,  
                                                         `is_current`, 
                                                         `status`, 
                                                         `formation_id`, 
                                                         `added_by`)
                                                VALUES
                                                    (?, ?, ?, ?, ?, ?, ?)");
	$memeting_insert_stmt->bind_param("iiiisii",
		$number,
		$month,
		$year,
		$is_current,
		$status,
		$formation_id,
		$_SESSION["user_id"]);
	$memeting_insert_stmt->execute();

	header("location: meetings.php", true, 303);
}
