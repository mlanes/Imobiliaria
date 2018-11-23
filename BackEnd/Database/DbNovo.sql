DROP DATABASE IF EXISTS imobiliaria2;
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

CREATE TABLE tb_pessoa
(
	cd_pessoa INT NOT NULL AUTO_INCREMENT,
	nm_primeiro VARCHAR(45) NOT NULL,
	nm_meio VARCHAR(45) NOT NULL,
    nm_ultimo VARCHAR(45) NOT NULL,
    dt_nascimento DATE NOT NULL,
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
    cd_creci VARCHAR(20),
    cd_categoria INT NOT NULL,
    cd_pessoa INT NOT NULL,
    CONSTRAINT pk_funcionario
        PRIMARY KEY (cd_funcionario),
    CONSTRAINT fk_categoria_funcionario
        FOREIGN KEY (cd_categoria)
            REFERENCES tb_categoria_funcionario(cd_categoria),
    CONSTRAINT fk_funcionario_pessoa
        FOREIGN KEY (cd_pessoa)
            REFERENCES tb_pessoa(cd_pessoa)
);

-- Categorias dos Funcionarios
INSERT INTO tb_categoria_funcionario (cd_categoria, ic_status, nm_categoria, nm_sigla) VALUES (1, 1, 'Administrador', 'ADM');


-- Insert de Teste
-- Pessoa
INSERT INTO tb_pessoa (cd_pessoa, nm_primeiro, nm_meio, nm_ultimo, dt_nascimento, dt_criado, dt_editado, cd_cpf) VALUES (1, 'Nome', 'do Meio', 'Final', '1000-10-10', '1000-10-10 00:00:01', '1000-10-10 00:00:01', 123);

-- Funcionario
INSERT INTO tb_funcionario (cd_funcionario, ic_status, cd_categoria, cd_creci, cd_pessoa) VALUES (1, 1, 1, 123456, 1);