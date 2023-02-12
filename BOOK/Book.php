<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Library Information</title>
    <link rel='shortcut icon' href="ume.png">
    <style>
        * {user-select: none;}
        select{
            background: black;
            border: none;
            font-family: "Acre Medium";
            padding: 8px 15px;
            margin: 8px 0;
        }
        fieldset {
            border: 3px solid #FEC203;
            background-color: #FEC203;
            font-family: "Acre Medium";
        }
        legend {
            font-family: "Acre Medium";
            margin-bottom: 9px;
            padding-left: 9px;
            font-size: 20px;
        }
        h2{
            font-family: "Angkor_Sovann_NokorReach";
            font-size: 36px;
            margin: 0;
            color: #FEC203;
        }
        img {
            width: 30px;
        }
        div {
            width: 100%;
            width: 100%;
            padding: 10px 50px;
            box-sizing: border-box;
        }
        table {
            margin-top: 5px;
            font-family: "AKbalthom KhmerNew";
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #ddd;
            padding: 9px;
            font-size: 18px;
        }
        td{
            font-family: "Acre Medium";
        }
        tr:nth-child(even){background-color: #f2f2f2;font-family: "Acre Medium";}
        tr:hover {background-color: #ddd;}
        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #FEC203;
            color: black;
        }
        input[type=text], select{
            width: 150px;
            padding: 8px 15px;
            margin: 8px 0;
            border: 0px solid;
            box-sizing: border-box;
            color: #FEC203;
            font-size: 18px;
        }
        #txtsearch{
            color: black;
            font-family: "Acre Medium";
            font-size: 18px
        }
        *:focus {outline: none;}
        .button{
            background-color: #4CAF50;
            font-family: "Acre Medium";
            border: none;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .button2 {background-color: black;transition: 0.3s;}
        .button2:hover {background-color: black; color: #FEC203; transition: 0.3s;}
        .button3 {background-color: #FEC203;color:black; font-size: 17px;transition: 0.3s;}
        .button3:hover {background-color: black; color: #FEC203; transition: 0.3s;}
        .buttonU {background-color: black;}
        .buttonV {background-color: #FEC203;color: black;transition: 0.3s;}
    </style>
</head>
<body>
<div>
<h2>↪ ទន្នន័យសៀវភៅ<img src="mainlogo1.png"></h2>

<?php
    $field = isset($_POST["txtfield"]) ? $_POST["txtfield"] : "";
    $search = isset($_POST["txtsearch"]) ? $_POST["txtsearch"] : "";
    $bookid = $field ==1 ? "Selected" : "";
    $title = $field ==2 ? "Selected" : "";
    $author = $field ==3 ? "Selected" : "";
    $edition = $field ==4 ? "Selected" : "";
    $supplier = $field ==6 ? "Selected" : "";
?>
    <legend>Welcome to Jxonac Open Library.</legend>
<fieldset>
    <form method="post">
    <select style="font-size: 16px;" name="txtfield">
        <option value="hide">Choose field</option>
        <option value="1" <?php echo($bookid)?>>Book ID</option>
        <option value="2" <?php echo($title)?>>Title</option>
        <option value="3" <?php echo($author)?>>Author</option>
        <option value="4" <?php echo($edition)?>>Edition Year</option>
        <option value="6" <?php echo($supplier)?>>Supplier</option>
    </select>
    <input type="text" name="txtsearch" id="txtsearch" value="<?php echo($search)?>">
        Find a type of command
        <input type="submit" name="btnsearch" value="Search" class='button button2'>
        <input type="submit" name="btnreset" value="Refresh" class='button button2'>
        <input type="submit" name="btnasc" value="Sort ASC" class='button button2'>
        <input type="submit" name="btndesc" value="Sort DESC" class='button button2'>
        </form>
</fieldset>
<table>
    <tr>
        <th>អត្តលេខសៀវភៅ</th>
        <th>ឈ្មោះសៀភៅ</th>
        <th>អ្នកនិពន្ធ</th>
        <th>ចេញលក់នៅឆ្នាំ</th>
        <th>តម្លៃ ($)</th>
        <th>ផលិតផលពី៖</th>
    </tr>
<?php
    require("db.php");
    $sql = "SELECT * FROM bookdbs";
    
    if(isset($_POST["btnsearch"])){
        $field = $_POST['txtfield'];
        $text = $_POST['txtsearch'];
        switch($field){
            case '1': $sql .= " WHERE bookid=$text"; break;
            case '2': $sql .= " WHERE title LIKE '$text%'"; break; 
            case '3': $sql .=" WHERE author='$text'"; break;
            case '4': $sql .=" WHERE edition LIKE '%$text%'"; break;
            case '5': $sql .=" WHERE price LIKE '%$text%'"; break;
            case '6': $sql .=" WHERE supplier LIKE '%$text%'"; break;
        }
    }
    if(isset($_POST["btnasc"])){
        $field = $_POST['txtfield'];
        switch($field){
            case '1' : $sql .= " ORDER BY bookid ASC;"; break;
            case '2' : $sql .= " ORDER BY title ASC;"; break;
            case '3' : $sql .= " ORDER BY author ASC;"; break;
            case '4' : $sql .= " ORDER BY edition ASC;"; break;
            case '5' : $sql .= " ORDER BY price ASC;"; break;
            case '6' : $sql .= " ORDER BY supplier ASC;"; break;
        }
    }

    if(isset($_POST["btndesc"])){
        $field = $_POST['txtfield'];
        switch($field){
            case '1' : $sql .= " ORDER BY bookid DESC;"; break;
            case '2' : $sql .= " ORDER BY title DESC;"; break;
            case '3' : $sql .= " ORDER BY author DESC;"; break;
            case '4' : $sql .= " ORDER BY edition DESC;"; break;
            case '5' : $sql .= " ORDER BY price DESC;"; break;
            case '6' : $sql .= " ORDER BY supplier DESC;"; break;
        }
    }
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>" . $row["bookid"] . "</td>";
    echo "<td>" . $row["title"] . "</td>";
    echo "<td>" . $row["author"] . "</td>";
    echo "<td>" . $row["edition"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    echo "<td>" . $row["supplier"] . "
        <a href='edit.php?bookid=" . $row["bookid"] . "' class='button buttonV'>Edit</a> | 
        <a href='delete.php?bookid=" . $row["bookid"] . "' class='button buttonU' onclick='myFunction();'>Delete</a>
    </td>";
    echo "</tr>";
}
?>
</table>
<p><a href="add.php" class="button button3">Add a New Book</a> </p>
</div>
</body>
</html>
