<?php
require_once "db.php";

if (session_status() === PHP_SESSION_NONE)
{
    session_start();
}

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

if (empty(@$_SESSION["image"]))
{
    $user_stmt = $conn->prepare("SELECT name, image FROM p39_users WHERE user_id = ?");
    $user_stmt->bind_param("i", $_SESSION["user_id"]);
    $user_stmt->execute();
    $user_result = $user_stmt->get_result();
    $user_row = $user_result->fetch_assoc();

    @$_SESSION["image"] =  $user_row['image'];
    @$_SESSION["name"]  =  $user_row['name'];
}


function Headers()
{
    ?>
<header>
  <div class="user-logged">
    <?php
            if (!empty($_SESSION["loggedin"]))
            {
                ?>
                <img src="<?=@$_SESSION['image']?>" alt="">
                <h5 class="user-name"><?=@$_SESSION['name']?></h5>
                <button class="button btn-basic" onclick="location.href='logout.php'">خروج</button>

                <?php
            }
            ?>
  </div>

  <div class="header-container">
    <img class="logo" src="images/<?=$_SESSION["faculty_logo"]?>" alt="" />
    <div class="header-title">
      <h3 class="univ-name"><?=$_SESSION["uni_name"]?> - <?=$_SESSION["faculty_name"]?></h3>

      <h4 class="prog-name" dir=ltr><?=$_SESSION["program_name"]?></h4>
      <h1 class="project-title">
        <?=$_SESSION["app_name"]?>
      </h1>
    </div>
    <img class="logo" src="images/<?=$_SESSION["program_logo"]?>" alt="" />
  </div>


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
          <li><a href="current_meeting_subject.php">الموضوعات</a></li>
          <?php
          if ($_SESSION["admin"]):
              ?>
              <li><a href="members.php">الاعضاء</a></li>
              <li><a href="executive_decisions.php">القرارات التنفيذية</a></li>
          <?php
          endif;
        ?>
      </div>
    </ul>
    <form class="search" action="<?=basename($_SERVER['PHP_SELF'])?>" method="get">
        <?php
        switch (basename($_SERVER["PHP_SELF"]))
        {
            case "meetings.php":
                ?>
                <input type="text" placeholder="بحث برقم التشكيل" name="search" />
                <?php
                break;
            case "current_meeting_subject.php":
                ?>
                <input type="text" placeholder="بحث برقم الموضوع" name="search" />
                <?php
        }
        ?>
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
    rel="stylesheet" />
</head>
<?php
}

function Footer()
{
    $y = date("Y");
    ?>
    <footer>
        <p>جميع الحقوق محفوظة &copy; لدى فريق رقم 39 Bis Seniors <?=$y?></p>
    </footer>
    <?php
}

function clean_data($str)
{
    $str = trim($str);
    $str = stripslashes($str);
    $str = htmlspecialchars($str, ENT_QUOTES, "UTF-8");
    return $str;
}

// Function for validating email
function is_valid_email($email)
{
    if (empty($email))
    {
        return false;
    }
    else
    {
        $email = clean_data($email);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return false;
        }
    }
    return $email;
}

function is_admin():bool
{
    if(@$_SESSION["admin"])
    {
        return true;
    }
    else
    {
        ?>
        <p style="color: red; font-weight: bold; text-align: center">
          You don't have authorization to view this page. You'll be redirected to the homepage in 5 seconds.
        </p><br>
        <?php
        header("refresh:5; url=meetings.php");
        footer();
        die();
    }
}

function is_logged_in():bool
{
    if(@$_SESSION["loggedin"] === true)
    {
        return true;
    }
    else
    {
        ?>
        <p style="color: red; font-weight: bold; text-align: center">
          You need to log in to view this page. You'll be redirected to the login page in 5 seconds
        </p><br>
        <?php
        header("refresh:5; url=loginn.php");
        footer();
        die();
    }
}

function Upload($source, $destination, $allowed_formats)
{
    $result = array();
//    $destination = self::Path($destination);

    if ((is_dir($destination) === true) && (array_key_exists($source, $_FILES) === true))
    {
        if (count($_FILES[$source], COUNT_RECURSIVE) == 5)
        {
            foreach ($_FILES[$source] as $key => $value)
            {
                $_FILES[$source][$key] = array($value);
            }
        }

        foreach (array_map('basename', $_FILES[$source]['name']) as $key => $value)
        {
            $new_file_path = $destination . $value;
            $file_type = pathinfo($new_file_path, PATHINFO_EXTENSION);
            if (in_array($file_type, $allowed_formats))
            {
                $result[$value] = false;
                if ($_FILES[$source]['error'][$key] == UPLOAD_ERR_OK)
                {
//                $file = ph()->Text->Slug($value, '_', '.');
                    $file = NULL;
                    $file = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $file)));

                    if (file_exists($destination . $file) === true)
                    {
                        $file = substr_replace($file, '_' . md5_file($_FILES[$source]['tmp_name'][$key]) . ".$file_type", strrpos($value, '.'), 0);
//                        $file = substr_replace($file, '_' . hash_file('sha256', $_FILES[$source]['tmp_name'][$key]) . ".$file_type", strrpos($value,'.'),0);
                    }

                    if (move_uploaded_file($_FILES[$source]['tmp_name'][$key], $destination . $file) === true)
                    {
                        $result[$value] = $destination . $file;
                    }
                }
            }
        }
    }
    return $result;
}