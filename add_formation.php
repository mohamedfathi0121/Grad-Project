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
Head("اضافة تشكيل");
?>

<body dir="rtl">
<?php Headers(); ?>
<?php if (is_admin()): ?>
    <?php Nav();?>
    <main class="add-member-page">
        <div class="container">
            <!-- عنوان الصفحة -->
            <div class="title">
                <h1>إضافة تشكيل جديد</h1>
            </div>
            <form class="box" method="post" action="addition_code.php" enctype="multipart/form-data">
                <div class="col">

                    <div class="row">
                        <h4>رقم التشكيل</h4><input type="number" name="formation_number" min="1" required/>
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
			                            continue;
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
                    <div class="row">
                        <h4>حالة التشكيل</h4>
                        <div class="select-basic">
                            <select name="is_current" required>
                                <option value="">اختر</option>
                                <option value="1">حالي</option>
                                <option value="0">سابق</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <button type="submit" class="btn-basic" name="add_formation_btn">اضافة تشكيل جديد</button>
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
