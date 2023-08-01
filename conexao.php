<?php

class conexao{


	//host
	private $host = '127.0.0.1';
	//usuario
	private $usuario = 'root';
	//senha
	private $senha = '';
	//banco de dados
	private $database = 'frequencia';

	public function conecta_mysql(){

		//criar conexão

		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

		mysqli_set_charset($con, 'utf8');

		//verificar se houve erro de conexão

		if (mysqli_connect_errno()){
			echo 'Erro ao tentar se conectar ao banco de dados MySQL: '.mysqli_connect_errno();
		}

		return $con;

	}
}


?>