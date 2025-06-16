<?php
include 'includes/header.php';
require 'config/db.php';

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION["usuario_id"];
$stmt = $conn->prepare("SELECT id, nome, descricao FROM carros WHERE usuario_id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<h2>Meus Carros</h2>
<a href="add_car.php" class="btn btn-primary mb-3">Adicionar Novo Carro</a>
<?php while ($row = $result->fetch_assoc()): ?>
    <div class="card mb-2">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['nome']) ?></h5>
            <p class="card-text"><?= nl2br(htmlspecialchars($row['descricao'])) ?></p>
            <a href="delete_car.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
        </div>
    </div>
<?php endwhile; ?>

<?php include 'includes/footer.php'; ?>