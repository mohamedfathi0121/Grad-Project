<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>الاعضاء</title>
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
					<a class="icon" href="#"
						><i class="fa-solid fa-bars fa-2xl">
							<!-- <span style="visibility: hidden; background-color: #f4f4f4"
								>&nbsp;</span
							> -->
						</i></a
					>
					<div class="links deactive">
						<li><a href="index.php">الصفحة الرئيسية</a></li>
						<li><a href="meetings.php">المجالس</a></li>
						<li><a href="members.html">الاعضاء</a></li>
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

		<!-- *Main Members Page Content  -->

		<!-- !Admin Apperance -->
		<!-- *Add "deactive" to Class Here ↓↓ To Test-->
		<main class="members-content">
			<div class="container">
				<!-- عنوان الصفحة -->
				<div class="members-title"><h1>الاعضاء</h1></div>

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
									اسم العضو:<span class="member-name"
										>{د. محمد عبد السلام}</span
									>
								</h4>
							</div>
							<div class="col">
								<a href="#" class="btn-basic">تعديل بيانات العضو</a>
								<button class="btn-basic member-details-btn">
									تفاصيل العضو
								</button>
							</div>
						</div>

						<div class="member-details deactive">
							<div class="row">
								<div class="col">
									<img
										src="./images/members/1.jpg"
										alt=""
										class="member-image"
									/>
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
							<a href="#" class="btn-basic">تعديل بيانات العضو</a>
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
							<a href="#" class="btn-basic">تعديل بيانات العضو</a>
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
							<a href="#" class="btn-basic">تعديل بيانات العضو</a>
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
				<a href="#" class="btn-basic">اضافة عضو جديد</a>
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