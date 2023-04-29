<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>المجالس</title>
		<!-- Css  -->
		<!-- Css Components and Initialize Styles  -->
		<link rel="stylesheet" href="css/initialize.css" />
		<!-- Your Css Here  -->
		<link rel="stylesheet" href="css/style.css" />
		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
	</head>
	<body dir="rtl">
		<header>
			<img class="logo" src="./images/faculty logo.png" alt="" />
			<div class="header-title">
				<h3 class="univ-name">جامعة حلوان</h3>
				<h4 class="facu-name">كلية التجارة وإدارة الأعمال</h4>
				<h4 class="prog-name">برنامج نظم معلومات الأعمال BIS</h4>
				<h1 class="project-title">
					النظام الالكتروني لإدارة موضوعات مجلس الكلية
				</h1>
			</div>
			<img class="logo" src="./images/program logo.png" alt="" />
		</header>
		<!-- } -->
		<section class="nav-bar">
			<nav>
				<ul>
					<a class="icon" href="#"><i class="fa-solid fa-bars fa-2xl"></i></a>
					<div class="links deactive">
						<li><a href="index.php">الصفحة الرئيسية</a></li>
						<li><a href="meetings.html">المجالس</a></li>
						<li><a href="members.php">الاعضاء</a></li>
						<li><a href="subjects.php">الموضوعات</a></li>
						<li><a href="executive-decisions.php"> القرارات التنفيذية</a></li>
					</div>
				</ul>
				<form class="search" action="#">
					<input type="text" placeholder="بحث..." name="search" />
					<button type="submit" class="btn-basic">
						<i class="fa fa-search"></i>
					</button>
				</form>
			</nav>
		</section>

		<!-- *Main Meetings Page Content  -->

		<!-- !Admin Apperance -->
		<!-- *Add "deactive" to Class Here ↓↓ To Test-->
		<main id="admin" class="meetings-content">
			<div class="container">
				<!-- عنوان الصفحة -->
				<div class="meetings-title"><h1>المجالس</h1></div>
				<!-- المجلس الحالي -->
				<div class="current-meeting">
					<h3>المجلس الحالي</h3>
					<!-- لو مفيش مجلس حالي -->
					<!-- *Add "deactive" to Class Here ↓↓ To Test-->
					<main id="empty" class="empty-meeting">
						<h4>لا يوجد مجلس حالي الان</h4>
					</main>
					<!-- لو في مجلس حالي -->
					<!-- *Add "deactive" to Class Here ↓↓ To Test-->
					<div class="meeting-box">
						<div class="row">
							<div class="col">
								<h4>رقم المجلس:<span class="meeting-number">{3}</span></h4>
								<h4>
									رقم تشكيل المجلس:<span class="meeting-formation-number"
										>{4}</span
									>
								</h4>
								<h4>
									بتاريخ:<span class="meeting-month">{5}</span> /
									<span class="meeting-year">{2023}</span>
								</h4>
							</div>
							<div class="col">
								<button class="btn-basic">
									توثيق
									<i class="fa-solid fa-check"></i>
								</button>
							</div>
						</div>
						<div class="current-meeting-buttons">
							<a href="#" class="btn-basic">الموضوعات الخاصة بالمجلس</a>
							<a href="#" class="btn-basic">تسجيل الحضور</a>
							<a href="#" class="btn-basic">التقارير</a>
							<a href="#" class="btn-basic">تعديل</a>

							<div class="upload">
								<div class="btn-basic">
									<label for="up1">
										رفع ملف المجلس الموثق
										<i class="fa-solid fa-upload"></i>
										<input
											id="up1"
											type="file"
											class="upload-button"
											multiple
										/>
									</label>
								</div>
								<div class="file-list"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- المجالس السابقة -->
				<div class="old-meetings">
					<h3>المجالس السابقة</h3>
					<!-- مجلس سابق رقم 1 -->
					<div class="old-meeting-box">
						<div class="row">
							<div class="col">
								<h4>رقم المجلس:<span class="meeting-number">{3}</span></h4>
								<h4>
									رقم تشكيل المجلس:<span class="meeting-formation-number"
										>{4}</span
									>
								</h4>
								<h4>
									بتاريخ:<span class="meeting-month">{5}</span> /
									<span class="meeting-year">{2023}</span>
								</h4>
							</div>
							<div class="col">
								<a href="#" class="btn-basic">التقارير</a>
								<div class="upload">
									<div class="btn-basic">
										<label for="up2">
											رفع ملف المجلس الموثق
											<i class="fa-solid fa-upload"></i>
											<input
												id="up2"
												type="file"
												class="upload-button"
												multiple
											/>
										</label>
									</div>
									<div class="file-list"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- مجلس سابق رقم 2 -->
					<div class="old-meeting-box">
						<div class="row">
							<div class="col">
								<h4>رقم المجلس:<span class="meeting-number">{3}</span></h4>
								<h4>
									رقم تشكيل المجلس:<span class="meeting-formation-number"
										>{4}</span
									>
								</h4>
								<h4>
									بتاريخ:<span class="meeting-month">{5}</span> /
									<span class="meeting-year">{2023}</span>
								</h4>
							</div>
							<div class="col">
								<a href="#" class="btn-basic">التقارير</a>
								<div class="upload">
									<div class="btn-basic">
										<label for="up3">
											رفع ملف المجلس الموثق
											<i class="fa-solid fa-upload"></i>
											<input
												id="up3"
												type="file"
												class="upload-button"
												multiple
											/>
										</label>
									</div>
									<div class="file-list"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- اضافة مجلس جديد -->
			<div class="add-meeting">
				<a href="#" class="btn-basic">اضافة مجلس جديد</a>
			</div>
		</main>

		<!-- !Member Apperance -->
		<!-- *Add "deactive" to Class Here ↓↓ To Test-->
		<main id="memeber" class="meetings-content">
			<div class="container">
				<div class="meetings-title"><h1>المجالس</h1></div>
				<!-- المجلس الحالي -->
				<div class="current-meeting">
					<h3>المجلس الحالي</h3>
					<div class="meeting-box">
						<div class="row">
							<div class="col">
								<h4>رقم المجلس:<span class="meeting-number">{3}</span></h4>
								<h4>
									رقم تشكيل المجلس:<span class="meeting-formation-number"
										>{4}</span
									>
								</h4>
								<h4>
									بتاريخ:<span class="meeting-month">{5}</span> /
									<span class="meeting-year">{2023}</span>
								</h4>
							</div>
						</div>
						<div class="current-meeting-buttons">
							<a href="#" class="btn-basic">عرض الموضوعات والتصويت</a>
							<a href="#" class="btn-basic">عرض الموضوعات بالقرار</a>
							<a href="#" class="btn-basic">عرض ملف جدول الاعمال</a>
							<a href="#" class="btn-basic">عرض ملف المجلس النهائي</a>
						</div>
					</div>
				</div>
				<!-- المجالس السابقة -->
				<!-- *Add "deactive" to Class Here ↓↓ To Test-->
				<div class="old-meetings">
					<h3>المجالس السابقة</h3>
					<!-- مجلس سابق رقم 1 -->
					<div class="old-meeting-box">
						<div class="row">
							<div class="col">
								<h4>رقم المجلس:<span class="meeting-number">{3}</span></h4>
								<h4>
									رقم تشكيل المجلس:<span class="meeting-formation-number"
										>{4}</span
									>
								</h4>
								<h4>
									بتاريخ:<span class="meeting-month">{5}</span> /
									<span class="meeting-year">{2023}</span>
								</h4>
							</div>
							<div class="col">
								<a href="#" class="btn-basic">عرض ملف المجلس النهائي</a>
								<a href="#" class="btn-basic">عرض الموضوعات بالقرار</a>
							</div>
						</div>
					</div>
					<!-- مجلس سابق رقم 2 -->
					<div class="old-meeting-box">
						<div class="row">
							<div class="col">
								<h4>رقم المجلس:<span class="meeting-number">{3}</span></h4>
								<h4>
									رقم تشكيل المجلس:<span class="meeting-formation-number"
										>{4}</span
									>
								</h4>
								<h4>
									بتاريخ:<span class="meeting-month">{5}</span> /
									<span class="meeting-year">{2023}</span>
								</h4>
							</div>
							<div class="col">
								<a href="#" class="btn-basic">عرض ملف المجلس النهائي</a>
								<a href="#" class="btn-basic">عرض الموضوعات بالقرار</a>
							</div>
						</div>
					</div>
				</div>
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
		<script
			src="https://kit.fontawesome.com/eb7dada2f7.js"
			crossorigin="anonymous"
		></script>
	</body>
</html>