<?php
include 'includes/header.php';
require 'config/db.php';

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    if ($nome && $email && $_POST["senha"]) {
        $stmt = $conn->prepare("INSERT INTO usuarios (nome_usuario, senha, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $senha, $email);
        $stmt->execute();
        $msg = "Usuário cadastrado com sucesso!";
        $stmt->close();
    } else {
        $msg = "Todos os campos são obrigatórios.";
    }
}
?>

<h2>Cadastro</h2>
<form method="post" class="mb-3">
    <input type="text" name="nome" class="form-control mb-2" placeholder="Usuário" required>
    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
    <input type="password" name="senha" class="form-control mb-2" placeholder="Senha" required>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
<p><?= $msg ?></p>

<?php include 'includes/footer.php'; ?>