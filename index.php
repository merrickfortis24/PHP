<?php

$name = $address = $email = "";
$nameErr = $addressErr = $emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty ($_POST["name"])) {
        $nameErr = "Name is required!";
    } else {
        $name = $_POST["name"];
    }

    if (empty ($_POST["address"])) {
        $addressErr = "Address is required!";
    } else {
        $address = $_POST["address"];
    }

    if (empty ($_POST["email"])) {
        $emailErr = "Email is required!";
    } else {
        $email = $_POST["email"];
    }

}

?>

<style>
.error { 
     color:red;
}
   
</style>

<br>

<?php include("nav.php"); ?>

<br>
<br>

<form method="POST" action="<?php htmlspecialchars ("PHP_SELF"); ?>">

<input type="text" name= "name" value="<?php echo $name; ?>"> <br>
<span class="error"><?php echo $nameErr; ?> </span> <br>

<input type="text" name= "address" value="<?php echo $address; ?>"> <br>
<span class="error"><?php echo $addressErr; ?> </span> <br>

<input type="text" name= "email" value="<?php echo $email; ?>"> <br>
<span class="error"><?php echo $emailErr; ?> </span> <br>

<input type="submit" name="Submit">

</form>

<hr>

<?php

include("connections.php");

    if ($name && $address && $email) {

        $query = mysqli_query($connections, "INSERT INTO mytbl (name, address, email) VALUES('$name', '$address', '$email')");

        echo"<script language='javascript'>alert('New record has been inserted!')</script>";
        echo "<script>window.location.href='index.php';</script>";

    }
    $view_query = mysqli_query($connections, "SELECT * FROM mytbl");

echo "<table border='1' cellpadding='10'>";
echo "<tr>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Options</th>
      </tr>";

while ($row = mysqli_fetch_assoc($view_query)) {

    $user_id = $row["id"];

    $db_name = $row["name"];
    $db_address = $row["address"];
    $db_email = $row["email"];
    
    echo "<tr>
            <td>$db_name</td>
            <td>$db_address</td>
            <td>$db_email</td>

            <td>

            <a href='Edit.php?id=$user_id'>Update</a>
            &nbsp;
            <a href='ConfirmDelete.php?id=$user_id'>Delete</a>
            </td>
            


          </tr>";
}

echo "</table>";

?>

<hr>

<?php

$Paul = "Paul";
$Mica = "Mica";
$Kaye = "Kaye";
$names = array("$Kaye", "$Paul", "$Mica") ;
foreach ($names as $display_names) {
    echo $display_names . "<br>";
}
?>