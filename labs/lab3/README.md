# WAPH-Web Application Programming and Hacking

## Instructor: Dr. Phu Phung

## Student

**Name**: Sophia Munoz

**Email**: [mailto:munozsa@mail.uc.edu](munozsa@mail.uc.edu)

![Sophia's headshot](../../images/headshot.jpg)

# Lab 3 - Secure Web Application Development in PHP/MySQL

## The Lab's Overview

For Lab3 there were 4 parts.

Outcomes I learned from this lab were

Lab3 Folder: [https://github.com/munozsophia/waph-munozsa/tree/main/labs/lab3](https://github.com/munozsophia/waph-munozsa/tree/main/labs/lab3).

### a. Database Setup and Management

For Part `a`, I created a new database `waph` and a database account by importing SQL commands from the file `database-account.sql`. The commands implemented are below.

```sql
create database waph;
CREATE USER 'munozsa'@'localhost' IDENTIFIED BY 'Sophia13_m';
GRANT ALL ON waph.* TO 'munozsa'@'localhost';
```

![Database Setup and Account Creation](../../images/database-account-setup.png)
*Database Setup and Account Creation*

I also created a users table by importing SQL commands from the file `database-data.sql`. The commands implemented are below.

```sql
drop table if exists users;
create table users(
   username varchar(50) PRIMARY KEY,
   password varchar(100) NOT NULL
);
INSERT INTO users(username, password) VALUES ('admin', md5('MyPa$$w0rd'));
```

![Database Table Setup](../../images/database-table-setup.png)
*Database Table Setup*

### b. A Simple (Insecure) Login System with PHP/MySQL

For Part `b`, I developed a login system with PHP/MySQL. To achieve this I connected to the database, created a query string for username/password user inputs, executed and handled the query result.

The main code the handled this implementation was in the `index.php` file.

```php
function checklogin_mysql($username, $password) {
      $mysqli = new mysqli('localhost',
                           'munozsa' /*Database username*/,
                           'Sophia13_m' /*Database password*/,
                           'waph' /*Database name*/);
      if ($mysqli->connect_errno) {
         printf("Database connection failed: %s\n", $mysqli->connect_error);
         exit();
      }
      $sql = "SELECT * FROM users WHERE username='" . $username . "' ";
      $sql = $sql . " AND password = md5('" . $password . "')";
      //echo "DEBUG>sql= $sql"; return TRUE;
      $result = $mysqli->query($sql);
      if ($result->num_rows == 1)
         return TRUE;
      return FALSE;
   }
```

I used `echo "DEBUG>sql= $sql"; return TRUE;` to check within the MySQL server if the user input existed within the `waph` database table `users`.

![Login Debug](../../images/login-debug.png)
*Login Debug*

![Login Table Users Filter](../../images/login-users-filter.png)
*Login Table Users Filter*

After Testing I logged in successfully with the fully implemented login system.

![Login Page](../../images/login-page.png)
*Login Page*

![Login Success](../../images/login-success.png)
*Login Success*

### c. Performing XSS and SQL Injection Attacks

### d. Prepared Statement Implementation