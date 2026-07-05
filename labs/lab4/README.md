# WAPH-Web Application Programming and Hacking

## Instructor: Dr. Phu Phung

## Student

**Name**: Sophia Munoz

**Email**: [mailto:munozsa@mail.uc.edu](munozsa@mail.uc.edu)

![Sophia's headshot](../../images/headshot.jpg)

# Lab 4 - Secure Authentication System with Sessions

## The Lab's Overview

For Lab4 there were three tasks. Task 1 has 3 parts. Part `a`

Outcomes I learned from this lab were

Lab4 Folder: [https://github.com/munozsophia/waph-munozsa/tree/main/labs/lab4](https://github.com/munozsophia/waph-munozsa/tree/main/labs/lab4).

### Task 1: Understanding Session Management in a PHP Web Application

#### a. Deploy and test sessiontest.php

![Different Session Values from Different Browsers](../../images/sessiontest-php-deploy-browsers.png)
*Different Session Values from Different Browsers*

#### b. Observe the Session-Handshaking Wireshark

![Wireshark - 1st HTTP Request/Response](../../images/sessiontest-php-wireshark-first-stream.png)
*Wireshark - 1st HTTP Request/Response*

![Wireshark - After 1st HTTP Request/Response](../../images/sessiontest-php-wireshark-after-first-stream.png)
*Wireshark - After 1st HTTP Request/Response*

#### c. Understanding Session Hijacking

![Before Session Hijacking](../../images/sessiontest-php-before-hijacking.png)
*Before Session Hijacking*

![After Session Hijacking](../../images/sessiontest-php-after-hijacking.png)
*After Session Hijacking*

### Task 2: Insecure Session Authentication

#### a. Revised Login System with Session Management

![Authenticated User Logged In](../../images/sessiontest-php-authenticated.png)
*Authenticated User Logged In*

![Authenticated User Logged Out](../../images/sessiontest-php-logged-out.png)
*Authenticated User Logged Out*

![Unathenticated User Alerted](../../images/sessiontest-php-unauthenticated.png)
*Unathenticated User Alerted*

#### b. Session Hijacking Attacks

![Before Session Hijacking Attack](../../images/sessiontest-php-before-hijacking-2b.png)
*Before Session Hijacking Attack*

![After Session Hijacking Attack](../../images/sessiontest-php-after-hijacking-2b.png)
*After Session Hijacking Attack*

### Task 3: Securing Session and Session Authentication

#### a. Data Protection and HTTPS Setup

![SSL Certificate](../../images/ssl-certificate.png)
*SSL Certificate*

![PHP Page on HTTPS](../../images/https-webpage.png)
*PHP Page on HTTPS*

#### b. Securing Session Against Session Hijacking Attacks - Setting HttpOnly and Secure Flags for Cookies

![Secure Session Authentication with HTTPOnly and Secure Flags](../../images/secure-session-authentication.png)
*Secure Session Authentication with HTTPOnly and Secure Flags*

#### c. Securing Session Against Session Hijacking Attacks - Defense In-Depth

![Secure Session Hijacking Attack Detected](../../images/secure-session-hijacking-attack-detected.png)
*Secure Session Hijacking Attack Detected*