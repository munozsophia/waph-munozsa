# WAPH-Web Application Programming and Hacking

## Instructor: Dr. Phu Phung

## Student

**Name**: Sophia Munoz

**Email**: [mailto:munozsa@mail.uc.edu](munozsa@mail.uc.edu)

![Sophia's headshot](../../images/headshot.jpg)

# Hackathon 2 - SQL Injection Attacks

## The Lab's Overview

For Hackathon 2,

Outcomes I learned from this hackathon were 

Hackathon2 Folder: [https://github.com/munozsophia/waph-munozsa/tree/main/hackathons/hackathon2](https://github.com/munozsophia/waph-munozsa/tree/main/hackathons/hackathon2).

### Level 0

![Level 0 SQLi Injection](../../images/level-0-sqli-injection.png)
*Level 0 SQLi Injection*

![Level 0 Login Success](../../images/level-0-login-success.png)
*Level 0 Login Success*

### Level 1

Back-End Code Guess:

```php
$sql = 'SELECT * FROM users WHERE username="' . $username . '" AND password=md5("' . $password . '")';
```

![Level 1 SQLi Injection](../../images/level-1-sqli-injection.png)
*Level 1 SQLi Injection*

![Level 1 Login Success](../../images/level-1-login-success.png)
*Level 1 Login Success*

### Level 2

#### a. Detecting SQLi Vulnerabilities

I added a `'` to the `product.php` page for the apple product link [https://waph-hackathon.eastus.cloudapp.azure.com/sqli/level2/product.php?id=1'](https://waph-hackathon.eastus.cloudapp.azure.com/sqli/level2/product.php?id=1'), making it return the fatale error seen in the image below.

![Level 2a Fatal Error](../../images/level-2a-fatal-error.png)
*Level 2a Fatal Error*

#### b. Read and Display Data from Database

##### i. Identify Number of Columns and Display Each Column on the Page

The back-end SQLi code is potentially:

```php
SELECT * FROM products WHERE id=$id
```

From guessing the number of columns, I would get the fatal error below as the number of columns guessed was incorrect.

![Level 2b Fatal Error](../../images/level-2b-fatal-error.png)
*Level 2b Fatal Error*

Once the correct number of columns was guessed, **three**, the page loaded correctly. I injected `product.php?id=1 UNION SELECT 1,2,3-- -` to the URL.

![Level 2b Column Guessed](../../images/level-2b-column-guessed.png)
*Level 2b Column Guessed*

##### ii. Display Information \(username, name, WAPH section) on the Page

##### iii. Display the Database Schema

##### iv. Display Login Credentials in Database and Reveal in Plaintext

- Identify the table and its columns that store username/password to login to the system
- Construct the SQLi code to display all usernames/passwords stored in the database \(Your University's username must be also displayed in the injected queries)
- Reveal the password values

#### c. Login to the system with the stolen username/password