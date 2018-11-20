CREATE DATABASE imobiliaria2;
USE imobiliaria2;

CREATE TABLE tb_categoria_funcionario
(
    cd_categoria INT NOT NULL AUTO_INCREMENT,
    ic_status BOOLEAN NOT NULL,
    nm_categoria VARCHAR (45) NOT NULL,
    nm_sigla VARCHAR(45) NOT NULL,
    CONSTRAINT pk_categoria_funcionario
        PRIMARY KEY (cd_categoria)
);

INSERT INTO tb_categoria_funcionario (cd_categoria, ic_status, nm_categoria, nm_sigla) VALUES (1, 1, 'Administrador', 'ADM');

CREATE TABLE tb_pessoa
(
	cd_pessoa INT(4) AUTO_INCREMENT,
    cd_categoria INT NOT NULL,
	nm_primeiro VARCHAR(45) NOT NULL,
	nm_segundo VARCHAR(45) NOT NULL,
    nm_ultimo VARCHAR(45) NOT NULL,
    dt_criado DATETIME NOT NULL,
    dt_editado DATETIME NOT NULL,
	cd_cpf INT(13),
	CONSTRAINT pk_pessoa
		PRIMARY KEY(cd_pessoa)
);

CREATE TABLE tb_funcionario
(
    cd_funcionario INT NOT NULL AUTO_INCREMENT,
    ic_status BOOLEAN NOT NULL,
    cd_categoria INT NOT NULL,
    cd_creci INT NOT NULL,
    CONSTRAINT pk_funcionario
        PRIMARY KEY (cd_funcionario),
    CONSTRAINT fk_categoria_funcionario
        FOREIGN KEY (cd_categoria)
            REFERENCES tb_categoria_funcionario(cd_categoria)
);
