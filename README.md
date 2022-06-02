# 3lectrotel App
Web App that allows you to generate statistical graphs of the information obtained through report forms. OO, MVC, DAO, DTO PHP73(RAW)+JQUERY/AJAX+BOOTSTRAP4+HIGHCHARTS.

### Preview
<p> <img src="https://github.com/kuronneko/kuronneko.github.io/blob/master/assets/img/portfolio3lectrotel.png" width="450"> </p>

### How to use/install

Required:
* MySQL Database: https://github.com/kuronneko/3lectrotelapp/blob/master/electrotelfinal.sql
* Php 7.3 and phpMyAdmin (XAMPP)

`1.` Import Database in phpMyAdmin

`2.` Set main folder URL at model/utils/config.php
      
     example: static $nav = '/xampp/htdocs/electrotel/navbar.php';

`3.` Set include config.php location in all php files

     example: include("/xampp/htdocs/electrotel/model/utils/config.php");
     
`4.` Set Database connection params at /model/utils/conexion.php
     
`5.` Login as super admin

     User: master
     Password: master
     
### Issues/Future Updates
* Bind SQL queries needed
* Form validation needs to be fix
* Label on Forms
