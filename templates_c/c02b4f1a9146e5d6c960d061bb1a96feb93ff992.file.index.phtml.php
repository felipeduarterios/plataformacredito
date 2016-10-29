<?php /* Smarty version Smarty-3.1.16, created on 2014-01-14 03:26:28
         compiled from "index.phtml" */ ?>
<?php /*%%SmartyHeaderCode:3045252d4200e89f0d1-10865195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c02b4f1a9146e5d6c960d061bb1a96feb93ff992' => 
    array (
      0 => 'index.phtml',
      1 => 1389669976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3045252d4200e89f0d1-10865195',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d4200e8e9e01_43602961',
  'variables' => 
  array (
    'logado' => 0,
    'nome' => 0,
    'contarComentarios' => 0,
    'comentarios' => 0,
    'infoComentario' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d4200e8e9e01_43602961')) {function content_52d4200e8e9e01_43602961($_smarty_tpl) {?><<?php ?>?php include 'Mensagem.php'; ?<?php ?>>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Livro de Visitas</title>

			<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

			<script type="text/javascript">
				$(function(){

					//Script executado no clique do botão
					$('.btn').click(function(){
			
						//Guarda os dados necessários em variaveis
						var email = $('#email').val();
						var site = $('#site').val();
						var nome = $('#nome').val();
						var msg = $('#msg').val();
						
						//Chama 'cadastra.php', limpa os valores dos campos mensagem, nome, email e site,
						//e por ultimo chama 'atualiza.php'.
						$.post('cadastraMensagem.php', {
							
							nome_post: nome,
							msg_post: msg,
							email_post : email,
							site_post : site,
							
						}, function(res_cadastra){			
							$('textarea[name=mensagem]').val('');
							$('input[name=nome]').val('');
							$('input[name=email]').val('');
							$('input[name=site]').val('');
							
							$.post('atualiza.php', function(atualiza_comentarios){			
								$("#comentarios ul").html(atualiza_comentarios);			
							});
										
						});
				
						return false;	
				
					});
			
				})
			</script>

		</head>

		<!-- Escolhe o cabeçalho levando em consideração se o usuario esta logado ou não.-->
		<body>
			<?php if ($_smarty_tpl->tpl_vars['logado']->value==0) {?>
				<a href='login.phtml'>Login</a><br />
				<a href='cadastro.phtml'>Cadastrar</a><br /><br />
			<?php } else { ?>
				Seja bem-vindo <?php echo $_smarty_tpl->tpl_vars['nome']->value;?>
 ! <br /><br />
				<a href='logout.php'>Logout</a><br /><br />
			<?php }?>

			<!-- Formulario para entrada dos dados.-->
			<div id="formulario">
				<form name="enviaComentarios" method="post" action="" enctype="multipart/form-data">        
					<div class="inputs">
						<!-- Caso não haja usuario logado, pede nome, email e website.-->
						<?php if ($_smarty_tpl->tpl_vars['logado']->value==0) {?>
							Nome: <input type="text" name="nome" id="nome" /><br /><br />
							E-mail: <input type="text" name="email" id="email" /><br /><br />
							Website: <input type="text" name="site" id="site" /><br /><br />
						<?php }?>
						Comentario: <br /><textarea name="mensagem" id="msg" rows="10" cols="100" ></textarea>
					</div>
					<input type="submit" name="enviar" value="Enviar" class="btn" />
				</form>
			</div>
			<div id="box">
				<!-- Parte para mostrar os comentarios.-->
				<div id="comentarios">
					<h1>Livro de Visitas</h1>
						<ul>
							<!-- Caso não haja comentarios, mostra a mensagem correspondente.-->
							<?php if ($_smarty_tpl->tpl_vars['contarComentarios']->value==0) {?>
								<li><strong>[ Sistema do site - Em " . <?php echo date('d/m/Y');?>
 ." ] </strong> Disse:
									<span>Nenhum comentário até o presente momento. Seja o primeiro a comentar!!! </span>
								</li>	
								<!-- Se houver comentarios, exibe cada um.-->
								<?php } else { ?>
									<?php  $_smarty_tpl->tpl_vars['infoComentario'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['infoComentario']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comentarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['infoComentario']->key => $_smarty_tpl->tpl_vars['infoComentario']->value) {
$_smarty_tpl->tpl_vars['infoComentario']->_loop = true;
?>
										<li><strong>[ <?php echo $_smarty_tpl->tpl_vars['infoComentario']->value->getNome();?>
 - Em "  <?php echo $_smarty_tpl->tpl_vars['infoComentario']->value->getData();?>
 " ] </strong> Disse:
										<span> <?php echo $_smarty_tpl->tpl_vars['infoComentario']->value->getMsg();?>
 </span>
										</li> 
									<?php } ?>
							<?php }?>
						</ul>    
				</div>    
			</div>
	</body>
</html><?php }} ?>
