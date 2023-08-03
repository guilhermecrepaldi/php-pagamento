<?php
$routes = ["home","cobrar","boleto","cartao","extrato","historico"];
$page = in_array($_GET["page"] ?? "home", $routes) ? $_GET["page"] : "404";
if ($page === "cobrar") {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["valor"])) {
        $stmt = $pdo->prepare("INSERT INTO cobrancas (cliente, valor, descricao, tipo) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_POST["cliente"], $_POST["valor"], $_POST["descricao"], $_POST["tipo"]]);
        $id = $pdo->lastInsertId();
        $_SESSION["msg"] = "Cobranca #$id criada!";
        header("Location: ?page=home"); exit;
    }
}
if ($page === "boleto" && isset($_GET["id"])) {
    $stmt = $pdo->prepare("SELECT * FROM cobrancas WHERE id=?");
    $stmt->execute([$_GET["id"]]); $cob = $stmt->fetch();
    if (!$cob) { $page = "404"; }
}
if ($page === "cartao" && $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["cobranca_id"])) {
    $stmt = $pdo->prepare("UPDATE cobrancas SET status='pago', pago_em=NOW() WHERE id=?");
    $stmt->execute([$_POST["cobranca_id"]]);
    $_SESSION["msg"] = "Pagamento realizado!"; header("Location: ?page=home"); exit;
}
if ($page === "historico") {
    $cobrancas = $pdo->query("SELECT * FROM cobrancas ORDER BY criado_em DESC")->fetchAll();
}
require "views/$page.php";
