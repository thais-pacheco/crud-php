<?php
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuário — Visualizar</title>
  <link rel="stylesheet" href="form.css">
</head>
<body>
  <div class="scanline"></div>

  <div class="container">

    <div class="page-header">
      <h1 class="page-title">
        <span class="page-title-icon">✦</span>
        Visualizar Usuário
      </h1>
      <a href="index.php" class="btn-back">← Voltar</a>
    </div>

    <div class="card">
      <div class="card-header-custom">
        <span class="card-title">Dados do Registro</span>
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
        <div class="field-group">
          <label class="field-label">Nome</label>
          <div class="view-field"><?= $usuario['nome'] ?></div>
        </div>
        <div class="field-group">
          <label class="field-label">Email</label>
          <div class="view-field"><?= $usuario['email'] ?></div>
        </div>
        <div class="field-group">
          <label class="field-label">Data de Nascimento</label>
          <div class="view-field view-field-date"><?= date('d/m/Y', strtotime($usuario['data_nascimento'])) ?></div>
        </div>
        <?php else: ?>
        <div class="not-found">⬡ Usuário não encontrado</div>
        <?php endif; else: ?>
        <div class="not-found">⬡ Nenhum ID informado</div>
        <?php endif; ?>
      </div>
    </div>

  </div>
</body>
</html>