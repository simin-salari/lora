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
include './config.php';
include_once('jdf.php');

/* ==== QUERY FOR GET TABEL ==== */
if (!isset($_GET["page"])) {
    $_GET["page"] = 1;
}
$page = $_GET["page"];
$j = 1;
$limit = 10;
$start = ($page - 1) * $limit;
$query = ("SELECT * FROM get ORDER BY id DESC limit  $start,$limit "); // خواندن ازجدول دریافت 
//$result = mysqli_query($link, $query);
$result = $link->query($query);
$sql = "select COUNT(*) from get";
//$res = mysqli_query($link, $sql);
$res = $link->query($sql);
//$total_record = mysqli_num_rows($res);
$total_record = $res->fetchColumn();
$total_page = ceil($total_record / $limit) + 1;

/* ==== QUERY FOR SEND TABEL ==== */
if (!isset($_GET["page2"])) {
    $_GET["page2"] = 1;
}
$page2 = $_GET["page2"];
$j2 = 1;
$limit2 = 6;
$start2 = ($page2 - 1) * $limit2;
$query3 = ("SELECT * FROM send limit $start2,$limit2"); // خواندن ازجدول دریافت 
//$result3 = mysqli_query($link, $query3);
$result3 = $link->query($query3);
$sql2 = "select COUNT(*) from send";
//$res2 = mysqli_query($link, $sql2);
$res2 = $link->query($sql2);
//$total_record2 = mysqli_num_rows($res2);
$total_record2 = $res2->fetchColumn();
$total_page2 = ceil($total_record2 / $limit2) + 1;
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>سیستم ارتباط رادیویی</title>

        <link rel="stylesheet" href="css/style.css" />

        <script type="text/javascript" src="js/main.js"></script>

    </head>
    <body >

        <!-- ==== GET & SEND ==== -->

        <div>
            <section >

                <!-- ==== GET ==== -->

                <article class="get">
                    <div class="GetHead">
                        <a  onclick=" GetClearModal(1);" class="GetClear" >
                            پاک کردن
                            <img class="recycleButton" src="img/icon recycle bin.png" title="پاک کردن"/>
                        </a>
                        <div class="modal" id="GetClear-modal" >
                            <div class="modal-content">
                                <div class="modal-boody">
                                    ایا مایل به حذف کل داده های دریافتی هستید؟
                                    <br />
                                    <br />
                                    <a class="No" href="#" onclick=" GetClearModal(0);">خیر</a>
                                    <a class="yES" href="Function.php?code=GetClear">بله</a>
                                </div>
                            </div>
                        </div>
                        <span >دریافت</span>
                        <a href="index.php?page=1">  
                            <img class="GetButton" src="img/icon refresh.png" title="به روز رسانی جدول"/>
                        </a>
                    </div>
                    <div class="GetBody">
                        <table >
                            <thead >
                                <tr >
                                    <th style="width: 38px;" >ردیف</th>
                                    <th style="width: 135px;" >زمان</th>
                                    <th style="width: 55px;" >مقدار</th>
                                    <th style="width: 35px;" >حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!$result) {
                                    echo mysqli_error();
                                    exit();
                                } else {
                                    $i = 1 + $start;
                                    $j = 1;
                                    //while ($ro = mysqli_fetch_array($result)) {
                                    while ($ro = $result->fetch()) {

                                        /* ==== CONVERT TATE ==== */

                                        $date = $ro[1];
                                        $array = explode(' ', $date);
                                        list($year, $month, $day) = explode('-', $array[0]);
                                        list($hour, $minute, $second) = explode(':', $array[1]);
                                        $time = mktime($hour, $minute, $second, $month, $day, $year);
                                        $jalali_date = jdate("Y/m/d H: i: s", $time);

                                        if ((($i - $start) % 2) == 0) {
                                            $c = "#ffee75";
                                        } else {
                                            $c = "#ffffff";
                                        }
                                        $string = mb_substr($ro[2], 0, 3, mb_detect_encoding($ro[2]));
                                        echo '
                                            <tr style="background-color:' . $c . '">
                                                <td class="tdNum">' . $i . '</td>
                                                <td class="tdData">' . $jalali_date . '</td>
                                                <td class="tdData">
                                                    <a onclick = "ShowData(' . $j . ')" > 
                                                    ' . $string . '
                                                    </a>
                                                    <div class = "show-modal modal" id = "show-modal" >
                                                        <div class = "modal-content">
                                                            <div class = "modal-boody">' . $ro[2] . '
                                                                <br />
                                                                <br />
                                                                <a onclick = "ShowData(0);">
                                                                OK
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="tdData">
                                                    <a class="Clear" onclick=" ClearModal(' . $j . ');">
                                                        <img src="img/icon recycle bin.png"/>    
                                                    </a>
                                                    <div class="Clear-modal modal" id="Clear-modal" >
                                                        <div class="modal-content">
                                                             <div class="modal-boody">
                                                                ایا مایل به حذف داده  "' . $ro[2] . '" هستید؟
                                                                <br />
                                                                <br />
                                                                <a href="#" onclick="ClearModal(0);">
                                                                خیر
                                                                </a>
                                                                <a href="Function.php?code=Clear&id=' . $ro[0] . '">
                                                                بله
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>';
                                        $i++;
                                        $j++;
                                    }
                                }
                                ?>
                            </tbody >
                        </table>
                        <div class="pages">
                            <?php
                            if ($page + 1 <= $total_page) {
                                $page = $page + 1;
                                $d = 'index.php?tab=GetSend&page=' . $page;
                                if ($page == $total_page) {
                                    $d = '#';
                                }
                                echo "<a style='margin-right: 38px; float:right' href='$d'>بعدی&nbsp;</a>";
                            }
                            for ($i = 1; $i < $total_page; $i++) {
                                if ($i == $page - 1) {
                                    echo "<a style='color:#ff9933'; href='index.php?tab=GetSend&page=$i'>$i&nbsp;</a>";
                                } else {
                                    echo "<a href='index.php?tab=GetSend&page=$i'>$i&nbsp;</a>";
                                }
                            }
                            if ($page - 2 > 0) {
                                $page = $page - 1;
                                $p = $page - 1;
                            }
                            $p = $page - 1;
                            if ($page == $total_page) {
                                $page = $page - 1;
                            }

                            if ($total_page == 1) {
                                $d = 'none';
                            }
                            echo "<a style='float:left' href='index.php?tab=GetSend&page=$p'>قبلی&nbsp;</a>";
                            ?>
                        </div>
                    </div>
                </article>

                <!-- ==== SEND ==== -->

                <article  class="send">
                    <span> ارسال </span>
                    <div class="SendBody">
                        <div class="send-table">
                            <table  >
                                <thead >
                                    <tr >
                                        <th style="width: 38px;" >ردیف</th>
                                        <th style="width: 135px;" >زمان</th>
                                        <th style="width: 89px;" >مقدار</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!$result3) {
                                        echo mysqli_error();
                                        exit();
                                    } else {
                                        $i2 = 1 + $start2;
                                        //while ($row3 = mysqli_fetch_array($result3)) {
                                        while ($row3 = $result3->fetch()) {

                                            /* ==== CONVERT TATE ==== */

                                            $date = $row3[1];
                                            $array = explode(' ', $date);
                                            list($year, $month, $day) = explode('-', $array[0]);
                                            list($hour, $minute, $second) = explode(':', $array[1]);
                                            $time = mktime($hour, $minute, $second, $month, $day, $year);
                                            $jalali_date = jdate("Y/m/d H: i : s", $time);

                                            if ((($i2 - $start2) % 2) == 0) {
                                                $c = "#ffee75";
                                            } else {
                                                $c = "#ffffff";
                                            }
                                            echo '
                                                <tr style="background-color:' . $c . '">
                                                    <td class="tdNum">' . $i2 . '</td>
                                                    <td class="tdData">' . $jalali_date . '</td>
                                                    <td  class="tdData">' . $row3[2] . ' </td>
                                                </tr>';
                                            $i2++;
                                        }
                                    }
                                    ?>
                                </tbody> 
                            </table>
                            <div class="pages" >
                                <?php
                                $d2 = '#';
                                if ($page2 + 1 <= $total_page2) {
                                    $page2 = $page2 + 1;
                                    $d2 = 'index.php?tab=GetSend&page2=' . $page2;
                                    if ($page2 == $total_page2) {
                                        $d2 = '#';
                                    }
                                }
                                echo "<a style='margin-right: 38px; float:right' href='$d2'>بعدی&nbsp;</a>";
                                for ($i2 = 1; $i2 < $total_page2; $i2++) {
                                    if ($i2 == $page2 - 1) {
                                        echo "<a style='color:#ff9933'; href='index.php?tab=GetSend&page2=$i2'>$i2&nbsp;</a>";
                                    } else {
                                        echo "<a href='index.php?tab=GetSend&page2=$i2'>$i2&nbsp;</a>";
                                    }
                                }
                                if ($page2 - 2 > 0) {
                                    $page2 = $page2 - 1;
                                    $ps2 = $page2 - 1;
                                }
                                $ps2 = $page2 - 1;
                                if ($page2 == $total_page2) {
                                    $page2 = $page2 - 1;
                                }
                                $ds2 = 'index.php?tab=GetSend&page2=' . $ps2;
                                if ($total_page2 == 1) {
                                    $ds2 = '#';
                                }
                                echo "<a style='float:left' href='$ds2'>قبلی&nbsp;</a>";
                                ?>
                            </div>
                        </div>
                        <form name="send" method="post" action="Function.php?code=send" id="send" >
                            <textarea required form="send" maxlength="100"  name="message"></textarea>
                            <input style="margin-right: 33%;" type="submit" name="send" value="ارسال داده" />
                        </form>
                    </div>
                </article>
            </section>
        </div>
    </body>
</html>

