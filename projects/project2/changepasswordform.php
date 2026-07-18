<?php
	require "session_auth.php";
	$rand = bin2hex(openssl_random_pseudo_bytes(16));
	$_SESSION["nocsrftoken"] = $rand;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>WAPH-Change Password Page</title>
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
	<h1>Change Password</h1>
	<form action="changepassword.php" method="POST" class="form login">
		Username:<!--input type="text" class="text_field" name="username" /--> <?php echo htmlentities($_SESSION["username"]); ?> <br>
		New Password:
		<div class="password-wrapper">
			<input type="password" class="text_field" id="newpassword" name="newpassword"
				required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;])[\w!@#$%^&amp;]{8,}$"
				title="Password must have at least 8 characters with 1 special symbol !@#$%^&amp;, 1 number, 1 lowercase, and 1 UPPERCASE"
				placeholder="Your new password"
				onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : ''); form.renewpassword.pattern = this.value.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');" />
			<button type="button" class="password-toggle-btn" aria-label="Show password" onclick="toggle_show('newpassword', this)">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
			</button>
		</div>
		<br>

		Retype New Password:
		<div class="password-wrapper">
			<input type="password" class="text_field" id="renewpassword" name="renewpassword"
				required
				title="Password does not match"
				placeholder="Retype your new password"
				onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" />
			<button type="button" class="password-toggle-btn" aria-label="Show password" onclick="toggle_show('renewpassword', this)">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
			</button>
		</div>
		<br>

		<input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>" />
		<button class="button" type="submit">Change Password</button>
	</form>
	<p class="form-footer-link"><a href="index.php">Home</a> | <a href="logout.php">Logout</a></p>
</body>
</html>