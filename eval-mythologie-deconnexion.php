<?php
session_start();

session_destroy();
setcookie('id',"",1);
setcookie('pseudo',"",1);
setcookie('role',"",1);

header("location:index.php");