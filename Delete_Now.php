<?php
include("connections.php");

$user_id = $_POST["user_id"];

mysqli_query($connections, "DELETE FROM mytbl WHERE id= '$user_id'");




?>