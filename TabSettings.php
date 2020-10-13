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

/* ==== QUERY FOR SETTING TABEL ==== */
$query = ("SELECT * FROM setting"); // خواندن از جدول داده 
//$result = mysqli_query($link, $query);
$result = $link->query($query);

if (!$result) {
    //echo mysqli_error();
    exit();
} else {
    //$row = mysqli_fetch_array($result);
    $row = $result->fetch();
    if ($row[3] == 0.8) {
        $row[3] = '4/5';
    } elseif ($row[3] == 0.5) {
        $row[3] = '4/8';
    } elseif ($row[3] == 0.666667) {
        $row[3] = '4/6';
    } else {
        $row[3] = '4/7';
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>سیستم ارتباط رادیویی</title>

        <link rel="stylesheet" href="css/style.css" />

    </head>
    <body >

        <!-- ==== SETTINGS ==== -->
        <div>

            <section class="settings"  >
                <form name="setting" method="post" action="Function.php?code=setting"> 

                    <div class="column">  
                        <p> set frequency  </p>
                        <br />
                        <p> set bandwidth   </p>
                        <br />
                        <p> set coding-rate  </p>
                        <br />
                        <p> set lan-gain  </p>
                    </div>
                    <div class="column">  
                        <input id="frequency" type="number" name="frequency" value="<?php echo $row[1]; ?>" max="525" min="410" placeholder=" مقدار قابل قبول بین 410 تا 525" title=" مقدار قابل قبول بین 410 تا 525" autocomplete="off" onblur="CheckFrequency();"/>
                        <span>MHz</span>
                        <br />
                        <span class="frequency-span" id="frequency-span">
                            مقدار درست نیست. عددی صحیح بین 410 تا 525 وارد کنید.
                        </span>
                        <br id="frequency-br"  />
                        <select name="bandwidth" autocomplete="off" > 
                            <option class="option-selected" selected value="<?php echo $row[2]; ?>"><?php echo $row[2]; ?> </option>
                            <option value="7.8"> 7.8 </option>
                            <option value="10.4">10.4 </option>
                            <option value="15.6">15.6 </option>
                            <option value="20.8">20.8 </option>
                            <option value="31.25">31.25</option>
                            <option value="41.7">41.7</option>
                            <option value="62.5">62.5 </option>
                            <option value="125">125 </option>
                            <option value="250">250 </option>
                            <option value="500">500 </option>
                        </select><samp> KHz</samp>
                        <br />
                        <br />
                        <select name="coding-rate" autocomplete="off" >
                            <option class="option-selected" selected value="<?php echo $row[3]; ?>"><?php echo $row[3]; ?></option>
                            <option value="4/5">4/5</option>
                            <option value="4/6">4/6</option>
                            <option value="4/7">4/7</option>
                            <option value="4/8">4/8</option>
                        </select>
                        <br />
                        <br />
                        <select name="lan-gain" autocomplete="off">
                            <option class="option-selected" selected value="<?php echo $row[4]; ?>"><?php echo $row[4]; ?></option>
                            <option value="0">0</option>
                            <option value="G1">G1</option>
                            <option value="G2">G2</option>
                            <option value="G3">G3</option>
                            <option value="G4">G4</option>
                            <option value="G5">G5</option>
                            <option value="G6">G6</option>
                        </select>
                    </div>
                    <div class="line3"></div>
                    <div class="column">
                        <p> set spreading factor </p>
                        <br />
                        <p> set pa-ramp  </p>
                        <br />
                        <p>set mode  </p>
                        <br />
                        <p>Encoding  </p>
                    </div>
                    <div class="column">
                        <select name="spreading" autocomplete="off">
                            <option class="option-selected" selected value="<?php echo $row[5]; ?>"><?php echo $row[5]; ?></option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        <br />
                        <br />
                        <select name="pa-ramp" autocomplete="off">
                            <option class="option-selected" selected value="<?php echo $row[6]; ?>"><?php echo $row[6]; ?></option>
                            <option value="4000">4000</option>
                            <option value="3000">3000</option>
                            <option value="2000">2000</option>
                            <option value="1000">1000</option>
                            <option value="500">500</option>
                            <option value="250">250</option>
                            <option value="125">125</option>
                            <option value="100">100</option>
                            <option value="62">62</option>
                            <option value="50">50</option>
                            <option value="40">40</option>
                            <option value="31">31</option>
                            <option value="25">25</option>
                            <option value="20">20</option>
                            <option value="15">15</option>
                            <option value="12">12</option>
                            <option value="10">10</option>
                        </select>
                        <br />
                        <br />
                        <select name="mode" autocomplete="off">
                            <option class="option-selected" selected value="<?php echo $row[7]; ?>"><?php echo $row[7]; ?></option>
                            <option value="transmitter">transmitter</option>
                            <option value="receiver">receiver</option>
                            <option value="repeater">repeater</option>
                            <option value="Both">Both</option>
                        </select>
                        <br />
                        <br />
                        <select name="Encoding" autocomplete="off" t>
                            <option class="option-selected" selected value="<?php echo $row[8]; ?>" ><?php echo $row[8]; ?></option>
                            <option value="base 64">base 64</option>
                        </select>
                    </div>
                    <input type="submit"  name="set" value="ثبت" />
                </form>
            </section>
        </div>
    </body>
</html>
