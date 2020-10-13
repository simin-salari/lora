<!DOCTYPE html>
<!-- 
 * Author: Simin Salari
 * Project Name: Lora
 * Start Date: 1397/04/11
 * End Date: 1397/04/22
 * Version: 1.1.0
 * Latest Update: 1397/05/06
-->
<?php
session_start();

/* ==== SET TAB ==== */
if (!isset($_GET["tabs"])) {
    $_GET["tabs"] = 1;
}
$tabs = $_GET["tabs"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>سیستم ارتباط رادیویی</title>

        <link rel="stylesheet" href="css/style.css" />

        <script type="text/javascript" src="js/main.js"></script>

    </head>
    <body  onload="tab(<?php echo $tabs; ?>);" >

        <!-- ==== CONSTRAIN ==== -->
        <div class="conteiner">

            <!-- ==== HEADER ==== -->
            <header >
                <div class="tittel">
                    <h1>
                        سیستم ارتباط رادیویی (lora)
                    </h1>
                </div>
                <div class="logo">
                    <img src="img/logo.jpg" />
                </div>
            </header>

            <!-- ==== NAVIGATION ==== -->
            <div class="line"></div>
            <nav>
                <a class="mune" onclick=" tab(1);" href="index.php?tab=introduction&tabs=1" >معرفی</a>
                <a class="mune" onclick=" tab(2);" href="index.php?tab=settings&tabs=2" >تنظیمات</a>
                <a class="mune" onclick=" tab(3);" href="index.php?tab=GetSend&tabs=3" >ارسال و دریافت</a>
                <a class="mune" onclick=" tab(4);" href="index.php?tab=help&tabs=4" >راهنمای API</a>
                <a class="mune" onclick=" tab(5);" href="index.php?tab=contact&tabs=5" >تماس با ما</a>
            </nav>
            <div class="line2"></div>

            <!-- ==== MAIN ==== -->
            <div class="main" style="height: 500px; width: 100%">
                <?php
                if (isset($_GET["tab"])) {

                    if ($_GET["tab"] == 'introduction') {
                        include './TabIntroduction.php';
                    }
                    if ($_GET["tab"] == 'settings') {
                        include './TabSettings.php';
                    }
                    if ($_GET["tab"] == 'GetSend') {
                        include './TabGet&Send.php';
                    }
                    if ($_GET["tab"] == 'help') {
                        include './TabHelp.php';
                    }
                    if ($_GET["tab"] == 'contact') {
                        include './TabContact.php';
                    }
                } else {
                    include './TabIntroduction.php';
                }
                ?>
            </div>

            <!-- ==== FOOTER ==== -->
            <footer>
                <div style="height: 65%; width: 90%;">

                </div>
                <div style="width: 98%; direction: ltr">
                    طراح : simin.salari.s@gmail.com
                </div>
            </footer>
        </div>
    </body>
</html>