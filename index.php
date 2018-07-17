<?php
if (isset($_GET['page'])) {
	include $_GET['page'] . '.php';
} else {
	include 'list.php';
}
include 'footer.php';
?>