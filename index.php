<?php


session_start();
require_once dirname(__FILE__) . '/db.php';
$URL = 'http://localhost/cupons-vales-do-amor/';

if(isset($_POST['nome']) && isset($_POST['descricao']) && isset($_POST['quantidade'])){
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$quantidade = $_POST['quantidade'];
	$user = $_POST['user'] == '1' ? 0 : 1;
	$_POST = [];
	execute("INSERT INTO `vales` (`nome`, `descricao`, `quantidade`, `usuario_id`) VALUES ('$nome', '$descricao', '$quantidade', '$user')");
	require_once dirname(__FILE__) . '/home.php';
} else if(isset($_POST['user']) && isset($_POST['password']) && !isset($_SESSION['user_token'])){
	$user = $_POST['user'];
	$password = $_POST['password'];
	if(
		$user == 'srgoogle23' &&
		$password == '123456'
	) {
		// configura o token de sessão
		$_SESSION['user_token'] = '1';
		require_once dirname(__FILE__) . '/home.php';
	} else {
		echo '<script>alert("Usuario ou senha incorretos!");</script>';
		require_once dirname(__FILE__) . '/login.php';
	}
} else if(!isset($_SESSION['user_token']) || empty($_SESSION['user_token']) || !in_array($_SESSION['user_token'] , ['0', '1'])) {
	require_once dirname(__FILE__) . '/login.php';
} else {
	if(isset($_GET['cadastrar-vale']) && $_GET['cadastrar-vale'] == 1) {
		require_once dirname(__FILE__) . '/cadastrar.php';
	} else if(isset($_GET['usar_vale'])) {
		$vale = select("SELECT * FROM `vales` WHERE `id` = " . $_GET['usar_vale']);
		$nome = $vale[0]['nome'];
		execute("UPDATE `vales` SET `quantidade` = `quantidade` - 1 WHERE `id` = " . $_GET['usar_vale']);
		echo '<script>alert("Vale utilizado com sucesso!");</script>';
		if(isset($_SESSION['user_token']) && $_SESSION['user_token'] == 1) {
			mail("carolinaassis100@gmail.com", "Vale utilizado", "O vale " . $nome . " foi utilizado por Leonardo Oliveira!");
		} else {
			mail("leooli.teixeira@gmail.com", "Vale utilizado", "O vale " . $nome . " foi utilizado por Carolina Assis!");
		}
		require_once dirname(__FILE__) . '/home.php';
	} else {
		require_once dirname(__FILE__) . '/home.php';
	}
}