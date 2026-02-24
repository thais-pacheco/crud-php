<?php
session_start();
require 'conexao.php';

if (isset($_POST['create_usuario'])) {

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));

    $senha = password_hash(
        mysqli_real_escape_string($conexao, trim($_POST['senha'])),
        PASSWORD_DEFAULT
    );

    $sql = "INSERT INTO usuarios (nome, email, data_nascimento, senha)
            VALUES ('$nome', '$email', '$data_nascimento', '$senha')";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['message'] = "Usuário criado com sucesso.";
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['message'] = "Erro ao criar usuário.";
        header("Location: index.php");
        exit;
    }
}

if (isset($_POST['update_usuario'])) {
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

    $sql ="UPDATE usuarios SET nome='$nome', email='$email', data_nascimento='$data_nascimento'";

    if (!empty($senha)) {
        $sql .= ", senha='". password_hash($senha, PASSWORD_DEFAULT). "'";
    }    

    $sql .= " WHERE id='$usuario_id'";

     mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['message'] = "Usuário atualizado com sucesso.";
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['message'] = "Erro ao atualizar usuário.";
        header("Location: index.php");
        exit;
    }
}

if (isset($_POST['delete_usuario'])){
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);

    $sql= "DELETE FROM usuarios WHERE id='$usuario_id'";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['message'] = "Usuário excluído com sucesso.";
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['message'] = "Erro ao excluir usuário.";
        header("Location: index.php");
        exit;
    }
}

?>