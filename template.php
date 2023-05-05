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


  <div class="another-content">باقي محتوى الصفحة هنا</div>



  <?php
      footer();
      ?>

  <!-- Js Scripts and Plugins -->
  <script type="module" src="./js/main.js"></script>

  <!-- font Awesome -->
  <script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>