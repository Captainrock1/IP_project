<?php
    include('server.php');
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must login first";
        header('location: welcome.php');
    }
    if(isset($_GET['id'])){
        $selec_bookid = $_GET['id'];
        $room_data = "SELECT rooms.room_id, booking.book_id, rooms.room_status, rooms.room_number
        FROM rooms INNER JOIN booking ON rooms.room_id = booking.room_id
        WHERE (((booking.book_id)='$selec_bookid'));";
        $run_select = mysqli_query($db, $room_data);
        while($select_roomid = mysqli_fetch_array($run_select)){
            $room_id = $select_roomid['room_id'];
        }     
    }
    if(isset($_GET['id'])){
        $selec_bookid = $_GET['id'];
        $selec_delete = "DELETE FROM booking WHERE book_id = '$selec_bookid'";
        $chang_status = "UPDATE rooms SET room_status = 0 WHERE room_id = '$room_id'";
        if(mysqli_query($db, $selec_delete) && mysqli_query($db, $chang_status)){
            header('location: bookingdetail.php');
        }
    }
?>