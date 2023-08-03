<!DOCTYPE html><html lang="pt-BR">
<head><meta charset="UTF-8"><title>Boleto</title>
<style>*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Courier New',monospace;background:#f5f5f5;padding:40px}
.boleto{max-width:700px;margin:0 auto;background:white;padding:40px;border:2px solid #333}
h1{text-align:center;border-bottom:2px solid #333;padding-bottom:15px;margin-bottom:20px}
.linha{display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px dashed #ccc}
.label{font-weight:bold;color:#555}.codigo{font-size:1.8em;letter-spacing:5px;text-align:center;margin:20px 0;font-family:monospace}
button{width:100%;padding:15px;background:#27ae60;color:white;border:none;font-size:16px;cursor:pointer;margin-top:20px}
a{display:block;text-align:center;margin-top:15px;color:#3498db}</style></head>
<body><div class="boleto"><h1>BOLETO SIMULADO</h1>
<div class="linha"><span class="label">Beneficiario</span><span>CMS Pagamentos Ltda</span></div>
<div class="linha"><span class="label">Pagador</span><span><?=htmlspecialchars($cob["cliente"])?></span></div>
<div class="linha"><span class="label">Valor</span><span>R$ <?=number_format($cob["valor"],2,",",".")?></span></div>
<div class="linha"><span class="label">Vencimento</span><span><?=date("d/m/Y",strtotime("+5 days"))?></span></div>
<div class="linha"><span class="label">Cobranca</span><span>#<?=$cob["id"]?></span></div>
<div class="codigo">00190.00009 01234.567890 12345.678901 1 23456789012345</div>
<p style="text-align:center;color:#999">Apos o pagamento, clique no botao para confirmar</p>
<form method="POST" action="?page=cartao"><input type="hidden" name="cobranca_id" value="<?=$cob["id"]?>">
<button type="submit">Pagar (Simular)</button></form>
<a href="?page=home">Voltar</a></div></body></html>
