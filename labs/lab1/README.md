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

## Report and deliverables

enerate the report to PDF using the `pandoc` application. All of the code from this lab must also be stored in this folder and included in the report if required. **Please note that the required screenshots must include your virtual machine name or your name with proper captions and be visible, e.g., not too blurry, for grading**. Your report should follow the template provided in Lecture 2 ([https://github.com/waph-phung/waph/blob/main/README-template.md](https://github.com/waph-phung/waph/blob/main/README-template.md))

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

Summarize how you used the telnet program to send a minimal HTTP Request and the Wireshark tool to examine the HTTP messages **(2.5 pts)**. Demonstrate the tasks with the following screenshots, with proper captions and explanations:

  1. A screenshot of your terminal showing the HTTP Request (you typed) and HTTP response from the server. **(2.5 pts)**
  2. A screenshot of the HTTP Request message (you typed in telnet above) in Wireshark, as in Task 1. Is there any difference between this HTTP Request message and the one the browser sent in Task 1? Hints: What fields are missing in this request compared to the one the browser sent? **(2.5 pts)**
  3. A screenshot of the HTTP Response message in Wireshark shows  that the server responded to your request. Is there any difference between this HTTP Response message and the one in Task 1? **(2.5 pts)**

## Part II - Basic Web Application Programming

###   Task 1. (10 pts) CGI Web applications in C

   a. Summarize how you developed a Hello World CGI program in C and compiled and deployed the program on the web server.  **(2.5 pts)**. Demonstrate the task with a screenshot showing that the CGI program is invoked properly in a browser. **(2.5 pts)**
   
   b. **(5 pts)** Summarize and demonstrate with a screenshot that you can write another C CGI program and deploy it with a simple HTML template provided on https://www.w3schools.com/html/ with a proper title, heading, and paragraph, i.e., the course and your information should be there. Include the source code of the file in the report. An example of code inclusion is below.
   
   Included file `helloworld.c`:
   ```C
      #include <stdio.h>
      int main(void) {
        printf("Content-Type: text/plain; charset=utf-8\n\n");
        printf("Hello World CGI! From Phu Phung, WAPH\n\n");
        return 0;
      }
   ```

###  Task 2 (10 pts). A simple PHP Web Application with user input.

a. **(2.5 pts)** Summarize and demonstrate with a screenshot that you have successfully developed a simple `helloworld.php` PHP page with your name and PHP configuration as guided in Lecture 3. 

b. Demonstrate that you developed and deployed an echo Web application in PHP, e.g., `echo.php` with a screenshot with your name in the data **(2.5 pts)**. Include the source code of the file in the report and discuss if there are any security risks in this simple web application. **(5 pts)**

### Task 3 (10 pts). Understanding HTTP GET and POST requests.

a. Briefly describe how you used Wireshark to examine the HTTP GET Request and Response for the `echo.php` page with your name in the data. Demonstrate with two corresponding screenshots in Wireshark. **(2.5 pts)**

b. Summarize using `curl` to create an HTTP POST request with your name in the data. Demonstrate the outcome with a screenshot from the `curl` program **(2.5 pts)**, and a screenshot of the corresponding HTTP Stream in Wireshark. **(2.5 pts)**

c. Compare the similarity/difference between HTTP POST Request and HTTP GET Request, and between the two HTTP Responses above. **(2.5 pts)**    

## Submission

Use the `pandoc` tool to generate the PDF report for submission from the `README.md` file, and make sure that the report and contents are rendered properly.

**Note**: If you face the issue that figures are not rendered in preferred positions, use option `-f markdown-implicit_figures -t pdf` to disable the default `implicit_figures` option in pandoc

The PDF file should be named `your-username-waph-lab1.pdf`, e.g., `phungph-waph-lab1.pdf` 
