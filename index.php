<?php
session_start();
require 'conexao.php';
?>

<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuários</title>
  <link rel="stylesheet" href="usuarios.css">
</head>
<body>
  <div class="scanline"></div>

  <div class="container">

    <?php include('mensagem.php'); ?>

    <div class="page-header">
      <h1 class="page-title">
        <span class="page-title-icon">✦</span>
        Lista de Usuários
      </h1>
      <a href="usuario-create.php" class="btn-new"><span>+ Novo Usuário</span></a>
    </div>

    <div class="card">
      <div class="card-header-custom">
        <span class="card-title">Registros do Sistema</span>
      </div>
      <div class="card-body-custom">
        <table class="data-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Nascimento</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM usuarios";
            $usuarios = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($usuarios) > 0):
              foreach ($usuarios as $usuario):
            ?>
            <tr>
              <td><?= $usuario['id'] ?></td>
              <td class="td-name"><?= $usuario['nome'] ?></td>
              <td class="td-email"><?= $usuario['email'] ?></td>
              <td class="td-date"><?= date('d/m/Y', strtotime($usuario['data_nascimento'])) ?></td>
              <td>
                <div class="actions-group">
                  <a href="usuario-view.php?id=<?= $usuario['id'] ?>" class="btn-action btn-view">Visualizar</a>
                  <a href="usuario-edit.php?id=<?= $usuario['id'] ?>" class="btn-action btn-edit">Editar</a>
                  <form action="acoes.php" method="POST" class="inline-form">
                    <button
                      onclick="return confirm('Tem certeza que deseja excluir este usuário?')"
                      type="submit"
                      name="delete_usuario"
                      value="<?= $usuario['id'] ?>"
                      class="btn-action btn-delete"
                    >Excluir</button>
                  </form>
                </div>
              </td>
            </tr>
            <?php
              endforeach;
            else:
            ?>
            <tr>
              <td colspan="5">
                <div class="empty-state">
                  <span class="empty-state-icon">⬡</span>
                  <p class="empty-state-text">Nenhum usuário encontrado</p>
                </div>
              </td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</body>
</html>