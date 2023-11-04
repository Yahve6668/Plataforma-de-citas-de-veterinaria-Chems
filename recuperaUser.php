<?php
 session_start();
 if(isset($_SESSION['usern']) && $_SESSION['usern']==true){
   // echo json_encode("siii");
 }else {
   echo "no haga mamadas";

 }
?>