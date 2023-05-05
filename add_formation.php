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
    Head("اضافة تشكيل");
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
        <h1>إضافة تشكيل جديد</h1>
      </div>
      <form class="box" method="post" action="add_member_code.php" enctype="multipart/form-data">
        <div class="col">

          <div class="row">
            <h4>رقم التشكيل</h4><input type="number" name="name" required />
          </div>
          <div class="row">
            <h4>رقم التشكيل</h4><input type="text" name="name" placeholder="رقم التشكيل" required />
          </div>

          <div class="row">
            <h4>الفترة الزمنية</h4>
            <div class="select-basic">
              <select name="is_admin" required>
                <option>اختر</option>
                <option>2020/2021</option>
                <option>2021/2022</option>
                <option>2022/2023</option>
                <option>2023/2024</option>
                <option>2024/2025</option>
                <option>2025/2026</option>
                <option>2026/2027</option>
                <option>2027/2028</option>
              </select>
            </div>
          </div>

          <div class="row">
            <button type="submit" class="btn-basic" name="add_member_btn">اضافة تشكيل جديد</button>
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