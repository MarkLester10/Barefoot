<?php if (isset($_SESSION['message'])) : ?>
<div class="alert <?php echo $_SESSION['type'] ?>">
  <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    unset($_SESSION['type']);
    ?>
</div>
<?php endif; ?>