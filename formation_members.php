<?php
require_once "db.php";
require_once "functions.php";
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
        ?>


  <main class="formation-members-content">
    <div class="container">
      <div class="title">
        <h1> سجل اعضاء التشكيل رقم {1} </h1>
      </div>
      <div class="meeting-attendance-page meetings-members">

        <table class="attend-table">

          <tbody>
            <tr>

              <td>د.محمد عبدالسلام</td>
              <td>منسق البرنامج</td>


            </tr>
            <tr>
              <td>د.محمود بهلول</td>
              <td>مدير شئون لجنة البحوث</td>


            </tr>
            <tr>
              <td>د.يحيي حلمي</td>
              <td>مدير عام الكلية وامين اللجنة</td>


            </tr>
            <tr>
              <td>د.احمد عبدالوهاب</td>
              <td>وكيل الكلية لشئون التعليم والطلاب</td>


            </tr>
            <tr>
              <td>د.محمد عبدالسلام</td>
              <td>منسق البرنامج</td>


            </tr>
            <tr>
              <td>د.محمود بهلول</td>
              <td>مدير شئون لجنة البحوث</td>


            </tr>
            <tr>
              <td>د.يحيي حلمي</td>
              <td>مدير عام الكلية وامين اللجنة</td>


            </tr>
            <tr>
              <td>د.احمد عبدالوهاب</td>
              <td>وكيل الكلية لشئون التعليم والطلاب</td>


            </tr>
            <tr>
              <td>د.محمد عبدالسلام</td>
              <td>منسق البرنامج</td>


            </tr>
            <tr>
              <td>د.محمود بهلول</td>
              <td>مدير شئون لجنة البحوث</td>


            </tr>
            <tr>
              <td>د.يحيي حلمي</td>
              <td>مدير عام الكلية وامين اللجنة</td>


            </tr>
            <tr>
              <td>د.احمد عبدالوهاب</td>
              <td>وكيل الكلية لشئون التعليم والطلاب</td>


            </tr>

          </tbody>


        </table>
      </div>
      <div class="print-container"><button class="btn-basic" onclick="window.print()">طباعة</button></div>
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