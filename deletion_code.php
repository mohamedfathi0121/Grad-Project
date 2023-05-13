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
			header("location: current_meeting_subject.php?mid={$_POST['meeting_id']}",
				true, 303);
			break;

		case "delete_subject_btn":
			$delete_subject_stmt = Delete($conn, "p39_subject", "subject_id = {$_POST['subject_id']}");
			$delete_subject_stmt->execute();
			header("location: current_meeting_subject.php?mid={$_POST['meeting_id']}",
				true, 303);
			break;

		case "delete_subject_attachment_btn":
			$delete_att_stmt = Delete($conn, "p39_subject_attachment",
				"attachment_id = {$_POST['attachment_id']}");
			$delete_att_stmt->execute();
			header("location: subject_attachment.php?sid={$_POST['subject_id']}",
				true, 303);
			break;

		case "delete_subject_picture_btn":
			$delete_pic_stmt = Delete($conn, "p39_subject_picture", "picture_id = {$_POST['picture_id']}");
			$delete_pic_stmt->execute();
			header("location: subject_attachment.php?sid={$_POST['subject_id']}",
				true, 303);
			break;
	}
}
