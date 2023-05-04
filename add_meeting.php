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
    Head("الأعضاء");
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
        <h1>إضافة مجلس جديد</h1>
      </div>
      <form class="box" method="post" action="add_member_code.php" enctype="multipart/form-data">
        <div class="col">

          <div class="row">
            <h4>رقم المجلس</h4><input type="text" name="name" placeholder="رقم المجلس" required />
          </div>

          <div class="row">
            <h4>الشهر</h4>
            <div class="select-basic">
              <select name="is_admin" required>
                <option>اختر</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
              </select>
            </div>
          </div>
          <div class="row">
            <h4>السنة</h4>
            <div class="select-basic">
              <select name="is_admin" required>
                <option value="">اختر</option>
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
                <option>2025</option>
                <option>2026</option>
                <option>2027</option>
              </select>
            </div>
          </div>
          <div class="row">
            <button type="submit" class="btn-basic" name="add_member_btn">اضافة مجلس جديد</button>
          </div>
      </form>

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