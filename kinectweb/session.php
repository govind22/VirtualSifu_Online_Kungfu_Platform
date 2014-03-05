<?php
session_start();

include('config.php');

if (!$user->authenticated)
{
	header('Location: ../index.php');
	die();
}
?>