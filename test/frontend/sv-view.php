<?php 
session_start();

require_once "../function.php";

$toSignInFile = "signin.php";

if (! isset($_SESSION['user_id'])) {
  redirect($toSignInFile);
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once "../views/headTag.php"; ?>

<body>

<?php 
$message = getFlashMessage("flash-message");
if ($message): 
?>
<div class="flash-message">
    <p class="flash-text">
        <?php echo $message ?>
    </p>
</div>
<?php endif; ?>  
<a href="/inc/signout.inc.php">Thoát</a>
<?php 
echo $_SESSION['user_firstname'];
echo $_SESSION['user_lastname'];
echo $_SESSION['user_birthday'];
?>

</body>
</html>