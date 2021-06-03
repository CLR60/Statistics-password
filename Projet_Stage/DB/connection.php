<?php

    function connectionDb() {
        require("config.php");
        try {
            $co = new PDO("mysql:host=" . $server .";dbname=" . $dbName, $user, $pass);
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        return $co;
    }

?>