<?php
function execPrint($command) {
    $result = array();
    exec($command, $result);
    foreach ($result as $line) {
        print($line . "<br>");
    }
}
// Print the exec output inside of a pre element
print("<pre>" . execPrint("git pull https://SonuKumar0805:ac74d2923d4094beb596df2e98b325581c8bc348@github.com/Sonukumar0805/saoneurban.git master") . "</pre>");
?>
