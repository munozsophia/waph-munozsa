<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>WAPH-Sign Up Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Sign Up</h1>
  <form action="addnewuser.php" method="POST" class="form login">
    Name:
    <input type="text" class="text_field" name="name"
      required
      placeholder="Your full name" /> <br>

    Email: <input type="text" class="text_field" name="email"
      required pattern="^[\w.-]+@[\w-]+(\.[\w-]+)*$"
      title="Please enter a valid email"
      placeholder="Your email address"
      onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" /> <br>

    Username:
    <input type="text" class="text_field" name="username"
      required pattern="\w+"
      title="Please enter a valid username"
      placeholder="Your username"
      onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" /> <br>

    Password: <input type="password" class="text_field" name="password"
      required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;])[\w!@#$%^&amp;]{8,}$"
      title="Password must have at least 8 characters with 1 special symbol !@#$%^&amp;, 1 number, 1 lowercase, and 1 UPPERCASE"
      placeholder="Your password"
      onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : ''); form.repassword.pattern = this.value;" /> <br>

    Retype Password: <input type="password" class="text_field" name="repassword"
      required
      title="Password does not match"
      placeholder="Retype your password"
      onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" /> <br>

    <button class="button" type="submit">Sign Up</button>
  </form>
  <p class="form-footer-link">Already a member? <a href="form.php">Login</a></p>
</body>
</html>