<?php
session_start();
unset($_SESSION['id_usuario']);

header("Location: pag_principal.php");
?>