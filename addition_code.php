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
		case "add_formation_btn":
			$formation_number = $_POST["formation_number"];
			$start_year = $_POST["start_year"];
			$is_current = $_POST["is_current"];
			$add_formation_stmt = $conn->prepare("INSERT INTO `p39_formation`(
                            									`formation_number`, 
                            									`start_year`, 
                            									`added_by`, 
                            									`is_current`
                            									) 
															VALUES (?, ?, ?, ?)");
			$add_formation_stmt->bind_param("iiii", $formation_number,
														$start_year,
														$_SESSION["user_id"],
														$is_current);
			if ($add_formation_stmt->execute())
			{
				$dates_insert = $conn->prepare("INSERT INTO p39_dates 
					                                        (month, year, formation_id) 
					                                    VALUES 
					                                        (?, ?, ?)");
				// Get Formation Year & Formation ID To insert into Dates Table
				$formation_id_stmt = $conn->prepare("SELECT MAX(formation_id) FROM p39_formation");
				$formation_id_stmt->execute();
				$formation_id_result = $formation_id_stmt->get_result();
				$formation_id_row = $formation_id_result->fetch_assoc();
				$formation_id = $formation_id_row["MAX(formation_id)"];
				for ($i = 9; $i <= 12; $i++)
				{
					$dates_insert->bind_param("iii", $i, $start_year, $formation_id);
					$dates_insert->execute();
				}
				$formation_end_year = $start_year + 1;
				for ($i = 1; $i <= 8; $i++)
				{
					$dates_insert->bind_param("iii", $i, $formation_end_year, $formation_id);
					$dates_insert->execute();
				}
				header("location: formation.php", true, 303);
			}
			break;

		case "add_formation_member_btn":
			$formation_users_stmt = $conn->prepare("SELECT 
    														user_id 
														FROM 
														    p39_formation_user 
														WHERE 
														    formation_id = (
														        SELECT 
														            formation_id 
														        FROM 
														            p39_formation 
														        WHERE
														            is_current = 1
														    ) ");
			$formation_users_stmt->execute();
			$formation_users_result = $formation_users_stmt->get_result();
			$formation_users = array();
			while ($formation_users_row = $formation_users_result->fetch_assoc())
			{
				$formation_users[] = $formation_users_row["user_id"];
			}
			$formation_users_stmt->close();
			$add_formation_user_stmt = $conn->prepare("INSERT INTO `p39_formation_user` (
                                  														`formation_id`, 
                                  														`user_id`, 
                                  														`job_title`) 
																	VALUES (?, ?, ?)");
			$delete_formation_user_stmt = $conn->prepare("DELETE FROM 
    																`p39_formation_user` 
																WHERE 
																    user_id = ? 
																  AND
																    formation_id = ?");
			$job_title = array();
			foreach ($_POST as $key => $value)
			{
				if ($value != "0" AND $value != "1" AND !empty($value))
				{
					$user_array = explode("-", $key);
					if (!empty($user_array[1]))
					{
						$job_title[$user_array[1]] = $value;
					}
				}
			}
			foreach ($_POST as $key => $value)
			{
				if (in_array($key, $formation_users))
				{
					switch ($value)
					{
						# User should be in the formation
						case "1":
							break;

						case "0":
							$delete_formation_user_stmt->bind_param("ii", $key, $_POST["formation_id"]);
							$delete_formation_user_stmt->execute();
							break;
					}
				}
				elseif ($value == 1)
				{
					$key = (int)$key;
					$add_formation_user_stmt->bind_param("iis",
												$_POST["formation_id"], $key, $job_title[$key]);
					$add_formation_user_stmt->execute();
				}
			}
			header("location: formation.php", true, 303);
			break;

		case "add_meeting_btn":
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
			break;

		case "add_member_btn":
			$name = clean_data($_POST["name"]);
			$gender = clean_data($_POST["gender"]);
			$email = is_valid_email($_POST["email"]);
			$job_title = clean_data($_POST["job_title"]);
			$job_type = clean_data($_POST["job_type"]);
			$job_rank = clean_data($_POST["job_rank"]);
			$department = clean_data($_POST["department"]);
			$is_admin = clean_data($_POST["is_admin"]);
			$is_enabled = 1;
			if ($email)
			{
				if (!$name || !$job_title || !$gender || !$job_type || !$job_rank || !$department)
				{
					echo "Missing Data, Please try again";
				}
				else
				{
					$password = clean_data($_POST["password"]);
					$hash = password_hash($password, PASSWORD_DEFAULT);
					$member_insert_stmt = $conn->prepare("INSERT INTO
                                                            p39_users 
                                                            (`name`, 
                                                             `job_title`, 
                                                             `job_type_id`, 
                                                             `job_rank_id`, 
                                                             `department_id`, 
                                                             `gender`, 
                                                             `email`, 
                                                             `password`, 
                                                             `is_admin`, 
                                                             `added_by`,
                                                             `is_enabled`)
                                                        VALUES
                                                            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
					$member_insert_stmt->bind_param("ssiiisssiii", $name,
						$job_title,
						$job_type,
						$job_rank,
						$department,
						$gender,
						$email,
						$hash,
						$is_admin,
						$_SESSION["user_id"],
						$is_enabled);
					if ($member_insert_stmt->execute())
					{
						// Adding picture attachment
						$pic_allowed_formats = array("png", "gif", "jpeg", "jpg");
						$uploaded_pictures = Upload("member_picture", "images/members/", $pic_allowed_formats);
						if (!empty($uploaded_pictures))
						{
							foreach ($uploaded_pictures as $key => $value)
							{
								$picture_stmt = $conn->prepare("UPDATE 
                                                                    p39_users 
                                                                SET 
                                                                    image = ? 
                                                                WHERE 
                                                                    email = ?");
								$picture_stmt->bind_param("ss", $value, $email);
								$picture_stmt->execute();
							}
						}
					}
				}
			}
			header("location: members.php", true, 303);
			break;

		case "add_subject_btn":
			$subject_number = clean_data($_POST["subject_number"]);
			$subject_name = clean_data($_POST["subject_name"]);
			$subject_details = clean_data($_POST["subject_details"]);
			$subject_type = clean_data($_POST["subject_type"]);
			$subject_comments = (empty($_POST["subject_comment"]) ? null : clean_data($_POST["subject_comment"]));
			$meeting_stmt = $conn->prepare("SELECT 
    													meeting_id 
													FROM 
													    p39_subject 
													WHERE 
													    meeting_id = (SELECT 
													                      meeting_id 
													                  FROM 
													                      p39_meeting 
													                  WHERE 
													                      is_current = 1)");
			$meeting_stmt->execute();
			$meeting_result = $meeting_stmt->get_result();
			$meeting_row = $meeting_result->fetch_assoc();
			$meeting_id = $meeting_row["meeting_id"];
			$insert_stmt = $conn->prepare("INSERT INTO 
    														`p39_subject`
    													(`subject_number`,
    													 `subject_name`, 
    													 `subject_details`, 
    													 `subject_type_id`, 
    													 `meeting_id`, 
    													 `comments`, 
    													 `added_by`)
                                          VALUES
                                            (?, ?, ?, ?, ?, ?, ?)");
			$insert_stmt->bind_param("issiisi",
									$subject_number,
									$subject_name,
										$subject_details,
										$subject_type,
										$meeting_id,
										$subject_comments,
										$_SESSION["user_id"]);
			if ($insert_stmt->execute())
			{
				$subject_stmt = $conn->prepare("SELECT max(subject_id) FROM p39_subject WHERE meeting_id = ?");
				$subject_stmt->bind_param("i", $meeting_id);
				$subject_stmt->execute();
				$subject_result = $subject_stmt->get_result();
				$subject_row = $subject_result->fetch_assoc();
				$subject_id = $subject_row["max(subject_id)"];

				$attachment_allowed_types = array("pdf", "png", "gif", "jpeg", "jpg");
				$uploaded_attachments = Upload("subject_attachment", "images/", $attachment_allowed_types);
				if (!empty($uploaded_attachments))
				{
					foreach ($uploaded_attachments as $key => $value)
					{
						$attachment_stmt = $conn->prepare("INSERT INTO `p39_subject_attachment`
	                                                        (`attachment_name`, `attachment_title`, `subject_id`, `added_by`)
	                                                    VALUES
	                                                        (?, ?, ?, ?)");
						$attachment_stmt->bind_param("ssii", $value, $key, $subject_id,
							$_SESSION["user_id"]);
						$attachment_stmt->execute();
					}
				}

				$pic_allowed_formats = array("png", "gif", "jpeg", "jpg");
				$uploaded_pictures = Upload("subject_picture", "images/", $pic_allowed_formats);
				if (!empty($uploaded_pictures))
				{
					foreach ($uploaded_pictures as $key => $value)
					{
						$picture_stmt = $conn->prepare("INSERT INTO `p39_subject_picture`
	                                                        (`picture_name`, `picture_title`, `subject_id`, `added_by`)
	                                                    VALUES
	                                                        (?, ?, ?, ?)");
						$picture_stmt->bind_param("ssii", $value, $key, $subject_id,
							$_SESSION["user_id"]);
						$picture_stmt->execute();
					}
				}
			}
			header("location: meetings.php", true, 303);
			break;
	}
}