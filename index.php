<?php
	include "Mensagem.php";
	include "conexao.php";
	//Inclui os arquivos do template Engine Smarty
	require 'C:\wamp\www\demo\Smarty.class.php';
	$smarty = new Smarty;
	/*	require "phpmailer/class.phpmailer.php" ;

			define('GUSER', 'livrodevisitas12@gmail.com');	// <-- Email pelo qual os email serão enviados
			define('GPWD', 'Livro123');		// <-- Senha do email colocado acima

			function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
				global $error;
				$mail = new PHPMailer();
				$mail->IsSMTP();		// Ativar SMTP
				$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
				$mail->SMTPAuth = true;		// Autenticação ativada
				$mail->SMTPSecure = 'tls';	// TLS REQUERIDO pelo GMail
				$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
				$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
				$mail->Username = GUSER;
				$mail->Password = GPWD;
				$mail->SetFrom($de, $de_nome);
				$mail->Subject = $assunto;
				$mail->Body = $corpo;
				$mail->AddAddress($para);
				if(!$mail->Send()) {
					$error = 'Mail error: '.$mail->ErrorInfo; 
					return false;
				} else {
					$error = 'Mensagem enviada!';
					return true;
				}
			}

			// Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER), 
			//o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.

			 if (smtpmailer($email, 'livrodevisitas12@gmail.com', 'livrodevisitas12@gmail.com', 'Recuperacao de senha: Livro de Visitas',
				"Sua senha no livro de visitas e: '$dados[0]' .")) {

				echo "Sua senha foi enviada para seu email!    ";
				echo"<script>sucessoEnvio()</script>";

			}
	}
	*/
	$logado = 0;
	session_start();
	
		//$nome = $_POST['nome'];
		//$sobrenome = $_POST['sobrenome'];
		//$email = $_POST['email'];
		//$website = $_POST['website'];
		//$senha = $_POST['senha'];

	//Seleciona as mensagens existentes no BD, guarda essa mensagens em um array "resultado" e chama 'index.phtml'
	//$selecionaComentarios = mysql_query("SELECT * FROM comentarios ORDER BY comentarioHora DESC") or die(mysql_error()
	$smarty->display('index.phtml');
?>    
  