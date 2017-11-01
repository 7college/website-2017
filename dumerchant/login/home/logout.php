<?php
 session_start();
 session_destroy();
 session_unset();
 echo "<script>location='../../index.php'</script>";
?>