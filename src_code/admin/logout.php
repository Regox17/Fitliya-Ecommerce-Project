<?php

session_start();

unset($_SESSION["uid"]);

unset($_SESSION["name"]);

$BackToMyPage = $_SERVER['HTTP_REFERER'];
if(isset($BackToMyPage)) {
    header('Location: http://localhost:433/Fitliya/fitliya/index.php');
} else {
    header('Location: http://localhost:433/Fitliya/fitliya/index.php'); // default page
}
   

?>