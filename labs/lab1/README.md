# WAPH-Web Application Programming and Hacking

## Instructor: Dr. Phu Phung

## Student

**Name**: Sophia Munoz

**Email**: [mailto:munozsa@mail.uc.edu](munozsa@mail.uc.edu)

![Sophia's headshot](../../images/headshot.jpg)

# Lab 1 - Foundations of the Web 

### Part I: The Web and HTTP Protocol

   1. Task 1 (10 pts). Familiar with the Wireshark tool and HTTP protocol
   2. Task 2 (10 pts). Understanding HTTP using telnet and Wireshark.

### Part II: Basic Web Application Programming

   1. Task 1 (10 pts). CGI Web applications in C
   2. Task 2 (10 pts). A simple PHP Web Application with user input.
   3. Task 3 (10 pts). Understanding HTTP GET and POST requests

generate the report to PDF using the `pandoc` application. All of the code from this lab must also be stored in this folder and included in the report if required.

## The Lab's Overview

For Lab1 there were two parts. Part I has two tasks. The first is getting familiar with Wireshark and the use of the HTTP protocol within this tool. For this task I downloaded Wireshark through the terminal and started capturing packets. For task 2, . Part II had three tasks.

Outcomes I learned from this lab are

Lab1 Folder: [https://github.com/munozsophia/waph-munozsa/tree/main/labs/lab1](https://github.com/munozsophia/waph-munozsa/tree/main/labs/lab1).


## Part I - The Web and HTTP Protocol

### Task 1. Familiar with the Wireshark tool and HTTP protocol

I used the Wireshark tool to capture packets. When I typed in the website [http://example.com/index.html](http://example.com/index.html), Wireshark captured the HTTP Request and Response of the Browser and Server interacting.

I was able to successfully run the tool once, before I exited out of the tool and screenshotted the HTTP results. I made sure to follow the lecture instructions of deleting cache and browser history. Unfortunately, this did not work. Wireshark wasn't able to capture http protocol packets again. Based on my research, this was due to the fact that when I put the link in my browser, the server at example.com automatically redirects the **http://** request to **https://**.

My solution to this issue was to capture the packets by running `curl http://example.com/index.html` in the terminal. This way prevents any redirection from happening. In this case it was a successful attempt and I was able to filter the HTTP protocol packets. Given this in context, my HTTP results are a little different.

![HTTP Request Message](../../images/http-request.png)
*HTTP Request Message in Wireshark*

![HTTP Response Message](../../images/http-response.png)
*HTTP Response Message in Wireshark*

![HTTP Stream in Wireshark](../../images/http-stream.png)
*HTTP Stream in Wireshark*

### Task 2. Understanding HTTP using telnet and Wireshark

I used the telnet program to send a minimal HTTP Request through the terminal while capturing packets in Wireshark. The HTTP Request and Response was different compared to Task 1 as the amount of data taken was much less, especially for the HTTP Request.

  1. By typing in `telnet example.com 80`, I connected to the server through port 80. Then by typing in the minimal HTTP Request as below, I received the HTTP Response.
  ![HTTP telnet Terminal Request and Response](../../images/http-telnet-terminal.png)
  *HTTP telnet Terminal Request and Response*

  2. There is a difference between this HTTP Request message and the one sent by the browser in Task 1. The fields missing in this request are all except `GET /index.html HTTP/1.1` and `Host: example.com`.
  ![HTTP telnet Wireshark Request](../../images/http-telnet-request.png)
  *HTTP telnet Wireshark Request*
  ![HTTP telnet Wireshark Stream](../../images/http-telnet-stream.png)
  *HTTP telnet Wireshark Stream*

  3. There isn't as much difference between the telnet HTTP Response message and the browser HTTP Response message from Task 1. But the Task 1 message hold more information on cache-control, last-modified, content-encoding, and more.
  ![HTTP telnet Wireshark Response](../../images/http-telnet-response.png)
  *HTTP telnet Wireshark Response*

## Part II - Basic Web Application Programming

###   Task 1. (10 pts) CGI Web applications in C

   a. I developed a Hello World CGI program in C by first creating a helloworld.c file and programming the code to output `Hello World CGI! From Sophia Munoz, WAPH`. This also meant having to code print out the Content-Type, which was text/plain. From there I compiled the program by typing in `$ gcc helloworld.c -o helloworld.cgi` and running the program, `$ ./helloworld.cgi`.

   To deploy the program to the Apache Web Server, I first enabled the CGI daemon \(`$ sudo a2enmod cgid`) and restarted the server \(`$ sudo systemctl restart apache2`). Once I completed that step, I copied the `helloworld.cgi` file to the corresponding `/usr/lib/cgi-bin` folder and was able to deploy the CGI program to the webserver.

   ![CGI Program in Plain Text](../../images/cgi-program-plain.png)
   *CGI Program in Plain Text*
   
   b. I developed the index CGI program in C by creating an index.c file. All steps to compiling, deploying, and running the program are the same as the previous CGI program mentioned above, except the code for the program is in HTML. I had to make sure that the Content-Type was text/html so that the program was properly displayed and that I properly formatted each lined of HTML.
   
   Included file `index.c`:
   ```C
      #include <stdio.h>
      int main(void) {
         printf("Content-Type: text/html; charset=utf-8\n\n");
         printf("<!DOCTYPE html>\n");
         printf("<html>\n");
         printf("<head>\n");
         printf("<title>WAPH - Sophia Munoz</title>\n");
         printf("</head>\n");
         printf("<body>\n");
         printf("<h1>Web Application Programming and Hacking</h1>\n");
         printf("<p>This is a CGI application made by Sophia Munoz.</p>\n");
         printf("</body>\n");
         printf("</html>\n");
         return 0;
      }
   ```

   ![CGI Program in HTML Text](../../images/cgi-program-html.png)
   *CGI Program in HTML Text*

###  Task 2 (10 pts). A simple PHP Web Application with user input.

a. To develop a `helloworld.php` PHP page, I created the file and coded in the string `Hello World, this is the first PHP by Sophia Munoz, WAPH` to echo and the `phpinfo()` for testing purposes. This code was encased by `<?php ?>`. To deploy the program to the webserver root directory, I typed in the terminal `$ sudo cp helloworld.php /var/www/html`.

![PHP helloworld Program](../../images/php-program-helloworld.png)
*PHP helloworld Program*

b. To develop the `echo.php` PHP page, I created the file and instead of the string, I used the global variable `$_REQUEST[..]`. This is able to get input from an HTTP Request. This means there is vulnerabilities for attackers to exploit since the global variable handles both HTTP GET and POST. It poses a security risk due to its convenient model.

Included file `echo.php`
```PHP
   <?php
      echo $_REQUEST["data"];
   ?>
```

![PHP echo Program](../../images/php-program-echo.png)
*PHP echo Program*

### Task 3 (10 pts). Understanding HTTP GET and POST requests.

a. Briefly describe how you used Wireshark to examine the HTTP GET Request and Response for the `echo.php` page with your name in the data. Demonstrate with two corresponding screenshots in Wireshark.

![HTTP GET Request echo Program](../../images/php-get-request-echo.png)
*HTTP GET Request echo Program*

![HTTP GET Response echo Program](../../images/php-get-response-echo.png)
*HTTP GET Response echo Program*

b. Summarize using `curl` to create an HTTP POST request with your name in the data. Demonstrate the outcome with a screenshot from the `curl` program **(2.5 pts)**, and a screenshot of the corresponding HTTP Stream in Wireshark. **(2.5 pts)**

![HTTP POST Request & Stream echo Program](../../images/php-post-request-stream.png)
*HTTP POST Request & Stream echo Program*

![HTTP POST Response echo Program](../../images/php-post-response.png)
*HTTP POST Response echo Program*

c. Compare the similarity/difference between HTTP POST Request and HTTP GET Request, and between the two HTTP Responses above. **(2.5 pts)**    

## Submission

Use the `pandoc` tool to generate the PDF report for submission from the `README.md` file, and make sure that the report and contents are rendered properly.

**Note**: If you face the issue that figures are not rendered in preferred positions, use option `-f markdown-implicit_figures -t pdf` to disable the default `implicit_figures` option in pandoc

The PDF file should be named `your-username-waph-lab1.pdf`, e.g., `phungph-waph-lab1.pdf` 
