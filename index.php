<?php
/**
 * Created by PhpStorm.
 * User: Roma
 * Date: 06.12.2016
 * Time: 17:59
 */

$db = setConnection();

if (!empty($_POST['name']) && !empty($_POST['favorite'])) {
    $result = createTable('users_info', $db);

    if (empty($_POST['order_number'])) {
        $random_number = intval(rand(0, 0) . rand(6, 9) . rand(6, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9));
        $_POST['order_number'] = $random_number;
    }

    $next = insert_data('users_info', $db);
}

$the_last_record = getTheLastRecord('users_info', $db);
$prepared_array = getAllTheRecords('users_info', $db);

require_once('form-mini.php');

$db->close();


// additional functions:

function setConnection()
{
    $db = new mysqli('localhost', 'root', '', 'test');
    $result = $db->query("SET NAMES 'utf8'");
    return $db;
}

function createTable($table_name, $db)
{
    $result = $db->query("CREATE TABLE `{$table_name}` (
                                `id` INTEGER NOT NULL AUTO_INCREMENT,
                                `user_name` VARCHAR(255) UNIQUE,
                                `favorite_name` VARCHAR(255),
                                `order_number` INT(11),
                                PRIMARY KEY (`id`)
                                ) ENGINE = MyISAM;");
    return $result;
}

function insert_data($table_name, $db)
{
    $result = $db->query("INSERT INTO `{$table_name}`
                               SET `id` = NULL,
                                   `user_name` = '{$_POST['name']}',
                                   `favorite_name` = '{$_POST['favorite']}',
                                   `order_number` = {$_POST['order_number']}");
    return $result;
}

function getAllTheRecords($table_name, $db)
{
    $array = [];
    $result = $db->query("SELECT * FROM `{$table_name}`");
    while ($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
    return $array;
}

function getTheLastRecord($table_name, $db)
{
    $result = $db->query("SELECT * FROM `{$table_name}` ORDER BY `id` DESC LIMIT 1");
    $row = $result->fetch_assoc();
    return $row;
}

function showArray($array)
{
    echo '<hr><pre>';
    print_r($array);
    echo '<hr></pre>';
}