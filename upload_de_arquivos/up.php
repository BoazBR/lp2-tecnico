<?php

    $erro[0] = "Não houve erro";
    $erro[1] = "O arquivo no upload é maior do que o limite do php";
    $erro[2] = "O arquivo ultrapassa o limite de tamanho especificado no HTML";
    $erro[3] = "O upload do arquivo foi feito parcialmente";
    $erro[4] = "Não foi feito o upload do arquivo";

    if($_FILES["foto"]["error"] != 0){
        die("Não foi possível fazer o upload. Erro: <b>" . $erro[$_FILES['foto']['error']]."</b>");
    }

    $extensoes = array("jpg", "jpeg", "png", "gif");
    $pedacos = explode('.', $_FILES['foto']['name']);
    $extensao = strtolower(end($pedacos));

    if(array_search($extensao, $extensoes) === false){
        echo "Por favor, envie arquivos com as seguintes extensões: ";
        foreach($extensoes as $ex){
            echo $ex . " ";
        }
        die();
    }

    try{
        $con = new PDO("mysql:host=localhost; dbname=cadastro", "root", "12345678");
        $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pst = $con->prepare("insert into usuarios (nome) values (?)");
        $pst -> bindValue(1, $_POST['nome']);
        $pst -> execute();
        $codigo = $con->lastInsertId();
    } catch(PDOException $p){
        echo $p->getMessage();
    }

    $uploadfile = "./images/" . $codigo . basename($_FILES['foto']['name']);
    if(move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)){
        try{
            $pst = $con->prepare("update usuarios set foto=? where codigo=?");
            $pst->bindValue(1, $codigo . basename($_FILES['foto']['name']));
            $pst->bindValue(2, $codigo);
            $pst->execute();
            echo "Cadastro efetuado com sucesso.<br>";
            echo "<form action='index.php'>";
            echo "<button type='submit'>Voltar</button>";
            
        } catch (PDOException $p){
            echo $p->getMessage();
        }
    } else {
        echo "Não foi possível enviar o arquivo. O cadastro não foi efetuado.";
        try{
            $pst = $con->prepare("delete from contatos where codigo=?");
            $pst -> bindValue(1, $codigo);
            $pst -> execute();
        } catch (PDOException $p){
            echo $p->getMessage();
        }
    }
?>