<?php
require_once "db.php";
require_once "functions.php";
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
			.
			<div class="container">
				<!-- عنوان الصفحة -->
				<div class="decision-title"><h1>القرارات التنفيذية</h1></div>
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
							<h4>
								صيغة القرار:<span class="decision-format"
									>الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج
									الجديدة لمرحلة البكالوريوس ببرنامجي BIS و FMI بكلية التجارة
									وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</span
								>
							</h4>
						</div>
						<div class="decision-buttons">
							<div class="row">
								<button class="btn-basic dec-details-btn">تفاصيل القرار</button>
								<div class="decision-desc deactive">
									<h4>القرار خاص بالتشكيل رقم : 2</h4>
									<h4>و خاص بالمجلس رقم : 4</h4>
									<h4>رقم الموضوع المتعلق بالقرار : 5</h4>
								</div>
							</div>
							<form action="">
								<div class="row">
									<div class="col">
										<h3>تم تنفيذه</h3>
										<input type="radio" name="excecuted" checked />
									</div>
									<div class="col">
										<h3>لم يتم تنفيذه بعد</h3>
										<input type="radio" name="excecuted" />
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
							<h4>
								صيغة القرار:<span class="decision-format"
									>الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج
									الجديدة لمرحلة البكالوريوس ببرنامجي BIS و FMI بكلية التجارة
									وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</span
								>
							</h4>
						</div>
						<div class="decision-buttons">
							<div class="row">
								<button class="btn-basic dec-details-btn">تفاصيل القرار</button>
								<div class="decision-desc deactive">
									<h4>القرار خاص بالتشكيل رقم : 2</h4>
									<h4>و خاص بالمجلس رقم : 4</h4>
									<h4>رقم الموضوع المتعلق بالقرار : 5</h4>
								</div>
							</div>
							<form action="">
								<div class="row">
									<div class="col">
										<h3>تم تنفيذه</h3>
										<input type="radio" name="excecuted" checked />
									</div>
									<div class="col">
										<h3>لم يتم تنفيذه بعد</h3>
										<input type="radio" name="excecuted" />
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
							<h4>
								صيغة القرار:<span class="decision-format"
									>الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج
									الجديدة لمرحلة البكالوريوس ببرنامجي BIS و FMI بكلية التجارة
									وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</span
								>
							</h4>
						</div>
						<div class="decision-buttons">
							<div class="row">
								<button class="btn-basic dec-details-btn">تفاصيل القرار</button>
								<div class="decision-desc deactive">
									<h4>القرار خاص بالتشكيل رقم : 2</h4>
									<h4>و خاص بالمجلس رقم : 4</h4>
									<h4>رقم الموضوع المتعلق بالقرار : 5</h4>
								</div>
							</div>
							<form action="">
								<div class="row">
									<div class="col">
										<h3>تم تنفيذه</h3>
										<input type="radio" name="excecuted" checked />
									</div>
									<div class="col">
										<h3>لم يتم تنفيذه بعد</h3>
										<input type="radio" name="excecuted" />
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
							<h4>
								صيغة القرار:<span class="decision-format"
									>الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج
									الجديدة لمرحلة البكالوريوس ببرنامجي BIS و FMI بكلية التجارة
									وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</span
								>
							</h4>
						</div>
						<div class="decision-buttons">
							<div class="row">
								<button class="btn-basic dec-details-btn">تفاصيل القرار</button>
								<div class="decision-desc deactive">
									<h4>القرار خاص بالتشكيل رقم : 2</h4>
									<h4>و خاص بالمجلس رقم : 4</h4>
									<h4>رقم الموضوع المتعلق بالقرار : 5</h4>
								</div>
							</div>
							<form action="">
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
							<h4>
								صيغة القرار:<span class="decision-format"
									>الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج
									الجديدة لمرحلة البكالوريوس ببرنامجي BIS و FMI بكلية التجارة
									وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</span
								>
							</h4>
						</div>
						<div class="decision-buttons">
							<div class="row">
								<button class="btn-basic dec-details-btn">تفاصيل القرار</button>
								<div class="decision-desc deactive">
									<h4>القرار خاص بالتشكيل رقم : 2</h4>
									<h4>و خاص بالمجلس رقم : 4</h4>
									<h4>رقم الموضوع المتعلق بالقرار : 5</h4>
								</div>
							</div>
							<form action="">
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
							<h4>
								صيغة القرار:<span class="decision-format"
									>الموافقة على تعديل مدة الامتحان التحرير لمقررات البرامج
									الجديدة لمرحلة البكالوريوس ببرنامجي BIS و FMI بكلية التجارة
									وادارة الاعمال لتكون ساعتين فقط بدلا من 3 ساعات</span
								>
							</h4>
						</div>
						<div class="decision-buttons">
							<div class="row">
								<button class="btn-basic dec-details-btn">تفاصيل القرار</button>
								<div class="decision-desc deactive">
									<h4>القرار خاص بالتشكيل رقم : 2</h4>
									<h4>و خاص بالمجلس رقم : 4</h4>
									<h4>رقم الموضوع المتعلق بالقرار : 5</h4>
								</div>
							</div>
							<form action="">
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
		<footer>
			<p>جميع الحقوق محفوظة &copy; لدى فريق رقم 39 Bis Seniors 2023</p>
		</footer>

		<!-- Js Scripts and Plugins -->
		<script type="module" src="./js/main.js"></script>

		<!-- font Awesome -->
		<script
			src="https://kit.fontawesome.com/eb7dada2f7.js"
			crossorigin="anonymous"
		></script>
	</body>
</html>
