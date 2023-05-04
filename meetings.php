<?php
require_once "db.php";
require_once "functions.php";

if(session_status() === PHP_SESSION_NONE)
{
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
Head("المجالس");
?>

<body dir="rtl">
  <?php
    Headers();
    if (is_logged_in()):
        Nav();
        ?>
  <!-- *Main Meetings Page Content  -->
  <main id="admin" class="meetings-content">
    <div class="container">
      <div class='meetings-title'>
        <h1>المجالس</h1>
      </div>
      <?php
                # Retrieve Formation IDs of the user currently signed in
                $user_formation_ids_stmt = $conn->prepare("SELECT formation_id FROM p39_formation_user WHERE user_id = ?");
                $user_formation_ids_stmt->bind_param("i", $_SESSION["user_id"]);
                $user_formation_ids_stmt->execute();
                $user_formation_ids_result = $user_formation_ids_stmt->get_result();
                $user_formation_ids = array();
                while ($user_formation_ids_row = $user_formation_ids_result->fetch_assoc())
                {
	                $user_formation_ids[] = $user_formation_ids_row["formation_id"];
                }
                if (!isset($_GET["search"])):
                  // $meetings_stmt = $conn->prepare("SELECT * FROM p39_meeting WHERE formation_id = ? ORDER BY is_current desc");
                    $current_meeting_stmt = $conn->prepare("SELECT * FROM p39_meeting WHERE is_current = 1");
                    $current_meeting_stmt->execute();
                    $current_meeting_result = $current_meeting_stmt->get_result();
                    ?>
      <div class="current-meeting">
        <h3>المجلس الحالي</h3>
      </div>
      <?php
                    # Check if there are current meetings
                    if ($current_meeting_result->num_rows > 0)
                    {
                        while ($current_meeting_row = $current_meeting_result->fetch_assoc())
                        {
                            switch ($current_meeting_row["status"])
                            {
                                # CASE (Meeting is Current & Pending)
                                case "pending":
                                    # CASE ADMIN (Meeting is Current & Pending)
                                    if ($_SESSION["admin"])
                                    {
                                        # Show the meeting to admin
                                        ?>
      <div class="meeting-box">
        <div class="row">
          <div class="col">
            <h4>رقم المجلس:
              <span class="meeting-number">
                <?=$current_meeting_row["meeting_number"]?>
              </span>
            </h4>
            <h4>
              رقم تشكيل المجلس:
              <span class="meeting-formation-number">
                <?=$current_meeting_row["formation_id"]?>
              </span>
            </h4>
            <h4>
              بتاريخ:
              <span class="meeting-month">
                <?=$current_meeting_row["meeting_month"]?>
              </span>
              /
              <span class="meeting-year">
                <?=$current_meeting_row["meeting_year"]?>
              </span>
            </h4>
            <h4>
              حالة المجلس: غير مؤكد
            </h4>
          </div>
          <div class="col">
            <form method="post" action="meeting_status.php">
              <input type="hidden" name="meeting_id" value="<?=$current_meeting_row['meeting_id']?>">
              <button class="btn-basic" name="confirm_btn">
                تأكيد
                <i class="fa-solid fa-check"></i>
              </button>
            </form>
          </div>
        </div>
        <div class="current-meeting-buttons">
          <form method="post" action="current_meeting_subject.php" class="current-meeting-buttons">
            <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="meeting_id">
            <button class="btn-basic" name="current_meeting_subjects">الموضوعات الخاصة بالمجلس</button>
          </form>
          <a href="#" class="btn-basic">تعديل</a>
          <button class="btn-basic disabled" disabled>تسجيل الحضور</button>
          <button class="btn-basic disabled" disabled>التقارير</button>
          <button class="btn-basic disabled" disabled>
            رفع ملف المجلس الموثق
          </button>
        </div>
      </div>
      <?php
                                    }
                                    # CASE USER (Meeting is Current & Pending)
                                    else
                                    {
                                        # Hide Meeting from the user
                                        ?>
      <div class="current-meeting">
        <main id="empty" class="empty-meeting">
          <h4>لا يوجد مجلس حالي الان</h4>
        </main>
      </div>
      <?php
                                    }
                                    break;

                                # CASE (Meeting is Current & Confirmed)
                                case "confirmed":
                                    # Show Meeting to everyone
                                    ?>
      <div class="current-meeting">
        <div class="meeting-box">
          <div class="row">
            <div class="col">
              <h4>رقم المجلس:
                <span class="meeting-number">
                  <?=$current_meeting_row["meeting_number"]?>
                </span>
              </h4>
              <h4>
                رقم تشكيل المجلس:
                <span class="meeting-formation-number">
                  <?=$current_meeting_row["formation_id"]?>
                </span>
              </h4>
              <h4>
                بتاريخ:
                <span class="meeting-month">
                  <?=$current_meeting_row["meeting_month"]?>
                </span>
                /
                <span class="meeting-year">
                  <?=$current_meeting_row["meeting_year"]?>
                </span>
              </h4>
              <h4>
                حالة المجلس: مؤكد
              </h4>
            </div>
            <?php
                                                if($_SESSION["admin"]):
                                                    ?>
            <form method="post" action="meeting_status.php">
              <div class="col">
                <input type="hidden" name="meeting_id" value="<?=$current_meeting_row['meeting_id']?>">
                <button class="btn-basic" name="pending_btn">
                  إلغاء تأكيد
                  <i class="fa-solid fa-check"></i>
                </button>
                <button class="btn-basic" name="past_btn">
                  تحويل لمجلس سابق
                  <i class="fa-solid fa-check"></i>
                </button>
              </div>
            </form>
            <?php
                                                endif;
                                                ?>
          </div>
          <?php
                                            if($_SESSION["admin"]):
                                                # Current Meeting Buttons for ADMIN
                                                ?>
          <div class="current-meeting-buttons">
            <form method="post" action="current_meeting_subject.php" class="current-meeting-buttons">
              <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="meeting_id">
              <button class="btn-basic" name="current_meeting_subjects">الموضوعات الخاصة بالمجلس</button>
            </form>
            <a href="#" class="btn-basic">تعديل</a>
            <a href="#" class="btn-basic">تسجيل الحضور</a>
            <a href="#" class="btn-basic">التقارير</a>
            <button class="btn-basic">
              رفع ملف المجلس الموثق
            </button>
          </div>
          <?php
                                            else:
                                                # Current Meeting Buttons for USER
                                                ?>
          <div class="current-meeting-buttons">
            <form method="post" action="current_meeting_subject.php">
              <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="meeting_id">
              <button class="btn-basic" name="current_meeting_subjects">الموضوعات الخاصة بالمجلس</button>
            </form>
            <a href="#" class="btn-basic">عرض الموضوعات بالقرار</a>
            <a href="#" class="btn-basic">عرض ملف جدول الاعمال</a>
            <button class="btn-basic disabled" disabled>عرض ملف المجلس النهائي</button>
          </div>
          <?php
                                            endif;
                                            ?>
        </div>
      </div>
      <?php
                                    break;

	                            # CASE (Meeting is Current & Finished)
	                            case "finished":
		                            # Show Meeting to everyone
		                            ?>
      <div class="current-meeting">
        <div class="meeting-box">
          <div class="row">
            <div class="col">
              <h4>رقم المجلس:
                <span class="meeting-number">
                  <?=$current_meeting_row["meeting_number"]?>
                </span>
              </h4>
              <h4>
                رقم تشكيل المجلس:
                <span class="meeting-formation-number">
                  <?=$current_meeting_row["formation_id"]?>
                </span>
              </h4>
              <h4>
                بتاريخ:
                <span class="meeting-month">
                  <?=$current_meeting_row["meeting_month"]?>
                </span>
                /
                <span class="meeting-year">
                  <?=$current_meeting_row["meeting_year"]?>
                </span>
              </h4>
              <h4>
                حالة المجلس: منتهي
              </h4>
            </div>
            <?php
					                            if($_SESSION["admin"]):
						                            ?>
            <div class="col">
              <button class="btn-basic" name="past_btn">
                تحويل لمجلس سابق
                <i class="fa-solid fa-check"></i>
              </button>
            </div>
            <?php
					                            endif;
					                            ?>
          </div>
          <?php
				                            if($_SESSION["admin"]):
					                            # Current Meeting Buttons for ADMIN
					                            ?>
          <div class="current-meeting-buttons">
            <form method="post" action="current_meeting_subject.php">
              <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="meeting_id">
              <button class="btn-basic" name="current_meeting_subjects">الموضوعات الخاصة بالمجلس</button>
            </form>
            <a href="#" class="btn-basic">تسجيل الحضور</a>
            <a href="#" class="btn-basic">التقارير</a>
            <a href="#" class="btn-basic">تعديل</a>
            <button class="btn-basic">
              رفع ملف المجلس الموثق
            </button>
          </div>
          <?php
				                            else:
					                            # Current Meeting Buttons for USER
					                            ?>
          <div class="current-meeting-buttons">
            <form method="post" action="current_meeting_subject.php">
              <input type="hidden" value="<?=$current_meeting_row['meeting_id']?>" name="meeting_id">
              <button class="btn-basic" name="current_meeting_subjects">الموضوعات الخاصة بالمجلس</button>
            </form>
            <a href="#" class="btn-basic">عرض الموضوعات بالقرار</a>
            <a href="#" class="btn-basic">عرض ملف جدول الاعمال</a>
            <button class="btn-basic">عرض ملف المجلس النهائي</button>
          </div>
          <?php
				                            endif;
				                            ?>
        </div>
      </div>
      <?php
		                            break;
                            }
                        }
                        ?>
      <?php
                    }
                    else
                    {
                        ?>
      <div class='meeting-box'>
        <main id='empty' class='empty-meeting'>
          <h4>لا يوجد مجلس حالي الان</h4>
        </main>
      </div>
      <?php
                    }

                    $past_meetings_stmt = $conn->prepare("SELECT * FROM p39_meeting WHERE is_current = 0");
                    $past_meetings_stmt->execute();
                    $past_meetings_result = $past_meetings_stmt->get_result();
                    ?>
      <!-- المجالس السابقة -->
      <div class="old-meetings">
        <?php
                        # Check if there are past meetings
                        if ($past_meetings_result->num_rows > 0)
                        {
                            ?>
        <h3>المجالس السابقة</h3>
        <?php
                            while ($past_meetings_row = $past_meetings_result->fetch_assoc())
                            {
                                /* Check if the user exists in the formation of this meeting and is allowed to view it,
                                 * and if not skip that meeting
                                 * */
                                if (!in_array($past_meetings_row["formation_id"], $user_formation_ids))
                                {
                                    continue;
                                }
                                # CASE (Meeting is NOT Current)
                                ?>
        <div class="old-meeting-box">
          <div class="row">
            <div class="col">
              <h4>
                رقم المجلس:
                <span class="meeting-number">
                  <?=$past_meetings_row["meeting_number"]?>
                </span>
              </h4>
              <h4>
                رقم تشكيل المجلس:
                <span class="meeting-formation-number">
                  <?=$past_meetings_row["formation_id"]?>
                </span>
              </h4>
              <h4>
                بتاريخ:
                <span class="meeting-month">
                  <?=$past_meetings_row["meeting_month"]?>
                </span>
                /
                <span class="meeting-year">
                  <?=$past_meetings_row["meeting_year"]?>
                </span>
              </h4>
            </div>
            <?php
                                        if($_SESSION["admin"]):
                                            ?>
            <div class="col">
              <a href="#" class="btn-basic">التقارير</a>
              <button class="btn-basic">
                رفع ملف المجلس الموثق
              </button>
            </div>
            <?php
                                        else:
                                            ?>
            <div class="col">
              <a href="#" class="btn-basic">عرض ملف المجلس النهائي</a>
              <a href="#" class="btn-basic">عرض الموضوعات بالقرار</a>
            </div>
            <?php
                                        endif;
                                        ?>
          </div>
        </div>
        <?php
                            }
                        }
//                        else
//                        {
//	                        ?>
        <!--                            <div class='old-meeting-box'>-->
        <!--                                <main id='empty' class='empty-meeting'>-->
        <!--                                    <h4>لا يوجد مجالس سابقة</h4>-->
        <!--                                </main>-->
        <!--                            </div>-->
        <!--	                        --><?php
//                        }
                        ?>
      </div>
    </div>
    <?php
                    if (@$_SESSION["admin"]):
                        # Add New Members
                        ?>
    <div class="add-meeting">
      <a href="#" class="btn-basic">اضافة مجلس جديد</a>
    </div>
    <?php
                    endif;
                else:
                    $search = $_GET["search"];
            //      $search_query = "SELECT * FROM p39_meeting WHERE formation_id LIKE %";
            //      $search_query .= $_POST["search"] . "%";
                    $search_stmt = $conn->prepare("SELECT * FROM p39_meeting WHERE formation_id LIKE '%$search%' and status not in ('pending')");
                    $search_stmt->execute();
                    $search_result = $search_stmt->get_result();
                    if ($search_result->num_rows > 0)
                    {
                        while ($search_row = $search_result->fetch_assoc())
                        {
	                        /* Check if the user exists in the formation of this meeting and is allowed to view it,
								* and if not skip that meeting
								* */
	                        if (!in_array($search_row["formation_id"], $user_formation_ids))
	                        {
		                        ?>
    <div class='current-meeting'>
      <main id='empty' class='empty-meeting'>
        <h4>عذرًا، لا يوجد مجالس بهذا الرقم</h4>
      </main>
    </div>
    <?php
                                break;
	                        }
                            ?>
    <div class="old-meeting-box">
      <div class="row">
        <div class="col">
          <h4>
            رقم المجلس:
            <span class="meeting-number">
              <?=$search_row["meeting_number"]?>
            </span>
          </h4>
          <h4>
            رقم تشكيل المجلس:
            <span class="meeting-formation-number">
              <?=$search_row["formation_id"]?>
            </span>
          </h4>
          <h4>
            بتاريخ:
            <span class="meeting-month">
              <?=$search_row["meeting_month"]?>
            </span>
            /
            <span class="meeting-year">
              <?=$search_row["meeting_year"]?>
            </span>
          </h4>
          <h4>
            حالة المجلس:
            <span>
              <?=$search_row["status"] == "confirmed"
                                                    ? "مؤكد"
                                                    : "منتهي"?>
            </span>
          </h4>
        </div>
        <?php
                                    if($_SESSION["admin"]):
                                        ?>
        <div class="col">
          <a href="#" class="btn-basic">التقارير</a>
          <button class="btn-basic">
            رفع ملف المجلس الموثق
          </button>
        </div>
        <?php
                                    else:
                                        ?>
        <div class="col">
          <a href="#" class="btn-basic">عرض ملف المجلس النهائي</a>
          <a href="#" class="btn-basic">عرض الموضوعات بالقرار</a>
        </div>
        <?php
                                    endif;
                                    ?>
      </div>
    </div>
    <?php
                        }
                    }
                    else
                    {
                        ?>
    <div class='current-meeting'>
      <main id='empty' class='empty-meeting'>
        <h4>عذرًا، لا يوجد مجالس بهذا الرقم</h4>
      </main>
    </div>
    <?php
                    }
                endif;
                ?>
  </main>
  <?php
    endif;
    Footer();
    ?>

  <!-- Js Scripts and Plugins -->
  <script type="module" src="./js/main.js"></script>

  <!-- font Awesome -->
  <script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>