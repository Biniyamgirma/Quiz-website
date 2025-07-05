<?php
        $serverName='sql100.infinityfree.com';
        $userName='if0_39373210';
        $password='IjMWrQGQ06';
        $dbname= 'if0_39373210_customer';
        $conn =mysqli_connect($serverName, $userName, $password, $dbname);
        if(!$conn) {
            echo'Failed to connect';
        }
        // $sql="CREATE DATABASE customer";
        
