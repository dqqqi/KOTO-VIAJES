<?php
$server='sql108.epizy.com';
$username='epiz_32993881';
$password='';
$database='koto_database';

try{
    $conn= new PDO("mysql:host=$server;dbname=$database;",$username,$password);
}
catch (PDOException $e){
    die('Connection failed: '.$e->getMessage());        

}
?>