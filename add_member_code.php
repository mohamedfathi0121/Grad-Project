<?php
require_once "db.php";
require_once "functions.php";

if (session_status() === PHP_SESSION_NONE)
{
    session_start();
}

if (isset($_POST["add_member_btn"]))
{
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
                                                            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
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
    header("location: members.php");
}
