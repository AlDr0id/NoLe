<?php
	ob_start();
	session_start();
	session_destroy();
	session_unset();
	header("Location: index.php")
	ob_end_flush();
  ?>