<?php
   session_start();
   session_unset();
   $_SESSION['valid'] = false;
   echo 1
?>