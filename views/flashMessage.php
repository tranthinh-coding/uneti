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