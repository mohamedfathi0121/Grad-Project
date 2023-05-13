<?php
require_once "db.php";
require_once "functions.php";

if (session_status() === PHP_SESSION_NONE)
{
	session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php Head("المجالس"); ?>

<body dir="rtl">
	<?php Headers(); ?>
	<?php if (is_logged_in()) : ?>
		<?php Nav();
		SearchBar();?>
        <main id="admin" class="meetings-content">
            <div class="container">
                <div class='meetings-title'>
                    <h1>المجالس</h1>
                </div>
                <?php
                    ### If user hasn't pressed on search (Default Case)
                    if (!isset($_GET["search"])):
                        $current_meeting_stmt = $conn->prepare("SELECT 
                                                                            m.*, 
                                                                            f.formation_number 
                                                                        FROM 
                                                                            p39_meeting as m
                                                                                JOIN p39_formation as f 
                                                                                    ON m.formation_id = f.formation_id 
                                                                                           AND m.is_current = 1");
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
                                if (!in_array($current_meeting_row["formation_id"], $_SESSION["formation_ids"])
                                    and !$_SESSION["admin"])
                                { ?>
                                    <div class="current-meeting">
                                        <main id="empty" class="empty-meeting">
                                            <h4>لا يوجد مجلس حالي الان</h4>
                                        </main>
                                    </div>
                                    <!-- Break While loop if no current meeting -->
                                    <?php break;
                                }
                                if ($current_meeting_row["is_showed"] == "0" AND !$_SESSION["admin"])
                                { ?>
                                    <div class="current-meeting">
                                        <main id="empty" class="empty-meeting">
                                            <h4>لا يوجد مجلس حالي الان</h4>
                                        </main>
                                    </div>
                                    <!-- Break While loop if no current meeting -->
	                                <?php break;
                                }
                                switch ($current_meeting_row["is_showed"])
                                {
                                    ### If meeting is not showed, then only admins may see it
                                    case "0":
                                    case "1": ?>
                                        <div class="meeting-box">
                                            <div class="row">
                                                <div class="col">
                                                    <h4>
                                                        رقم المجلس:
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
                                                        حالة المجلس:
                                                        <?php
                                                        switch ($current_meeting_row["status"])
                                                        {
                                                            case "pending":
                                                                echo "غير مؤكد";
                                                                break;
                                                            case "confirmed":
                                                                echo "مؤكد";
                                                                break;
                                                            case "finished":
                                                                echo "نهائي";
                                                                break;
                                                            default:
                                                                echo $current_meeting_row["status"];
                                                                break;
                                                        }
                                                        ?>
                                                    </h4>
                                                    <h4>
                                                        تاريخ الانعقاد:
                                                        <span class="meetings-title">
                                                            <?=$current_meeting_row["meeting_date"] == NULL ? "غير محدد" : $current_meeting_row["meeting_date"]?>
                                                        </span>
                                                    </h4>
                                                </div>
                                                <?php
                                                switch ($current_meeting_row["status"])
                                                {
                                                    case "pending":
                                                        $order_stmt = $conn->prepare("SELECT
                                                                                                s.order_id
                                                                                            FROM
                                                                                                `p39_subject` AS s
                                                                                            JOIN 
                                                                                                    `p39_meeting` AS m
                                                                                            ON s.meeting_id = m.meeting_id 
                                                                                                   AND 
                                                                                               m.is_current = 1
                                                                                            WHERE
                                                                                                s.order_id IS NULL");
                                                        $order_stmt->execute();
                                                        $order_result = $order_stmt->get_result();
                                                        $empty_order_exists = $order_result->num_rows > 0;
                                                        if ($_SESSION["admin"]) { ?>
                                                            <div class="col">
                                                                <?php if (!$empty_order_exists) { ?>
                                                                    <button class="btn-basic" data-open-modal>
                                                                        تأكيد
                                                                        <i class="fa-solid fa-check"></i>
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn-basic disabled" type="button"
                                                                            disabled title=
                                                                            "يجب ترتيب الموضوعات قبل تأكيد المجلس">
                                                                        تأكيد
                                                                        <i class="fa-solid fa-check"></i>
                                                                    </button>
                                                                <?php } ?>
                                                                <dialog data-modal>
                                                                    <h4>
                                                                        هل تريد تأكيد المجلس؟
                                                                    </h4>
                                                                    <form method="post" action="meeting_status.php">
                                                                        <input type="hidden" name="meeting_id" value="<?=$current_meeting_row['meeting_id']?>">
                                                                        <button class="btn-basic" name="confirm_btn">
                                                                            تأكيد
                                                                        </button>
                                                                        <button class="btn-basic" type="submit" formmethod="dialog">
                                                                            إلغاء
                                                                        </button>
                                                                    </form>
                                                                </dialog>
	                                                            <?php if ($current_meeting_row["is_showed"] == "0") { ?>
                                                                    <button class="btn-basic" data-open-modal>
                                                                        إظهار المجلس
                                                                        <i class="fa-solid fa-check"></i>
                                                                    </button>
                                                                    <dialog data-modal>
                                                                        <h4>
                                                                            هل تريد إظهار المجلس لباقي الأعضاء؟
                                                                        </h4>
                                                                        <form method="post" action="meeting_status.php">
                                                                            <input type="hidden" name="meeting_id" value="<?=$current_meeting_row['meeting_id']?>">
                                                                            <button class="btn-basic" name="show_btn">
                                                                                تأكيد
                                                                            </button>
                                                                            <button class="btn-basic" type="submit" formmethod="dialog">
                                                                                إلغاء
                                                                            </button>
                                                                        </form>
                                                                    </dialog>
	                                                            <?php } else { ?>
                                                                    <button class="btn-basic" data-open-modal>
                                                                        إخفاء المجلس
                                                                        <i class="fa-solid fa-check"></i>
                                                                    </button>
                                                                    <dialog data-modal>
                                                                        <h4>
                                                                            هل تريد إخفاء المجلس عن باقي الأعضاء؟
                                                                        </h4>
                                                                        <form method="post" action="meeting_status.php">
                                                                            <input type="hidden" name="meeting_id" value="<?=$current_meeting_row['meeting_id']?>">
                                                                            <button class="btn-basic" name="hide_btn">
                                                                                تأكيد
                                                                            </button>
                                                                            <button class="btn-basic" type="submit" formmethod="dialog">
                                                                                إلغاء
                                                                            </button>
                                                                        </form>
                                                                    </dialog>
	                                                            <?php } ?>
                                                            </div>
                                                        <?php } ?>
                                                        <!-- Closing Tag of Row -->
                                                        </div>
                                                        <!-- Meeting buttons for admin -->
                                                        <?php if ($_SESSION["admin"]) { ?>
                                                            <div class="current-meeting-buttons">
                                                                <form method="get" action="current_meeting_subject.php" class="current-meeting-buttons">
                                                                    <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="mid">
                                                                    <button class="btn-basic">الموضوعات الخاصة بالمجلس</button>
                                                                </form>
                                                                <form method="post" action="update_meeting.php" class="current-meeting-buttons">
                                                                    <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="meeting_id">
                                                                    <button name="update_meeting_btn" class="btn-basic">تعديل</button>
                                                                </form>
                                                                <button title=" يجب ان يكون المجلس مؤكد اولا"
                                                                        class="btn-basic disabled" disabled
                                                                        type="button">تسجيل الحضور</button>
                                                                <button title=" يجب ان يكون المجلس مؤكد اولا"
                                                                        class="btn-basic disabled" disabled
                                                                        type="button">عرض الموضوعات بالقرارات</button>
                                                                <button title=" يجب ان يكون المجلس مؤكد اولا"
                                                                        class="btn-basic disabled" disabled
                                                                        type="button">رفع ملف المجلس الموثق</button>
                                                            </div>
                                                        <?php } else { ?>
                                                            <!-- Meeting buttons for user -->
                                                            <div class="current-meeting-buttons">
                                                                <button class="btn-basic disabled" disabled
                                                                        title="لا يوجد موضوعات">
                                                                    الموضوعات الخاصة بالمجلس</button>
                                                                <button class="btn-basic disabled" disabled
                                                                        title="لا يوجد جدول أعمال">
                                                                    عرض ملف جدول الاعمال</button>
                                                                <button class="btn-basic disabled" disabled
                                                                        title="لا يوجد موضوعات بالقرار">
                                                                    عرض الموضوعات بالقرار</button>
                                                                <button class="btn-basic disabled" disabled
                                                                        title="لا يوجد ملف مجلس نهائي">
                                                                    عرض ملف المجلس النهائي</button>
                                                            </div>
                                                        <?php } ?>
                                                        <!-- Closing Tag of Meeting box -->
                                                        </div>
                                                        <?php break;

                                                    case "confirmed":
                                                        if ($_SESSION["admin"]) { ?>
                                                            <div class="col">
                                                                <button data-open-modal class="btn-basic">
                                                                    إلغاء التأكيد
                                                                    <i class="fa-solid fa-check"></i>
                                                                </button>
                                                                <dialog data-modal>
                                                                    <form method="post" action="meeting_status.php">
                                                                        <h4>هل تريد الغاء تأكيد المجلس؟</h4>
                                                                        <input type="hidden" name="meeting_id" value=
                                                                        "<?=$current_meeting_row['meeting_id']?>">
                                                                        <button class="btn-basic" name="pending_btn">
                                                                            إلغاء تأكيد
                                                                        </button>

                                                                        <button type="submit" formmethod="dialog"
                                                                                class="btn-basic">لا</button>
                                                                    </form>
                                                                </dialog>
                                                                <button data-open-modal class="btn-basic">
                                                                    تحويل لمجلس سابق
                                                                    <i class="fa-solid fa-check"></i>
                                                                </button>
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
                                                                <?php if ($current_meeting_row["is_showed"] == "0") { ?>
                                                                    <button class="btn-basic" data-open-modal>
                                                                        إظهار المجلس
                                                                        <i class="fa-solid fa-check"></i>
                                                                    </button>
                                                                    <dialog data-modal>
                                                                        <h4>
                                                                            هل تريد إظهار المجلس لباقي الأعضاء؟
                                                                        </h4>
                                                                        <form method="post" action="meeting_status.php">
                                                                            <input type="hidden" name="meeting_id" value="<?=$current_meeting_row['meeting_id']?>">
                                                                            <button class="btn-basic" name="show_btn">
                                                                                تأكيد
                                                                            </button>
                                                                            <button class="btn-basic" type="submit" formmethod="dialog">
                                                                                إلغاء
                                                                            </button>
                                                                        </form>
                                                                    </dialog>
                                                                <?php } else { ?>
                                                                    <button class="btn-basic" data-open-modal>
                                                                        إخفاء المجلس
                                                                        <i class="fa-solid fa-check"></i>
                                                                    </button>
                                                                    <dialog data-modal>
                                                                        <h4>
                                                                            هل تريد إخفاء المجلس عن باقي الأعضاء؟
                                                                        </h4>
                                                                        <form method="post" action="meeting_status.php">
                                                                            <input type="hidden" name="meeting_id" value="<?=$current_meeting_row['meeting_id']?>">
                                                                            <button class="btn-basic" name="hide_btn">
                                                                                تأكيد
                                                                            </button>
                                                                            <button class="btn-basic" type="submit" formmethod="dialog">
                                                                                إلغاء
                                                                            </button>
                                                                        </form>
                                                                    </dialog>
                                                                <?php } ?>
                                                                </div>
                                                        <?php } ?>
                                                        <!-- Closing Tag of Row -->
                                                        </div>
                                                        <?php if ($_SESSION["admin"]) { ?>
                                                            <div class="current-meeting-buttons">
                                                                <form method="get" action="current_meeting_subject.php"
                                                                      class="current-meeting-buttons">
                                                                    <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="mid">
                                                                    <button class="btn-basic">
                                                                        الموضوعات الخاصة بالمجلس
                                                                    </button>
                                                                </form>
                                                                <!-- <button class="btn-basic disabled" disabled>الموضوعات الخاصة بالمجلس</button>-->
                                                                <button type="button" disabled class="btn-basic disabled" title="لا يمكن تعديل مجلس مؤكد">
                                                                    تعديل
                                                                </button>
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
                                                        <?php } else { ?>
                                                            <div class="current-meeting-buttons">
                                                                <form method="get" action="current_meeting_subject.php">
                                                                    <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="mid">
                                                                    <button class="btn-basic">الموضوعات الخاصة بالمجلس</button>
                                                                </form>
                                                                <a href="subjects_table.php" class="btn-basic">عرض ملف جدول الاعمال</a>
                                                                <a href="subjects_decisions.php" class="btn-basic">عرض الموضوعات بالقرار</a>
                                                                <button class="btn-basic disabled" title="لا يوجد ملف مجلس نهائي"
                                                                        disabled>عرض ملف المجلس النهائي</button>
                                                            </div>
                                                        <?php } ?>
                                                        <!-- Closing Tag of Meeting Box -->
                                                        </div>
                                                        <?php break;
                                                    case "finished":
	                                                    if ($_SESSION["admin"]) { ?>
                                                        <div class="col">
                                                            <button data-open-modal class="btn-basic">تحويل لمجلس سابق <i class="fa-solid fa-check"></i></button>
                                                            <dialog data-modal>
                                                                <form method="post" action="meeting_status.php">
                                                                    <div class="col">
                                                                        <h4>هل تريد تحويل المجلس لمجلس سابق؟</h4>
                                                                        <input type="hidden" name="meeting_id"
                                                                               value="<?=$current_meeting_row['meeting_id']?>">
                                                                        <button class="btn-basic" name="past_btn">
                                                                            تحويل لمجلس سابق
                                                                            <i class="fa-solid fa-check"></i>
                                                                        </button>
                                                                        <button type="submit" formmethod="dialog" class="btn-basic">لا</button>
                                                                    </div>
                                                                </form>
                                                            </dialog>

                                                            <?php if ($current_meeting_row["is_showed"] == "0") { ?>
                                                                <button class="btn-basic" data-open-modal>
                                                                    إظهار المجلس
                                                                    <i class="fa-solid fa-check"></i>
                                                                </button>
                                                                <dialog data-modal>
                                                                    <h4>
                                                                        هل تريد إظهار المجلس لباقي الأعضاء؟
                                                                    </h4>
                                                                    <form method="post" action="meeting_status.php">
                                                                        <input type="hidden" name="meeting_id" value="<?=$current_meeting_row['meeting_id']?>">
                                                                        <button class="btn-basic" name="show_btn">
                                                                            تأكيد
                                                                        </button>
                                                                        <button class="btn-basic" type="submit" formmethod="dialog">
                                                                            إلغاء
                                                                        </button>
                                                                    </form>
                                                                </dialog>
                                                            <?php } else { ?>
                                                                <button class="btn-basic" data-open-modal>
                                                                    إخفاء المجلس
                                                                    <i class="fa-solid fa-check"></i>
                                                                </button>
                                                                <dialog data-modal>
                                                                    <h4>
                                                                        هل تريد إخفاء المجلس عن باقي الأعضاء؟
                                                                    </h4>
                                                                    <form method="post" action="meeting_status.php">
                                                                        <input type="hidden" name="meeting_id" value="<?=$current_meeting_row['meeting_id']?>">
                                                                        <button class="btn-basic" name="hide_btn">
                                                                            تأكيد
                                                                        </button>
                                                                        <button class="btn-basic" type="submit" formmethod="dialog">
                                                                            إلغاء
                                                                        </button>
                                                                    </form>
                                                                </dialog>
                                                            <?php } ?>
                                                        </div>
                                                        <?php }?>
                                                        </div>
                                                        <?php if ($_SESSION["admin"]) { ?>
                                                            <div class="current-meeting-buttons">
                                                                <form method="get" action="current_meeting_subject.php"
                                                                      class="current-meeting-buttons">
                                                                    <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="mid">
                                                                    <button class="btn-basic">
                                                                        الموضوعات الخاصة بالمجلس
                                                                    </button>
                                                                </form>
                                                                <!-- <button class="btn-basic disabled" disabled>الموضوعات الخاصة بالمجلس</button>-->
                                                                <button type="button" disabled class="btn-basic disabled" title="لا يمكن تعديل مجلس نهائي">
                                                                    تعديل
                                                                </button>
                                                                <!--<button class="btn-basic disabled" disabled title="لا يمكن تعديل مجلس مؤكد">
                                                                    تعديل
                                                                </button>-->
                                                                <form method="post" action="meeting_attendance.php"
                                                                      class="current-meeting-buttons">
                                                                    <input type="hidden" name="meeting_id"
                                                                           value="<?= $current_meeting_row['meeting_id'] ?>">
                                                                    <button type="button" disabled class="btn-basic disabled" title="لا يمكن تعديل مجلس نهائي">
                                                                        تسجيل الحضور
                                                                    </button>
                                                                </form>
                                                                <a href="subjects_decisions.php" class="btn-basic">عرض الموضوعات بالقرارات</a>
                                                                <a class="btn-basic" href="meeting_attachment.php">
                                                                    عرض ملف المجلس الموثق
                                                                </a>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="current-meeting-buttons">
                                                                <form method="get" action="current_meeting_subject.php">
                                                                    <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="mid">
                                                                    <button class="btn-basic">الموضوعات الخاصة بالمجلس</button>
                                                                </form>
                                                                <a href="subjects_table.php" class="btn-basic">عرض ملف جدول الاعمال</a>
                                                                <a href="subjects_decisions.php" class="btn-basic">عرض الموضوعات بالقرار</a>
                                                                <button class="btn-basic disabled" title="لا يوجد ملف مجلس نهائي"
                                                                        disabled>عرض ملف المجلس النهائي</button>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                        <?php break;
                                                }
                                                ?>
                                    <?php break;
                                }
                            }
                        }
                        else
                        {
                            ?>
                            <main id='empty' class='empty-meeting'>
                                <h4>لا يوجد مجلس حالي الان</h4>
                            </main>
                            <?php
                        }
                        $past_meetings_stmt = $conn->prepare("SELECT 
                                                                        m.*, 
                                                                        f.formation_number 
                                                                    FROM 
                                                                        p39_meeting as m 
                                                                            JOIN 
                                                                        p39_formation as f
                                                                            ON m.formation_id = f.formation_id 
                                                                                   AND m.is_current = 0");
                        $past_meetings_stmt->execute();
                        $past_meetings_result = $past_meetings_stmt->get_result();
                        $past_meetings_count = 0;

                        # Check if there are past meetings
                        if ($past_meetings_result->num_rows > 0)
                        { ?>
                            <div class="old-meetings"> <?php
                            while ($past_meetings_row = $past_meetings_result->fetch_assoc())
                            {
                                /* Check if the user exists in the formation of this meeting and is allowed to view it,
                                 * and if not skip that meeting
                                 * */
                                if (!in_array($past_meetings_row["formation_id"], $_SESSION["formation_ids"])
                                    AND !$_SESSION["admin"])
                                {
                                    continue;
                                }
                                if ($past_meetings_count == 0) { ?>
                                <h3>المجالس السابقة</h3>
                                <?php }
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
                        } ?>
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
	                    switch ($_GET["f"])
	                    {
		                    case "fn":
			                    $search_stmt = "SELECT 
                                                m.*,  
                                                f.formation_number 
                                            FROM 
                                                p39_meeting as m
                                                    JOIN 
                                                    p39_formation as f
                                                        ON m.formation_id = f.formation_id 
                                                               AND f.formation_number LIKE ?";
			                    break;
		                    case "mn":
			                    $search_stmt = "SELECT 
                                                m.*,  
                                                f.formation_number 
                                            FROM 
                                                p39_meeting as m
                                                    JOIN p39_formation as f
                                                        ON m.formation_id = f.formation_id 
                                                               AND m.meeting_number LIKE ?";
			                    break;
		                    case "my":
			                    $search_stmt = "SELECT 
                                                m.*,  
                                                f.formation_number 
                                            FROM 
                                                p39_meeting as m
                                                    JOIN p39_formation as f
                                                        ON m.formation_id = f.formation_id 
                                                               AND m.meeting_year LIKE ?";
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
			                    if (!in_array($search_row["formation_id"], $_SESSION["formation_ids"])
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
			                    if ($search_row["is_showed"] == "0" AND !$_SESSION["admin"])
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
                                                    <?php
                                                    switch ($search_row["status"])
                                                    {
                                                        case "pending":
                                                            echo "غير مؤكد";
                                                            break;
                                                        case "confirmed":
                                                            echo "مؤكد";
                                                            break;
                                                        case "finished":
                                                            echo "نهائي";
                                                            break;
                                                        default:
                                                            echo $search_row["status"];
                                                            break;
                                                    } ?>
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
                                                <a href="subjects_decisions.php" class="btn-basic">عرض الموضوعات بالقرار</a>
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
                    else :
                        ?>
                        <div class='current-meeting'>
                            <main id='empty' class='empty-meeting'>
                                <h4>عذرًا، لا يوجد مجالس بهذا الرقم</h4>
                            </main>
                        </div>
                    <?php endif; ?>
            </div>
        </main>
	<?php endif;
    Footer();
    ?>

    <!-- Js Scripts and Plugins -->
    <script type="module" src="./js/main.js"></script>

    <!-- font Awesome -->
    <script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>
</html>