<?php if (isset($_SESSION['message'])) : ?>
<p class="py-2 px-2 text-white rounded <?php echo ($_SESSION['type'] == 'success') ? 'bg-green-400' : 'bg-red-400' ?>">
  <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    unset($_SESSION['type']);
    ?>
</p>
<?php endif; ?>