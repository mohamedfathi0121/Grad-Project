<?php
require_once "db.php";
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
    Head("التصويت");
    ?>

<body dir="rtl">
  <?php
        Headers();
        Nav();
        ?>


  <!-- ?main content of the page -->
  <main class="voting-content">
    <div class="container">
      <!-- عنوان الصفحة -->
      <div class="title">
        <h1>التصويت علي موضوع رقم :<span class="subject-num">{1}</span></h1>
      </div>


      <div class="box">
        <form action="" method="post">
          <div class="row vote-radio">
            <div class="col">
              <h3>الموافق</h3>
              <input type="radio" name="vote" checked />
            </div>
            <div class="col">
              <h3>الرفض</h3>
              <input type="radio" name="vote" />
            </div>
            <div class="col">
              <h3>الامتناع</h3>
              <input type="radio" name="vote" />
            </div>
          </div>
          <div class="row">
            <h4>ملاحظات</h4>
            <textarea name=""></textarea>
          </div>
          <div class="row">
            <button class="btn-basic">تصويت</button>
          </div>
        </form>
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