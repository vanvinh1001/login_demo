<?php
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])){
    echo $_SESSION['email'];
    echo '<br/>';
    echo $_SESSION['password'];
}


?>