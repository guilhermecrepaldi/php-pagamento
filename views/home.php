<!DOCTYPE html><html lang="pt-BR">
<head><meta charset="UTF-8"><title>Sistema de Pagamento</title>
<style>*{margin:0;padding:0;box-sizing:border-box}
body{font-family:Arial;background:#f5f6fa;color:#333}
header{background:#2c3e50;color:white;padding:20px 40px;display:flex;justify-content:space-between;align-items:center}
nav a{color:white;text-decoration:none;margin-left:20px;padding:8px 15px;border-radius:4px}
nav a:hover{background:rgba(255,255,255,0.1)}
.container{max-width:800px;margin:30px auto;padding:0 20px}
.msg{background:#d4edda;color:#155724;padding:15px;border-radius:4px;margin-bottom:20px}
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:15px;margin-bottom:30px}
.card{background:white;padding:25px;border-radius:8px;box-shadow:0 2px 5px rgba(0,0,0,0.1);text-align:center}
.card h3{font-size:2em;color:#2c3e50}.card p{color:#999;margin-top:5px}
h2{margin-bottom:15px}form{background:white;padding:25px;border-radius:8px;box-shadow:0 2px 5px rgba(0,0,0,0.1);margin-bottom:20px}
input,select,textarea{width:100%;padding:10px;margin:5px 0;border:1px solid #ddd;border-radius:4px}
textarea{height:80px}button{width:100%;padding:12px;background:#27ae60;color:white;border:none;border-radius:4px;font-size:16px;cursor:pointer}
.links{display:flex;gap:10px;margin-top:10px}.links a{flex:1;padding:12px;text-align:center;border-radius:4px;color:white;text-decoration:none}
.link-boleto{background:#3498db}.link-cartao{background:#9b59b6}
footer{text-align:center;padding:30px;color:#999}</style></head>
<body><header><strong>Pagamento</strong><nav><a href="?page=home">Inicio</a><a href="?page=historico">Historico</a></nav></header>
<div class="container">
<?php if(isset($_SESSION["msg"])):?><div class="msg"><?=$_SESSION["msg"];unset($_SESSION["msg"])?></div><?php endif;?>
<?php $stats=$pdo->query("SELECT COUNT(*) as total,COALESCE(SUM(valor),0) as total_valor,COUNT(CASE WHEN status='pago' THEN 1 END) as pago FROM cobrancas")->fetch();?>
<div class="grid"><div class="card"><h3><?=$stats["total"]?></h3><p>Cobrancas</p></div>
<div class="card"><h3>R$ <?=number_format($stats["total_valor"],2,",",".")?></h3><p>Valor total</p></div>
<div class="card"><h3><?=$stats["pago"]?></h3><p>Pagas</p></div></div>
<h2>Nova Cobranca</h2>
<form method="POST" action="?page=cobrar">
<input type="text" name="cliente" placeholder="Cliente" required>
<input type="number" step="0.01" name="valor" placeholder="Valor (R$)" required>
<select name="tipo" required><option value="boleto">Boleto</option><option value="cartao">Cartao</option></select>
<textarea name="descricao" placeholder="Descricao"></textarea>
<button type="submit">Criar Cobranca</button></form></div>
<footer>Sistema de Pagamento Simulado</footer></body></html>
