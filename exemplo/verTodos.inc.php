<?php
    $NIVEL_EXIGIDO = 1;
    // A variável $usuario foi definida na página principal como um objeto representando o usuário logado
    if ( (!isset($usuario)) || ($usuario->getNivel()<$NIVEL_EXIGIDO)) {
        die("<div class=\"alert alert-danger\" role=\"alert\">Seu usuário não tem permissão para visualizar este conteúdo.</div>");
    }

    $usuarios = Usuario::getAll();
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Nível</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($usuarios as $linha) { ?>
        <tr>
            <th scope="row"><?=$linha->getNome();?></th>
            <td><?=$linha->getEmail();?></td>
            <td><?=$linha->getNivel()==1 ? "Administrador" : "Usuário";?></td>
            <td><a class="nav-link" href="principal.php?pg=<?=base64_encode("altUser");?>&x=<?=base64_encode($linha->getEmail());?>" title="Editar <?=$linha->getNome();?>">Editar</a></td>
            <td><a class="nav-link" href="principal.php?c=<?=base64_encode("delUser");?>&x=<?=base64_encode($linha->getEmail());?>" title="Excluir <?=$linha->getNome();?>">Excluir</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
