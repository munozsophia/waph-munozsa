# WAPH-Web Application Programming and Hacking

## Instructor: Dr. Phu Phung

## Student

**Name**: Sophia Munoz

**Email**: [mailto:munozsa@mail.uc.edu](munozsa@mail.uc.edu)

![Sophia's headshot](../../images/headshot.jpg)

# Individual Project 2 - Full-Stack Web Application

## The Project's Overview

For Individual Project 1 there were two tasks. Task 1 has four parts. In Part `a`

Task 2 has six parts. In Part `a`

Outcomes I learned from this project were

Individual Project 2 Repository: [https://github.com/munozsophia/waph-munozsa/tree/main/projects/project2](https://github.com/munozsophia/waph-munozsa/tree/main/projects/project2)

### Task 1. Functional Requirements

#### a. User Registration

Develop a user registration system that allows new users to create accounts by providing a username, password, name, and email address. Implement both client-side and server-side input validation to ensure data integrity.

#### b. Login

Implement a secure login system that authenticates users and allows them to access their profiles. Use session management to maintain user state across the application.

#### c. Profile Management

Enable users to view and edit their profile information, such as name and email.

#### d. Password Update

Allow users to change their passwords securely.

### Task 2. Security and Non-Technical Requirements

#### a. Security

The application must be deployed over HTTPS. Passwords must be hashed before being stored in the database. Do not use the MySQL root account in your PHP code. Ensure all SQL operations use prepared statements to mitigate SQL injection attacks.

#### b. Input Validation

Implement comprehensive input validation on both the client and server sides to prevent common web vulnerabilities such as XSS attacks.

#### c. Database Design

Design and implement a MySQL database to store user information securely. Ensure that database interactions are performed using secure practices.

#### d. Front-End Development

Use HTML, CSS (with an option to integrate a CSS framework or template), and JavaScript to create an intuitive and responsive user interface. Include necessary client-side validations using HTML5 and JavaScript.

#### e. Session Management

Implement secure session management for user authentication. Protect against session hijacking and fixation attacks.

#### f. CSRF Protection

Incorporate mechanisms such as using anti-CSRF tokens to protect against Cross-Site Request Forgery (CSRF) attacks in database modification use cases.