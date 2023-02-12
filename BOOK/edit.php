<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Library Information Editor</title>
<link rel='shortcut icon' href="ume.png">
<style>
    * {user-select: none;}
    a{color: #FEC203;text-decoration: none;font-size: 25px;transition: 0.3s}
    a:hover{ color: black; text-decoration: none;transition: 0.3s;font-size: 30px;}
    h3{
        display: inline;
        font-family: "Angkor_Sovann_NokorReach";
        margin-left: 40px;
    } 
    h1{
        font-family: "Angkor_Sovann_NokorReach";
        font-size: 36px;
        margin: 0;
        color: #FEC203;
        text-align: center;
    }
    img {
        width: 30px;
    }
    h2{
        margin: 0px;
        margin-bottom: 10px;
        font-size: 25px;
        text-align: center;
        font-family: "AKbalthom KhmerLer";
        
    }
    *:focus {outline: none;}
    input[type=text], select {
        width: 100%;
        padding: 10px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 15px;
        font-family: "Acre Medium";
        border: none;
    }
    input[type=submit] {
        width: 100%;
        background-color: black;
        color: #FEC203;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 17px;
        font-family: "Acre Medium";
    }
    input[type=submit]:hover {background-color: white; color:black;transition: 0.3s;}
    div {
        font-size: 17px;
        width: 300px;
        height: 40%;
        border-radius: 5px;
        background-color: #FEC203;
        font-family: "AKbalthom KhmerNew";
        padding: 20px;
        margin: auto;
    }
    #bookid{
        cursor: pointer;
        background: black;
        color: #FEC203;
    }
</style>
</head>
<body>
<?php
    if(!isset($_POST['btnsubmit'])){
        require("db.php");
        $bookid = $_GET['bookid'];
        $sql = "SELECT * FROM bookdbs WHERE bookid=$bookid;";
        $result = $conn->query($sql);
    if($row=$result->fetch_assoc()){
?>
<h3><a href="book.php">✕ ចេញ</a></h3>
<h1>ទន្នន័យសៀវភៅ<img src="mainlogo1.png"></h1>
<div>
    <h2>កែទន្នន័យសៀវភៅ</h2>
    <form method="post">
        <label for="bookid">អត្តលេខសៀវភៅ៖</label>
        <input type="text" id="bookid" name="bookid" value="<?php echo($row['bookid']) ?>" readonly>

    <label for="title">ឈ្មោះសៀភៅ៖</label>
    <input type="text" id="title" name="title" value="<?php echo($row['title']) ?>">

    <label for="author">អ្នកនិពន្ធ៖</label>
    <input type="text" id="author" name="author" value="<?php echo($row['author']) ?>">

    <label for="price">តម្លៃ៖</label>
    <input type="text" id="price" name="price" value="<?php echo($row['price']) ?>">

    <label for="edition">ចេញលក់នៅឆ្នាំ៖</label>
    <input type="text" id="edition" name="edition" value="<?php echo($row['edition']) ?>">

    <label for="supplier">ផលិតផលពី៖</label>
    <input type="text" id="supplier" name="supplier" value="<?php echo($row['supplier']) ?>">

    <input type="submit" name="btnsubmit" value="Save">
    </form>
</div>
<?php
    }
}
?>

<?php
if(isset($_POST['btnsubmit'])){
    require("db.php");
    $bookid = $_POST["bookid"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $price = $_POST["price"];
    $edition = $_POST["edition"];
    $supplier = $_POST["supplier"];
    $sql = "UPDATE bookdbs SET
title='$title',author='$author',price='$price',edition='$edition',supplier='$supplier' WHERE bookid=$bookid;";
    if($conn->query($sql) ==true){
        header("Location:book.php");
    }else{echo "Error: " . $sql . "<br>" . $conn->error;}
}
?>
</body>
</html>
