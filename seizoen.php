<?php
include('dbcalls/connect.php');

$season = $_GET['seizoen'];
var_dump($season);
switch ($season) {
    case 'lente':

        $sql = 'SELECT * FROM flights f join house h on f.house_id = h.house_id WHERE (month(f.travel_date) = "3" || month(f.travel_date) = "4" || month(f.travel_date) = "5")';

        $review_stmt = $conn->prepare($sql);
        $review_stmt->execute();
        $data = $review_stmt->fetchAll();

        break;
    case 'zomer':

        $sql = 'SELECT * FROM flights f join house h on f.house_id = h.house_id WHERE (month(f.travel_date) = "6" || month(f.travel_date) = "7" || month(f.travel_date) = "8")';

        $review_stmt = $conn->prepare($sql);
        $review_stmt->execute();
        $data = $review_stmt->fetchAll();
        var_dump($data);
        break;
    case 'herfst':
               
        $sql = 'SELECT * FROM flights f join house h on f.house_id = h.house_id WHERE (month(f.travel_date) = "9" || month(f.travel_date) = "10" || month(f.travel_date) = "11")';

        $review_stmt = $conn->prepare($sql);
        $review_stmt->execute();
        $data = $review_stmt->fetchAll();
        
        break;
    case 'winter':
        
        $sql = 'SELECT * FROM flights f join house h on f.house_id = h.house_id WHERE (month(f.travel_date) = "12" || month(f.travel_date) = "1" || month(f.travel_date) = "2")';

        $review_stmt = $conn->prepare($sql);
        $review_stmt->execute();
        $data = $review_stmt->fetchAll();

        break;
    default:

        break;
}
