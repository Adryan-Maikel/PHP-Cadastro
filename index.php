<?php
session_start();
$erroNome="";
$erroEmail="";
$erroIdade="";
$erroProfissao="";
$erroHobbies="";
$nome="";
$email="";
$idade="";
$profissao="";
$hobbies="";

if($_SERVER['REQUEST_METHOD']=='POST'){ 
    function limpaCampo($valor){
        $valor=trim($valor);
        $valor=stripslashes($valor);
        $valor=htmlspecialchars($valor);
        return $valor;
    }
    if(empty($_POST['Nome'])){
        $erroNome="Informe seu nome.";
    }else{
        $nome=limpaCampo($_POST['Nome']);
        if(!preg_match("/^[a-zA-Z-' ]*$/", $nome)){
            $erroNome="Somente letras e espaços.";
        }
   }
    if(empty($_POST['Email'])){
        $erroEmail="Informe seu email.";
    }else{
        $email=limpaCampo($_POST['Email']);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $erroEmail="Email invalido.";
        }
    }
    if(empty($_POST['Idade'])){
        $erroIdade="Informe sua idade.";
    }else{
        $idade=limpaCampo($_POST['Idade']);
        if(!is_numeric($idade)){
            $erroIdade="Insira somente números.";
        }else{
            if($idade<0||$idade>150){
                $erroIdade="Informe uma idade verdadeira.";
            }
        }
    }
    if(empty($_POST['Profissao'])){
        $erroProfissao="Insira sua profissão.";
    }else{
        $profissao=limpaCampo($_POST['Profissao']);
        if(is_numeric($profissao)){
            $erroProfissao="Insira somente letras.";
        }
    }
    if(empty($_POST['Hobbies'])){
        $erroHobbies="Insira seus hobbies.";
    }else{
        $hobbies=limpaCampo($_POST['Hobbies']);
        if(is_numeric($hobbies)){
            $erroProfissao="Insira somente letras.";
        }
    }
    if(($erroNome=="")&&($erroEmail=="")&&($erroIdade=="")&&($erroProfissao=="")&&($erroHobbies=="")){
        $_SESSION['nome']=$nome;
        $_SESSION['email']=$email;
        $_SESSION['idade']=$idade;
        $_SESSION['profissao']=$profissao;
        $_SESSION['hobbies']=$hobbies;
        header('location: pessoa.php');
    }
}
?>
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
        <section>
            <h2 class="text-center">Fomulário de Cadastro:</h2>
            <form action="index.php" method="POST">
                <input class="input" type="text" name="Nome" id="Nome" placeholder="Nome :" <?php echo 'value="'.$nome.'"'?>>
                <div><span class="erro"><?php echo $erroNome ?></span></div>
                <input class="input" type="email" name="Email" id="Email" placeholder="Email :" <?php echo 'value="'.$email.'"'?>>
                <div><span class="erro"><?php echo $erroEmail ?></span></div>
                <input class="input" type="number" name="Idade" id="Idade" placeholder="Idade :" <?php echo 'value="'.$idade.'"'?>>
                <div><span class="erro"><?php echo $erroIdade ?></span></div>
                <input class="input" type="text" name="Profissao" id="Profissao" placeholder="Profissão :" <?php echo 'value="'.$profissao.'"'?>>
                <div><span class="erro"><?php echo $erroProfissao ?></span></div>
                <input class="input" type="text" name="Hobbies" id="Hobbies" placeholder="Hobbies :" <?php echo 'value="'.$hobbies.'"'?>>
                <div><span class="erro"><?php echo $erroHobbies ?></span></div>
                <input class="btn btn-primary" type="submit" value="Cadastrar">
            </form>
        </section>
    </main>
</body>
</html>