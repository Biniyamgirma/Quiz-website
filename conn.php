<?php
        $serverName='';
        $userName='';
        $password='';
        $dbname= '';
        $conn =mysqli_connect($serverName, $userName, $password, $dbname);
        if(!$conn) {
            echo'Failed to connect';
        }
        // $sql="CREATE DATABASE customer";
        
