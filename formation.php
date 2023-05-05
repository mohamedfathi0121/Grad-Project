<?php
require_once "db.php";
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
    Head("التشكيلات");
    ?>

<body dir="rtl">
  <?php
        Headers();
        Nav();
        ?>
  <main id="admin" class="formation-content">
    <div class="container">
      <div class="title">
        <h1>التشكيلات</h1>
      </div>

      <!-- التشكيل الحالي -->
      <div class="current-formation">
        <h3>التشكيل الحالي</h3>
        <!-- لو في تشكيل حالي -->
        <!-- *Add "deactive" to Class Here ↓↓ To Test-->
        <div class="box">
          <div class="row">
            <div class="col">
              <h4> رقم التشكيل السنوي:
                <span>
                  1 </span>
              </h4>
              <h4>
                تارخ بدايتة:
                <span>
                  1 </span>
              </h4>
              <h4>
                تايخ نهايتة:
                <span>
                  9 </span>

            </div>

            <div class="col">
              <button class="btn-basic">
                تحويل لتشكيل سابق
              </button>
            </div>
          </div>

          <div class="current-formation-buttons">

            <button class="btn-basic">اضافة و تعديل اعضاء التشكيل</button>
            <button class="btn-basic">تعديل بيانات التشكيل</button>
            <button class="btn-basic">عرض مجالس التشكيل</button>
            <button class="btn-basic">عرض اعضاء التشكيل</button>


          </div>
        </div>
      </div>

      <div class="old-formation">
        <h3>التشكيلات السابقة</h3>

        <div class="box">
          <div class="row">
            <div class="col">
              <h4>
                رقم التشكيل:
                <span class="meeting-number">
                  2 </span>
              </h4>
              <h4>
                تاريخ بدايتة:
                <span class="meeting-formation-number">
                  1 </span>
              </h4>
              <h4>
                تاريخ نهايتة:
                <span class="meeting-month">
                  10 </span>
                /
                <span class="meeting-year">
                  2023 </span>
              </h4>
            </div>
            <div class="col">
              <button class="btn-basic">عرض مجالس التشكيل</button>
              <button class="btn-basic">عرض اعضاء التشكيل</button>
            </div>
          </div>
        </div>
        <!-- المجالس السابقة -->
        <!--                            <div class="old-meetings">-->
        <!--                                <h3>المجالس السابقة</h3>-->
        <!-- مجلس سابق -->

      </div>
    </div>
    <!-- اضافة تشكيل جديد -->
    <div class="add-formation">
      <button title=" يجب تحويل  التشكيل الحالي لتشكيل سابق اولا " href="#" class="btn-basic">اضافة تشكيل
        جديد</button>
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