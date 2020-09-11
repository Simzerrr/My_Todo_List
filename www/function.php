<?php

$mysqli = new mysqli("localhost", "admin", "admin", "my_todo_list");



if(!empty($_POST["add"])){
    $Name = $_POST["add"];
    $sql = "INSERT INTO `afaire`(Name) VALUES ('$Name');";
    $mysqli->query($sql);
    echo $sql;
    header("location:index.php");
}

function recup_a_faire(){
    $mysqli = new mysqli("localhost", "admin", "admin", "my_todo_list");
    $sql = "SELECT * from afaire";
    $res = $mysqli->query($sql);
    return $res;
}
function recup_faite(){
    $mysqli = new mysqli("localhost", "admin", "admin", "my_todo_list");
    $sql = "SELECT * from faites";
    $res = $mysqli->query($sql);
    return $res;
}

function suppr_a_faire($name){
    $mysqli = new mysqli("localhost", "admin", "admin", "my_todo_list");
    $sql = "DELETE FROM `afaire` where Name='$name'";
    $res = $mysqli->query($sql);
    return;
}

function suppr_faite($name){
    $mysqli = new mysqli("localhost", "admin", "admin", "my_todo_list");
    $sql = "DELETE FROM `faites` where Name='$name'";
    echo $sql;
    $res = $mysqli->query($sql);
    return;
}

if(!empty($_POST["sup"])){
    $Name = $_POST["sup"];
    echo $Name;
    $res = suppr_a_faire($Name);
    $res = suppr_faite($Name);
    header("location:index.php");
}

if(!empty($_POST["terminé"])){
    $Name = $_POST["terminé"];
    echo $Name;
    $res = suppr_a_faire($Name);
    $mysqli = new mysqli("localhost", "admin", "admin", "my_todo_list");
    $sql = "INSERT INTO `faites`(Name) VALUES ('$Name')";
    $res = $mysqli->query($sql);
    header("location:index.php");
}
?>