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
    
    function addSeat($flightId){
        $add_seat_query = "INSERT INTO seat(seatNumber, flight, class) VALUES ('1A', $flightId, 'first'), "
            ." ('1B', $flightId, 'first'), ('1C', $flightId, 'first'), ('1D', $flightId, 'first'), "
            ." ('1E', $flightId, 'first'), ('1F', $flightId, 'first'), ('2A', $flightId, 'first'), "
            ." ('2B', $flightId, 'first'), ('2C', $flightId, 'first'), ('2D', $flightId, 'first'), "
            ." ('2E', $flightId, 'first'), ('2F', $flightId, 'first'), ('3A', $flightId, 'first'), "
            ." ('3B', $flightId, 'first'), ('3C', $flightId, 'first'), ('3D', $flightId, 'first'), "
            ." ('3E', $flightId, 'first'), ('3F', $flightId, 'first'), ('4A', $flightId, 'business'), "
            ." ('4B', $flightId, 'business'), ('4C', $flightId, 'business'), ('4D', $flightId, 'business'), "
            ." ('4E', $flightId, 'business'), ('4F', $flightId, 'business'), ('5A', $flightId, 'business'), "
            ." ('5B', $flightId, 'business'), ('5C', $flightId, 'business'), ('5D', $flightId, 'business'), "
            ." ('5E', $flightId, 'business'), ('5F', $flightId, 'business'), ('6A', $flightId, 'business'), "
            ." ('6B', $flightId, 'business'), ('6C', $flightId, 'business'), ('6D', $flightId, 'business'), "
            ." ('6E', $flightId, 'business'), ('6F', $flightId, 'business'), ('7A', $flightId, 'economy'), "
            . "('7B', $flightId, 'economy'), ('7C', $flightId, 'economy'), ('7D', $flightId, 'economy'), "
            ." ('7E', $flightId, 'economy'), ('7F', $flightId, 'economy'), ('8A', $flightId, 'economy'), "
            ." ('8B', $flightId, 'economy'), ('8C', $flightId, 'economy'), ('8D', $flightId, 'economy'), "
            ." ('8E', $flightId, 'economy'), ('8F', $flightId, 'economy'), ('9A', $flightId, 'economy'), "
            ." ('9B', $flightId, 'economy'), ('9C', $flightId, 'economy'), ('9D', $flightId, 'economy'), "
            ." ('9E', $flightId, 'economy'), ('9F', $flightId, 'economy'); ";
        
        if(!mysql_query($add_seat_query)){
            die("Error!". mysql_error());
        }
    }
?>