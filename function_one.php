<!DOCTYPE html>
<html>
<body>

<?php
function exclaim($str) {
  return $str . "dharti! ";
}

function ask($str) {
  return $str . "solanki? ";
}

function printFormatted($str, $format) {
  // Calling the $format callback function
  echo $format($str);
}

// Pass "exclaim" and "ask" as callback functions to printFormatted()
 printFormatted("Hello world1", "exclaim");
 printFormatted("Hello world2", "ask");
?>

</body>
</html>
