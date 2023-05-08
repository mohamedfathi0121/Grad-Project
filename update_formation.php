<?php
require_once "db.php";
require_once "functions.php";

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
Head("تعديل تشكيل");
?>

<body dir="rtl">
<?php Headers(); ?>
<?php if (is_admin()):?>
	<?php Nav(); ?>
    <main class="add-member-page">
        <div class="container">
            <!-- عنوان الصفحة -->
            <div class="title">
                <h1>تعديل التشكيل</h1>
            </div>
            <form class="box" method="post" action="update_code.php" enctype="multipart/form-data">
                <div class="col">
                    <?php $formation_stmt = $conn->prepare("SELECT 
                                                                        formation_number, 
                                                                        start_year 
                                                                    FROM 
                                                                        p39_formation 
                                                                    WHERE 
                                                                        formation_id = ?");
                    $formation_stmt->bind_param("i", $_POST["formation_id"]);
                    $formation_stmt->execute();
                    $formation_result = $formation_stmt->get_result();
                    $formation_row = $formation_result->fetch_assoc(); ?>
                    <div class="row">
                        <h4>رقم التشكيل</h4><input type="text" name="formation_number" placeholder="رقم التشكيل" required
                                                   value="<?= $formation_row['formation_number'] ?>"/>
                    </div>

                    <div class="row">
                        <h4>الفترة الزمنية</h4>
                        <div class="select-basic">
                            <select name="start_year" required>
                                <option>اختر</option>
		                        <?php
		                        $formation_years_stmt = $conn->prepare("SELECT start_year FROM p39_formation");
		                        $formation_years_stmt->execute();
		                        $formation_years_result = $formation_years_stmt->get_result();
		                        $years = array();
		                        while ($formation_years_row = $formation_years_result->fetch_assoc())
		                        {
			                        $years[] = $formation_years_row["start_year"];
		                        }
		                        $formation_years_stmt->close();
		                        for ($i = date("Y") - 4; $i <= date("Y") + 4; $i++)
		                        {
			                        if (in_array($i, $years))
			                        {
                                        if ($i == $formation_row["start_year"]) { ?>
                                            <option value="<?= $i ?>" selected><?= ($i + 1) . "-" . $i ?></option>
                                        <?php }
			                        }
			                        else
			                        {
				                        ?>
                                        <option value="<?= $i ?>"><?= ($i + 1) . "-" . $i ?></option>;
				                        <?php
			                        }
		                        }
		                        ?>
                            </select>
                        </div>
                    </div>

                    <div class="row sp2-row">
                        <input type="hidden" name="formation_id" value="<?= $_POST['formation_id'] ?>">
                        <button type="submit" class="btn-basic" name="update_formation_btn">تعديل التشكيل</button>
                        <form method="post" action="deletion_code.php">
                            <input type="hidden" name="formation_id" value="<?= $_POST['formation_id'] ?>">
                            <button type="submit" class="btn-basic" name="delete_formation_btn">حذف التشكيل</button>
                        </form>
                    </div>
                </div>
            </form>
        </div>
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