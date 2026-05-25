# WAPH-Web Application Programming and Hacking

## Instructor: Dr. Phu Phung

## Student

**Name**: Sophia Munoz

**Email**: [mailto:munozsa@mail.uc.edu](munozsa@mail.uc.edu)

![Sophia's headshot](../../images/headshot.jpg)

# Lab 2 - Front-end Web Development

## The Lab's Overview

For Lab2 there were two parts. Part I

Outcomes I learned from this lab were

Lab2 Folder: [https://github.com/munozsophia/waph-munozsa/tree/main/labs/lab2](https://github.com/munozsophia/waph-munozsa/tree/main/labs/lab2).

### Task 1: Basic HTML with forms, and JavaScript 

####  a. HTML
  
I developed the `waph-munozsa.html` file with basic tags, my headshot, and a form. For this lab I created a new images folder within the Lab 2 folder so that the webpage can access my `headshot.jpg` file.

To format the headshot within the webpage to 50 pixels, I entered `<img src="images/headshot.jpg" alt="My headshot" width="50">`.

![HTML Page with Headshot Image](../../images.html-headshot.png)
*HTML Page with Headshot Image*

To add the user input forms to the webpage I used the <form> tag and <input> element with the code below to handle and display the user input to the `echo.php` web application.

```html
<b>Interaction with forms</b>
<div>
   <i>Form with an HTTP GET Request</i>
   <form action="/echo.php" method="GET">
      Your input: <input name="data">
      <input type="submit" name="Submit">
   </form>
</div>
<div>
   <i>Form with an HTTP POST Request</i>
   <form action="/echo.php" method="POST" name="echo_post">
      Your input: <input name="data" onkeypress="console.log('You have pressed a key')">
      <input type="submit" name="Submit">
   </form>
</div>
```

![HTTP GET Request Input](../../images/html-get-request-input.png)

*HTTP GET Request Input*

![HTTP GET Request Output](../../images/html-get-request-output.png)

*HTTP GET Request Output*

![HTTP POST Request Input](../../images/html-post-request-input.png)

*HTTP POST Request Input*

![HTTP POST Request Output](../../images/html-post-request-output.png)

*HTTP POST Request Output*

To view this webpage I ran:

- `$ sudo cp waph-munozsa.html /var/www/html` to deploy HTML page to web server root
- `$ sudo cp -R images/ /var/www/html` to deploy image to web server root

![HTML Deployment Commands in Terminal](../../images/html-deploy-commands.png)

*HTML Deployment Commands in Terminal*

I then entered `localhost/waph-munozsa.html` in the browser. With the webpage rendered this what it looks like with my headshot and the form.
  
####  b. Simple JavaScript

Write the JavaScript code in your HTML page: 

 - Inline JavaScript code in HTML tags to display the current date/time when clicked (2 pts) and to log when a key is pressed (2 pts). 

 - JavaScript code in a \<script> tag to display a digital clock (2 pts)

 - JavaScript code in a JavaScript file and code in the HTML page to show/hide your email when clicked. (4 pts)

 - Display an analog clock using an external JavaScript code and code in your HTML page. (5 pts) 

### Task 2: Ajax, CSS, jQuery, and Web API integration

_Ajax, CSS, and jQuery exercises below are covered in Lecture 5; Web API integration is covered in Lecture 6._

####  a. Ajax

Add new HTML code for a user input `<input>`, a `<button>`, and a `<div>` element with JavaScript code into your page to:

- get the user input when the new button is clicked

- Construct and send an Ajax GET request to the `echo.php` web application (Reuse the code/application in Lab 1)

- Listen to the HTTP response and display the response content in the <div> element

You need to inspect the network connections in the browser to review and illustrate how an Ajax request/response works.

#### b. CSS

Add CSS to your page with inline, internal, and external (one of the provided remote CSS) ones.

#### c. jQuery

Add the jQuery library to your page, and implement HTML and JavaScript code in jQuery to:

  **i.** When the corresponding button is clicked, send an Ajax GET request to the `echo.php` web application and display the response content

  **ii.** Similarly, when the corresponding button is clicked, send an Ajax GET request to the `echo.php` web application and display the response content 


#### d. Web API integration

**i.** Using Ajax on [https://v2.jokeapi.dev/joke/Programming?type=single](https://v2.jokeapi.dev/joke/Programming?type=single) 

Write JavaScript code using jQuery Ajax to send a request and handle the response to display a random joke from the above API when the page is loaded. Inspect the network in the browser to examine the request and response accordingly.

**ii.** Using the `fetch` API  on [https://api.agify.io/?name=input](https://api.agify.io/?name=input)

Add HTML and JavaScript code to use the `fetch()` method to call the above API with user input, and display the response results. Inspect the network in the browser to examine the request and response accordingly.