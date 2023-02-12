<!DOCTYPE html>
<html>
<title>Library Information Manufacture</title>
<link rel='shortcut icon' href="ume.png">
<style>
    * {user-select: none;}
    a{color: #FEC203;text-decoration: none;font-size: 25px;transition: 0.3s}
    a:hover{ color: black; text-decoration: none;transition: 0.3s;font-size: 30px;}
    h3{
        display: inline;
        font-family: "Angkor_Sovann_NokorReach";
        margin-left: 40px;
        cursor: pointer;
    }
    h2{
        margin: 0px;
        margin-bottom: 10px;
        font-size: 25px;
        text-align: center;
        font-family: "AKbalthom KhmerLer";
        
    }
    *:focus {outline: none;}
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
    #blackboy{
        cursor: pointer;
        background: black;
        color: #FEC203;
    }
</style>
<body>
<h3><a href="book.php">✕ ចេញ</a></h3>
<h1>ទន្នន័យសៀវភៅ<img src="mainlogo1.png"></h1>
<div>
<h2>បន្ថែមទន្នន័យសៀវភៅ</h2>
<form method="post">
<label>អត្តលេខសៀវភៅ៖</label>
<input style=""type="text" id="blackboy" value="AUTO INCREMENT" readonly>
<label for="title">ឈ្មោះសៀភៅ៖</label>
<input type="text" id="title" name="title">
<label for="author">អ្នកនិពន្ធ៖</label>
<input type="text" id="author" name="author">
<label for="price">តម្លៃ៖</label>
<input type="text" id="price" value="$" name="price">
<label for="edition">ចេញលក់នៅឆ្នាំ៖</label>
<input type="text" id="edition" name="edition">
<label for="supplier">ផលិតផលពី៖</label>
<input type="text" id="supplier" name="supplier">
<input type="submit" name="btnsubmit" value="Save">
</form>
</div>
<?php
if(isset($_POST['btnsubmit'])){
require("db.php");
$title = $_POST["title"];
$author = $_POST["author"];
$price = $_POST["price"];
$edition = $_POST["edition"];
$supplier = $_POST["supplier"];
$sql = "INSERT INTO bookdbs(title,author,price,edition,supplier) 
VALUES('$title','$author','$price','$edition','$supplier');";
if($conn->query($sql) ==true){
header("Location:book.php");
}else{
echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
</body>
</html>
