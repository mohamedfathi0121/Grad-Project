<?php
require_once "db.php";
require_once "functions.php";

if(session_status() === PHP_SESSION_NONE)
{
	session_start();
}

foreach ($_POST as $btn => $value)
{
	switch ($btn)
	{
		case "update_meeting_btn":
			$meeting_id = $_POST["meeting_id"];
			$select_old_row_stmt = $conn->prepare("SELECT * FROM p39_meeting WHERE meeting_id = ?");
			$select_old_row_stmt->bind_param("i", $meeting_id);
			if ($select_old_row_stmt->execute())
			{
				$select_old_row_result = $select_old_row_stmt->get_result();
				$old_row = "";
				$select_old_row = $select_old_row_result->fetch_assoc();
				foreach ($select_old_row as $key => $value)
				{
					$value = empty($value) ? "Null" : $value;
					$old_row .= empty($old_row) ? $value : ", " . $value;
				}
				$old_row = "(" . $old_row . ")";

				$meeting_number = clean_data($_POST["meeting_number"]);
				$meeting_date = empty($_POST["meeting_date"]) ? clean_data($meeting_date) : null;
				$meeting_month = clean_data($_POST["meeting_month"]);
				$meeting_year = clean_data($_POST["meeting_year"]);
//			$meeting_status = $_POST["meeting_status"];
				$meeting_update_stmt = $conn->prepare("UPDATE
                                              `p39_meeting`
                                            SET
                                              `meeting_number` = ?,
                                              `meeting_date` = ?,
                                              `meeting_month` = ?,
                                              `meeting_year` = ?
                                            WHERE
                                                meeting_id = ?");
				$meeting_update_stmt->bind_param("isiii",
					$meeting_number,
					$meeting_date,
					$meeting_month,
					$meeting_year,
					$meeting_id);
				$meeting_update_stmt->execute();

				$select_old_row_stmt->execute();
				$select_new_row_result = $select_old_row_stmt->get_result();
				$new_row = NULL;
				$select_new_row = $select_new_row_result->fetch_assoc();
				foreach ($select_new_row as $key => $value)
				{
					$value = empty($value) ? "Null" : $value;
					$new_row .= empty($new_row) ? $value : ", " . $value;
				}
				$new_row = "(" . $new_row . ")";
				$transaction_type = "Edit";
				$insert_transaction = $conn->prepare("INSERT INTO `p39_meeting_transaction`
                                                            (`meeting_id`, `old_row`, `new_row`, `made_by`, `transaction_type`)
                                                        VALUES
                                                            (?, ?, ?, ?, ?)");
				$insert_transaction->bind_param("issis",
												$_POST["meeting_id"],
												$old_row,
													$new_row,
													$_SESSION["user_id"],
													$transaction_type);
				$insert_transaction->execute();
			}
			header("location: meetings.php", true, 303);
			break;
	}
}