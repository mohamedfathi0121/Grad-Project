<?php
require_once "db.php";
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
Head("مرفقات الموضوعات");
?>

<body dir="rtl">
    <?php
    Headers();
    if (is_logged_in()) : ?>
        <?php Nav();
	    $search = clean_data($_GET["sid"]);?>
        <main class="attachment-content">
            <div class="container">
                <!-- عنوان الصفحة -->
                <div class="title">
                    <h1>المرفقات الخاصة بموضوع رقم <?= $search ?></h1>
                </div>
                <?php
                $subject_att_stmt = $conn->prepare("SELECT * FROM p39_subject_attachment WHERE subject_id = ?");
                $subject_att_stmt->bind_param("i", $search);
                $subject_att_stmt->execute();
                $subject_att_result = $subject_att_stmt->get_result();
                $subject_att_exist = $subject_att_result->num_rows > 0;

                $subject_pic_stmt = $conn->prepare("SELECT * FROM p39_subject_picture WHERE subject_id = ?");
                $subject_pic_stmt->bind_param("i", $search);
                $subject_pic_stmt->execute();
                $subject_pic_result = $subject_pic_stmt->get_result();
                $subject_pic_exist = $subject_pic_result->num_rows > 0;
                if (!$subject_att_exist) { ?>
                    <main id="empty" class="empty">
                        <h4>لا يوجد مرفقات الآن</h4>
                    </main>
                <?php } else { ?>
                    <div>
                        <h3>المرفقات</h3>
                    </div>
                    <div class="attatchement-box">
                        <div class="col">
                            <img src="images/icons/iconpdf.svg" alt="" class="attachment-picture">
                            <a href="#">مرفق مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1 1</a>
                            <!-- this is not delete button -->
                            <button data-open-modal class="btn-basic">حذف</button>
                            <dialog data-modal>
                                <h4>هل حقا تريد مسح الملف 1</h4>
                                <form>
                                    <!-- this is the delete code -->
                                    <button class="btn-basic">نعم</button>
                                    <button type="submit" formmethod="dialog" class="btn-basic">لا</button>
                                </form>
                            </dialog>
                        </div>
                        <div class="col">
                            <img src="images/icons/iconimage.svg" alt="" class="attachment-picture">
                            <a href="#">مرفق مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1 1</a>
                            <button data-open-modal class="btn-basic">حذف</button>
                            <dialog data-modal>
                                <form action="">
                                    <h4>هل حقا تريد حذف الملف 2</h4>

                                    <button class="btn-basic">نعم</button>
                                    <button data-close-modal formmethod="dialog" class="btn-basic">لا</button>
                                </form>
                            </dialog>
                        </div>
                    </div>

                <?php }
                if (!$subject_pic_exist) { ?>
                    <main id="empty" class="empty">
                        <h4>لا يوجد صور الآن</h4>
                    </main>
                <?php } else { ?>
                    <div>
                        <h3>الصور</h3>
                    </div>
                    <div class="attatchement-box">
                        <div class="col">
                            <img src="images/icons/iconpdf.svg" alt="" class="attachment-picture">
                            <a href="#">مرفق مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1 1</a>
                            <!-- this is not delete button -->
                            <button data-open-modal class="btn-basic">حذف</button>
                            <dialog data-modal>
                                <h4>هل حقا تريد مسح الملف 1</h4>
                                <form>
                                    <!-- this is the delete code -->
                                    <button class="btn-basic">نعم</button>
                                    <button type="submit" formmethod="dialog" class="btn-basic">لا</button>
                                </form>
                            </dialog>
                        </div>
                        <div class="col">
                            <img src="images/icons/iconimage.svg" alt="" class="attachment-picture">
                            <a href="#">مرفق مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1 1</a>
                            <button data-open-modal class="btn-basic">حذف</button>
                            <dialog data-modal>
                                <form action="">
                                    <h4>هل حقا تريد حذف الملف 2</h4>

                                    <button class="btn-basic">نعم</button>
                                    <button data-close-modal formmethod="dialog" class="btn-basic">لا</button>
                                </form>
                            </dialog>
                        </div>
                    </div>
	                <?php if ($_SESSION["admin"]) { ?>
                        <!-- اضافة ملف -->
                        <div class="upload add-attachment-subject">
                            <div class="btn-basic">
                                <label for="up1">
                                    رفع مرفق
                                    <i class="fa-solid fa-upload"></i>
                                    <input id="up1" type="file" class="upload-button" multiple/>
                                </label>
                            </div>
                            <div class="file-list"></div>
                        </div>
	                <?php } ?>
                <?php } ?>
            </div>
        </main>
        <?php endif;
        footer();
        ?>

        <!-- Js Scripts and Plugins -->
        <script type="module" src="./js/main.js"></script>

        <!-- font Awesome -->
        <script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>