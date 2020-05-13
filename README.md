# flip-disburse

Flip - Disburse is PHP Project for request and checking disburse with 3rd party. Project was developed
in PHP 7 and MYSQL

## installation

this project requires PHP 7 and Mysql installation on testing

* Clone the project and enter to project directory
```sh
$ git clone https://github.com/alisyahbana/flip-disburse.git
$ cd filp-disburse
```

* open database_config.php in helper directory
```sh
<?php
class DatabaseConfig 
{    
    private $host = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $database = 'flip_db'; #change this to your DB name
```
* migrate and seed the database
```sh
$ php migrate.php
```
## Features

For disburse request
```sh
$ php request_disburse.php

```
for check request
```sh
$ php check_disburse.php

```


