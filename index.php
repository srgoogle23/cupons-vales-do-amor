<?php

require_once dirname(__FILE__) . '/db.php';

session_start();
$URL = 'http://localhost/cupons-vales-do-amor/';

if(isset($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['quantidade'])){
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$quantidade = $_POST['quantidade'];
	$user = $_POST['user'] == '1' ? 0 : 1;
	execute("INSERT INTO `vales` (`nome`, `descricao`, `quantidade`, `usuario_id`) VALUES ('$nome', '$descricao', '$quantidade', '$user')");
	require_once dirname(__FILE__) . '/home.php';
} else if(isset($_POST['user']) && isset($_POST['password'])){
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
	if(isset($_GET['cadastrar-vale']) && $_GET['cadastrar-vale'] == 1) {
		require_once dirname(__FILE__) . '/cadastrar.php';
	} else {
		require_once dirname(__FILE__) . '/home.php';
	}
}