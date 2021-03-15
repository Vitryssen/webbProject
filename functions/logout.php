<!--
André Nordlund
VT21 DT100G/DT058G Datateknik Webbprogrammering 7.5 HP
Förstör session när man vill logga ut för att nollställa allt
 -->
<?php
//Start the session and then destroy it to clear sessions
session_start();
session_destroy();
header("Location: ../index.php");
?>