CREATE DATABASE pgto;
USE pgto;
CREATE TABLE cobrancas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(200) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    descricao TEXT,
    tipo VARCHAR(20) DEFAULT 'boleto',
    status VARCHAR(20) DEFAULT 'pendente',
    pago_em DATETIME NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
