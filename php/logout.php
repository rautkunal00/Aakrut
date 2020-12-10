<?php
   session_start();
   session_unset();
   $_SESSION['valid'] = false;
   echo $_SESSION['valid']
?>