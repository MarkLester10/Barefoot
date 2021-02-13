<?php if (isset($_SESSION['message'])) : ?>
<p class="py-2 px-2 tracking-wider text-sm inline-block text-center text-white <?php echo ($_SESSION['type'] == 'success') ? 'bg-green-400' : 'bg-red-400' ?>"
  id="message">
  <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    unset($_SESSION['type']);
    ?>
</p>
<?php endif; ?>