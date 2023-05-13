<?php
require_once "db.php";
require_once "functions.php";

if (session_status() === PHP_SESSION_NONE) {
	session_start();
} ?>

<!DOCTYPE html>
<html lang="en">
<?php Head("موضوعات المجلس الحالي"); ?>

<body dir="rtl">
<?php Headers();
if (is_logged_in()):
	Nav();
	?>
    <main class="current-subject-content">
        <div class="container">
            <!-- عنوان الصفحة -->
            <div class="title">
                <h1>موضوعات المجلس الحالي</h1>
            </div>
			<?php
            $formation_id_stmt = $conn->prepare("SELECT formation_id FROM p39_meeting WHERE meeting_id = ?");
            $formation_id_stmt->bind_param("i", $_GET["mid"]);
            $formation_id_stmt->execute();
            $formation_id_result = $formation_id_stmt->get_result();
            $formation_id_row = $formation_id_result->fetch_assoc();
            if (@in_array($formation_id_row["formation_id"], $_SESSION["formation_ids"]) OR $_SESSION["admin"]) {

                $subject_types_stmt = $conn->prepare("SELECT * FROM p39_subject_type");
                $subject_types_stmt->execute();
                $subject_types_result = $subject_types_stmt->get_result();
                $subject_types = array();
                while ($subject_types_row = $subject_types_result->fetch_assoc()) {
                    $subject_types[$subject_types_row["subject_type_id"]] = $subject_types_row["subject_type_name"];
                }
                $subject_types_stmt->close();

                if (!isset($_GET["search"])) {
                    $search = clean_data($_GET["mid"]);
                    $current_subjects_stmt = $conn->prepare("SELECT * FROM p39_subject WHERE meeting_id = ? ORDER BY -order_id DESC");
                    $current_subjects_stmt->bind_param("i", $search);
                    $current_subjects_stmt->execute();
                    $current_subjects_result = $current_subjects_stmt->get_result();
                    if ($current_subjects_result->num_rows > 0) {
                        while ($current_subjects_row = $current_subjects_result->fetch_assoc()) { ?>
                            <div class="current-subject-foradmin">
                                <div class="box">
                                    <div class="row">
                                        <div class="col">
                                            <h4>
                                                ترتيب عرض الموضوع:
                                                <span>
                                                    <?= $current_subjects_row["order_id"] == NULL ? "لا يوجد" : $current_subjects_row["order_id"] ?>
                                                </span>
                                            </h4>
                                            <h4>
                                                رقم إدخال الموضوع:
                                                <span>
                                                    <?= $current_subjects_row["subject_number"] ?>
                                                </span>
                                            </h4>
                                            <h4>
                                                تصنيف الموضوع:
                                                <span>
                                                    <?= $subject_types[$current_subjects_row["subject_type_id"]] ?>
                                                </span>
                                            </h4>
                                            <h4>
                                                عنوان الموضوع:
                                                <span>
                                                    <?= $current_subjects_row["subject_name"] ?>
                                                </span>
                                            </h4>
                                        </div>

                                        <?php
                                        $is_current_stmt = $conn->prepare("SELECT 
                                                                                        is_current, 
                                                                                        status 
                                                                                    FROM 
                                                                                        p39_meeting 
                                                                                    WHERE 
                                                                                        meeting_id = ?");
                                        $is_current_stmt->bind_param("i", $search);
                                        $is_current_stmt->execute();
                                        $is_current_result = $is_current_stmt->get_result();
                                        $is_current_row = $is_current_result->fetch_assoc();
                                        $is_current = $is_current_row["is_current"] == 1;
                                        $status = $is_current_row["status"];
                                        if ($is_current)
                                        {
                                            if (!$_SESSION["admin"]) { ?>
                                                <div class="col col-subject-vote">
                                                    <a href="voting.php" class="btn-basic">
                                                        تصويت
                                                    </a>
                                                    <button class="btn-basic subject-details-btn">
                                                        تفاصيل الموضوع
                                                    </button>
                                                </div>
                                                <!-- Closing tag of row -->
                                                </div>
                                            <?php } else {
                                                $subject_decision_stmt = $conn->prepare("SELECT 
                                                                                                    decision_id 
                                                                                                FROM 
                                                                                                    p39_decision 
                                                                                                WHERE 
                                                                                                    subject_id = ?");
                                                $subject_decision_stmt->bind_param("i", $current_subjects_row["subject_id"]);
                                                $subject_decision_stmt->execute();
                                                $subject_decision_result = $subject_decision_stmt->get_result();
                                                $subject_decision_exists = $subject_decision_result->num_rows > 0;
                                                $subject_decision_stmt->close(); ?>
                                                </div>
                                                <div class="row">
                                                    <?php if ($status == "confirmed") {
                                                        if ($subject_decision_exists) { ?>
                                                            <div class="col">
                                                                <button class="btn-basic disabled" disabled>إضافة قرار</button>
                                                            </div>
                                                            <div class="col">
                                                                <form method="post" action="update_decision.php">
                                                                    <input type="hidden" name="meeting_id" value="<?= $_GET['mid'] ?>">
                                                                    <input type="hidden" name="subject_id"
                                                                           value="<?= $current_subjects_row['subject_id'] ?>">
                                                                    <button class="btn-basic" name="add_decision">تعديل قرار</button>
                                                                </form>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="col">
                                                                <form method="post" action="add_decision.php">
                                                                    <input type="hidden" name="subject_id"
                                                                           value="<?= $current_subjects_row['subject_id'] ?>">
                                                                    <input type="hidden" name="meeting_id" value="<?= $_GET['mid'] ?>">

                                                                    <button class="btn-basic" name="add_decision">اضافة قرار</button>
                                                                </form>
                                                            </div>
                                                            <div class="col">
                                                                <button class="btn-basic disabled" disabled>تعديل قرار</button>
                                                            </div>
                                                        <?php }
                                                    } else { ?>
                                                        <div class="col">
                                                            <button class="btn-basic disabled" disabled>اضافة قرار</button>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn-basic disabled" disabled>تعديل قرار</button>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="col">
                                                        <button class="btn-basic subject-details-btn">
                                                            تفاصيل الموضوع
                                                        </button>
                                                    </div>
                                                    <div class="col">
                                                        <form method="post" action="update_subject.php">
                                                            <input type="hidden" name="subject_id"
                                                                   value="<?= $current_subjects_row['subject_id'] ?>">
                                                            <button class="btn-basic" name="update_subject_btn">تعديل الموضوع</button>
                                                        </form>
                                                    </div>
                                                    <div class="col">
                                                        <form method="post" action="subject_attachment.php?sid=<?=$current_subjects_row['subject_id']?>">
                                                            <input type="hidden" name="subject_id" value="<?= $current_subjects_row['subject_id'] ?>">
                                                            <button class="btn-basic" name="subject_attachment_btn">عرض المرفقات</button>
                                                        </form>
                                                    </div>

                                                </div>
                                            <?php }
                                        } else { ?>
                                            </div>
                                            <div class="row">
                                                <div class="col col-subject-vote">
                                                    <button class="btn-basic subject-details-btn">
                                                        تفاصيل الموضوع
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                <div class="current-subject-details deactive">
                                    <div class="row">
                                        <div class="col">
                                            <p>
                                                تفاصيل الموضوع:
                                                <?= $current_subjects_row["subject_details"] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <main id="empty" class="empty-current-subject">
                            <h4>لا يوجد موضوعات الان</h4>
                        </main>
                                <?php
                    }
                    if ($_SESSION["admin"] AND @$is_current)
                    {
                        ?>
                        </div>
                        <div class="add-current-subject">
                            <form method="post" action="add_subject.php">
                                <button name="add_subject_btn" class="btn-basic">اضافة موضوع</button>
                            </form>
                        </div>
                        <?php
                    }
                }
            } else {
                ?>
                <div class="container">
                    <main id="empty" class="empty-current-subject">
                        <h4>لا يوجد موضوعات الان</h4>
                    </main>
                </div>
                <?php
            }
        ?>
        </main>
    <?php
endif;
footer();
?>

<!-- Js Scripts and Plugins -->
<script type="module" src="./js/main.js"></script>

<!-- font Awesome -->
<script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>