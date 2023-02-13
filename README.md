# An Example PHP App

This is a PHP app. This is programmed using PHP 8.2.0, Apache Web Server 2.4, HTML, CSS and JavaScript (on Windows PC).

The app reads quiz data from MySQL database (version 5.5 or higher) and shows the quiz items in a page. The user can select answer options and score if the choices were correct. End the quiz to see a result page.

---

## Notes on MySQL, SQL Script and PHP Configuration:

* Basic steps to install MySQL 8 Server, create a sample database and query data:
[mysql_server_install_and_use](https://gist.github.com/prsaya/1755f873071a12ef246c89e245e67bb5).

* Run the `sql_script.sql` SQL script file to create the required database, tables and sample data for this app. See 
[Executing SQL Statements from a Text File](https://dev.mysql.com/doc/refman/8.0/en/mysql-batch-commands.html) in MySQL documentation for instructions to run a batch file.

* For using MySQL with PHP see [MySQLi Installation](https://www.php.net/manual/en/mysqli.installation.php). Note the `php.ini` configurations [extension_dir](https://www.php.net/manual/en/ini.core.php#ini.extension-dir) and `extensions` were enabled to use mysqli extension.

---

## A Screenshot of the App Running in the Browser

![Scrrenshot of quiz app's play page](https://user-images.githubusercontent.com/38682661/218410051-4b19aaaa-4fa9-46ee-89c2-8c16a64d1f52.png)

---
