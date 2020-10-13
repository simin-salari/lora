<!DOCTYPE html>
<!-- 
 * Author: Simin Salari
 * Project Name: Lora
 * Start Date: 1397/04/11
 * End Date: 1397/04/22
 * Version: 1.1.0
 * Latest Update: 1397/05/06
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>سیستم ارتباط رادیویی</title>

        <link rel="stylesheet" href="css/style.css" />

        <script type="text/javascript" src="js/main.js"></script>

    </head>
    <body >
        <!-- ==== CONTACT ==== -->  
        <section >
            <article class="contact right">
                <div class="comment">
                    آزمایشگاه سیگنال
                    <br />
                    ادرس:
                    <br />
                    تلفن:
                </div>
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3214.9181059422917!2d59.52510785191219!3d36.31429272987275!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f6c9267a9090a29%3A0x9713096a87055b71!2sFaculty+of+Engineering!5e0!3m2!1sen!2sus!4v1531395362818"  allowfullscreen>
                </iframe>
            </article>
            <article class="contact email">
                <div class="row-form">
                    <p>نام و نام خانوادگی</p>
                    <br />
                    <p>
                        <span >*</span>
                        تلفن
                    </p>
                    <br />
                    <p>ایمیل</p>
                    <br />
                    <p>
                        <span >*</span>
                        نظر
                    </p>
                </div>
                <form class="contact-form" action="Function.php?code=opinion" method="post">
                    <input type="text" name="name" /> 
                    <br />
                    <br />
                    <input type="tel" name="telefon" maxlength="11" minlength="11" required />
                    <br />
                    <br />
                    <input type="email" name="email" />
                    <br/>
                    <br/>
                    <textarea required maxlength="500" name="Opinion"></textarea>
                    <input type="submit" value="ارسال نظر" name="contact"/>
                </form>
            </article>
        </section>

    </body>
</html>