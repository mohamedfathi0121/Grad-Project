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

      <main id="empty" class="empty">
        <h4>لا يوجد ملفات الان</h4>
      </main>

      <div class="attatchement-box">
        <div class="col">
          <a href="#">م 1 </a>
          <button class="btn-basic">حذف</button>

        </div>
        <div class="col">
          <a href="#">مرفق مرفق 1مرفق 1مرففق 2 1</a>
          <button class="btn-basic">حذف</button>

        </div>
        <div class="col">
          <a href="#">مرفق مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 3 1</a>
          <button class="btn-basic">حذف</button>

        </div>
        <div class="col">
          <a href="#">مرفق مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 4 1</a>
          <button class="btn-basic">حذف</button>

        </div>
        <div class="col">
          <a href="#">مرفق مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1 1</a>
          <button class="btn-basic">حذف</button>

        </div>
        <div class="col">
          <a href="#">مرفق مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1 1</a>
          <button class="btn-basic">حذف</button>

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