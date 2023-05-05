<?php
require_once "db.php";
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
      Head("اضافة و تعديل اعضاء للتشكيل الحالي");
?>

<body dir="rtl">
  <?php
      Headers();
      Nav();
      ?>


  <main class="add-formation-member-page ">
    <div class="container">
      <div class="title">
        <h1>اضافة و تعديل الاعضاء للتشكيل السنوي الحالي رقم: {6}</h1>
      </div>
      <form action="">
        <h4>اختر من اعضاء السيستم الحالين للاضافة للتشكيل</h4>
        <table>
          <thead>
            <th>اسم العضو</th>
            <th>اختيار</th>

          </thead>
          <tbody>
            <tr>
              <td>د.محمد عبدالسلام</td>
              <td><input type="checkbox" class="check" /></td>

            </tr>
            <tr>
              <td>د.محمود بهلول</td>
              <td><input type="checkbox" class="check" /></td>


            </tr>
            <tr>
              <td>د.يحيي حلمي</td>
              <td><input type="checkbox" class="check" /></td>


            </tr>
            <tr>
              <td>د.احمد عبدالوهاب</td>
              <td><input type="checkbox" class="check" /></td>

            <tr>
              <td>Sample text</td>
              <td><input type="checkbox" class="check" /></td>
            </tr>


          </tbody>
          <tfoot>
            <tr>
              <td>اختيار الكل</td>
              <td><input type="checkbox" class="select-all" /></td>
            </tr>
          </tfoot>

        </table>
        <button type="submit" class="btn-basic">اختيار </button>
      </form>
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