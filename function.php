<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    function countDays($startDate, $endDate){
        $start = strtotime($startDate);
        $end = strtotime($endDate);
        $numOfDays = abs(floor(($start-$end)/86400));
        return $numOfDays;
    }
    
    function calculateCost($unitPrice, $numOfAdults, $numOfKids){
        $kidsPrice = $unitPrice/2;
        $total = $numOfAdults*$unitPrice + $numOfKids*$kidsPrice;
        return $total;
    }
    
    function dateDisplay($theDate){
        $thisDate = date_create($theDate);
        $dateFormat = date_format($thisDate, 'd-M-Y');
        return $dateFormat;
    }
    
    function timeDisplay($theTime){
        $thisTime = date_create($theTime);
        $timeFormat = date_format($thisTime, 'H:i');
        return $timeFormat;
    }
?>