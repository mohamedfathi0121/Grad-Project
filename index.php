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

  <!-- !Admin Apperance -->
  <main class="main-page reports-content">
    <div class="container">
      <!-- عنوان الصفحة -->
      <div class="title">
        <h1> الصفحة الرئيسية<h1>
      </div>

      <div class="box">
        <div class="row">
          <div class="col">
            <a href="#" class="btn-basic">التشكيلات السنوية</a>
          </div>
          <div class="col">
            <a href="#" class="btn-basic">الأعضاء</a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <a href="" class="btn-basic">المجالس</a>
          </div>
        </div>
        <div class="row">
          <div class="col"><a href="#" class="btn-basic">الموضوعات</a></div>
          <div class="col"><a href="#" class="btn-basic">القرارات التنفيذية</a></div>
        </div>
      </div>
    </div>
    </div>
  </main>
  <!-- Member Apperance -->
  <main class="main-page reports-content">
    <div class="container">
      <!-- عنوان الصفحة -->
      <div class="title">
        <h1> الصفحة الرئيسية<h1>
      </div>

      <div class="box">
        <div class="row">
          <div class="col">
            <a href="#" class="btn-basic">المجالس</a>
          </div>
          <div class="col">
            <a href="#" class="btn-basic">الموضوعات</a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <a href="" class="btn-basic">جدول الاعمال</a>

          </div>
          <div class="col">
            <a href="" class="btn-basic">التقارير</a>

          </div>
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