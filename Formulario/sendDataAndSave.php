<?php

	require 'EmailSender.php';
	require 'MySqlConnector.php';

	//atualiza informações do usuário (encapsula)
	$userInfo = new UserInfo($_POST);

	//conecta e atualiza o banco
	$db = new MySqlConnector($userInfo);
	$db->getConnection();
	$db->insertOrUpdateUser();

	//envia e-mail para o usuário
	$sender = new EmailSender($userInfo);
	$sender->configureEmailSender();
	if(!$sender->sendEmail())
		echo "false";
	else
		echo "true";

?>