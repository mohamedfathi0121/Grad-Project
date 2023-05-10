<?php
require_once "db.php";
require_once "functions.php";

if(session_status() === PHP_SESSION_NONE)
{
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
Head("المجالس");
?>

<body dir="rtl">
<?php
    Headers();
    if (is_logged_in()):
        Nav();
        SearchBar();?>
        <!-- *Main Meetings Page Content  -->
        <main id="admin" class="meetings-content">
            <div class="container">
                <div class='meetings-title'>
                    <h1>المجالس</h1>
                </div>
                <?php
                # Retrieve Formation IDs of the user currently signed in
                $user_formation_ids_stmt = $conn->prepare("SELECT
                                                                    formation_id
                                                                FROM
                                                                    p39_formation_user
                                                                WHERE
                                                                    user_id = ?");
                $user_formation_ids_stmt->bind_param("i", $_SESSION["user_id"]);
                $user_formation_ids_stmt->execute();
                $user_formation_ids_result = $user_formation_ids_stmt->get_result();
                $user_formation_ids = array();
                while ($user_formation_ids_row = $user_formation_ids_result->fetch_assoc())
                {
	                $user_formation_ids[] = $user_formation_ids_row["formation_id"];
                }
                $user_formation_ids_stmt->close();

                if (!isset($_GET["search"])):
                    // $meetings_stmt = $conn->prepare("SELECT * FROM p39_meeting WHERE formation_id = ? ORDER BY is_current desc");
                    $current_meeting_stmt = $conn->prepare("SELECT 
                                                                        *, 
                                                                        formation_number 
                                                                    FROM 
                                                                        p39_meeting 
                                                                            JOIN p39_formation 
                                                                                ON p39_meeting.formation_id = p39_formation.formation_id 
                                                                                       AND p39_meeting.is_current = 1");
                    $current_meeting_stmt->execute();
                    $current_meeting_result = $current_meeting_stmt->get_result();
                    ?>
                    <div class="current-meeting">
                        <h3>المجلس الحالي</h3>
                    </div>
                    <?php
                    # Check if there are current meetings
                    $current_meeting_exists = $current_meeting_result->num_rows > 0;
                    if ($current_meeting_exists)
                    {
                        while ($current_meeting_row = $current_meeting_result->fetch_assoc())
                        {
                            # If user doesn't exist in this formation & not an admin, he shouldn't see the meeting
	                        if (!in_array($current_meeting_row["formation_id"], $user_formation_ids) AND !$_SESSION["admin"])
	                        {
                                ?>
		                        <div class="current-meeting">
                                    <main id="empty" class="empty-meeting">
                                        <h4>لا يوجد مجلس حالي الان</h4>
                                    </main>
                                </div>
                            <?php break;
                            }
                            switch ($current_meeting_row["status"])
                            {
                                # CASE (Meeting is Current & Pending)
                                case "pending":
                                    # CASE ADMIN (Meeting is Current & Pending)
                                    if ($_SESSION["admin"])
                                    {
                                        # Show the meeting to admin
                                        ?>
                                        <div class="meeting-box">
                                            <div class="row">
                                                <div class="col">
                                                    <h4>رقم المجلس:
                                                        <span class="meeting-number">
                                                            <?=$current_meeting_row["meeting_number"]?>
                                                        </span>
                                                    </h4>
                                                    <h4>
                                                        رقم تشكيل المجلس:
                                                        <span class="meeting-formation-number">
                                                          <?=$current_meeting_row["formation_number"]?>
                                                        </span>
                                                    </h4>
                                                    <h4>
                                                        بتاريخ:
                                                        <span class="meeting-month">
                                                            <?=$current_meeting_row["meeting_month"]?>
                                                        </span>
                                                        /
                                                        <span class="meeting-year">
                                                            <?=$current_meeting_row["meeting_year"]?>
                                                        </span>
                                                    </h4>
                                                    <h4>
                                                        حالة المجلس: غير مؤكد
                                                    </h4>
                                                </div>
                                                <div class="col">
                                                    <button class="btn-basic" data-open-modal>
                                                        تأكيد
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>

                                                    <dialog data-modal>
                                                        <h4>
                                                            انت علي وشك تاكيد المجلس
                                                        </h4>
                                                        <form method="post" action="meeting_status.php">
                                                            <input type="hidden" name="meeting_id" value="<?=$current_meeting_row['meeting_id']?>">
                                                            <button class="btn-basic" name="confirm_btn">
                                                                تأكيد

                                                            </button>
                                                            <button class="btn-basic" type="submit" formmethod="dialog">
                                                                الغاء

                                                            </button>

                                                        </form>
                                                    </dialog>
                                                </div>
                                            </div>
                                            <div class="current-meeting-buttons">
                                                <form method="post" action="current_meeting_subject.php" class="current-meeting-buttons">
                                                    <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="meeting_id">
                                                    <button class="btn-basic" name="current_meeting_subjects">الموضوعات الخاصة بالمجلس</button>
                                                </form>
                                                <form method="post" action="update_meeting.php" class="current-meeting-buttons">
                                                    <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="meeting_id">
                                                    <button name="update_meeting_btn" class="btn-basic">تعديل</button>
                                                </form>
                                                <button title=" يجب ان يكون المجلس مؤكد اولا" class="btn-basic disabled" disabled>تسجيل الحضور</button>
                                                <button title=" يجب ان يكون المجلس مؤكد اولا" class="btn-basic disabled" disabled>عرض الموضوعات بالقرارات</button>
                                                <button title=" يجب ان يكون المجلس مؤكد اولا" class="btn-basic disabled" disabled>
                                                    رفع ملف المجلس الموثق
                                                </button>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    # CASE USER (Meeting is Current & Pending)
                                    else
                                    {
                                        # Hide Meeting from the user
                                        ?>
                                        <div class="current-meeting">
                                            <main id="empty" class="empty-meeting">
                                                <h4>لا يوجد مجلس حالي الان</h4>
                                            </main>
                                        </div>
                                        <?php
                                    }
                                    break;

                                # CASE (Meeting is Current & Confirmed)
                                case "confirmed":
                                    # Show Meeting to everyone
                                    ?>
                                    <div class="current-meeting">
                                        <div class="meeting-box">
                                            <div class="row">
                                                <div class="col">
                                                    <h4>رقم المجلس:
                                                        <span class="meeting-number">
                                                            <?=$current_meeting_row["meeting_number"]?>
                                                        </span>
                                                    </h4>
                                                    <h4>
                                                        رقم تشكيل المجلس:
                                                        <span class="meeting-formation-number">
                                                            <?=$current_meeting_row["formation_number"]?>
                                                        </span>
                                                    </h4>
                                                    <h4>
                                                        بتاريخ:
                                                        <span class="meeting-month">
                                                            <?=$current_meeting_row["meeting_month"]?>
                                                        </span>
                                                        /
                                                        <span class="meeting-year">
                                                            <?=$current_meeting_row["meeting_year"]?>
                                                        </span>
                                                    </h4>
                                                    <h4>
                                                        حالة المجلس: مؤكد
                                                    </h4>
                                                </div>
                                                <?php
                                                if($_SESSION["admin"]):
                                                    ?>
<!--                                                    <form method="post" action="meeting_status.php">-->
                                                    <div class="col">
                                                        <button data-open-modal class="btn-basic">إلغاء التأكيد <i class="fa-solid fa-check"></i></button>

                                                        <dialog data-modal>
                                                            <form method="post" action="meeting_status.php">
                                                                <h4>هل تريد الغاء تأكيد المجلس؟</h4>
                                                                <input type="hidden" name="meeting_id" value="<?=$current_meeting_row['meeting_id']?>">
                                                                <button class="btn-basic" name="pending_btn">
                                                                    إلغاء تأكيد

                                                                </button>

                                                                <button type="submit" formmethod="dialog" class="btn-basic">لا</button>
                                                            </form>
                                                        </dialog>
                                                        <button data-open-modal class="btn-basic">تحويل لمجلس سابق <i class="fa-solid fa-check"></i></button>
                                                        <dialog data-modal>
                                                            <form method="post" action="meeting_status.php">
                                                                <h4>هل تريد تحويل المجلس لمجلس سابق؟</h4>
                                                                <input type="hidden" name="meeting_id" value="<?=$current_meeting_row['meeting_id']?>">
                                                                <button class="btn-basic" name="past_btn">
                                                                    تحويل لمجلس سابق
                                                                    <i class="fa-solid fa-check"></i>
                                                                </button>
                                                                <button type="submit" formmethod="dialog" class="btn-basic">لا</button>
                                                            </form>
                                                        </dialog>

                                                    </div>
                                                <?php
                                                endif;
                                                ?>
                                            </div>
                                            <?php
                                            if($_SESSION["admin"]):
                                                # Current Meeting Buttons for ADMIN
                                                ?>
                                                <div class="current-meeting-buttons">
                                                    <form method="post" action="current_meeting_subject.php"
                                                          class="current-meeting-buttons">
                                                        <input type="hidden" name="meeting_id"
                                                               value="<?=$current_meeting_row['meeting_id']?>">
                                                        <button class="btn-basic" name="current_meeting_subjects">
                                                            الموضوعات الخاصة بالمجلس
                                                        </button>
                                                    </form>
<!--                                                    <button class="btn-basic disabled" disabled>الموضوعات الخاصة بالمجلس</button>-->
                                                    <form method="post" action="update_meeting.php"
                                                          class="current-meeting-buttons">
                                                        <input type="hidden" name="meeting_id"
                                                               value="<?=$current_meeting_row['meeting_id']?>">
                                                        <button name="update_meeting_btn" class="btn-basic">
                                                            تعديل
                                                        </button>
                                                    </form>
                                                    <!--<button class="btn-basic disabled" disabled title="لا يمكن تعديل مجلس مؤكد">
                                                        تعديل
                                                    </button>-->
                                                    <form method="post" action="meeting_attendance.php"
                                                          class="current-meeting-buttons">
                                                        <input type="hidden" name="meeting_id"
                                                               value="<?= $current_meeting_row['meeting_id'] ?>">
                                                        <button class="btn-basic" name="attendance_btn">
                                                            تسجيل الحضور
                                                        </button>
                                                    </form>
                                                    <a href="subjects_decisions.php" class="btn-basic">عرض الموضوعات بالقرارات</a>
                                                    <a class="btn-basic" href="meeting_attachment.php">
                                                        رفع ملف المجلس الموثق
                                                    </a>
                                                </div>
                                            <?php
                                            else:
                                                # Current Meeting Buttons for USER
                                                ?>
                                                <div class="current-meeting-buttons">
                                                    <form method="post" action="current_meeting_subject.php">
                                                        <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="meeting_id">
                                                        <button class="btn-basic" name="current_meeting_subjects">الموضوعات الخاصة بالمجلس</button>
                                                    </form>
                                                    <a href="subjects_table.php" class="btn-basic">عرض ملف جدول الاعمال</a>
                                                    <a href="subjects_decisions.php" class="btn-basic">عرض الموضوعات بالقرار</a>
                                                    <button class="btn-basic disabled" title="لا يوجد ملف مجلس نهائي"
                                                            disabled>عرض ملف المجلس النهائي</button>
                                                </div>
                                            <?php
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                    break;

	                            # CASE (Meeting is Current & Finished)
	                            case "finished":
		                            # Show Meeting to everyone
		                            ?>
                                    <div class="current-meeting">
                                        <div class="meeting-box">
                                            <div class="row">
                                                <div class="col">
                                                    <h4>رقم المجلس:
                                                        <span class="meeting-number">
                                                            <?=$current_meeting_row["meeting_number"]?>
                                                        </span>
                                                    </h4>
                                                    <h4>
                                                        رقم تشكيل المجلس:
                                                        <span class="meeting-formation-number">
                                                            <?=$current_meeting_row["formation_number"]?>
                                                        </span>
                                                    </h4>
                                                    <h4>
                                                        بتاريخ:
                                                        <span class="meeting-month">
                                                            <?=$current_meeting_row["meeting_month"]?>
                                                        </span>
                                                        /
                                                        <span class="meeting-year">
                                                            <?=$current_meeting_row["meeting_year"]?>
                                                        </span>
                                                    </h4>
                                                    <h4>
                                                        حالة المجلس: منتهي
                                                    </h4>
                                                </div>
					                            <?php
					                            if($_SESSION["admin"]):
						                            ?>
                                                    <form method="post" action="meeting_status.php">
                                                        <div class="col">
                                                            <input type="hidden" name="meeting_id"
                                                                   value="<?=$current_meeting_row['meeting_id']?>">
                                                            <button class="btn-basic" name="past_btn">
                                                                تحويل لمجلس سابق
                                                                <i class="fa-solid fa-check"></i>
                                                            </button>
                                                        </div>
                                                    </form>
					                            <?php
					                            endif;
					                            ?>
                                            </div>
				                            <?php
				                            if($_SESSION["admin"]):
					                            # Current Meeting Buttons for ADMIN
					                            ?>
                                                <div class="current-meeting-buttons">
                                                    <form method="post" action="current_meeting_subject.php">
                                                        <input type="hidden" name="meeting_id"
                                                               value="<?=$current_meeting_row['meeting_id']?>">
                                                        <button class="btn-basic" name="current_meeting_subjects">
                                                            الموضوعات الخاصة بالمجلس
                                                        </button>
                                                    </form>
                                                    <form method="post" action="meeting_attendance.php"
                                                          class="current-meeting-buttons">
                                                        <input type="hidden" name="meeting_id"
                                                               value="<?= $current_meeting_row['meeting_id'] ?>">
                                                        <button class="btn-basic" name="attendance_btn">
                                                            تسجيل الحضور
                                                        </button>
                                                    </form>
                                                    <a href="subjects_decisions.php" class="btn-basic">عرض الموضوعات بالقرارات</a>
                                                    <form method="post" action="update_meeting.php"
                                                          class="current-meeting-buttons">
                                                        <input type="hidden" name="meeting_id"
                                                               value="<?=$current_meeting_row['meeting_id']?>">
                                                        <button name="update_meeting_btn" class="btn-basic">
                                                            تعديل
                                                        </button>
                                                    </form>
                                                    <a class="btn-basic" href="meeting_attachment.php">
                                                        رفع ملف المجلس الموثق
                                                    </a>
                                                </div>
				                            <?php
				                            else:
					                            # Current Meeting Buttons for USER
					                            ?>
                                                <div class="current-meeting-buttons">
                                                    <form method="post" action="current_meeting_subject.php">
                                                        <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="meeting_id">
                                                        <button class="btn-basic" name="current_meeting_subjects">الموضوعات الخاصة بالمجلس</button>
                                                    </form>
                                                    <a href="subjects_table.php" class="btn-basic">
                                                        عرض ملف جدول الاعمال</a>
                                                    <a href="subjects_decisions.php" class="btn-basic">
                                                        عرض الموضوعات بالقرار</a>
                                                    <a class="btn-basic" href="meeting_attachment.php">
                                                        عرض ملف المجلس النهائي</a>
                                                </div>
				                            <?php
				                            endif;
				                            ?>
                                        </div>
                                    </div>
		                            <?php
		                            break;
                            }
                        }
                        ?>
                        <?php
                    }
                    else
                    {
                        ?>
                        <main id='empty' class='empty-meeting'>
                            <h4>لا يوجد مجلس حالي الان</h4>
                        </main>
                        <?php
                    }

//                    $past_meetings_stmt = $conn->prepare("SELECT
//                                                                    *
//                                                                FROM
//                                                                    p39_meeting
//                                                                WHERE
//                                                                    is_current = 0
//                                                                  AND
//                                                                    formation_id IN (SELECT
//                                                                                        formation_id
//                                                                                    FROM
//                                                                                        p39_formation_user
//                                                                                    WHERE
//                                                                                        user_id = ?)");
//                    $past_meetings_stmt->bind_param("i", $_SESSION["user_id"]);
                    $past_meetings_stmt = $conn->prepare("SELECT 
                                                                    *, 
                                                                    formation_number 
                                                                FROM 
                                                                    p39_meeting 
                                                                        JOIN p39_formation 
                                                                            ON p39_meeting.formation_id = p39_formation.formation_id 
                                                                                   AND p39_meeting.is_current = 0");
                    $past_meetings_stmt->execute();
                    $past_meetings_result = $past_meetings_stmt->get_result();
                    $past_meetings_count = 0;
                    ?>
<!--#################################################################################################################-->
                        <?php
                        # Check if there are past meetings
                        if ($past_meetings_result->num_rows > 0)
                        {
                            ?> <div class="old-meetings"> <?php
                            while ($past_meetings_row = $past_meetings_result->fetch_assoc())
                            {
                                /* Check if the user exists in the formation of this meeting and is allowed to view it,
                                 * and if not skip that meeting
                                 * */
                                if (!in_array($past_meetings_row["formation_id"], $user_formation_ids)
                                    AND !$_SESSION["admin"])
                                {
                                    continue;
                                }
	                            if ($past_meetings_count == 0) { ?>
                                    <h3>المجالس السابقة</h3>
                                <?php }
                                # CASE (Meeting is NOT Current)
                                ?>
                                <div class="old-meeting-box">
                                    <div class="row">
                                        <div class="col">
                                            <h4>
                                                رقم المجلس:
                                                <span class="meeting-number">
                                                    <?=$past_meetings_row["meeting_number"]?>
                                                </span>
                                            </h4>
                                            <h4>
                                                رقم تشكيل المجلس:
                                                <span class="meeting-formation-number">
                                                    <?=$past_meetings_row["formation_number"]?>
                                                </span>
                                            </h4>
                                            <h4>
                                                بتاريخ:
                                                <span class="meeting-month">
                                                    <?=$past_meetings_row["meeting_month"]?>
                                                </span>
                                                /
                                                <span class="meeting-year">
                                                    <?=$past_meetings_row["meeting_year"]?>
                                                </span>
                                            </h4>
                                        </div>
                                        <?php
                                        if($_SESSION["admin"]):
                                            ?>
                                            <div class="col">
                                                <a href="subjects_decisions.php" class="btn-basic">عرض الموضوعات بالقرارات</a>
                                                <a class="btn-basic" href="meeting_attachment.php">
                                                    رفع ملف المجلس الموثق
                                                </a>
                                            </div>
                                        <?php
                                        else:
                                            ?>
                                            <div class="col">
                                                <a href="meeting_attachment.php" class="btn-basic">
                                                    عرض ملف المجلس النهائي</a>
                                                <a href="subjects_decisions.php" class="btn-basic">عرض الموضوعات بالقرار</a>
                                            </div>
                                        <?php
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <?php
                                $past_meetings_count++;
                            }
                            ?> </div> <?php
                        }
//                        else
//                        {
//	                        ?>
<!--                            <div class='old-meeting-box'>-->
<!--                                <main id='empty' class='empty-meeting'>-->
<!--                                    <h4>لا يوجد مجالس سابقة</h4>-->
<!--                                </main>-->
<!--                            </div>-->
<!--	                        --><?php
//                        }
                        ?>
                    </div>
                    <?php
                    if (@$_SESSION["admin"]):
                        # Add New Members
                        if ($current_meeting_exists) { ?>
                            <div class="add-meeting">
                                <button disabled title=" يجب تحويل المجلس الحالي لمجلس سابق أولًا "
                                        class="btn-basic disabled">
                                    إضافة مجلس جديد
                                </button>
                            </div>
                        <?php } else { ?>
                            <div class="add-meeting">
                                <a href="add_meeting.php" class="btn-basic">اضافة مجلس جديد</a>
                            </div>
                        <?php } ?>
                    <?php endif;
                elseif (!empty($_GET["search"])):
//                    $search = "%" . $_GET["search"] . "%";
            //      $search_query = "SELECT * FROM p39_meeting WHERE formation_id LIKE %";
            //      $search_query .= $_POST["search"] . "%";
                    switch ($_GET["f"])
                    {
                        case "fn":
	                        $search_stmt = "SELECT 
                                                p39_meeting.*,  
                                                formation_number 
                                            FROM 
                                                p39_meeting 
                                                    JOIN p39_formation 
                                                        ON p39_meeting.formation_id = p39_formation.formation_id 
                                                               AND p39_formation.formation_number LIKE ?";
                            break;
                        case "mn":
                            $search_stmt = "SELECT 
                                                p39_meeting.*,  
                                                formation_number 
                                            FROM 
                                                p39_meeting 
                                                    JOIN p39_formation 
                                                        ON p39_meeting.formation_id = p39_formation.formation_id 
                                                               AND p39_meeting.meeting_number LIKE ?";
                            break;
                        case "my":
                            $search_stmt = "SELECT 
                                                p39_meeting.*,  
                                                formation_number 
                                            FROM 
                                                p39_meeting 
                                                    JOIN p39_formation 
                                                        ON p39_meeting.formation_id = p39_formation.formation_id 
                                                               AND p39_meeting.meeting_year LIKE ?";
                            break;
                    }
                    $restricted_search_count = 0;
                    $search_result = Search($conn, NULL, @$search_stmt);
                    @$search_result_count = $search_result->num_rows;
                    if (@$search_result_count > 0)
                    {
                        while ($search_row = $search_result->fetch_assoc())
                        {
	                        /* Check if the user exists in the formation of this meeting and is allowed to view it,
								* and if not skip that meeting
								* */
	                        if (!in_array($search_row["formation_id"], $user_formation_ids) AND !$_SESSION["admin"])
	                        {
                                $restricted_search_count += 1;
                                if ($restricted_search_count == $search_result_count)
                                {
	                                ?>
                                    <div class='current-meeting'>
                                        <main id='empty' class='empty-meeting'>
                                            <h4>عذرًا، لا يوجد مجالس تطابق رقم التشكيل</h4>
                                        </main>
                                    </div>
	                                <?php
                                }
                                continue;
	                        }
                            if ($search_row["status"] == "pending" AND $search_row["is_current"] == "1"
                                AND !$_SESSION["admin"])
                            {
	                            $restricted_search_count += 1;
	                            if ($restricted_search_count == $search_result_count)
	                            {
		                            ?>
                                    <div class='current-meeting'>
                                        <main id='empty' class='empty-meeting'>
                                            <h4>عذرًا، لا يوجد مجالس تطابق رقم التشكيل</h4>
                                        </main>
                                    </div>
		                            <?php
	                            }
	                            continue;
                            }
                            ?>
                            <div class="old-meeting-box">
                                <div class="row">
                                    <div class="col">
                                        <h4>
                                            رقم المجلس:
                                            <span class="meeting-number">
                                                <?=$search_row["meeting_number"]?>
                                            </span>
                                        </h4>
                                        <h4>
                                            رقم تشكيل المجلس:
                                            <span class="meeting-formation-number">
                                                <?=$search_row["formation_number"]?>
                                            </span>
                                        </h4>
                                        <h4>
                                            بتاريخ:
                                            <span class="meeting-month">
                                                <?=$search_row["meeting_month"]?>
                                            </span>
                                            /
                                            <span class="meeting-year">
                                                <?=$search_row["meeting_year"]?>
                                            </span>
                                        </h4>
                                        <h4>
                                            حالة المجلس:
                                            <span>
                                                <?=$search_row["status"] == "confirmed"
                                                    ? "مؤكد"
                                                    : "منتهي"?>
                                            </span>
                                        </h4>
                                    </div>
                                    <?php
                                    if($_SESSION["admin"]):
                                        ?>
                                        <div class="col">
                                            <a href="subjects_decisions.php" class="btn-basic">عرض الموضوعات بالقرارات</a>
                                            <a class="btn-basic" href="meeting_attachment.php">
                                                رفع ملف المجلس الموثق
                                            </a>
                                        </div>
                                    <?php
                                    else:
                                        ?>
                                        <div class="col">
                                            <a href="meeting_attachment.php" class="btn-basic">
                                                عرض ملف المجلس النهائي
                                            </a>
                                            <a href="#" class="btn-basic">عرض الموضوعات بالقرار</a>
                                        </div>
                                    <?php
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <div class='current-meeting'>
                            <main id='empty' class='empty-meeting'>
                                <h4>عذرًا، لا يوجد مجالس تطابق رقم التشكيل</h4>
                            </main>
                        </div>
                        <?php
                    }
                else:
	                ?>
                    <div class='current-meeting'>
                        <main id='empty' class='empty-meeting'>
                            <h4>عذرًا، لا يوجد مجالس بهذا الرقم</h4>
                        </main>
                    </div>
                <?php endif; ?>
                </main>
                <?php
    endif;
    Footer();
    ?>

    <!-- Js Scripts and Plugins -->
    <script type="module" src="./js/main.js"></script>

    <!-- font Awesome -->
    <script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>
