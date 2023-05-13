<?php
require_once "db.php";
require_once "functions.php";

if (session_status() === PHP_SESSION_NONE)
{
	session_start();
}

foreach ($_POST as $key=>$value)
{

	switch ($key)
	{
		case "delete_decision_btn":
			$delete_decision_stmt = Delete($conn, "p39_decision", "decision_id = {$_POST['decision_id']}");
			$delete_decision_stmt->execute();
			header("location: current_meeting_subject.php?mid={$_POST['meeting_id']}", true, 303);
			break;
	}
}
