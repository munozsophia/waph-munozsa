<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>WAPH-Login page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Login</h1>
  <form action="index.php" method="POST" class="form login">
    Email or Username:
    <input type="text" class="text_field" name="identifier"
      required
      placeholder="Your email or username" /> <br>

    Password: <input type="password" class="text_field" name="password"
      required
      placeholder="Your password" /> <br>

    <label class="checkbox-label">
      <input type="checkbox" name="remember" value="1"> Keep me logged in
    </label>

    <button class="button" type="submit">Login</button>
  </form>
  <p class="form-footer-link">Don't have an account? <a href="registrationform.php">Sign Up</a></p>
</body>
</html>