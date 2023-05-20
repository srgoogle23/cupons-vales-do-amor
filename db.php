<?php

function select($SQL)
{
	$DB_SELECT = db_conexao();
	$RESULT = $DB_SELECT->query($SQL);
	$DB_SELECT->errorInfo()[2] != '' ? exit('ERRO ==> ' . $SQL . ' /// ' . $DB_SELECT->errorInfo()[2]) : NULL;
	return $RESULT->fetchAll(PDO::FETCH_ASSOC);
}

function execute($SQL, $ULTIMO_ID = NULL)
{
	$DB = db_conexao();
	(substr(strtoupper(trim($SQL)), 0, 6) == 'UPDATE' || substr(strtoupper(trim($SQL)), 0, 6) == 'DELETE') && strpos(strtoupper($SQL), 'WHERE') === FALSE ? exit('ERRO -> Use WHERE: ' . $SQL) : NULL;
	substr(strtoupper(trim($SQL)), 0, 4) == 'DROP' || substr(strtoupper(trim($SQL)), 0, 8) == 'TRUNCATE' ? exit('ERRO -> Não permitido: ' . $SQL) : NULL;
	try {
		$RESULT = $DB->exec($SQL);
	} catch (PDOException $e) {
		exit('ERRO ==> ' . $SQL . ' /// ' . $e->getMessage());
	}
	$DB->errorInfo()[2] != "" ? exit('ERRO ==> ' . $SQL . ' /// ' . $DB->errorInfo()[2]) : NULL;
	return ($ULTIMO_ID == TRUE) ? $DB->lastInsertId() : $RESULT;
}

function db_conexao()
{
	if(!isset($GLOBAL['teste']))
	{
		try
		{
			$GLOBAL['teste'] = new PDO('mysql:host=localhost;dbname=vales', 'root', '');
			$GLOBAL['teste']->exec('set names utf8');
		}
		catch ( PDOException $e )
		{
			exit('ERRO -> Conexão com o Banco de Dados: ' . $e->getMessage());
		}
	}
	return $GLOBAL['teste'];
}