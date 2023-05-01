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

  <!-- *Main Members Page Content  -->

  <!-- !Admin Apperance -->
  <!-- *Add "deactive" to Class Here ↓↓ To Test-->
  <main class="members-content">
    <div class="container">
      <!-- عنوان الصفحة -->
      <div class="members-title">
        <h1>الاعضاء</h1>
      </div>

      <div class="members">
        <main id="empty" class="empty-member">
          <h4>لا يوجد اعضاء الان</h4>
        </main>

        <!--عضو رقم 1-->
        <div class="member-box">
          <div class="row">
            <div class="col">
              <h4>رقم العضو:<span class="member-number">{1}</span></h4>
              <h4>
                اسم العضو:<span class="member-name">{د. محمد عبد السلام}</span>
              </h4>
            </div>
            <div class="col">
              <a href="editmember.php" class="btn-basic">تعديل بيانات العضو</a>
              <button class="btn-basic member-details-btn">
                تفاصيل العضو
              </button>
            </div>
          </div>

          <div class="member-details deactive">
            <div class="row">
              <div class="col">
                <img src="./images/members/1.jpg" alt="" class="member-image" />
              </div>
              <div class="col">
                <h4>نوع العضو: عضو مجلس</h4>
                <h4>الاسم : د.محمد عبدالسلام</h4>
                <h4>رقم العضو : 1</h4>
                <h4>رقم تشكيل المجلس المنضم له العضو:4</h4>
                <h4>رقم التليفون: 01102465132</h4>
                <h4>الايميل: mohamedabdelsalam@gmail.com</h4>

                <h4>المسمى الوظيفي: دكتور</h4>
                <h4>القسم العلمي: قسم نظم المعلومات</h4>
                <h4>الفئة الوظيفية: عضو هيئة تدريس</h4>
                <h4>الدرجة الوظيفية:استاذ</h4>
                <h4>حالة العضو: مفعل</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--عضو رقم 1-->
      <div class="member-box">
        <div class="row">
          <div class="col">
            <h4>رقم العضو:<span class="member-number">{1}</span></h4>
            <h4>
              اسم العضو:<span class="member-name">{د. محمد عبد السلام}</span>
            </h4>
          </div>
          <div class="col">
            <a href="editmember.php" class="btn-basic">تعديل بيانات العضو</a>
            <button class="btn-basic member-details-btn">تفاصيل العضو</button>
          </div>
        </div>

        <div class="member-details deactive">
          <div class="row">
            <div class="col">
              <img src="./images/members/1.jpg" alt="" class="member-image" />
            </div>
            <div class="col">
              <h4>نوع العضو: عضو مجلس</h4>
              <h4>الاسم : د.محمد عبدالسلام</h4>
              <h4>رقم العضو : 1</h4>
              <h4>رقم تشكيل المجلس المنضم له العضو:4</h4>
              <h4>رقم التليفون: 01102465132</h4>
              <h4>الايميل: mohamedabdelsalam@gmail.com</h4>

              <h4>المسمى الوظيفي: دكتور</h4>
              <h4>القسم العلمي: قسم نظم المعلومات</h4>
              <h4>الفئة الوظيفية: عضو هيئة تدريس</h4>
              <h4>الدرجة الوظيفية:استاذ</h4>
              <h4>حالة العضو: مفعل</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="member-box">
        <div class="row">
          <div class="col">
            <h4>رقم العضو:<span class="member-number">{1}</span></h4>
            <h4>
              اسم العضو:<span class="member-name">{د. محمد عبد السلام}</span>
            </h4>
          </div>
          <div class="col">
            <a href="editmember.php" class="btn-basic">تعديل بيانات العضو</a>
            <button class="btn-basic member-details-btn">تفاصيل العضو</button>
          </div>
        </div>

        <div class="member-details deactive">
          <div class="row">
            <div class="col">
              <img src="./images/members/1.jpg" alt="" class="member-image" />
            </div>
            <div class="col">
              <h4>نوع العضو: عضو مجلس</h4>
              <h4>الاسم : د.محمد عبدالسلام</h4>
              <h4>رقم العضو : 1</h4>
              <h4>رقم تشكيل المجلس المنضم له العضو:4</h4>
              <h4>رقم التليفون: 01102465132</h4>
              <h4>الايميل: mohamedabdelsalam@gmail.com</h4>

              <h4>المسمى الوظيفي: دكتور</h4>
              <h4>القسم العلمي: قسم نظم المعلومات</h4>
              <h4>الفئة الوظيفية: عضو هيئة تدريس</h4>
              <h4>الدرجة الوظيفية:استاذ</h4>
              <h4>حالة العضو: مفعل</h4>
            </div>
          </div>
        </div>
      </div>
      <div class="member-box">
        <div class="row">
          <div class="col">
            <h4>رقم العضو:<span class="member-number">{1}</span></h4>
            <h4>
              اسم العضو:<span class="member-name">{د. محمد عبد السلام}</span>
            </h4>
          </div>
          <div class="col">
            <a href="editmember.php" class="btn-basic">تعديل بيانات العضو</a>
            <button class="btn-basic member-details-btn">تفاصيل العضو</button>
          </div>
        </div>

        <div class="member-details deactive">
          <div class="row">
            <div class="col">
              <img src="./images/members/1.jpg" alt="" class="member-image" />
            </div>
            <div class="col">
              <h4>نوع العضو: عضو مجلس</h4>
              <h4>الاسم : د.محمد عبدالسلام</h4>
              <h4>رقم العضو : 1</h4>
              <h4>رقم تشكيل المجلس المنضم له العضو:4</h4>
              <h4>رقم التليفون: 01102465132</h4>
              <h4>الايميل: mohamedabdelsalam@gmail.com</h4>

              <h4>المسمى الوظيفي: دكتور</h4>
              <h4>القسم العلمي: قسم نظم المعلومات</h4>
              <h4>الفئة الوظيفية: عضو هيئة تدريس</h4>
              <h4>الدرجة الوظيفية:استاذ</h4>
              <h4>حالة العضو: مفعل</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- اضافة عضو -->
    <div class="add-member">
      <a href="addmember.php" class="btn-basic">اضافة عضو جديد</a>
    </div>
  </main>

  <!-- Footer -->
  <!-- function footer(){ -->
  <footer>
    <p>جميع الحقوق محفوظة &copy; لدى فريق رقم 39 Bis Seniors 2023</p>
  </footer>
  <!-- } -->

  <!-- Js Scripts and Plugins -->
  <script type="module" src="./js/main.js"></script>

  <!-- font Awesome -->
  <script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>