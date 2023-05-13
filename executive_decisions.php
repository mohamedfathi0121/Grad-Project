<?php
require_once "db.php";
require_once "functions.php";

if (session_status() === PHP_SESSION_NONE)
{
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
    Head("القرارات التنفيذية");
    ?>

<body dir="rtl">
  <?php
        Headers();
        Nav();
        ?>
  <main class="exec-decision-content">

    <div class="container">
      <!-- عنوان الصفحة -->
      <div class="decision-title">
        <h1>القرارات التنفيذية</h1>
      </div>
      <!-- الفلتر للصفحة -->
      <div class="decision-filter">
        <div class="row">
          <button class="btn-basic">عرض جميع القرارات{عددهم}</button>
          <button class="btn-basic">عرض القرارات المنفذة فقط {عددهم}</button>
          <button class="btn-basic">
            عرض القرارات الغير منفذة فقط {عددهم}
          </button>
        </div>
      </div>
      <!-- لو مفيش قرارات -->
      <!-- *Add "deactive" to Class Here ↓↓ To Test-->
      <main id="empty" class="empty-meeting deactive">
        <h4>لا يوجد قرارات حاليا</h4>
      </main>

      <!-- القرارات المنفذة -->
      <div class="excecuted-dec">
        <h3>القرارات المنفذة</h3>
        <!-- لو في قرارات -->
        <!-- *Add "deactive" to Class Here ↓↓ To Test-->
        <div class="decision-box">
          <div class="row">
            <div class="col">
              <h4>مجلس رقم {2} بالتشكيل رقم {4} بتاريخ {22/5/2023}</h4>
              <h4>رقم الموضوع {2}</h4>
              <h4>عنوان الموضوع: عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان
                عنوان عنوان عنوان </h4>
              <h4>
                صيغة القرار:<span class="decision-format">
                  الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج
                  الجديدة لمرحلة البكالوريوس ببرنامجي BIS و FMI بكلية التجارة
                  وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</span>
              </h4>
            </div>
          </div>


          <div class="decision-buttons">
            <div class="row">
              <div class="col">
                <button class="btn-basic dec-details-btn">تفاصيل القرار</button>


              </div>
              <div class="col">
                <button class="btn-basic dec-status-btn">حالة تنفيذه</button>
              </div>
            </div>
            <div class="decision-desc deactive">
              <div class="table-container">
                <table class="subjects-table">
                  <tbody>
                    <tr class="subject-row">
                      <td>الموضوع (1)</td>
                      <td>
                        <p>اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI</p>
                        <img src="" alt="">
                      </td>
                    </tr>
                    <tr class="decision-row">
                      <td>القرار</td>
                      <td>
                        <p>الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج الجديدة لمرحلة البكالوريوس ببرنامجي
                          BIS و FMI
                          بكلية التجارة وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <form action="" class="decision-status deactive">
              <div class="row">
                <div class="col">
                  <h3>تم تنفيذه</h3>
                  <input type="radio" name="excecuted" />
                </div>
                <div class="col">
                  <h3>لم يتم تنفيذه بعد</h3>
                  <input type="radio" name="excecuted" checked />
                </div>
              </div>
              <div class="row">
                <button class="btn-basic">تأكيد</button>
              </div>
            </form>
          </div>
        </div>
        <div class="decision-box">
          <div class="row">
            <div class="col">
              <h4>مجلس رقم {2} بالتشكيل رقم {4} بتاريخ {22/5/2023}</h4>
              <h4>رقم الموضوع {2}</h4>
              <h4>عنوان الموضوع: عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان
                عنوان عنوان عنوان </h4>
              <h4>
                صيغة القرار:<span class="decision-format">
                  الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج
                  الجديدة لمرحلة البكالوريوس ببرنامجي BIS و FMI بكلية التجارة
                  وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</span>
              </h4>
            </div>
          </div>


          <div class="decision-buttons">
            <div class="row">
              <div class="col">
                <button class="btn-basic dec-details-btn">تفاصيل القرار</button>


              </div>
              <div class="col">
                <button class="btn-basic dec-status-btn">حالة تنفيذه</button>
              </div>
            </div>
            <div class="decision-desc deactive">
              <div class="table-container">
                <table class="subjects-table">
                  <tbody>
                    <tr class="subject-row">
                      <td>الموضوع (1)</td>
                      <td>
                        <p>اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI</p>
                        <img src="" alt="">
                      </td>
                    </tr>
                    <tr class="decision-row">
                      <td>القرار</td>
                      <td>
                        <p>الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج الجديدة لمرحلة البكالوريوس ببرنامجي
                          BIS و FMI
                          بكلية التجارة وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <form action="" class="decision-status deactive">
              <div class="row">
                <div class="col">
                  <h3>تم تنفيذه</h3>
                  <input type="radio" name="excecuted" />
                </div>
                <div class="col">
                  <h3>لم يتم تنفيذه بعد</h3>
                  <input type="radio" name="excecuted" checked />
                </div>
              </div>
              <div class="row">
                <button class="btn-basic">تأكيد</button>
              </div>
            </form>
          </div>
        </div>
        <div class="decision-box">
          <div class="row">
            <div class="col">
              <h4>مجلس رقم {2} بالتشكيل رقم {4} بتاريخ {22/5/2023}</h4>
              <h4>رقم الموضوع {2}</h4>
              <h4>عنوان الموضوع: عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان
                عنوان عنوان عنوان </h4>
              <h4>
                صيغة القرار:<span class="decision-format">
                  الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج
                  الجديدة لمرحلة البكالوريوس ببرنامجي BIS و FMI بكلية التجارة
                  وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</span>
              </h4>
            </div>
          </div>


          <div class="decision-buttons">
            <div class="row">
              <div class="col">
                <button class="btn-basic dec-details-btn">تفاصيل القرار</button>


              </div>
              <div class="col">
                <button class="btn-basic dec-status-btn">حالة تنفيذه</button>
              </div>
            </div>
            <div class="decision-desc deactive">
              <div class="table-container">
                <table class="subjects-table">
                  <tbody>
                    <tr class="subject-row">
                      <td>الموضوع (1)</td>
                      <td>
                        <p>اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI</p>
                        <img src="" alt="">
                      </td>
                    </tr>
                    <tr class="decision-row">
                      <td>القرار</td>
                      <td>
                        <p>الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج الجديدة لمرحلة البكالوريوس ببرنامجي
                          BIS و FMI
                          بكلية التجارة وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <form action="" class="decision-status deactive">
              <div class="row">
                <div class="col">
                  <h3>تم تنفيذه</h3>
                  <input type="radio" name="excecuted" />
                </div>
                <div class="col">
                  <h3>لم يتم تنفيذه بعد</h3>
                  <input type="radio" name="excecuted" checked />
                </div>
              </div>
              <div class="row">
                <button class="btn-basic">تأكيد</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- القرارات الغير منفذة -->
      <div class="non-executed-dec">
        <h3>القرارات الغير منفذة</h3>

        <div class="decision-box">
          <div class="row">
            <div class="col">
              <h4>مجلس رقم {2} بالتشكيل رقم {4} بتاريخ {22/5/2023}</h4>
              <h4>رقم الموضوع {2}</h4>
              <h4>عنوان الموضوع: عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان
                عنوان عنوان عنوان </h4>
              <h4>
                صيغة القرار:<span class="decision-format">
                  الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج
                  الجديدة لمرحلة البكالوريوس ببرنامجي BIS و FMI بكلية التجارة
                  وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</span>
              </h4>
            </div>
          </div>


          <div class="decision-buttons">
            <div class="row">
              <div class="col">
                <button class="btn-basic dec-details-btn">تفاصيل القرار</button>


              </div>
              <div class="col">
                <button class="btn-basic dec-status-btn">حالة تنفيذه</button>
              </div>
            </div>
            <div class="decision-desc deactive">
              <div class="table-container">
                <table class="subjects-table">
                  <tbody>
                    <tr class="subject-row">
                      <td>الموضوع (1)</td>
                      <td>
                        <p>اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI</p>
                        <img src="" alt="">
                      </td>
                    </tr>
                    <tr class="decision-row">
                      <td>القرار</td>
                      <td>
                        <p>الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج الجديدة لمرحلة البكالوريوس ببرنامجي
                          BIS و FMI
                          بكلية التجارة وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <form action="" class="decision-status deactive">
              <div class="row">
                <div class="col">
                  <h3>تم تنفيذه</h3>
                  <input type="radio" name="excecuted" />
                </div>
                <div class="col">
                  <h3>لم يتم تنفيذه بعد</h3>
                  <input type="radio" name="excecuted" checked />
                </div>
              </div>
              <div class="row">
                <button class="btn-basic">تأكيد</button>
              </div>
            </form>
          </div>
        </div>
        <div class="decision-box">
          <div class="row">
            <div class="col">
              <h4>مجلس رقم {2} بالتشكيل رقم {4} بتاريخ {22/5/2023}</h4>
              <h4>رقم الموضوع {2}</h4>
              <h4>عنوان الموضوع: عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان
                عنوان عنوان عنوان </h4>
              <h4>
                صيغة القرار:<span class="decision-format">
                  الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج
                  الجديدة لمرحلة البكالوريوس ببرنامجي BIS و FMI بكلية التجارة
                  وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</span>
              </h4>
            </div>
          </div>


          <div class="decision-buttons">
            <div class="row">
              <div class="col">
                <button class="btn-basic dec-details-btn">تفاصيل القرار</button>


              </div>
              <div class="col">
                <button class="btn-basic dec-status-btn">حالة تنفيذه</button>
              </div>
            </div>
            <div class="decision-desc deactive">
              <div class="table-container">
                <table class="subjects-table">
                  <tbody>
                    <tr class="subject-row">
                      <td>الموضوع (1)</td>
                      <td>
                        <p>اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI</p>
                        <img src="" alt="">
                      </td>
                    </tr>
                    <tr class="decision-row">
                      <td>القرار</td>
                      <td>
                        <p>الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج الجديدة لمرحلة البكالوريوس ببرنامجي
                          BIS و FMI
                          بكلية التجارة وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <form action="" class="decision-status deactive">
              <div class="row">
                <div class="col">
                  <h3>تم تنفيذه</h3>
                  <input type="radio" name="excecuted" />
                </div>
                <div class="col">
                  <h3>لم يتم تنفيذه بعد</h3>
                  <input type="radio" name="excecuted" checked />
                </div>
              </div>
              <div class="row">
                <button class="btn-basic">تأكيد</button>
              </div>
            </form>
          </div>
        </div>
        <div class="decision-box">
          <div class="row">
            <div class="col">
              <h4>مجلس رقم {2} بالتشكيل رقم {4} بتاريخ {22/5/2023}</h4>
              <h4>رقم الموضوع {2}</h4>
              <h4>عنوان الموضوع: عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان عنوان
                عنوان عنوان عنوان </h4>
              <h4>
                صيغة القرار:<span class="decision-format">
                  الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج
                  الجديدة لمرحلة البكالوريوس ببرنامجي BIS و FMI بكلية التجارة
                  وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</span>
              </h4>
            </div>
          </div>


          <div class="decision-buttons">
            <div class="row">
              <div class="col">
                <button class="btn-basic dec-details-btn">تفاصيل القرار</button>


              </div>
              <div class="col">
                <button class="btn-basic dec-status-btn">حالة تنفيذه</button>
              </div>
            </div>
            <div class="decision-desc deactive">
              <div class="table-container">
                <table class="subjects-table">
                  <tbody>
                    <tr class="subject-row">
                      <td>الموضوع (1)</td>
                      <td>
                        <p>اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI
                          اعتماد جدول امتحانات منتصف الفصل الدراسي الأول للعام الجامعي 2022 -2023 لبرنامجي BIS , FMI</p>
                        <img src="" alt="">
                      </td>
                    </tr>
                    <tr class="decision-row">
                      <td>القرار</td>
                      <td>
                        <p>الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج الجديدة لمرحلة البكالوريوس ببرنامجي
                          BIS و FMI
                          بكلية التجارة وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <form action="" class="decision-status deactive">
              <div class="row">
                <div class="col">
                  <h3>تم تنفيذه</h3>
                  <input type="radio" name="excecuted" />
                </div>
                <div class="col">
                  <h3>لم يتم تنفيذه بعد</h3>
                  <input type="radio" name="excecuted" checked />
                </div>
              </div>
              <div class="row">
                <button class="btn-basic">تأكيد</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php
        Footer();
        ?>

  <!-- Js Scripts and Plugins -->
  <script type="module" src="./js/main.js"></script>

  <!-- font Awesome -->
  <script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>