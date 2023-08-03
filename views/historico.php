<!DOCTYPE html><html lang="pt-BR">
<head><meta charset="UTF-8"><title>Historico</title>
<style>*{margin:0;padding:0;box-sizing:border-box}
body{font-family:Arial;background:#f5f6fa}header{background:#2c3e50;color:white;padding:20px 40px}
nav a{color:white;text-decoration:none;margin-left:20px}.container{max-width:800px;margin:30px auto;padding:0 20px}
h1{margin-bottom:20px}table{width:100%;border-collapse:collapse;background:white;border-radius:8px;overflow:hidden}
th,td{padding:12px;text-align:left;border-bottom:1px solid #eee}
th{background:#f9f9f9}.status-pago{color:#27ae60;font-weight:bold}.status-pendente{color:#e67e22}
.badge{padding:3px 10px;border-radius:10px;font-size:0.85em;color:white}
.badge-pago{background:#27ae60}.badge-pendente{background:#e67e22}
a{color:#3498db;text-decoration:none}.btn{display:inline-block;padding:5px 10px;background:#3498db;color:white;border-radius:3px;text-decoration:none;font-size:0.9em}
footer{text-align:center;padding:30px;color:#999}</style></head>
<body><header><strong>Pagamento</strong><nav><a href="?page=home">Inicio</a><a href="?page=historico">Historico</a></nav></header>
<div class="container"><h1>Historico de Cobrancas</h1>
<table><tr><th>#</th><th>Cliente</th><th>Valor</th><th>Tipo</th><th>Status</th><th>Acao</th></tr>
<?php foreach($cobrancas as $c):?><tr>
<td><?=$c["id"]?></td><td><?=htmlspecialchars($c["cliente"])?></td>
<td>R$ <?=number_format($c["valor"],2,",",".")?></td>
<td><?=$c["tipo"]?></td>
<td><span class="badge badge-<?=$c["status"]?>"><?=$c["status"]?></span></td>
<td><?php if($c["status"]==="pendente"):?>
<a href="?page=boleto&id=<?=$c["id"]?>" class="btn">Ver boleto</a>
<?php endif;?></td></tr>
<?php endforeach;?></table></div><footer>Sistema de Pagamento Simulado</footer></body></html>
