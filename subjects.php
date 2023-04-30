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
    Head("المواضيع");
    ?>
	<body dir="rtl">
        <?php
        Headers();
        Nav();
        ?>
		<!--  Another Content To Be Added Later (Just As an Example Ignore / Delete it) -->
		<div class="another-content">باقي محتوى الصفحة هنا</div>

        <?php
        Footer();
        ?>

		<!-- Js Scripts and Plugins -->
		<script type="module" src="./js/main.js"></script>

		<!-- font Awesome -->
		<script
			src="https://kit.fontawesome.com/eb7dada2f7.js"
			crossorigin="anonymous"
		></script>
	</body>
</html>
