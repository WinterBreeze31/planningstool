<?php

try {
    $conn = new PDO('mysql:host=localhost;dbname=plannings_tool', 'root', 'mysql');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
};

// $sql = 'SELECT * FROM `onderwerpen`';
// $sth = $conn->prepare($sql);
// $sth->execute();
// $result = $sth->fetchall();

        //  print_r($result[1]['name']);
        //  print_r($result[1]['discription']);

    

 ?>