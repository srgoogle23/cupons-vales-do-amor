<?php

session_start();
$URL = 'http://localhost/cupons-vales-do-amor/';

if(isset($_POST['user']) && isset($_POST['password'])){
	$user = $_POST['user'];
	$password = $_POST['password'];

	if(
		$user == 'srgoogle23' &&
		$password == '123456'
	) {
		// configura o token de sessão
		$_SESSION['user_token'] = 'srgoogle23';
		require_once dirname(__FILE__) . '/home.php';
	} else {
		echo '<script>alert("Usuario ou senha incorretos!");</script>';
		require_once dirname(__FILE__) . '/login.php';
	}
} else if(!isset($_SESSION['user_token']) || empty($_SESSION['user_token'])) {
	require_once dirname(__FILE__) . '/login.php';
} else {
	require_once dirname(__FILE__) . '/home.php';
}