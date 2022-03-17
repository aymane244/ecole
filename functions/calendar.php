<style type="text/css">
	table{
		border:1px solid #aaa;
		border-collapse:collapse;
		background-color:#fff;
		font-family: Verdana;
		font-size:12px;
	}
	th{
		background-color:#777;
		color:#fff;
		height:32px;
	}
	td{
		border:1px solid #ccc;
		height:32px;
		width:32px;
		text-align:center;
	}
	td.red {
		color:red;
	}
	td.bg-yellow {
		background-color:#ffffe0;
	}
	td.bg-orange {
		background-color:#ffa500;
	}
	td.bg-green {
		background-color:#90ee90;
	}
	td.bg-white {
		background-color:#fff;
	}
	td.bg-blue {
		background-color:#add8e6;
	}
	a {
		color: #333;
		text-decoration:none;	
	}
</style>
<table border='0' >
    <?php
        class Calendar{
            function years(){
                $years = array_combine(range(date("Y"), 2024), range(date("Y"), 2024));
                //implode($coma, $years);
                //echo implode($coma, $years);
                foreach($years as $year){
                    echo $year. "<br>";
                    for ($m=1; $m<=12; $m++) {
                        $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
                        $month_number = date('m', mktime(0,0,0,$m, 1, date('Y')));
                        echo $month_number." ".$month. '<br>';
                        for($d=1; $d<=31; $d++){
                            $time=date('d-D', mktime(0, 0, 0, $month_number,$d, $year));
                            echo $time. ' ';
                        }
                        echo "<br>";
                    }
                }
            }
            function months(){
                for ($m=1; $m<=12; $m++) {
                    $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
                    echo $month. '<br>';
                }
            }
            // Get the current date
            function autres(){
                $date = getdate();

                $list=array();
                $month = 12;
                $year = 2014;
                for($d=1; $d<=31; $d++){
                    $time=mktime(12, 0, 0, $month, $d, $year);          
                    if (date('m', $time)==$month)       
                    $list[]=date('Y-m-d-D', $time);
                }
                echo "<pre>";
                print_r($list);
                echo "</pre>";
        
                // Get the value of day, month, year
                $mday = $date['mday'];
                $mon = $date['mon'];
                $wday = $date['wday'];
                $month = $date['month'];
                $year = $date['year'];
                $dayCount = $wday;
                $day = $mday;
                while($day > 0) {
                    $days[$day--] = $dayCount--;
                        if($dayCount < 0)
                            $dayCount = 6;
                        }
                    $dayCount = $wday;
                    $day = $mday;
                    if(checkdate($mon,31,$year))
                        $lastDay = 31;
                    elseif(checkdate($mon,30,$year))
                        $lastDay = 30;
                    elseif(checkdate($mon,29,$year))
                        $lastDay = 29;
                    elseif(checkdate($mon,28,$year))
                        $lastDay = 28;
                    while($day <= $lastDay) {
                        $days[$day++] = $dayCount++;
                        if($dayCount > 6)
                        $dayCount = 0;
                    }	
                    // Days to highlight
                    $day_to_highlight = array(8, 9, 10, 11, 12, 22,23,24,25,26);
                    echo("<tr>");
                    echo("<th colspan='7' align='center'>$month $year</th>");
                    echo("</tr>");
                    echo("<tr>");
                    echo("<td class='red bg-yellow'>Sun</td>");
                    echo("<td class='bg-yellow'>Mon</td>");
                    echo("<td class='bg-yellow'>Tue</td>");
                    echo("<td class='bg-yellow'>Wed</td>");
                    echo("<td class='bg-yellow'>Thu</td>");
                    echo("<td class='bg-yellow'>Fri</td>");
                    echo("<td class='bg-yellow'>Sat</td>");
                    echo("</tr>");
                    $startDay = 0;
                    $d = $days[1];
                    echo("<tr>");
                    while($startDay < $d) {
                        echo("<td></td>");
                        $startDay++;
                    }
                    for ($d=1;$d<=$lastDay;$d++) {
                        if (in_array( $d, $day_to_highlight))
                            $bg = "bg-green";
                        else
                            $bg = "bg-white";
                        // Highlights the current day	
                        if($d == $mday)
                            echo("<td class='bg-blue'><a href='#' title='Detail of day'>$d</a></td>");
                        else 
                            echo("<td class='$bg'><a href='#' title='Detail of day'>$d</a></td>");
                            $startDay++;
                            if($startDay > 6 && $d < $lastDay){
                            $startDay = 0;
                            echo("</tr>");
                            echo("<tr>");
                    }
                }
                echo("</tr>");
            }

        }

    ?>
</table>