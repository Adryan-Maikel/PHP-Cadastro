<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Bem vindo!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="principal">
        <header class="topo">
            <h1>topo</h1>
        </header>
        <section class="sessao">
            <h2 class="text-center">Bem vindo <?php echo $_SESSION['nome']."!"; ?></h2>
            <h3>Dados</h3>
            <p>Nome: <?php echo $_SESSION['nome'].";"; ?></p>
            <p>Email: <?php echo $_SESSION['email'].";"; ?></p>
            <p>Idade: <?php echo $_SESSION['idade'].";"; ?></p>
            <p>Profissão: <?php echo $_SESSION['profissao'].";"; ?></p>
            <p>Hobbies: <?php echo $_SESSION['hobbies']."."; ?></p>
            <a href="fim_session.php" class="btn btn-danger">Cadastrar novamente</a>
        </section>
    </main>
</body>
</html>