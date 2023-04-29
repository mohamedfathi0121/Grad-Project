<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>الموضوعات</title>
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
						<li><a href="meetings.php">المجالس</a></li>
						<li><a href="members.php">الاعضاء</a></li>
						<li><a href="subjects.html">الموضوعات</a></li>
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
		<!--  Another Content To Be Added Later (Just As an Example Ignore / Delete it) -->
		<div class="another-content">باقي محتوى الصفحة هنا</div>

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