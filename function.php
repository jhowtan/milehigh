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
    
    function calculateCost($unitPrice, $numOfAdults, $numOfKids){
        $kidsPrice = $unitPrice/2;
        $total = $numOfAdults*$unitPrice + $numOfKids*$kidsPrice;
        return $total;
    }
    
    function baggagePrice($value){
        $topUp = 0;
        
        if($value == 25){
            $topUp = 20;
        } else if($value == 30){
            $topUp = 30;
        } else if($value == 35){
            $topUp = 40;
        }
        return $topUp;
    }
    
    function seatPrice($seatId){
        $multiplier = 1;
        
        $seatPrice_query = "SELECT class FROM seat WHERE id = '$seatId'";
        $seatPrice_result = mysql_query($seatPrice_query);
        $result = mysql_fetch_assoc($seatPrice_result);
        
        if($result['class'] == "Business Class"){
            $topUp = 1.5;
        } else if($result['class'] == "First Class"){
            $topUp = 2;
        }
        return $topUp;
    }
    
    function calculateTotalPrice($unitPrice, $adults, $kids, $baggagePrice, $seatPrice){
        $netPrice = calculateCost($unitPrice, $adults, $kids);
        $total = $netPrice + $baggagePrice + $seatPrice;
        return $total;
    }
    
    function addSeat($flightId){
        $add_seat_query = "INSERT INTO seat(seatNumber, flight, class) VALUES ('1A', $flightId, 'First Class'), "
            ." ('1B', $flightId, 'First Class'), ('1C', $flightId, 'First Class'), ('1D', $flightId, 'First Class'), "
            ." ('1E', $flightId, 'First Class'), ('1F', $flightId, 'First Class'), ('2A', $flightId, 'First Class'), "
            ." ('2B', $flightId, 'First Class'), ('2C', $flightId, 'First Class'), ('2D', $flightId, 'First Class'), "
            ." ('2E', $flightId, 'First Class'), ('2F', $flightId, 'First Class'), ('3A', $flightId, 'First Class'), "
            ." ('3B', $flightId, 'First Class'), ('3C', $flightId, 'First Class'), ('3D', $flightId, 'First Class'), "
            ." ('3E', $flightId, 'First Class'), ('3F', $flightId, 'First Class'), ('4A', $flightId, 'Business Class'), "
            ." ('4B', $flightId, 'Business Class'), ('4C', $flightId, 'Business Class'), ('4D', $flightId, 'Business Class'), "
            ." ('4E', $flightId, 'Business Class'), ('4F', $flightId, 'Business Class'), ('5A', $flightId, 'Business Class'), "
            ." ('5B', $flightId, 'Business Class'), ('5C', $flightId, 'Business Class'), ('5D', $flightId, 'Business Class'), "
            ." ('5E', $flightId, 'Business Class'), ('5F', $flightId, 'Business Class'), ('6A', $flightId, 'Business Class'), "
            ." ('6B', $flightId, 'Business Class'), ('6C', $flightId, 'Business Class'), ('6D', $flightId, 'Business Class'), "
            ." ('6E', $flightId, 'Business Class'), ('6F', $flightId, 'Business Class'), ('7A', $flightId, 'Economy'), "
            . "('7B', $flightId, 'Economy'), ('7C', $flightId, 'Economy'), ('7D', $flightId, 'Economy'), "
            ." ('7E', $flightId, 'Economy'), ('7F', $flightId, 'Economy'), ('8A', $flightId, 'Economy'), "
            ." ('8B', $flightId, 'Economy'), ('8C', $flightId, 'Economy'), ('8D', $flightId, 'Economy'), "
            ." ('8E', $flightId, 'Economy'), ('8F', $flightId, 'Economy'), ('9A', $flightId, 'Economy'), "
            ." ('9B', $flightId, 'Economy'), ('9C', $flightId, 'Economy'), ('9D', $flightId, 'Economy'), "
            ." ('9E', $flightId, 'Economy'), ('9F', $flightId, 'Economy'); ";
        
        if(!mysql_query($add_seat_query)){
            die("Error!". mysql_error());
        }
    }
?>