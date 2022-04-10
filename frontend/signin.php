<?php 

require_once "../models/database.php";

$result = (new Database("uneti"))->table("extra")->offset(1)->selectAll();
?>

<!DOCTYPE html>
<html lang="en"> 

<?php  require_once "../views/headTag.php" ?>

<body>

</body>

</html>