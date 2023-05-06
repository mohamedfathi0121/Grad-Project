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
        if (isset($_POST["current_meeting_subjects"]))
        {
            Nav();
            ?>
  <main class="current-subject-content">
    <div class="container">
      <!-- عنوان الصفحة -->
      <div class="title">
        <h1>موضوعات المجلس الحالي</h1>
      </div>
      <?php
            $subject_types_stmt = $conn->prepare("SELECT * FROM p39_subject_type");
            $subject_types_stmt->execute();
            $subject_types_result = $subject_types_stmt->get_result();
            $subject_types = array();
            while ($subject_types_row = $subject_types_result->fetch_assoc())
            {
                $subject_types[$subject_types_row["subject_type_id"]] = $subject_types_row["subject_type_name"];
            }
            $subject_types_stmt->close();

	        if (!isset($_GET["search"]))
            {
                $current_subjects_stmt = $conn->prepare("SELECT * FROM p39_subject WHERE meeting_id = ? ORDER BY order_id");
                $current_subjects_stmt->bind_param("i", $_POST["meeting_id"]);
                $current_subjects_stmt->execute();
                $current_subjects_result = $current_subjects_stmt->get_result();
                if ($current_subjects_result->num_rows > 0)
                {
                    while ($current_subjects_row = $current_subjects_result->fetch_assoc())
                    {
                        ?>
      <!--member appearance  -->
      <!--   بقية محتوي الصفحة و بيتغير علي اساس هو المجلس اتوثق ولا لا-->
      <!-- add deactive here to test  -->
      <div class="current-subject-foradmin">
        <div class="box">
          <div class="row">
            <div class="col">
              <h4>
                ترتيب الموضوع:
                <span>
                  <?=$current_subjects_row["order_id"]?>
                </span>
              </h4>
              <h4>
                رقم الموضوع:
                <span>
                  <?=$current_subjects_row["subject_number"]?>
                </span>
              </h4>
              <h4>
                تصنيف الموضوع:
                <span>
                  <?=$subject_types[$current_subjects_row["subject_type_id"]]?>
                </span>
              </h4>
              <h4>
                عنوان الموضوع:
                <span>
                  <?=$current_subjects_row["subject_name"]?>
                </span>
              </h4>
            </div>

            <?php
                                      if (!$_SESSION["admin"])
                                      {
                                          ?>
            <div class="col col-subject-vote">
              <a href="voting.php" class="btn-basic">
                تصويت
              </a>
              <button class="btn-basic subject-details-btn">
                تفاصيل الموضوع
              </button>
            </div>
          </div>
          <?php
                                      }
                                      else
                                      {
                                          ?>
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

        </div>
        <?php
                                      }
                                      ?>
        <div class="current-subject-details deactive">
          <div class="row">
            <div class="col">
              <p>
                تفاصيل الموضوع:
                <?=$current_subjects_row["subject_details"]?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
                    }
                }
                else
                {
                    ?>

    <main id="empty" class="empty-current-subject">
      <h4>لا يوجد مواضيع الان</h4>
    </main>
    </div>
    <?php
                }
                if ($_SESSION["admin"])
                {
                    ?>
    </div>
    <div class="add-current-subject">
      <a href="#" class="btn-basic">اضافة موضوع</a>
    </div>
    <?php
                }
            }
        }
        else
        {
            echo "<p style='color: red; text-align: center; font-weight: bold'>
                    You need to enter from the meetings page</p>";
            header("refresh:5; url=meetings.php");
        }
            ?>
    <!--                <div class="col col-subject-vote">-->
    <!--                  <a href="voting.php" class="btn-basic">تصويت</a>-->
    <!--                  <button class="btn-basic subject-details-btn">-->
    <!--                    تفاصيل الموضوع-->
    <!--                  </button>-->
    <!--                </div>-->
    <!--              </div>-->
    <!---->
    <!--              <div class="current-subject-details deactive">-->
    <!--                <div class="row">-->
    <!--                  <div class="col">-->
    <!--                    <p>{ محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد-->
    <!--                      محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد }</p>-->
    <!--                  </div>-->
    <!--                </div>-->
    <!--              </div>-->
    <!--            </div>-->
    <!--  موضوع 2-->
    <!--            <div class="box">-->
    <!--              <div class="row">-->
    <!--                <div class="col">-->
    <!--                  <h4>رقم الموضوع:<span>{1}</span>-->
    <!--                  </h4>-->
    <!--                  <h4>-->
    <!--                    تصنيف الموضوع:-->
    <!--                    <span>-->
    <!--                      { مهم}-->
    <!--                    </span>-->
    <!--                  </h4>-->
    <!--                  <h4>-->
    <!--                    عنوان الموضوع:<span>{اي حاجة}</span>-->
    <!--                  </h4>-->
    <!--                </div>-->
    <!--                <div class="col col-subject-vote">-->
    <!--                  <a href="voting.php" class="btn-basic">تصويت</a>-->
    <!--                  <button class="btn-basic subject-details-btn">-->
    <!--                    تفاصيل الموضوع-->
    <!--                  </button>-->
    <!--                </div>-->
    <!--              </div>-->
    <!---->
    <!--              <div class="current-subject-details deactive">-->
    <!--                <div class="row">-->
    <!--                  <div class="col">-->
    <!--                    <p>-->
    <!--                      محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد-->
    <!--                      محمد محمد محمد محمد محمد محمد محمد محم-->
    <!--                    </p>-->
    <!--                  </div>-->
    <!--                </div>-->
    <!--              </div>-->
    <!--            </div>-->
    <!--   بقية محتوي الصفحة و بيتغير علي اساس في مواضيع ولا لا-->
    <!-- add deactive here to test  -->
    <!--            <div class="current-subject-foradmin">-->
    <!---->
    <!--  و لسة مفيش مواضيع في المجلس الحالي- -->
    <!---->
    <!--              <main id="empty" class="empty-current-subject">-->
    <!--                <h4>لا يوجد مواضيع الان</h4>-->
    <!--              </main>-->
    <!---->
    <!--لو في مواضيع -->
    <!-- موضوع رقم 1 -->
    <!--              <div class="box">-->
    <!--                <div class="row">-->
    <!--                  <div class="col">-->
    <!--                    <h4>رقم الموضوع:<span>{1}</span></h4>-->
    <!--                    <h4>-->
    <!--                      تصنيف الموضوع:-->
    <!--                      <span>-->
    <!--                        { مهم}-->
    <!--                      </span>-->
    <!--                    </h4>-->
    <!--                    <h4>-->
    <!--                      عنوان-->
    <!--                      الموضوع:<span>{ محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد-->
    <!--                        محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد }</span>-->
    <!--                    </h4>-->
    <!--                  </div>-->
    <!--                </div>-->
    <!---->
    <!--                <div class="row">-->
    <!--                  <div class="col">-->
    <!--                    <a href="#" class="btn-basic">اضافة قرار</a>-->
    <!---->
    <!--                  </div>-->
    <!---->
    <!--                  <div class="col">-->
    <!--                    <a href="#" class="btn-basic">تعديل قرار</a>-->
    <!---->
    <!--                  </div>-->
    <!---->
    <!--                  <div class="col">-->
    <!--                    <button class="btn-basic subject-details-btn">-->
    <!--                      تفاصيل الموضوع-->
    <!--                    </button>-->
    <!--                  </div>-->
    <!--                  <div class="col">-->
    <!--                    <a href="#" class="btn-basic">تعديل الموضوع</a>-->
    <!---->
    <!--                  </div>-->
    <!--                  <div class="col">-->
    <!--                    <button class="btn-basic">حذف</button>-->
    <!--                  </div>-->
    <!--                </div>-->
    <!--                <div class="current-subject-details deactive">-->
    <!--                  <div class="row">-->
    <!--                    <div class="col">-->
    <!--                      <p>{ محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد-->
    <!--                        محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد }</p>-->
    <!--                    </div>-->
    <!--                  </div>-->
    <!---->
    <!--                </div>-->
    <!--              </div>-->
    <!-- موضوع رقم 2 -->
    <!--              <div class="box">-->
    <!--                <div class="row">-->
    <!--                  <div class="col">-->
    <!--                    <h4>رقم الموضوع:<span>{1}</span></h4>-->
    <!--                    <h4>-->
    <!--                      تصنيف الموضوع:-->
    <!--                      <span>-->
    <!--                        { مهم}-->
    <!--                      </span>-->
    <!--                    </h4>-->
    <!--                    <h4>-->
    <!--                      عنوان-->
    <!--                      الموضوع:<span>{ محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد-->
    <!--                        محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد }</span>-->
    <!--                    </h4>-->
    <!--                  </div>-->
    <!--                </div>-->
    <!---->
    <!--                <div class="row">-->
    <!--                  <div class="col">-->
    <!--                    <a href="#" class="btn-basic">اضافة قرار</a>-->
    <!---->
    <!--                  </div>-->
    <!---->
    <!--                  <div class="col">-->
    <!--                    <a href="#" class="btn-basic">تعديل قرار</a>-->
    <!---->
    <!--                  </div>-->
    <!---->
    <!--                  <div class="col">-->
    <!--                    <button class="btn-basic subject-details-btn">-->
    <!--                      تفاصيل الموضوع-->
    <!--                    </button>-->
    <!--                  </div>-->
    <!--                  <div class="col">-->
    <!--                    <a href="#" class="btn-basic">تعديل الموضوع</a>-->
    <!---->
    <!--                  </div>-->
    <!--                  <div class="col">-->
    <!--                    <button class="btn-basic">حذف</button>-->
    <!--                  </div>-->
    <!--                </div>-->
    <!--                <div class="current-subject-details deactive">-->
    <!--                  <div class="row">-->
    <!--                    <div class="col">-->
    <!--                      <p>{ محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد-->
    <!--                        محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد محمد }</p>-->
    <!--                    </div>-->
    <!--                  </div>-->
    <!---->
    <!--                </div>-->
    <!--              </div>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
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