<?php
require_once "db.php";
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
    Head("ملف المجلس الموثق");
    ?>

<body dir="rtl">
    <?php
        Headers();
        Nav();
        ?>


    <main class="attachment-content">
        <div class="container">
            <!-- عنوان الصفحة -->
            <div class="title">
                <h1>الملفات الموثقة لمجلس رقم {2}</h1>
            </div>

            <main id="empty" class="empty deactive">
                <h4>لا يوجد ملفات الان</h4>
            </main>

            <div class="attatchement-box">
                <div class="col">
                    <img src="images/icons/iconpdf.svg" alt="" class="attachment-picture">
                    <a href="#">مرفق مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1 1</a>
                    <button data-open-modal class="btn-basic">حذف</button>
                    <dialog data-modal>
                        <h4>هل حقا تريد مسح الملف 1</h4>
                        <form>
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
                        <h4>هل حقا تريد مسح الملف 2</h4>
                        <form>
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
                        <h4>هل حقا تريد مسح الملف 3</h4>
                        <form>
                            <button class="btn-basic">نعم</button>
                            <button type="submit" formmethod="dialog" class="btn-basic">لا</button>
                        </form>
                    </dialog>
                </div>



            </div>


        </div>





        <!-- اضافة ملف -->
        <div class="upload add-attachment">
            <div class="btn-basic">
                <label for="up1">
                    رفع ملف المجلس الموثق
                    <i class="fa-solid fa-upload"></i>
                    <input id="up1" type="file" class="upload-button" multiple />
                </label>
            </div>
            <div class="file-list"></div>
        </div>
    </main>


    <?php
        footer();
        ?>

    <!-- Js Scripts and Plugins -->
    <script type="module" src="./js/main.js"></script>

    <!-- font Awesome -->
    <script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>