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


  <main class="add-member-page">
    <div class="container">
      <!-- عنوان الصفحة -->
      <div class="title">
        <h1>إضافة عضو جديد</h1>
      </div>
      <form class="box">
        <div class="col">

          <div class="row">
            <h4>الاسم بالكامل</h4><input type="text" placeholder="الاسم بالكامل" />
          </div>
          <div class="row">
            <h4>البريد الالكتروني</h4><input type="email" placeholder="البريد الالكتروني" />
          </div>
          <div class="row">
            <h4>كلمة السر</h4><input type="password" placeholder="كلمة السر" />
          </div>
          <div class="row">
            <h4>رقم التليفون</h4><input type="text" placeholder="رقم التليفون" />
          </div>
          <div class="row">
            <h4>المسمى الوظيفي</h4><input type="text" placeholder="المسمى الوظيفي" />
          </div>
          <div class="row">
            <h4>الفئة الوظيفية</h4>
            <div class="select-basic">
              <select>
                <option value="">اختر</option>
                <option value="">عميد الكلية</option>
                <option value="">وكيل الكلية</option>
                <option value="">رئيس قسم</option>
                <option value="">عضو هيئة تدريس</option>
                <option value="">اداري</option>
              </select>
            </div>
          </div>
          <div class="row">
            <h4>الدرجة الوظيفية</h4>
            <div class="select-basic">
              <select>
                <option value="">اختر</option>
                <option value="">استاذ</option>
                <option value="">استاذ مساعد</option>
                <option value="">مدرس</option>
                <option value="">خبير</option>
                <option value="">اداري</option>
              </select>
            </div>
          </div>
          <div class="row">
            <h4>القسم العلمي</h4>
            <div class="select-basic">
              <select>
                <option value="">اختر</option>
                <option value="">قسم المحاسبة</option>
                <option value="">قسم ادارة الاعمال</option>
                <option value="">قسم الاقتصاد والتجارة الخارجية</option>
                <option value="">قسم الاحصاء</option>
                <option value="">ثسم العلوم السياسية</option>
                <option value="">قسم نظم المعلومات</option>
                <option value="">عضو خارجي</option>
                <option value="">اداري بالكلية</option>

              </select>
            </div>
          </div>
          <div class="row">
            <h4>الصلاحية</h4>
            <div class="select-basic">
              <select>
                <option value="">اختر</option>
                <option value="">عضو مجلس</option>
                <option value="">أمين مجلس (ادمن)</option>
              </select>
            </div>
          </div>
          <div class="row">
            <h4>صورة العضو</h4>
            <div class="upload">
              <div class="btn-basic">
                <label for="up1">
                  رفع صورة
                  <i class="fa-solid fa-upload"></i>
                  <input id="up1" type="file" class="upload-button" multiple />
                </label>
              </div>
              <div class="file-list"></div>
            </div>
          </div>
          <div class="row">
            <h4>ملاحظات</h4>
            <textarea name=""></textarea>
          </div>
          <div class="row">
            <button type="submit" class="btn-basic">اضافة عضو جديد</button>
          </div>
        </div>
      </form>

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