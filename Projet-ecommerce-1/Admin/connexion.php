<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>
    <h1>Page de login</h1>
<?php
echo $_SESSION["email"];
?>

</body>
</html>