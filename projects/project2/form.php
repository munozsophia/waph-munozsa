<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>WAPH-Login Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script type="text/javascript">
    var EYE_ICON = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>';
    var EYE_OFF_ICON = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.94 10.94 0 0 1 12 20c-7 0-11-8-11-8a21.8 21.8 0 0 1 5.06-6.94M9.9 4.24A10.94 10.94 0 0 1 12 4c7 0 11 8 11 8a21.8 21.8 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>';
    function toggle_show(id, btn) {
      var el = document.getElementById(id);
      var showing = el.type === 'password';
      el.type = showing ? 'text' : 'password';
      btn.innerHTML = showing ? EYE_OFF_ICON : EYE_ICON;
      btn.setAttribute('aria-label', showing ? 'Hide password' : 'Show password');
    }
  </script>
</head>
<body>
  <h1>Login</h1>
  <form action="index.php" method="POST" class="form login">
    Email or Username:
    <input type="text" class="text_field" name="identifier"
      required
      placeholder="Your email or username" /> <br>

    Password:
    <div class="password-wrapper">
      <input type="password" class="text_field" id="password" name="password"
        required
        placeholder="Your password" />
      <button type="button" class="password-toggle-btn" aria-label="Show password" onclick="toggle_show('password', this)">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
      </button>
    </div>
    <br>

    <label class="checkbox-label">
      <input type="checkbox" name="remember" value="1"> Keep me logged in
    </label>

    <button class="button" type="submit">Login</button>
  </form>
  <p class="form-footer-link">Don't have an account? <a href="registrationform.php">Sign Up</a></p>
</body>
</html>