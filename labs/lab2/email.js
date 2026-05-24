var shown = false;
function showhideEmail() {
	if (shown) {
		document.getElementById('email').innerHTML = "Show my email";
		shown = false;
	} else {
		var myemail = "<a href='mailto:munozsa" + "@" + "mail.uc.edu'>munozsa" + "@" + "mail.uc.edu</a>";
		document.getElementById('email').innerHTML=myemail;
		shown = true;
	}
}