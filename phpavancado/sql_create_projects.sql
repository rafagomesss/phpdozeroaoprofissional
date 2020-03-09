CREATE DATABASE IF NOT EXISTS crudoo;
use crudoo;

CREATE TABLE IF NOT EXISTS contatos(
  id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  nome VARCHAR(100),
  email VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

SELECT * FROM contatos;

SELECT * FROM contatos WHERE id = 8;


CREATE DATABASE IF NOT EXISTS blog;
use blog;

CREATE TABLE usuarios(
  id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  senha VARCHAR(32) NOT NULL,
  PRIMARY KEY(id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

SELECT * FROM usuarios;

-- ###############################################################################################################

CREATE DATABASE IF NOT EXISTS usuarios CHARACTER SET utf8
  COLLATE utf8_general_ci;
USE usuarios;


CREATE TABLE usuarios(
  id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  email VARCHAR(100),
  senha VARCHAR(32),
  nome VARCHAR(100),
  PRIMARY KEY (id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

SELECT * FROM usuarios;

-- ###############################################################################################################

use blog;
show tables;

CREATE TABLE posts(
  id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  titulo VARCHAR(100),
  corpo TEXT,
  PRIMARY KEY (id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

INSERT INTO
  posts
SET titulo = 'TESTE 123456',
  corpo = 'Mussum Ipsum, cacilds vidis litro abertis. Posuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl. Suco de cevadiss deixa as pessoas mais interessantis. In elementis mé pra quem é amistosis quis leo.';

SELECT * FROM posts;

SELECT * FROM posts LIMIT 20, 10;

-- ###############################################################################################################

CREATE DATABASE IF NOT EXISTS cadastros CHARACTER SET utf8
  COLLATE utf8_general_ci;
USE cadastros;

DROP TABLE usuarios;
CREATE TABLE IF NOT EXISTS usuarios(
  id INT(11) UNSIGNED AUTO_INCREMENT NOT NULL,
  nome VARCHAR(80),
  email VARCHAR(100),
  status TINYINT DEFAULT 0,
  PRIMARY KEY(id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

SELECT * FROM usuarios;

-- ###############################################################################################################

CREATE DATABASE IF NOT EXISTS projeto_esqueciasenha CHARACTER SET utf8
  COLLATE utf8_general_ci;
USE projeto_esqueciasenha;

CREATE TABLE IF NOT EXISTS usuarios(
  id INT(11) UNSIGNED AUTO_INCREMENT NOT NULL,
  email VARCHAR(100),
  senha VARCHAR(32),
  PRIMARY KEY(id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

SELECT * FROM usuarios;

CREATE TABLE IF NOT EXISTS usuarios_token(
  id INT(11) UNSIGNED AUTO_INCREMENT NOT NULL,
  id_usuario INT(11) UNSIGNED NOT NULL,
  hash VARCHAR(32),
  used TINYINT DEFAULT 0,
  expirado_em DATETIME,
  PRIMARY KEY(id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;



select * from usuarios;
select * from usuarios_token;

-- ###############################################################################################################

CREATE DATABASE IF NOT EXISTS projeto_logeventos CHARACTER SET utf8
  COLLATE utf8_general_ci;
USE projeto_logeventos;

CREATE TABLE IF NOT EXISTS historico(
  id INT(11) UNSIGNED AUTO_INCREMENT,
  ip VARCHAR(20),
  data_acao DATETIME,
  acao VARCHAR(100),
  PRIMARY KEY(id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;


SELECT * FROM historico;

INSERT INTO historico (ip, data_acao, acao) VALUES ('192.168.20.169', NOW(), 'Acessou a página XYZ');

-- ###############################################################################################################

CREATE DATABASE IF NOT EXISTS projeto_pesquisacolunas CHARACTER SET utf8
  COLLATE utf8_general_ci;
USE projeto_pesquisacolunas;

CREATE TABLE IF NOT EXISTS usuarios(
  id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  email VARCHAR(100),
  cpf INT(9),
  nome VARCHAR(100),
  PRIMARY KEY(id)
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

-- ###############################################################################################################

CREATE DATABASE IF NOT EXISTS projeto_filtrotabela CHARACTER SET utf8
  COLLATE utf8_general_ci;
USE projeto_filtrotabela;

CREATE TABLE IF NOT EXISTS usuarios(
  id INT(11) UNSIGNED AUTO_INCREMENT NOT NULL,
  nome VARCHAR(100),
  sexo TINYINT,
  idade INT(3),
  PRIMARY KEY(id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

-- ###############################################################################################################

CREATE DATABASE IF NOT EXISTS projeto_permissao CHARACTER SET utf8
  COLLATE utf8_general_ci;
USE projeto_permissao;

CREATE TABLE IF NOT EXISTS usuarios(
    id INT(11) UNSIGNED AUTO_INCREMENT NOT NULL,
    email VARCHAR(50),
    senha VARCHAR(32),
    permissoes TEXT,
    PRIMARY KEY(id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

INSERT INTO usuarios SET email = 'suporte@b7web.com.br', senha = md5('12345'), permissoes = 'ADD,EDIT,DEL,SECRET';
-- UPDATE usuarios SET permissoes = 'ADD' WHERE id = 1;
-- UPDATE usuarios SET permissoes = 'ADD,EDIT,DEL,SECRET' WHERE id = 1;

SELECT * FROM usuarios;

CREATE TABLE IF NOT EXISTS documentos(
    id INT(11) UNSIGNED AUTO_INCREMENT NOT NULL,
    titulo VARCHAR(100),
    PRIMARY KEY(id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

INSERT INTO documentos SET titulo = 'Alvará de Fulano';
INSERT INTO documentos SET titulo = 'CPF de Cicrano';
INSERT INTO documentos SET titulo = 'Recibo do carro X';

SELECT * FROM documentos;

-- ###############################################################################################################

CREATE DATABASE IF NOT EXISTS projeto_reservas CHARACTER SET utf8
  COLLATE utf8_general_ci;
USE projeto_reservas;


CREATE TABLE IF NOT EXISTS carros(
  id INT(11) UNSIGNED AUTO_INCREMENT NOT NULL,
  nome VARCHAR(100),
  PRIMARY KEY (id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

-- INSERT INTO carros SET nome = 'Palio';
-- INSERT INTO carros SET nome = 'Voyage';
-- INSERT INTO carros SET nome = 'Corolla';
-- INSERT INTO carros SET nome = 'Hilux';
-- INSERT INTO carros SET nome = 'Camaro';

SELECT * FROM carros;

CREATE TABLE IF NOT EXISTS reservas(
  id INT(11) UNSIGNED AUTO_INCREMENT NOT NULL,
  id_carro INT(11) UNSIGNED,
  data_inicio DATE,
  data_fim DATE,
  pessoa VARCHAR(100),
  PRIMARY KEY (id)
)ENGINE = InnoDB DEFAULT CHARSET = Latin1;

