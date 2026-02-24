<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuário — Editar</title>
  <link rel="stylesheet" href="form.css">
</head>
<body>
  <div class="scanline"></div>

  <div class="container">

    <div class="page-header">
      <h1 class="page-title">
        <span class="page-title-icon">✦</span>
        Editar Usuário
      </h1>
      <a href="index.php" class="btn-back">← Voltar</a>
    </div>

    <div class="card">
      <div class="card-header-custom">
        <span class="card-title">Modificar Registro</span>
      </div>
      <div class="card-body-custom">
        <?php
        if (isset($_GET['id'])):
          $usuario_id = mysqli_real_escape_string($conexao, $_GET['id']);
          $sql = "SELECT * FROM usuarios WHERE id='$usuario_id'";
          $query = mysqli_query($conexao, $sql);
          if (mysqli_num_rows($query) > 0):
            $usuario = mysqli_fetch_array($query);
        ?>
        <form action="acoes.php" method="POST">
          <input type="hidden" name="usuario_id" value="<?= $usuario['id'] ?>">
          <div class="field-group">
            <label class="field-label">Nome</label>
            <input type="text" name="nome" value="<?= $usuario['nome'] ?>" class="field-input">
          </div>
          <div class="field-group">
            <label class="field-label">Email</label>
            <input type="text" name="email" value="<?= $usuario['email'] ?>" class="field-input">
          </div>
          <div class="field-group">
            <label class="field-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" value="<?= $usuario['data_nascimento'] ?>" class="field-input">
          </div>
          <div class="field-group">
            <label class="field-label">Nova Senha</label>
            <input type="password" name="senha" class="field-input" placeholder="Deixe em branco para manter">
          </div>
          <div class="field-group">
            <button type="submit" name="update_usuario" class="btn-save">Salvar Alterações</button>
          </div>
        </form>
        <?php else: ?>
        <div class="not-found">⬡ Usuário não encontrado</div>
        <?php endif; endif; ?>
      </div>
    </div>

  </div>
</body>
</html>