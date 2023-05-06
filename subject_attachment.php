<?php
require_once "db.php";
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
    Head("مرفقات الموضوعات");
    ?>

<body dir="rtl">
  <?php
        Headers();
        Nav();
        ?>


  <main class="attachment-content">
    <div class="container">
      <!-- عنوان الصفحة -->
      <div class="title">
        <h1>المرفقات الخاصة بموضوع رقم {2}</h1>
      </div>

      <main id="empty" class="empty deactive">
        <h4>لا يوجد ملفات الان</h4>
      </main>

      <div class="attatchement-box">
        <div class="col">
          <a href="#">مرفق مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1 1</a>
          <!-- this is not delete button -->
          <button data-open-modal class="btn-basic">حذف</button>
          <dialog data-modal>
            <h4>هل حقا تريد مسح الملف 1</h4>
            <form>
              <!-- this is the delete code -->
              <button class="btn-basic">نعم</button>
              <button type="submit" formmethod="dialog" class="btn-basic">لا</button>
            </form>
          </dialog>
        </div>
        <div class="col">
          <a href="#">مرفق مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1 1</a>
          <button data-open-modal class="btn-basic">حذف</button>
          <dialog data-modal>
            <h4>هل حقا تريد حذف الملف 2</h4>
            <form>
              <button class="btn-basic">نعم</button>
              <button type="submit" formmethod="dialog" class="btn-basic">لا</button>
            </form>
          </dialog>
        </div>
        <div class="col">
          <a href="#">مرفق مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1مرفق 1 1</a>
          <button data-open-modal class="btn-basic">حذف</button>
          <dialog data-modal>
            <h4>هل حقا تريد مسح الملف 3</h4>
            <form>
              <button class="btn-basic">نعم</button>
              <button type="submit" formmethod="dialog" class="btn-basic">لا</button>
            </form>
          </dialog>
        </div>


      </div>


    </div>



    <!-- اضافة ملف -->
    <div class="upload add-attachment-subject">
      <div class="btn-basic">
        <label for="up1">
          رفع مرفق
          <i class="fa-solid fa-upload"></i>
          <input id="up1" type="file" class="upload-button" multiple />
        </label>
      </div>
      <div class="file-list"></div>
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