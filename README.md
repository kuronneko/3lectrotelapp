# 3lectrotel App

### Description: 
Web App that allows you to generate statistical graphs of the information obtained through report forms. OO, MVC, DAO, DTO PHP73(RAW)+JQUERY/AJAX+BOOTSTRAP4+HIGHCHARTS.

### Features:
* HighCharts Library to show statistical graphics
* Advanced SQL queries
* AJAX
### Technologies/Libraries:
PHP 7.3, Jquery, Ajax, Bootstrap 4, Highcharts
### Preview
<p> <img src="https://github.com/kuronneko/kuronneko.github.io/blob/master/assets/img/portfolio3lectrotel.png" width="450"> </p>

### How to use/install

* MySQL Database: https://github.com/kuronneko/3lectrotelapp/blob/master/electrotelfinal.sql
* Import Database in phpMyAdmin
* Set main folder URL at model/utils/config.php
```
example: static $nav = '/xampp/htdocs/electrotel/navbar.php';
```
* Set include config.php location in all php files
```
example: include("/xampp/htdocs/electrotel/model/utils/config.php");
```
* Set Database connection params at /model/utils/conexion.php
* Login as super admin
```
User: master
Password: master
```
     
### Issues/Future Updates
* Bind SQL queries needed
* Form validation needs to be fix
* Label on Forms
