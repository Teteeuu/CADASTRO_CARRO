<?php
include 'includes/header.php';
require 'config/db.php';

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $descricao = trim($_POST["descricao"]);

    if ($nome) {
        $stmt = $conn->prepare("INSERT INTO carros (usuario_id, nome, descricao) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $_SESSION["usuario_id"], $nome, $descricao);
        $stmt->execute();
        header("Location: dashboard.php");
        exit();
    } else {
        $msg = "O nome do carro é obrigatório.";
    }
}
?>

<h2>Adicionar Carro</h2>
<form method="post">
    <input type="text" name="nome" class="form-control mb-2" placeholder="Nome do carro" required>
    <textarea name="descricao" class="form-control mb-2" placeholder="Descrição"></textarea>
    <button type="submit" class="btn btn-success">Salvar</button>
</form>
<p><?= $msg ?></p>

<?php include 'includes/footer.php'; ?>