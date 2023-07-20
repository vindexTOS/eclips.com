<nav class="nav">
  <link rel="stylesheet" href="<?= ASSETS ?>styles/usernavigation.css" />

  <form method="post">
    <div class="login-wrapper" style="display: block;">
      <input name="email" placeholder="email" />
      <input name="password" placeholder="password" />
      <button id="login-btn">Log in</button>
    </div>
    <div class="register-wrapper" style="display: none;">
      <input name="username" placeholder="user name" />
      <input name="email" placeholder="email" />
      <input name="password" placeholder="password" />
      <input name="repeatedpassword" placeholder="repeat password" />
      <button id="signin-btn">Sign in</button>
    </div>
    <div>
      <button type="button" id="registration-btn">Registration</button>
    </div>
  </form>
  <script type="text/javascript" src="<?= ASSETS ?>/js/form.js"></script>
</nav>