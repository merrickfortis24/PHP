<?php
$search = $searchErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["search"])) {
        $searchErr = "Required!";
    } else {
        $search = $_POST["search"];
        // Redirect only if there's no error
        echo "<script>window.location.href='result.php?search=" . urlencode($search) . "';</script>";
        exit();
    }
}
?>

<style>
.error { color: red; }
</style>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>">
    <span class="error"><?php echo $searchErr; ?></span>
    <br>
    <input type="submit" value="Search">
</form>
