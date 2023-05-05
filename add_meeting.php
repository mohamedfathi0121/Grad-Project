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
<?php
Head("اضافة مجلس");
?>

<body dir="rtl">
<?php
Headers();
Nav();
if (is_admin()):
	$formation_ids_stmt = $conn->prepare("SELECT formation_id FROM p39_formation ORDER BY formation_id");
	$formation_ids_stmt->execute();
	$formation_ids_result = $formation_ids_stmt->get_result();
	$formation_ids = array();
	while ($formation_ids_row = $formation_ids_result->fetch_assoc())
	{
		$formation_ids[] = $formation_ids_row["formation_id"];
	}
	?>
	<main class="add-member-page">
		<div class="container">
			<!-- عنوان الصفحة -->
			<div class="title">
				<h1>إضافة مجلس جديد</h1>
			</div>
			<form class="box" method="post" action="add_meeting_code.php">
				<div class="col">

					<div class="row">
						<h4>رقم المجلس</h4>
						<input type="number" name="number" placeholder="رقم المجلس" required />
					</div>

					<div class="row">
						<h4>الشهر</h4>
						<div class="select-basic">
							<select name="month" required>
								<option>اختر</option>
								<?php
								for ($i = 1; $i <= 12; $i++)
								{
									echo "<option value='$i'>$i</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="row">
						<h4>السنة</h4>
						<div class="select-basic">
							<select name="year" required>
								<option value="">اختر</option>
								<?php
								$year = date("Y");
								for ($i = $year - 4; $i <= $year + 4; $i++)
								{
									echo "<option value='$i'>$i</option>";
								}
								?>
							</select>
						</div>
					</div>
                    <div class="row">
                        <h4>رقم تشكيل المجلس</h4>
                        <div class="select-basic">
                            <select name="formation_id" required>
                                <option value="">اختر</option>
								<?php
								foreach ($formation_ids as $f)
								{
									echo "<option value='$f'>$f</option>";
								}
								?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <h4>حالة انعقاد المجلس</h4>
                        <div class="select-basic">
                            <select name="is_current" required>
                                <option value="">اختر</option>
                                <option value="1">منعقد</option>
                                <option value="0">سابق</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <h4>حالة المجلس</h4>
                        <div class="select-basic">
                            <select name="status" required>
                                <option value="">اختر</option>
                                <option value="pending">غير مؤكد</option>
                                <option value="confirmed">مؤكد</option>
                                <option value="finished">منتهي</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn-basic" name="add_meeting_btn">اضافة مجلس جديد</button>
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