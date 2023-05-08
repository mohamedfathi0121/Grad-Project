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
Head("تعديل قرار");
?>

<body dir="rtl">
<?php
Headers();
Nav();
if (is_admin()):
	?>
    <main class="add-member-page">
        <div class="container">
            <!-- عنوان الصفحة -->
            <div class="title">
                <h1>تعديل قرار</h1>
            </div>
            <form class="box" method="post" action="add_member_code.php" enctype="multipart/form-data">
                <div class="col">


                    <div class="row sp-row">
                        <h4>نوع القرار</h4>
                        <div class="row ">
                            <div class="col">
                                <h5>موافقة</h5><input type="radio" name="dec-type">
                            </div>
                            <div class="col">
                                <h5>رفض</h5><input type="radio" name="dec-type">
                            </div>
                            <div class="col">
                                <h5>مؤجل</h5><input type="radio" name="dec-type">
                            </div>


                        </div>
                    </div>
                    <div class="row sp-row">
                        <h4>هل له جواب تنفيذي؟</h4>
                        <div class="row ">
                            <div class="col">
                                <h5>نعم</h5><input type="radio" name="is-exec">
                            </div>
                            <div class="col">
                                <h5>لا</h5><input type="radio" name="is-exec">
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <h4>الجواب التنفيذي موجه لـ</h4>
                        <input type="text"/>
                    </div>

                    <div class="row sp-row">
                        <h4>هل تم تنفيذ القرار؟</h4>
                        <div class="row ">
                            <div class="col">
                                <h5>نعم</h5><input type="radio" name="is-done">
                            </div>
                            <div class="col">
                                <h5>لا</h5><input type="radio" name="is-done">
                            </div>

                        </div>
                    </div>

                    <div class="row sp2-row">
                        <input type="hidden" name="subject_id" value="<?= $_POST['subject_id'] ?>">
                        <button type="submit" class="btn-basic" name="add_member_btn">تعديل قرار للموضوع</button>
                        <button type="submit" class="btn-basic" name="add_member_btn">حذف قرار للموضوع</button>
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