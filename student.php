<?php
require_once 'vendor/autoload.php';
require_once 'inc/mysqli_connect.inc.php';

$loader = new Twig_Loader_Filesystem('templates');

$twig = new Twig_Environment($loader);

$sql = 'SELECT first_name, last_name, student_id FROM student_v2';
$result = $db->query($sql);

$students = [];

while($row = $result->fetch_assoc()){
    array_push($students,$row);
}

// var_dump($students);


// echo '<pre>';
// var_dump($result);
// echo '<pre>';


echo $twig->render('student.html', ['students' => $students]);
?>