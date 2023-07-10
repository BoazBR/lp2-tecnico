<?php
    $us = Usuario::pegaUser(base64_decode($_REQUEST['x']));
?>
<h1>Atualização de usuário</h1>
<form action="principal.php" method="get">
    <input type="hidden" name="c" value="<?=base64_encode('updateUser');?>">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="from-control" id="nome" name="nome" value="<?=$us->getNome();?>" >
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" randonly value="<?=$us->getEmail();?>" >
        <small if="emailHelp" class="form-text text-muted">O e-mail não pode ser alterado.</small>
    </div>
    <div class="form-group">
        <label for="nivel">Nível</label>
        <select class="form-group" id="nivel" name="nivel" >
            <option value="0" <?=$us->getNivel()==0 ? " select " : "";?> >0 - Usuários</option>
            <option value="1" <?=$us->getNivel()==1 ? " select " : "";?> >1 - Administrador</option>
        </select>
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" aria-describedby="senhaHelp" >
        <small id="senhaHelp" class="form-text text-muted">Deixe em branco para não alterar</small>
    </div>
    <div class="form-group">
        <label for="csenha">Confirme a nova senha</label>
        <input type="password" class="form-control" id="csenha" name="csenha">
    </div>
    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
</form>