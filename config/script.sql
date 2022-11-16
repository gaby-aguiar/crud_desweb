
CREATE TABLE `usuarios` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(220) NOT NULL,
    `email` varchar(220) NOT NULL,
    `cpf` varchar(14) NOT NULL,
    `telefone` varchar(15) NOT NULL,
    `cep` varchar(9) NOT NULL,
    `rua` varchar(220) NOT NULL,
    `bairro` varchar(220) NOT NULL,
    `cidade` varchar(220) NOT NULL,
    `uf` varchar(2) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;