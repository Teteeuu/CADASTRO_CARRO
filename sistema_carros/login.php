<?php
session_start(); 

require_once __DIR__ . '/config/db.php'; 
include_once __DIR__ . '/includes/header.php';

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    if ($nome && $senha) {
        $stmt = $conn->prepare("SELECT id, senha FROM usuarios WHERE nome_usuario = ?");
        $stmt->bind_param("s", $nome);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $senha_hash);
            $stmt->fetch();

            if (password_verify($senha, $senha_hash)) {
                $_SESSION["usuario_id"] = $id;
                header("Location: dashboard.php");
                exit();
            } else {
                $msg = "Senha incorreta.";
            }
        } else {
            $msg = "Usuário não encontrado.";
        }
        $stmt->close();
    } else {
        $msg = "Preencha todos os campos.";
    }
}
?>

<h2>Login</h2>
<form method="post" class="mb-3">
    <input type="text" name="nome" class="form-control mb-2" placeholder="Usuário" required>
    <input type="password" name="senha" class="form-control mb-2" placeholder="Senha" required>
    <button type="submit" class="btn btn-success">Entrar</button>
</form>
<p><?= $msg ?></p>

<?php include 'includes/footer.php'; ?>