<?php
require_once "db.php";
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
    Head("التقارير");
    ?>

<body dir="rtl">
  <?php
        Headers();
        Nav();
        ?>


  <!-- main content of the page -->
  <main class="reports-content">
    <div class="container">
      <!-- عنوان الصفحة -->
      <div class="title">
        <h1>تقارير مجلس رقم :<span class="subject-num">{1}</span>
          <h1>
      </div>

      <div class="box">
        <div class="row">
          <div class="col">
            <a href="#" class="btn-basic">عرض الموضوعات بالقرار</a>
          </div>
        </div>
        <div class="row">
          <div class="col"><a href="#" class="btn-basic">عرض ملف الحضور و الغياب</a></div>
          <div class="col"><a href="#" class="btn-basic">عرض ملف المجلس الموثق</a></div>
        </div>
      </div>
    </div>
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