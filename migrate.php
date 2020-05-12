<?php
include_once("helper/database.php");
$database = new Database();

$data = $database->execute("
    CREATE TABLE disburse_items (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_disburse VARCHAR(225) DEFAULT NULL,
        amount INT(11),
        status VARCHAR(225) DEFAULT NULL,
        stamp timestamp DEFAULT current_timestamp,
        bank_code VARCHAR(225),
        account_number INT(11),
        beneficiary_name VARCHAR(225) DEFAULT NULL,
        remark VARCHAR(225),
        receipt VARCHAR(225) DEFAULT NULL,
        timeserved timestamp DEFAULT current_timestamp,
        fee INT(11) DEFAULT NULL
        );
    ");

$seedTable = $database->execute("INSERT INTO `disburse_items` 
    (`id`, `id_disburse`, `amount`, `status`, `stamp`, `bank_code`, `account_number`, `beneficiary_name`, `remark`, `receipt`, `timeserved`, `fee`) 
    VALUES 
        (NULL, NULL, '20000', NULL, NOW(), 'bca', '1', NULL, 'sample remark', NULL, NOW(), NULL),
        (NULL, NULL, '10000', NULL, NOW(), 'mandiri', '2', NULL, 'sample remark', NULL, NOW(), NULL),
        (NULL, NULL, '30000', NULL, NOW(), 'bni', '3', NULL, 'sample remark', NULL, NOW(), NULL),
        (NULL, NULL, '40000', NULL, NOW(), 'bri', '4', NULL, 'sample remark', NULL, NOW(), NULL),
        (NULL, NULL, '50000', NULL, NOW(), 'permata', '5', NULL, 'sample remark', NULL, NOW(), NULL)
        ");

if ($seedTable) {
    echo "succesfully migrate database";
} else {
    echo "failed to migrate";
}