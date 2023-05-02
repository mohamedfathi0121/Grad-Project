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
Nav();
?>
<!-- *Main Meetings Page Content  -->

<!-- !Admin Apperance -->
<!-- *Add "deactive" to Class Here ↓↓ To Test-->
<main id="admin" class="meetings-content">
    <div class="container">
        <div class='meetings-title'>
            <h1>المجالس</h1>
        </div>
        <?php
        $user_formation_ids_stmt = $conn->prepare("SELECT formation_id FROM p39_formation_user WHERE user_id = ?");
        $user_formation_ids_stmt->bind_param("i", $_SESSION["user_id"]);
        $user_formation_ids_stmt->execute();
        $user_formation_ids_result = $user_formation_ids_stmt->get_result();
        $user_formation_ids = array();
        while ($user_formation_ids_row = $user_formation_ids_result->fetch_assoc())
        {
            $user_formation_ids[] = $user_formation_ids_row["formation_id"];
        }
        if (!isset($_POST["search_btn"]))
        {
            // $meetings_stmt = $conn->prepare("SELECT * FROM p39_meeting WHERE formation_id = ? ORDER BY is_current desc");
            $meetings_stmt = $conn->prepare("SELECT * FROM p39_meeting ORDER BY is_current desc");
            $meetings_stmt->execute();
            $meetings_result = $meetings_stmt->get_result();
            while ($meetings_row = $meetings_result->fetch_assoc())
            {
                if (!in_array($meetings_row["formation_id"], $user_formation_ids))
                {
                    continue;
                }
                switch ($meetings_row["is_current"])
                {
                    case 1:
                        switch ($meetings_row["status"])
                        {
                            case "pending":
                                if ($_SESSION["admin"])
                                {
                                    ?>
                                    <!-- المجلس الحالي -->
                                    <div class="current-meeting">
                                        <h3>المجلس الحالي</h3>
                                        <!-- لو في مجلس حالي -->
                                        <!-- *Add "deactive" to Class Here ↓↓ To Test-->
                                        <div class="meeting-box">
                                            <div class="row">
                                                <div class="col">
                                                    <h4>رقم المجلس:
                                                        <span class="meeting-number">
                                                          <?=$meetings_row["meeting_number"]?>
                                                        </span>
                                                    </h4>
                                                    <h4>
                                                        رقم تشكيل المجلس:
                                                        <span class="meeting-formation-number">
                                                          <?=$meetings_row["formation_id"]?>
                                                        </span>
                                                    </h4>
                                                    <h4>
                                                        بتاريخ:
                                                        <span class="meeting-month">
                                                          <?=$meetings_row["meeting_month"]?>
                                                        </span>
                                                        /
                                                        <span class="meeting-year">
                                                          <?=$meetings_row["meeting_year"]?>
                                                        </span>
                                                    </h4>
                                                    <h4>
                                                        حالة المجلس: معلق
                                                    </h4>
                                                </div>
                                                <div class="col">
                                                    <button class="btn-basic">
                                                        توثيق
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="current-meeting-buttons">
                                                <a href="#" class="btn-basic">الموضوعات الخاصة بالمجلس</a>
                                                <a href="#" class="btn-basic">تسجيل الحضور</a>
                                                <a href="#" class="btn-basic">التقارير</a>
                                                <a href="#" class="btn-basic">تعديل</a>

                                                <div class="upload">
                                                    <div class="btn-basic">
                                                        <label for="up1">
                                                            رفع ملف المجلس المؤكد
                                                            <i class="fa-solid fa-upload"></i>
                                                            <input id="up1" type="file" class="upload-button" multiple />
                                                        </label>
                                                    </div>
                                                    <div class="file-list"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="current-meeting">
                                        <h3>المجلس الحالي</h3>
                                        <!-- لو مفيش مجلس حالي -->
                                        <!-- *Add "deactive" to Class Here ↓↓ To Test-->
                                        <main id="empty" class="empty-meeting">
                                            <h4>لا يوجد مجلس حالي الان</h4>
                                        </main>
                                    </div>
                                    <?php
                                }
                                break;
                            case "confirmed":
                                ?>
                                <!-- المجلس الحالي -->
                                <div class="current-meeting">
                                    <h3>المجلس الحالي</h3>
                                    <!-- لو في مجلس حالي -->
                                    <!-- *Add "deactive" to Class Here ↓↓ To Test-->
                                    <div class="meeting-box">
                                        <div class="row">
                                            <div class="col">
                                                <h4>رقم المجلس:
                                                    <span class="meeting-number">
                                                      <?=$meetings_row["meeting_number"]?>
                                                    </span>
                                                </h4>
                                                <h4>
                                                    رقم تشكيل المجلس:
                                                    <span class="meeting-formation-number">
                                                      <?=$meetings_row["formation_id"]?>
                                                    </span>
                                                </h4>
                                                <h4>
                                                    بتاريخ:
                                                    <span class="meeting-month">
                                                      <?=$meetings_row["meeting_month"]?>
                                                    </span>
                                                    /
                                                    <span class="meeting-year">
                                                      <?=$meetings_row["meeting_year"]?>
                                                    </span>
                                                </h4>
                                                <h4>
                                                    حالة المجلس: مؤكد
                                                </h4>
                                            </div>
                                            <?php
                                            if($_SESSION["admin"]):
                                                ?>
                                                <div class="col">
                                                    <button class="btn-basic disabled" disabled>
                                                        تأكيد
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                </div>
                                            <?php
                                            endif;
                                            ?>
                                        </div>
                                        <?php
                                        if($_SESSION["admin"]):
                                            ?>
                                            <div class="current-meeting-buttons">
                                                <a href="#" class="btn-basic">الموضوعات الخاصة بالمجلس</a>
                                                <a href="#" class="btn-basic">تسجيل الحضور</a>
                                                <a href="#" class="btn-basic">التقارير</a>
                                                <a href="#" class="btn-basic">تعديل</a>

                                                <div class="upload">
                                                    <div class="btn-basic">
                                                        <label for="up1">
                                                            رفع ملف المجلس المؤكد
                                                            <i class="fa-solid fa-upload"></i>
                                                            <input id="up1" type="file" class="upload-button" multiple />
                                                        </label>
                                                    </div>
                                                    <div class="file-list"></div>
                                                </div>
                                            </div>
                                        <?php
                                        else:
                                            ?>
                                            <div class="current-meeting-buttons">
                                                <a href="#" class="btn-basic">عرض الموضوعات والتصويت</a>
                                                <a href="#" class="btn-basic">عرض الموضوعات بالقرار</a>
                                                <a href="#" class="btn-basic">عرض ملف جدول الاعمال</a>
                                                <a href="#" class="btn-basic">عرض ملف المجلس النهائي</a>
                                            </div>
                                        <?php
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <?php
                                break;
                        }
                        ?>
                        <div class="old-meetings">
                            <h3>المجالس السابقة</h3>
                            <?php
                            break;
                    case 0:
                        ?>
                        <!-- المجالس السابقة -->
                        <!--                            <div class="old-meetings">-->
                        <!--                                <h3>المجالس السابقة</h3>-->
                        <!-- مجلس سابق -->
                        <div class="old-meeting-box">
                            <div class="row">
                                <div class="col">
                                    <h4>
                                        رقم المجلس:
                                        <span class="meeting-number">
                                          <?=$meetings_row["meeting_number"]?>
                                        </span>
                                    </h4>
                                    <h4>
                                        رقم تشكيل المجلس:
                                        <span class="meeting-formation-number">
                                          <?=$meetings_row["formation_id"]?>
                                        </span>
                                    </h4>
                                    <h4>
                                        بتاريخ:
                                        <span class="meeting-month">
                                          <?=$meetings_row["meeting_month"]?>
                                        </span>
                                        /
                                        <span class="meeting-year">
                                          <?=$meetings_row["meeting_year"]?>
                                        </span>
                                    </h4>
                                </div>
                                <?php
                                if($_SESSION["admin"]):
                                    ?>
                                    <div class="col">
                                        <a href="#" class="btn-basic">التقارير</a>
                                        <div class="upload">
                                            <div class="btn-basic">
                                                <label for="up2">
                                                    رفع ملف المجلس المؤكد
                                                    <i class="fa-solid fa-upload"></i>
                                                    <input id="up2" type="file" class="upload-button" multiple />
                                                </label>
                                            </div>
                                            <div class="file-list"></div>
                                        </div>
                                    </div>
                                <?php
                                else:
                                    ?>
                                    <div class="col">
                                        <a href="#" class="btn-basic">عرض ملف المجلس النهائي</a>
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
        ?>
                    </div>
    </div>
    <!-- اضافة مجلس جديد -->
    <?php
    if (@$_SESSION["admin"]):
        ?>
        <div class="add-meeting">
            <a href="#" class="btn-basic">اضافة مجلس جديد</a>
        </div>
        <?php
    endif;
        }
        else
        {
//            $myquery="select * from `laptop_specs` where `Name` like '%$st%'";
            $search = $_POST["search"];
//            $search_query = "SELECT * FROM p39_meeting WHERE formation_id LIKE %";
//            $search_query .= $_POST["search"] . "%";
            $search_stmt = $conn->prepare("SELECT * FROM p39_meeting WHERE formation_id LIKE '%$search%' and status not in ('pending')");
            $search_stmt->execute();
            $search_result = $search_stmt->get_result();
            while ($search_row = $search_result->fetch_assoc())
            {
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
                                          <?=$search_row["formation_id"]?>
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
                                        <a href="#" class="btn-basic">التقارير</a>
                                        <div class="upload">
                                            <div class="btn-basic">
                                                <label for="up2">
                                                    رفع ملف المجلس المؤكد
                                                    <i class="fa-solid fa-upload"></i>
                                                    <input id="up2" type="file" class="upload-button" multiple />
                                                </label>
                                            </div>
                                            <div class="file-list"></div>
                                        </div>
                                    </div>
                                <?php
                                else:
                                    ?>
                                    <div class="col">
                                        <a href="#" class="btn-basic">عرض ملف المجلس النهائي</a>
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
    ?>
</main>

<!-- No Longer Needed -->
<!-- ########################################################################################################### -->
<!-- !Member Apperance -->
<!-- *Add "deactive" to Class Here ↓↓ To Test-->
<!--		<main id="memeber" class="meetings-content deactive">-->
<!--			<div class="container">-->
<!--				<div class="meetings-title"><h1>المجالس</h1></div>-->
<!-- المجلس الحالي -->
<!--				<div class="current-meeting">-->
<!--					<h3>المجلس الحالي</h3>-->
<!--					<div class="meeting-box">-->
<!--						<div class="row">-->
<!--							<div class="col">-->
<!--								<h4>رقم المجلس:<span class="meeting-number">{3}</span></h4>-->
<!--								<h4>-->
<!--									رقم تشكيل المجلس:<span class="meeting-formation-number"-->
<!--										>{4}</span-->
<!--									>-->
<!--								</h4>-->
<!--								<h4>-->
<!--									بتاريخ:<span class="meeting-month">{5}</span> /-->
<!--									<span class="meeting-year">{2023}</span>-->
<!--								</h4>-->
<!--							</div>-->
<!--						</div>-->
<!--						<div class="current-meeting-buttons">-->
<!--							<a href="#" class="btn-basic">عرض الموضوعات والتصويت</a>-->
<!--							<a href="#" class="btn-basic">عرض الموضوعات بالقرار</a>-->
<!--							<a href="#" class="btn-basic">عرض ملف جدول الاعمال</a>-->
<!--							<a href="#" class="btn-basic">عرض ملف المجلس النهائي</a>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!-- المجالس السابقة -->
<!-- *Add "deactive" to Class Here ↓↓ To Test-->
<!--				<div class="old-meetings">-->
<!--					<h3>المجالس السابقة</h3>-->
<!-- مجلس سابق رقم 1 -->
<!--					<div class="old-meeting-box">-->
<!--						<div class="row">-->
<!--							<div class="col">-->
<!--								<h4>رقم المجلس:<span class="meeting-number">{3}</span></h4>-->
<!--								<h4>-->
<!--									رقم تشكيل المجلس:<span class="meeting-formation-number"-->
<!--										>{4}</span-->
<!--									>-->
<!--								</h4>-->
<!--								<h4>-->
<!--									بتاريخ:<span class="meeting-month">{5}</span> /-->
<!--									<span class="meeting-year">{2023}</span>-->
<!--								</h4>-->
<!--							</div>-->
<!--							<div class="col">-->
<!--								<a href="#" class="btn-basic">عرض ملف المجلس النهائي</a>-->
<!--								<a href="#" class="btn-basic">عرض الموضوعات بالقرار</a>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!-- مجلس سابق رقم 2 -->
<!--					<div class="old-meeting-box">-->
<!--						<div class="row">-->
<!--							<div class="col">-->
<!--								<h4>رقم المجلس:<span class="meeting-number">{3}</span></h4>-->
<!--								<h4>-->
<!--									رقم تشكيل المجلس:<span class="meeting-formation-number"-->
<!--										>{4}</span-->
<!--									>-->
<!--								</h4>-->
<!--								<h4>-->
<!--									بتاريخ:<span class="meeting-month">{5}</span> /-->
<!--									<span class="meeting-year">{2023}</span>-->
<!--								</h4>-->
<!--							</div>-->
<!--							<div class="col">-->
<!--								<a href="#" class="btn-basic">عرض ملف المجلس النهائي</a>-->
<!--								<a href="#" class="btn-basic">عرض الموضوعات بالقرار</a>-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</main>-->
<!-- ########################################################################################################### -->

<?php
Footer();
?>

<!-- Js Scripts and Plugins -->
<script type="module" src="./js/main.js"></script>

<!-- font Awesome -->
<script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>