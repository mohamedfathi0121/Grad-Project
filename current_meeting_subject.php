<?php
require_once "db.php";
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
    Head("موضوعات المجلس الحالي");
    ?>

<body dir="rtl">
  <?php
  Headers();
  if (is_logged_in()):
      Nav();
      ?>
      <main class="current-subject-content">
        <div class="container">
          <!-- عنوان الصفحة -->
          <div class="title">
            <h1>موضوعات المجلس الحالي</h1>
          </div>
          <!--member appearance  -->
          <!--   بقية محتوي الصفحة و بيتغير علي اساس هو المجلس اتوثق ولا لا-->
          <!-- add deactive here to test  -->
          <div class="current-subject-formember">

            <!-- لو المجلس لسه مش موثق -->
            <main id="empty" class="empty-current-subject">
              <h4>لا يوجد مواضيع الان</h4>
            </main>

            <!--لو المجلس موثق -->
            <!-- موضوع رقم 1 -->
            <div class="box">
              <div class="row">
                <div class="col">
                  <h4>رقم الموضوع:<span>{1}</span>
                  </h4>
                  <h4>
                    تصنيف الموضوع:
                    <span>
                      { مهم}
                    </span>
                  </h4>
                  <h4>
                    عنوان الموضوع:<span>{اي حاجة}</span>
                  </h4>
                </div>
                <div class="col col-subject-vote">
                  <a href="voting.php" class="btn-basic">تصويت</a>
                  <button class="btn-basic subject-details-btn">
                    تفاصيل الموضوع
                  </button>
                </div>
              </div>

              <div class="current-subject-details deactive">
                <div class="row">
                  <div class="col">
                    <p>{ محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد
                      محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد }</p>
                  </div>
                </div>
              </div>
            </div>
            <!--  موضوع 2-->
            <div class="box">
              <div class="row">
                <div class="col">
                  <h4>رقم الموضوع:<span>{1}</span>
                  </h4>
                  <h4>
                    تصنيف الموضوع:
                    <span>
                      { مهم}
                    </span>
                  </h4>
                  <h4>
                    عنوان الموضوع:<span>{اي حاجة}</span>
                  </h4>
                </div>
                <div class="col col-subject-vote">
                  <a href="voting.php" class="btn-basic">تصويت</a>
                  <button class="btn-basic subject-details-btn">
                    تفاصيل الموضوع
                  </button>
                </div>
              </div>

              <div class="current-subject-details deactive">
                <div class="row">
                  <div class="col">
                    <p>
                      محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد
                      محمد محمد محمد محمد محمد محمد محمد محم
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!--   بقية محتوي الصفحة و بيتغير علي اساس في مواضيع ولا لا-->
            <!-- add deactive here to test  -->
            <div class="current-subject-foradmin">

              <!--  و لسة مفيش مواضيع في المجلس الحالي- -->

              <main id="empty" class="empty-current-subject">
                <h4>لا يوجد مواضيع الان</h4>
              </main>

              <!--لو في مواضيع -->
              <!-- موضوع رقم 1 -->
              <div class="box">
                <div class="row">
                  <div class="col">
                    <h4>رقم الموضوع:<span>{1}</span></h4>
                    <h4>
                      تصنيف الموضوع:
                      <span>
                        { مهم}
                      </span>
                    </h4>
                    <h4>
                      عنوان
                      الموضوع:<span>{ محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد
                        محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد }</span>
                    </h4>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <a href="#" class="btn-basic">اضافة قرار</a>

                  </div>

                  <div class="col">
                    <a href="#" class="btn-basic">تعديل قرار</a>

                  </div>

                  <div class="col">
                    <button class="btn-basic subject-details-btn">
                      تفاصيل الموضوع
                    </button>
                  </div>
                  <div class="col">
                    <a href="#" class="btn-basic">تعديل الموضوع</a>

                  </div>
                  <div class="col">
                    <button class="btn-basic">حذف</button>
                  </div>
                </div>
                <div class="current-subject-details deactive">
                  <div class="row">
                    <div class="col">
                      <p>{ محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد
                        محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد }</p>
                    </div>
                  </div>

                </div>
              </div>
              <!-- موضوع رقم 2 -->
              <div class="box">
                <div class="row">
                  <div class="col">
                    <h4>رقم الموضوع:<span>{1}</span></h4>
                    <h4>
                      تصنيف الموضوع:
                      <span>
                        { مهم}
                      </span>
                    </h4>
                    <h4>
                      عنوان
                      الموضوع:<span>{ محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد
                        محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد }</span>
                    </h4>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <a href="#" class="btn-basic">اضافة قرار</a>

                  </div>

                  <div class="col">
                    <a href="#" class="btn-basic">تعديل قرار</a>

                  </div>

                  <div class="col">
                    <button class="btn-basic subject-details-btn">
                      تفاصيل الموضوع
                    </button>
                  </div>
                  <div class="col">
                    <a href="#" class="btn-basic">تعديل الموضوع</a>

                  </div>
                  <div class="col">
                    <button class="btn-basic">حذف</button>
                  </div>
                </div>
                <div class="current-subject-details deactive">
                  <div class="row">
                    <div class="col">
                      <p>{ محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد
                        محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد }</p>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- اضافة موضوع جديد-->
        <!-- For Admins Only -->
        <div class="add-current-subject">
          <a href="#" class="btn-basic">اضافة موضوع</a>
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