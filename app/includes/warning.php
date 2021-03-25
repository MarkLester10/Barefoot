<?php if (isset($_SESSION['verified']) && !$_SESSION['verified']) : ?>
<div class="warning py-4 px-4">
  For added security, we need to verfiy your email address. We've sent a verification link to
  <em><?php echo $_SESSION['email'] ?></em>
</div>
<?php endif; ?>