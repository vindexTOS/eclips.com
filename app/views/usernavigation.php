<nav class="nav">
  <link rel="stylesheet" href="<?= ASSETS ?>styles/usernavigation.css" />
  <form method="post" id="auth-form">
    <div class="login-wrapper" style="display: block;">
      <input name="login-email" placeholder="email" />
      <input name="login-password" placeholder="password" />
      <button type="submit" id="login-btn" name="signin-btn">Log in</button>
    </div>
    <div class="register-wrapper" style="display: none;">
      <input name="username" placeholder="user name" />
      <input name="email" placeholder="email" />
      <input name="password" placeholder="password" />
      <button type="submit" name="signup-btn" id="signup-btn">Sign up</button>
    </div>
    <div>
      <button type="button" id="registration-btn"></button>
    </div>
  </form>
  <script type="text/javascript" src="<?= ASSETS ?>/js/form.js"></script>
</nav>