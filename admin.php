<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Administrativo Senshimatto</title>

    <!-- Bootstrap -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="admin/css/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="admin/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="admin/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php
            if(isset($_SESSION['nao_autenticado'])):
              ?>
              <div class="notification is-danger">
                <p>ERRO: Usuário ou senha inválidos.</p>
              </div>
              <?php
            endif;
            unset($_SESSION['nao_autenticado']);
            ?>
            <form action="admin/login/login.php" method="POST">
              <h1>Senshimato</h1>
              <div>
                <input name="usuario" type="text" class="form-control" placeholder="Usuário" required="" />
              </div>
              <div>
                <input name="senha" type="password" class="form-control" placeholder="Senha" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-success" value="enviar" name="enviar">Entrar</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>Controle Administrativo Senshimatto</h1>
                  <p>©2019 Todos os direitos reservados | Desenvolvido por Daniel Gomes</p>
                </div>
                
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
