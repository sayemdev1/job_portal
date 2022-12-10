<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// $_SESSION["favcolor"] = "green";
// $_SESSION["favanimal"] = "cat";
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
?>

</body>
</html>