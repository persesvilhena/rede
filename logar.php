<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="engine/imgs/icon.png">

    <title>Rede - Logar</title>

    <!-- Bootstrap core CSS -->
    <link href="engine/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="engine/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="engine/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="engine/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  	 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="logar.php"><img src="engine/imgs/logo.png" height="25"></a>
        </div>
      </div>
    </nav>

    <div class="container">
    	<br>
    	


	<?php
	include("engine/conexao.php"); 
	include("engine/funcao_externa.php");

	session_start();
	if(!empty($_SESSION["login"]) && !empty($_SESSION["senha"]) && !empty($_SESSION["id"])) {
		header("Location: index.php?index");
		exit();
	}





	if(isset($_POST["logar"])) {
		if(!empty($_POST["email"]) && !empty($_POST["senha"])) {
			$email = recebe($_POST["email"]);
			$senha = recebe($_POST["senha"]);
			$senha_md5 = md5($senha);
			$valida_user = mysqli_query($conecta, "SELECT * FROM user WHERE email='$email' AND senha='$senha_md5'") or die(mysqli_error());
			if(mysqli_num_rows($valida_user) > 0) {
				$info = mysqli_fetch_array($valida_user);
				$email = $info["email"];
				$pass = $info["senha"];
				$id_generico = $info["id"];
				$id = base64_encode($id_generico);
				$_SESSION["email"] = $email;
				$_SESSION["senha"] = $senha_md5;
				$_SESSION["id"] = $id;
				header("Location: index.php?index");
				exit();
			}else{
				problema("Dados Incorretos!");
			}
		}else{
			alerta("Por favor, preencha os campos corretamente!");
		}
	}






	if(isset($_POST["cadastrar"])) {
		if(!empty($_POST["email"]) && !empty($_POST["senha"]) && !empty($_POST["nome"]) && !empty($_POST["sobrenome"])) {
			$nome = recebe($_POST["nome"]);
			$sobrenome = recebe($_POST["sobrenome"]);
			$senha = recebe($_POST["senha"]);
			$senha = md5($senha);
			$email = recebe($_POST["email"]);
			$repeat_user = mysqli_query($conecta, "SELECT * FROM user WHERE email='$email'") or die($mensagem_erro = "Houve um erro:<br />".mysqli_error());
			if(mysqli_num_rows($repeat_user) > 0) {
				echo "<script>alert('Já existe um usuário com este email!');window.location='logar.php?index'</script>";
			}
			else {
				$insert = mysqli_query($conecta, "INSERT INTO user(senha, email, nome, sobrenome, foto, epp) VALUES ('$senha', '$email', '$nome', '$sobrenome', 'new/new.png', '30')") or die(mysqli_error());
				if($insert) {
					sucesso("Usuário cadastrado com sucesso!");
				}else{
					problema("Houve um problema!");
				}
			}
		}
		else {
			alerta("Por favor, preencha os campos corretamente!");
		}
	}










	if(isset($_POST["recuperar"])) {
		if(!empty($_POST["email"])) {
			$email = recebe($_POST["email"]);
			$csql = mysqli_query($conecta, "select * from user where email = '$email';");
			$rsql = mysqli_fetch_array($csql);
			$hash = rand(1, 10000);
			$hash = md5($hash);
			$csql = mysqli_query($conecta, "update user set rec = '$hash' where id = '$rsql[id]';");
			$arquivo = "<b>Foi solicitado a recuperação da sua senha no Rede</b><br>
			Link para recuperação da sua senha: <a href=\"http://perses.xyz/logar.php?recuperar_senha&id=" . $rsql['id'] . "&rec=" . $hash . "\">Recuperar senha</a><br>
			Caso você não tenha solicitado a recuperação da sua senha apenas ignore este e-mail!<br>" . $creditos . "<br>";
			$destino = $rsql['email'];
			$assunto = "Recuperar senha";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Rede <admin@willypete.com.br>';
			$enviaremail = mail($destino, $assunto, $arquivo, $headers);
			if($enviaremail){
				sucesso("Foi enviado um email para recuperação de sua senha!");
			} else {
				problema("Houve um problema ao enviar email de recuperação!");
			}
		}
		else { 
			alerta("Por favor, preencha os campos corretamente!");
		}

	}








	if(isset($_POST["recuperar_senha"])) {
		if(!empty($_POST["id_user"]) && !empty($_POST["rec_user"]) && !empty($_POST["nova_senha"]) && !empty($_POST["nova_senha1"])) {
			$id_user = recebe($_POST["id_user"]);
			$rec_user = recebe($_POST["rec_user"]);
			$nova_senha = recebe($_POST["nova_senha"]);
			$nova_senha1 = recebe($_POST["nova_senha1"]);
			$csql = mysqli_query($conecta, "select * from user where id = '$id_user' and hash_recup = '$rec_user';");
			if(mysqli_num_rows($csql) > 0){
				if($nova_senha == $nova_senha1){
					$nova_senha_md5 = md5($nova_senha);
					$alterar = mysqli_query($conecta, "update user set senha = '$nova_senha_md5', hash_recup = NULL where id = '$id_user' and hash_recup = '$rec_user';");
					if($alterar){
						sucesso("Senha alterada com sucesso!");
					}else{
						problema("Houve um problema!");
					}
				}else{
					problema("As senhas não são iguais!");
				}
			}else{
				problema("Houve um problema ao validar a hash!");
			}
		}
		else { 
			alerta("Por favor, preencha os campos corretamente!");
		}

	}














	$endereco = $_SERVER ['REQUEST_URI'];
	if(isset($_GET["index"]) || $endereco == "/logar.php" || $endereco == "/" || $endereco == "/rede/logar.php") {
		alerta("Utilizamos cookies! <a href='https://pt.wikipedia.org/wiki/Cookie_HTTP'>Saiba mais!</a>");
		aviso("Esta é uma nova versão do site, não utilizamos mais login, para antigos usuários entre da seguinte forma:<br>'login-antigo'@perses.xyz");
		?>
		<div class="well">
		<form method="post" action="" class="form-signin">
			<h2 class="form-signin-heading">Logar: </h2>
			<label class="sr-only">Login: </label>
			<input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required autofocus>
			<label for="inputPassword" class="sr-only">Senha: </label>
			<input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="senha" required>
			<div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Lembre me 
				</label>
				<div align="right" style="float: right;"><a href="logar.php?esqueceu">Esqueceu a senha?</a></div>
			</div>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="logar">Logar</button>
		</form>
		</div>
		<div class="well">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form method="post" action="">
						<h2 class="form-signin-heading">Cadastre-se gratuitamente: </h2>
						<label class="sr-only">Email: </label>
						<input type="text" id="inputEmail" class="form-control" placeholder="Email" name="email" required>
						<label for="inputPassword" class="sr-only">Senha: </label>
						<input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="senha" required>
						<label class="sr-only">Nome: </label>
						<input type="text" id="inputNome" class="form-control" placeholder="Nome" name="nome" required autofocus>
						<label class="sr-only">Sobrenome: </label>
						<input type="text" id="inputSobrenome" class="form-control" placeholder="Sobrenome" name="sobrenome" required autofocus>
						<br>
						<button class="btn btn-lg btn-primary btn-block" type="submit" name="cadastrar">Cadastrar</button>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
      <?php
	}














	if(isset($_GET["esqueceu"])) {
	?>
	<div class="well">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div align="center">
					<form method="post" action="">
					<label class="sr-only">Email: </label>
					<input type="text" id="inputEmail" class="form-control" placeholder="Email" name="email" required>
					<br><br>
					<button class="btn btn-lg btn-primary btn-block" type="submit" name="recuperar">Recuperar</button>
					</form>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<?php
	}









	if(isset($_GET["recuperar_senha"])) {	
		$id_user = recebe($_GET["id"]);
		$rec_user = recebe($_GET["rec"]);
		if($rec_user != NULL){
			$verifica = mysqli_query($conecta, "select * from user where id = '$id_user' and hash_recup = '$rec_user';");
			if(mysqli_num_rows($verifica) > 0){
				?>
				<div class="well">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<form method="post" action="">
								<label class="sr-only">Nova senha: </label>
								<input type="password" id="inputSenha" class="form-control" placeholder="Senha" name="nova_senha" required>
								<label for="inputPassword" class="sr-only">Senha: </label>
								<input type="password" id="inputSenha1" class="form-control" placeholder="Repita a senha" name="nova_senha1" required>
								<br>
								<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
								<input type="hidden" name="rec_user" value="<?php echo $rec_user; ?>">
								<button class="btn btn-lg btn-primary btn-block" type="submit" name="recuperar_senha">Recuperar</button>
							</form>
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
				<?php
			}
		}
	}









	?>

    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="engine/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="engine/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="engine/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="engine/assets/js/ie10-viewport-bug-workaround.js"></script>

  </body>
</html>
