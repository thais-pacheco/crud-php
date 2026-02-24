<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuário — Criar</title>
  <link rel="stylesheet" href="form.css">
</head>
<body>
  <div class="scanline"></div>


  <div class="container">

    <div class="page-header">
      <h1 class="page-title">
        <span class="page-title-icon">✦</span>
        Adicionar Usuário
      </h1>
      <a href="index.php" class="btn-back">← Voltar</a>
    </div>

    <div class="card">
      <div class="card-header-custom">
        <span class="card-title">Novo Registro</span>
      </div>
      <div class="card-body-custom">
        <form action="acoes.php" method="POST">
          <div class="field-group">
            <label class="field-label">Nome</label>
            <input type="text" name="nome" class="field-input" placeholder="Nome completo">
          </div>
          <div class="field-group">
            <label class="field-label">Email</label>
            <input type="text" name="email" class="field-input" placeholder="email@exemplo.com">
          </div>
          <div class="field-group">
            <label class="field-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="field-input">
          </div>
          <div class="field-group">
            <label class="field-label">Senha</label>
            <input type="password" name="senha" class="field-input" placeholder="Mínimo 8 caracteres">
          </div>
          <div class="field-group">
            <button type="submit" name="create_usuario" class="btn-save">Salvar Registro</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</body>
</html>