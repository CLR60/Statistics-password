<?php

    require("DB/connection.php");
    $co = connectionDb();


    function array_occurence($array) {
        $unsorted = $array;
        $count = array();
        foreach ($unsorted as $key) {
            if (!isset($count[$key])) $count[$key] = 0;
            $count[$key]++;
        }
        arsort($count, SORT_NUMERIC);
        foreach ($count as $key=>$item) {
            $sorted[] = $key;
            $sortedCount[] = $item;
        }

        return [$sorted, $sortedCount];
    }



    $query = $co->prepare("SELECT AVG(LENGTH(password)) FROM password");
    $query->execute();
    $avgLengthPass = $query->fetch();

    $query = $co->prepare("SELECT MAX(LENGTH(password)) FROM password");
    $query->execute();
    $longestPassword = $query->fetch();

    $query = $co->prepare("SELECT MIN(LENGTH(password)) FROM password");
    $query->execute();
    $tinyestPassword;


    $query = $co->prepare("SELECT password, COUNT(*) FROM password GROUP BY password HAVING COUNT(*) > 1 ORDER BY COUNT(*) DESC LIMIT 10");
    $query->execute();
    $results = $query->fetchAll();
    $repeatedPass = $results;



    $password_only_char = [];
    $avg_count_char = $avg_count_num = $avg_count_spe = 0;
    $len = 0;
    $query = $co->prepare("SELECT password FROM password");
    $query->execute();
    while ($data = $query->fetch()) {
        if (preg_match("~^[a-zA-Z]*$~", $data[0])) {
            array_push($password_only_char, $data[0]);
        }
        $avg_count_char += strlen(preg_replace("~[^aA-zZ]~", "", $data[0]));
        $avg_count_num += strlen(preg_replace("~[^0-9]~", "", $data[0]));
        $avg_count_spe += strlen(preg_replace("~[A-Za-z0-9]~", "", $data[0]));
        $len++;
    }

    $password_only_char = array_occurence($password_only_char);
    $repeatedPassChar = $password_only_char;
    
    $averageCharPass = round($avg_count_char / $len, 2);
    $averageNumPass = round($avg_count_num / $len, 2);
    $averageSpePass = round($avg_count_spe / $len, 2);
?>