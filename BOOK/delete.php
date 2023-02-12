<?php
    $bookid = $_GET["bookid"];
    $sql = "DELETE FROM bookdbs WHERE bookid=$bookid;";
    require("db.php");
    if($conn->query($sql) ==true){
        header("Location:book.php");
    }else{
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>