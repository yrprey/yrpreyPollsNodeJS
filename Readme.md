# YrpreyPollsNodeJS

![yprey](https://imgur.com/uYfdBN9)

**Created by [Fernando Mengali](https://www.linkedin.com/in/fernando-mengali-273504142/)**

YrpreyPollsNodeJS is a framework based poll system. The framework perfectly simulates a tasks system that can help a user in managing taks and actions, but it has vulnerabilities based on OWASP TOP 10 WebApp 2021 and API 2019. The framework was developed to teach and learn details in Pentest (testing penetration) and Application Security. In the context of Offensive Security, vulnerabilities contained in web applications can be identified, exploited and compromised. For application security professionals and experts, the framework provides an in-depth understanding of code-level vulnerabilities. Yrprey, making it valuable for educational, learning and teaching purposes in the field of Information Security. For more information about the vulnerabilities, we recommend exploring the details available at [yrprey.com](https://yrprey.com).

#### Features
 - Based on OWASP's top 10 vulnerabilities for Web Application and API.

Initially, a non-registered user only has access to the index.php page. The user can authenticate to the system with the credentials admin and the password admin. Functionalities include adding tasks, edit and removals.
yrprey tasks is not recommended for personal or commercial use, only for laboratory use and learning about exploiting and patching vulnerabilities.

## The framework was written with the following technologies:

* 1º - NodeJS
* 2º - PHP
* 3º - Materialize
* 4º - JavaScript
* 5º - MariaDB
* 5º - Ajax

#### List of Vulnerabilities

In this section, we have a comparison of the vulnerabilities present in the framework with the routes and a comparison between the OWASP TOP 10 Web Application.
This table makes it easier to understand how to exploit vulnerabilities in each systemic function.
In the last two columns we have a parenthesis and the scenario associated with the OWASP TOP 10 Web Applications and API, facilitating the understanding of the theory described on the page https://owasp.org/www-project-top-ten/.
After understanding the scenario and the vulnerable route, the process of identifying and exploiting vulnerabilities becomes easier. If you are an Application Security professional, knowing the scenario and routes of endpoints makes the process of identifying and correcting vulnerabilities easier with manual Code Review Security techniques or automated SAST, SCA and DAST analyses

Complete table with points vulnerables, vulnerability details and a comparison between OWASP TOP 10 Web Application vulnerabilities:

|Qtde |          **OWASP TOP 10**                          |**Method**|            **Path**            |            **Details**                            |
|----:|:--------------------------------------------------:|:--------:|:------------------------------:|:-------------------------------------------------:|
| 01  |  A01:2021-Broken Access Control                    |   POST   |  /about.php?img=logo.webp      |                  Path Traversal                   |
| 02  |  A01:2021-Broken Access Control (API) (NodeJS)     |   POST   |  /user?id={id}                 |          Broken Object Level Authorization        |
| 03  |  A01:2021-Broken Access Control                    |   POST   |  /login.php                    |               Password Weak                       |
| 04  |  A01:2021-Broken Access Control (API) (NodeJS)     |   GET    |  /v1/user                      |               Improper Assets Management          |
| 05  |  A02:2021-Cryptographic Failures                   |   POST   |  /index.php                    |             Store password with base64            |
| 06  |  A03:2021-Injection                                |   POST   |  /register.php                 |              Remote Command Execution             |
| 06  |  A03:2021-Injection                                |   POST   |  /index.php                    |        SQL Injection - Authentication             |
| 07  |  A03:2021-Injection                                |   POST   |  /index.php                    |            Cross-Site Request Forgery             |
| 08  |  A03:2021-Injection                                |   POST   |  /index.php                    |            Cross-Site Scripting Stored            |
| 09  |  A03:2021-Injection                                |   POST   |  /login.php                    |            SQL Injection                          |
| 10  |  A03:2021-Injection                                |   POST   |  /login.php                    |            Cross-Site Request Forgery             |
| 11  |  A03:2021-Injection                                |   GET    |  /logout.php?url=http://...    |          Redirect to other url                    |
| 12  |  A03:2021-Injection (NodeJS)                       |   POST   |  /actions.php?action=get_poll  |            SQL Injection                          |
| 13  |  A03:2021-Injection (NodeJS)                       |   POST   |  /actions.php?action=get_res.. |            SQL Injection                          |
| 14  |  A03:2021-Injection (NodeJS)                       |   POST   |  /actions.php?action=create... |            SQL Injection                          |
| 15  |  A03:2021-Injection (NodeJS)                       |   POST   |  /actions.php?action=vote...   |            SQL Injection                          |
| 16  |  A03:2021-Injection                                |   GET    |  /actions.php?action=http://...|          Redirect to other url                    |
| 17  |  A02:2021-Cryptographic Failures                   |   POST   |  /.idea/workspace.xml          |                    File Exposure                  |
| 18  |  A02:2021-Cryptographic Failures                   |   POST   |  /htdocs/.htaccess             |                    File Exposure                  |
| 19  |  A02:2021-Cryptographic Failures                   |   POST   |  /Root                         |                    File Exposure                  |
| 20  |  A05:2021-Security Misconfiguration                |   GET    |  /phpinfo.php                  |                    File Exposure                  |
| 21  |  A05:2021-Security Misconfiguration                |   GET    |  /bkp.zip                      |                    File Exposure                  |
| 22  |  A02:2021-Cryptographic Failures  (API)            |   POST   |  /login.php                    |             Excessive Data Exposure               |
| 23  |  A02:2021-Cryptographic Failures                   |   POST   |  /database.php.old             |             Credential harcoded database          |
| 24  |  A02:2021-Cryptographic Failures                   |   POST   |  /database.php.txt             |             Credential harcoded database          |
| 25  |  A05:2021-Security Misconfiguration                |   POST   |  /index.php                    |   Intercept Credentials with Sniffer or BurpSuite |
| 26  |  A05:2021-Security Misconfiguration                |   GET    |  /WS_FTP.LOG                   |            Misconfiguration                       |
| 27  |  A05:2021-Security Misconfiguration                |   GET    |  /WS_FTP.INI                   |            Misconfiguration                       |
| 28  |  A05:2021-Security Misconfiguration                |   GET    |  /WinSCP.log                   |            Misconfiguration                       |
| 29  |  A05:2021-Security Misconfiguration                |   GET    |  /WS_FTP.INI                   |            Misconfiguration                       |
| 30  |  A05:2021-Security Misconfiguration                |   GET    |  /curl.log                     |            Misconfiguration                       |
| 31  |  A05:2021-Security Misconfiguration                |   GET    |  /filezilla.log                |            Misconfiguration                       |
| 32  |  A05:2021-Security Misconfiguration                |   GET    |  /filezilla.xml                |            Misconfiguration                       |
| 33  |  A05:2021-Security Misconfiguration                |   GET    |  /ssh-key.priv                 |            Misconfiguration                       |
| 34  |  A05:2021-Security Misconfiguration                |   GET    |  /index.php                    |            Header - Not Definied HttpOnly         |
| 35  |  A05:2021-Security Misconfiguration                |   GET    |  /index.php                    |  Header - Not Definied Frame Options Header       |
| 36  |  A05:2021-Security Misconfiguration                |   GET    |  /index.php                    |            Header - Not Definied HSTS             |
| 37  |  A05:2021-Security Misconfiguration                |   GET    |  /index.php                    |   Header - Not Definied Content Security Policy   |
| 38  |  A05:2021-Security Misconfiguration                |   GET    |  /index.php                    |            Header - Not Definied XSS Protection   |
| 39  |  A05:2021-Security Misconfiguration                |   GET    |  /adminer.php                  |            Adminer default                        |
| 40  |  A05:2021-Security Misconfiguration                |   GET    |  /phpminiadmin.php             |            PHP Mini Admin default                 |
| 41  |  A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/jquery.min.js             |  XSS to function: html,append,load,after..        |
| 42  |  A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/jquery.min.js             |  Prototype Pollution to function: extend          |
| 43  |  A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/lodash.min.js             |            Code Injection across template         |
| 44  |  A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/lodash.min.js             | ReDoS to functions: toNumber, trim, trimEnd       |
| 45  |  A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/bootstrap.min.js          |  XSS to function: html,append,load,after..        |
| 46  |  A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/moment.min.js             |  Regular Expression Denial of Service (ReDoS)     |
| 47  |  A06:2021-Vulnerable and Outdated Components       |   GET    |  /js/select2.min.js            |             Cross-site Scripting                  |
| 48  |  A07:2021-Identif. and Authentication Failures     |   POST   |  /index.php                    |                  username bypass                  |
| 49  |  A03:2021-Security Logging and Monitoring Failures |   POST   |  /register.php                 |     Security Logging and Monitoring Failures      |

## How Install

* 1º - Install and configure Apache, PHP and MariaDB on your Linux
* 2º - Import the YRpreyPHP files to /var/www/
* 3º - Create a database named "yrprey"
* 4º - Import the yrprey.sql into the database.
* 5º - Access the address http://localhost in your browser
* 6º - In php ini change allow_url_include to "On".
* 7º - Create a directory named nodeJS in the Xampp path: C:\xampp\htdocs
* 8º - Add the app.js file. Necessary packages for app.js to run successfully.
* 9º - In the Gitbash terminal or Windows Command Prompt, install the packages.


```python

npm install express mysql body-parser express-session cors debug

```

10º - In the Gitbash terminal or Windows Command Prompt, start the server with command.
```python
node app.js
```

11º - In the Gitbash terminal, give write permission to the file file.php.
```python
chmod 777 file.php
```

## Observation
You can test on Xampp or any other platform that supports PHP and MariaDB.

## Reporting Vulnerabilities

Please, avoid taking this action and requesting a CVE!

The application intentionally has some vulnerabilities, most of them are known and are treated as lessons learned. Others, in turn, are more "hidden" and can be discovered on your own. If you have a genuine desire to demonstrate your skills in finding these extra elements, we suggest you share your experience on a blog or create a video. There are certainly people interested in learning about these nuances and how you identified them. By sending us the link, we may even consider including it in our references.
