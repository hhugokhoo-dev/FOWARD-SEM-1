<?php
session_start();
session_destroy();

header('Location: /rbac-exercise/login.php');
exit;
