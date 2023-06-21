<?php
require_once "db.php";
require_once "functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
Head("team39");
?>

<body dir="rtl">
    <?php
Headers();
if (!isset($_SESSION["loggedin"]) && @$_SESSION["loggedin"] !== true):
	?>

    <main class="team-39" dir="ltr">


        < <div class="container">

            <div class="box">
                <div class="members-title">
                    <h1>Our Perfect Team</h1>
                </div>
                <div class="row">
                    <!-- mohamed ayman -->
                    <div class="col coll">
                        <div class="row roee">

                            <div class="col mem-img"> <img src="images/members/aymon.jpg" alt=""></div>
                            <div class="col">
                                <div class="row">
                                    <h2>
                                        Mohamed Ayman Gamal Yousef
                                    </h2>
                                </div>
                                <div class="row">
                                    <h3>
                                        FrontEnd Developer
                                    </h3>
                                </div>
                                <div class="row">
                                    <p> I’m a BIS department student, I made some projects and got a multiple of
                                        certifications in HTML, CSS, and JavaScript, I'm interested in computers and
                                        hardware, as well as video games and novels.</p>
                                </div>
                                <div class="row row-font">
                                    <a href="https://wa.me/+201102465132" target="_blank"> <i
                                            class="fa-brands fa-whatsapp  fa-2xl" style="color: #25d366;"></i></a>
                                    <a href="https://github.com/MuhAymanZ" target="_blank"><i
                                            class="fa-brands fa-github  fa-2xl" style="color: #000000;"></i></a>
                                    <a href="https://www.linkedin.com/in/mohamed-ayman-757329225/" target="_blank"><i
                                            class="fa-brands fa-linkedin  fa-2xl" style="color: #0077b5;"></i></a>
                                    <a href="https://www.facebook.com/MrAymon666/" target="_blank"><i
                                            class="fa-brands fa-facebook  fa-2xl" style="color: #1877f2;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- badr -->
                    <div class="col coll">
                        <div class="row roee">

                            <div class="col mem-img"> <img src="images/members/badr.jpg" alt=""></div>
                            <div class="col">
                                <div class="row">
                                    <h2>
                                        Mahmoud Badr Mohamed
                                    </h2>
                                </div>
                                <div class="row">
                                    <h3>
                                        BackEnd Developer
                                    </h3>
                                </div>
                                <div class="row">
                                    <p> I’m a 21-year-old Business Information Systems (BIS) student, I made some
                                        projects and got multiple certificates in Data Analysis, and I'm also interested
                                        in Backend Development.</p>
                                </div>
                                <div class="row row-font">
                                    <a href="https://wa.me/+201030963372" target="_blank"> <i
                                            class="fa-brands fa-whatsapp  fa-2xl" style="color: #25d366;"></i></a>
                                    <a href="https://github.com/Mahmoudb7" target="_blank"><i
                                            class="fa-brands fa-github  fa-2xl" style="color: #000000;"></i></a>
                                    <a href="https://www.linkedin.com/in/mahmoud-badr-7779201a1/" target="_blank"><i
                                            class="fa-brands fa-linkedin  fa-2xl" style="color: #0077b5;"></i></a>
                                    <a href="https://www.facebook.com/mahmoud.badr.35977897" target="_blank"><i
                                            class="fa-brands fa-facebook  fa-2xl" style="color: #1877f2;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- FATHI -->
                    <div class="col coll">
                        <div class="row roee">

                            <div class="col mem-img"> <img src="images/members/fathi2.jpg" alt=""></div>
                            <div class="col">
                                <div class="row">
                                    <h2>
                                        Mohamed Fathi Salah </h2>
                                </div>
                                <div class="row">
                                    <h3>
                                        FrontEnd Developer & Ui/Ux Desiner
                                    </h3>
                                </div>
                                <div class="row">
                                    <p> I am a 22-year-old Business Information Systems student with a passion for
                                        computer science, full-stack development, Ui/Ux design and system analysis. I
                                        have completed some projects and obtained
                                        certificates in FrontEnd And Ui/Ux, and I am seeking challenging opportunities
                                        to
                                        apply my skills and knowledge.</p>
                                </div>
                                <div class="row row-font">
                                    <a href="https://wa.me/+201150198566" target="_blank"> <i
                                            class="fa-brands fa-whatsapp  fa-2xl" style="color: #25d366;"></i></a>
                                    <a href="https://github.com/mohamedfathi0121" target="_blank"><i
                                            class="fa-brands fa-github  fa-2xl" style="color: #000000;"></i></a>
                                    <a href="https://www.linkedin.com/in/mohamed-fathi-1483b225a?trk=contact-info"
                                        target="_blank"><i class="fa-brands fa-linkedin  fa-2xl"
                                            style="color: #0077b5;"></i></a>
                                    <a href="https://www.facebook.com/mofathi0121?mibextid=ZbWKwL" target="_blank"><i
                                            class="fa-brands fa-facebook  fa-2xl" style="color: #1877f2;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- OMAR -->
                    <div class="col coll">
                        <div class="row roee">

                            <div class="col mem-img"> <img src="images/members/Omar.jpg" alt=""></div>
                            <div class="col">
                                <div class="row">
                                    <h2>
                                        Omar Ayman Mohamed
                                    </h2>
                                </div>
                                <div class="row">
                                    <h3>
                                        Flutter Developer
                                    </h3>
                                </div>
                                <div class="row">
                                    <p> I’m a 22-year-old Business Information Systems (BIS) student, I made some
                                        projects and got multiple certificates in cyber-security, and I'm also
                                        interested in soft-ware development specially in mobile
                                        applications development..</p>
                                </div>
                                <div class="row row-font">
                                    <a href="https://wa.me/+201024512201" target="_blank"> <i
                                            class="fa-brands fa-whatsapp  fa-2xl" style="color: #25d366;"></i></a>
                                    <a href="https://github.com/OM-201" target="_blank"><i
                                            class="fa-brands fa-github  fa-2xl" style="color: #000000;"></i></a>
                                    <a href="https://www.linkedin.com/in/omar-ayman-183616265/" target="_blank"><i
                                            class="fa-brands fa-linkedin  fa-2xl" style="color: #0077b5;"></i></a>
                                    <a href="https://www.facebook.com/omar.ayman.313?mibextid=ZbWKwL" target="_blank"><i
                                            class="fa-brands fa-facebook  fa-2xl" style="color: #1877f2;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!--RABIA  -->
                    <div class="col coll">
                        <div class="row roee">

                            <div class="col mem-img"> <img src="images/members/rabie2.jpg" alt=""></div>
                            <div class="col">
                                <div class="row">
                                    <h2>
                                        Mohamed Rabie Osman
                                    </h2>
                                </div>
                                <div class="row">
                                    <h3>
                                        Data Analyst & BI Developer
                                    </h3>
                                </div>
                                <div class="row">
                                    <p> I am a 21-year-old Business Information Systems student with a passion for data
                                        analysis and business intelligence. I have completed some projects and obtained
                                        certificates in data analysis, and I am seeking challenging opportunities to
                                        apply my skills and knowledge.</p>
                                </div>
                                <div class="row row-font">
                                    <a href="https://wa.me/+201022920130" target="_blank"> <i
                                            class="fa-brands fa-whatsapp  fa-2xl" style="color: #25d366;"></i></a>
                                    <a href="https://github.com/MuhammadRabe3" target="_blank"><i
                                            class="fa-brands fa-github  fa-2xl" style="color: #000000;"></i></a>
                                    <a href="https://www.linkedin.com/in/mohammad-rabea-866361192" target="_blank"><i
                                            class="fa-brands fa-linkedin  fa-2xl" style="color: #0077b5;"></i></a>
                                    <a href="https://www.facebook.com/muhammad.rabea.31?mibextid=ZbWKwL"
                                        target="_blank"><i class="fa-brands fa-facebook  fa-2xl"
                                            style="color: #1877f2;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ASHRAF -->
                    <div class="col coll">
                        <div class="row roee">

                            <div class="col mem-img"> <img src="images/members/mahmoudasraf.jpg" alt=""></div>
                            <div class="col">
                                <div class="row">
                                    <h2>
                                        Mahmoud Asraf Zaki
                                    </h2>
                                </div>
                                <div class="row">
                                    <h3>
                                        Security Engineer
                                    </h3>
                                </div>
                                <div class="row">
                                    <p> Driven 21-year-old BIS student with project experience and certificates in SOC
                                        Analysis, passionate about excelling in Mobile Application Development.
                                        Dedicated to becoming a proficient professional in both fields, showcasing
                                        expertise and relentless commitment.</p>
                                </div>
                                <div class="row row-font">
                                    <a href="https://wa.me/+201117823789" target="_blank"> <i
                                            class="fa-brands fa-whatsapp  fa-2xl" style="color: #25d366;"></i></a>
                                    <a href="https://github.com/m-1226" target="_blank"><i
                                            class="fa-brands fa-github  fa-2xl" style="color: #000000;"></i></a>
                                    <a href="https://www.linkedin.com/in/mahmoud-ashraf-yahia/" target="_blank"><i
                                            class="fa-brands fa-linkedin  fa-2xl" style="color: #0077b5;"></i></a>
                                    <a href="https://www.facebook.com/profile.php?id=100010340258177" target="_blank"><i
                                            class="fa-brands fa-facebook  fa-2xl" style="color: #1877f2;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
    </main>

    <?php
endif;
footer()
?>

    <!-- Js Scripts and Plugins -->
    <script type="module" src="./js/main.js"></script>
    <script src="./js/showpassword.js"></script>


    <!-- font Awesome -->
    <script src="https://kit.fontawesome.com/eb7dada2f7.js" crossorigin="anonymous"></script>
</body>

</html>