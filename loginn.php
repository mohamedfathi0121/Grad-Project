<?php
require_once "db.php";
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
    Head("تسجيل الدخول");
    ?>

<body dir="rtl">
  <?php
  Headers();
  if(!isset($_SESSION["loggedin"]) && @$_SESSION["loggedin"] !== true):
  ?>

  <main class="login-page">
    <div class="container">
      <div class="box">
        <h1 class="title">تسجيل الدخول</h1>
        <form action="authentication.php" method="post">

          <div class="col">
            <div class="row">
              <h4>البريد الالكتروني</h4><input type="text" placeholder="البريد الالكتروني" name="email">
            </div>
            <div class="row">
              <h4>كلمة المرور</h4><input type="password" placeholder="كلمة المرور" name="password">
            </div>
            <div class="row"><button type="submit" class="btn-basic" name="sign_in_btn">تسجيل الدخول</button></div>
          </div>

        </form>
      </div>
    </div>
  </main>
  <?php
  else:
      ?>
      <p style="color: red; font-weight: bold; text-align: center">
          You're already logged in, you'll be redirected in 5 seconds.
      </p><br>
      <?php
      header("refresh:5; url=meetings.php");
  endif;
  footer();
  ?>

  <!-- Js Scripts and Plugins -->
  <script type="module" src="./js/main.js"></script>

  <!-- font Awesome -->
  <script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>