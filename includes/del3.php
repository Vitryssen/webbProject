<?php
echo "<h2>Information</h2>";
echo "<ul>";
if(date('l') == "Friday"){
    echo "<li>Datum/klockslag: ".date('m/d/Y H:i:s', time())." - Äntligen fredag!</li>";
}
else{
    echo "<li>Datum/klockslag: ".date('m/d/Y H:i:s', time())."</li>";
}
echo "<li>Din IP-adress: ".$_SERVER['REMOTE_ADDR']."</li>";
echo "<li>Sökväg/filnamn: ".getcwd ()."</li>";
echo "<li>User agent-sträng: ".$_SERVER['HTTP_USER_AGENT']."</li>";
echo "</ul> ";
?>