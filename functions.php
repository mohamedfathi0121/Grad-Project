<?php
require_once "db.php";

if (empty(@$_SESSION["app_name"]))
{
    // Get Website header information
    $header_stmt = $conn->prepare("SELECT `app_name`, 
                                            `Uni_name`, 
                                            `Faculty_name`, 
                                            `Program_name`, 
                                            `Faculty-Uni_logo`, 
                                            `Program_logo` 
                                    FROM application_data");
    $header_stmt->execute();
    $header_result = $header_stmt->get_result();
    $header_row = $header_result->fetch_assoc();
    $_SESSION["app_name"] = $header_row["app_name"];
    $_SESSION["uni_name"] = $header_row["Uni_name"];
    $_SESSION["faculty_name"] = $header_row["Faculty_name"];
    $_SESSION["program_name"] = $header_row["Program_name"];
    $_SESSION["faculty_logo"] = $header_row["Faculty-Uni_logo"];
    $_SESSION["program_logo"] = $header_row["Program_logo"];
}

function Headers()
{
    ?>
    <header>
        <img class="logo" src="images/<?=$_SESSION["faculty_logo"]?>" alt="" />
        <div class="header-title">
            <h3 class="univ-name"><?=$_SESSION["uni_name"]?></h3>
            <h4 class="facu-name"><?=$_SESSION["faculty_name"]?></h4>
            <h4 class="prog-name" dir=ltr><?=$_SESSION["program_name"]?></h4>
            <h1 class="project-title">
                <?=$_SESSION["app_name"]?>
            </h1>
        </div>
        <img class="logo" src="images/<?=$_SESSION["program_logo"]?>" alt="" />
    </header>
    <?php
}

function Nav()
{
    ?>
    <section class="nav-bar">
        <nav>
            <ul>
                <a class="icon" href="#"><i class="fa-solid fa-bars fa-2xl"></i></a>
                <div class="links deactive">
                    <li><a href="index.php">الصفحة الرئيسية</a></li>
                    <li><a href="meetings.php">المجالس</a></li>
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
    <?php
}

function Head($title)
{
    ?>
    <head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?=$title?></title>
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
    <?php
}