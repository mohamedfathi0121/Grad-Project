<?php
require_once "db.php";
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php Head("التشكيلات");?>

<body dir="rtl">
    <?php Headers();?>
    <?php if(is_logged_in()) {?>
        <?php Nav();?>
        <main id="admin" class="formation-content">
            <div class="container">
                <div class="title">
                    <h1>التشكيلات</h1>
                </div>
                <?php
                # Old Query for only formations that user are in
                # $current_formation_stmt = $conn->prepare("SELECT * FROM p39_formation WHERE is_current = 1 AND formation_id IN (SELECT formation_id FROM p39_formation_user WHERE user_id = ?)");
                $current_formation_stmt = $conn->prepare("SELECT 
                                                                    * 
                                                                FROM 
                                                                    p39_formation 
                                                                WHERE 
                                                                    is_current = 1");
                $current_formation_stmt->execute();
                $current_formation_result = $current_formation_stmt->get_result();
                $current_formation_exists = $current_formation_result->num_rows > 0;?>
                <!-- التشكيل الحالي -->
                <div class="current-formation">
                    <h3>التشكيل الحالي</h3>
                    <?php if ($current_formation_exists): ?>
                        <?php while ($current_formation_row = $current_formation_result->fetch_assoc()) { ?>
                            <!-- لو في تشكيل حالي -->
                            <div class="box">
                                <div class="row">
                                    <div class="col">
                                        <h4> رقم التشكيل السنوي:
                                            <span>
                                                <?= $current_formation_row["formation_number"] ?>
                                            </span>
                                        </h4>
                                        <h4>
                                            تاريخ بدايته:
                                            <span>
                                                9 / <?= $current_formation_row["start_year"] ?>
                                            </span>
                                        </h4>
                                        <h4>
                                            تايخ نهايته:
                                            <span>
                                                8 / <?= $current_formation_row["start_year"] + 1 ?>
                                            </span>
                                        </h4>
                                    </div>

                                    <div class="col">
		                                <?php if ($_SESSION["admin"]) { ?>
                                            <form method="post" action="meeting_status.php">
                                                <input type="hidden" name="formation_id"
                                                       value="<?=$current_formation_row['formation_id']?>">
                                                <button class="btn-basic" name="past_formation_btn">
                                                    تحويل لتشكيل سابق
                                                </button>
                                            </form>
		                                <?php } ?>
                                    </div>
                                </div>

                                <div class="current-formation-buttons">
		                            <?php if ($_SESSION["admin"]) { ?>
                                        <a class="btn-basic" href="add_formation_member.php">اضافة و تعديل اعضاء التشكيل</a>
                                        <a href="update_formation.php" class="btn-basic">تعديل بيانات التشكيل</a>
		                            <?php } ?>
                                    <button class="btn-basic">عرض مجالس التشكيل</button>
                                    <button class="btn-basic">عرض اعضاء التشكيل</button>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    <?php else: ?>
                        <!-- لو مفيش تشكيل حالي -->
                        <div class="current-formation">
                            <main id="empty" class="empty-formation">
                                <h4>لا يوجد تشكيلات حالية الان</h4>
                            </main>
                        </div>
                    <?php endif; ?>

                <?php $past_formation_stmt = $conn->prepare("SELECT 
                                                                    * 
                                                                FROM 
                                                                    p39_formation 
                                                                WHERE 
                                                                    is_current = 0 
                                                                  AND
                                                                    formation_id IN (SELECT 
                                                                                        formation_id 
                                                                                    FROM 
                                                                                        p39_formation_user 
                                                                                    WHERE 
                                                                                        user_id = ?)");
                $past_formation_stmt->bind_param("i", $_SESSION["user_id"]);
                $past_formation_stmt->execute();
                $past_formation_result = $past_formation_stmt->get_result();
                if ($past_formation_result->num_rows > 0) { ?>
                    <div class="old-formation">
                        <h3>التشكيلات السابقة</h3>
                        <?php while ($past_formation_row = $past_formation_result->fetch_assoc()) { ?>
                            <div class="box">
                                <div class="row">
                                    <div class="col">
                                        <h4> رقم التشكيل السنوي:
                                            <span>
                                                <?= $past_formation_row["formation_number"] ?>
                                            </span>
                                        </h4>
                                        <h4>
                                            تارخ بدايته:
                                            <span>
                                                9 / <?= $past_formation_row["start_year"] ?>
                                            </span>
                                        </h4>
                                        <h4>
                                            تايخ نهايته:
                                            <span>
                                                8 / <?= $past_formation_row["start_year"] + 1 ?>
                                            </span>
                                        </h4>
                                    </div>
                                    <div class="col">
                                        <button class="btn-basic">عرض مجالس التشكيل</button>
                                        <button class="btn-basic">عرض اعضاء التشكيل</button>
                                    </div>
                                </div>
                            </div>
                        </div>
	                <?php } ?>
                <?php } ?>
            </div>
	        <?php if ($_SESSION["admin"]) { ?>
		        <?php if ($current_formation_exists): ?>
                    <!-- اضافة تشكيل جديد -->
                    <div class="add-formation">
                        <button disabled title=" يجب تحويل التشكيل الحالي لتشكيل سابق أولًا "
                                class="btn-basic disabled">
                            إضافة تشكيل جديد
                        </button>
                    </div>
		        <?php else: ?>
                    <div class="add-formation">
                        <a class="btn-basic" href="add_formation.php">إضافة تشكيل جديد</a>
                    </div>
		        <?php endif; ?>
	        <?php } ?>
        </main>
            <?php
    }
    footer();
    ?>

    <!-- Js Scripts and Plugins -->
    <script type="module" src="./js/main.js"></script>

    <!-- font Awesome -->
    <script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>
