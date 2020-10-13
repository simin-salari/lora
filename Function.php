<?php

/*
 * Author: Simin Salari
 * Project Name: Lora
 * Start Date: 1397/04/11
 * End Date: 1397/04/22
 * Version: 1.1.0
 * Latest Update: 1397/05/06
 */
session_start();
include './config.php';

if (isset($_GET["code"])) {

    /* ==== DELETE ALL GET TABEL ==== */

    function GetClear() {
        include './config.php';
        $query = ("DELETE FROM get ");
        //$result = mysqli_query($link, $query);
        //mysqli_close($link);
        $link->query($query);
        header("Location:index.php?tab=GetSend&tabs=3");
    }

    /* ==== DELETE GET TABEL ==== */

    function Clear() {
        include './config.php';
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }
        $query = ("DELETE FROM get WHERE id=$id ");
        //$result = mysqli_query($link, $query);
        // mysqli_close($link);
        $link->query($query);
        header("Location:index.php?tab=GetSend&tabs=3");
    }

    /* ==== SET SEND DATA ==== */

    function send() {
        include './config.php';
        if (isset($_POST["send"])) {
            if (isset($_POST["message"])) {
                $message = $_POST["message"];
                //$query = ("INSERT INTO send(id,date,data) VALUES ('0',NOW(),'$message')");
                $query = ("INSERT INTO send(date,data) VALUES (DateTime('now'),'$message')");
                // $result = mysqli_query($link, $query);
                //mysqli_close($link);
                $result = $link->query($query);
                if (!$result) {
                    //echo mysqli_error();
                    exit();
                }
                header("Location:index.php?tab=GetSend&tabs=3");
            }
        }
    }

    /* ==== SET OPINION ==== */

    function opinion() {
        include './config.php';
        if (isset($_POST["contact"]) && isset($_POST["telefon"]) && isset($_POST["Opinion"])) {
            $name = "";
            $telefon = $_POST["telefon"];
            $email = "";
            $Opinion = $_POST["Opinion"];

            if (isset($_POST["name"])) {
                $name = $_POST["name"];
            }
            if (isset($_POST["email"])) {
                $email = $_POST["email"];
            }
            /* $query = ("INSERT INTO opinion(id,name,telefon,email,opinion,date) VALUES ('0','$name','$telefon','$email','$Opinion',NOW())"); */
            $query = ("INSERT INTO opinion(name,telefon,email,opinion,date) VALUES ('$name','$telefon','$email','$Opinion',DateTime('now'))");
            // $result = mysqli_query($link, $query);
            // mysqli_close($link);
            $result = $link->query($query);
            if (!$result) {
                // echo mysqli_error();
                exit();
            }
            header("Location:index.php?tab=contact&tabs=5");
        }
    }

    /* ==== SET SETTING ==== */

    function setting() {
        include './config.php';
        if (isset($_POST["set"])) {
            $frequency = $_POST["frequency"];
            $bandwidth = $_POST["bandwidth"];
            $codingRate = $_POST["coding-rate"];
            $lanGain = $_POST["lan-gain"];
            $spreadingFactor = $_POST["spreading"];
            $paRamp = $_POST["pa-ramp"];
            $mode = $_POST["mode"];
            $Encoding = $_POST["Encoding"];
            $query = ("UPDATE setting SET frequency=$frequency,bandwidth=$bandwidth,codingRate=$codingRate,lanGain='$lanGain',spreadingFactor=$spreadingFactor,paRamp=$paRamp,mode='$mode',Encoding='$Encoding' WHERE id=0");
            //$result = mysqli_query($link, $query);
            //mysqli_close($link);
            $result = $link->query($query);
            if (!$result) {
                echo 'error';
                exit();
                ?>
                <script language="javascript" type="text/javascript">
                    alert("به روز رسانی انجام نشد !")
                    window.location = 'index.php?tab=settings&tabs=2';
                </script>
                <?php

            } else {
                ?>
                <script language="javascript" type="text/javascript">
                    alert("به روز رسانی انجام شد.")
                    window.location = 'index.php?tab=settings&tabs=2';
                </script>
                <?php

            }
        }
    }

    /* ==== CALL FUNCTION ==== */
    $code = $_GET["code"];
    $code();
}
?>