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

CREATE TABLE tb_acesso
(
    cd_acesso INT NOT NULL AUTO_INCREMENT,
    ic_status BOOLEAN NOT NULL,
    nm_login VARCHAR(45) NOT NULL,
    nm_password VARCHAR(255) NOT NULL,
    cd_funcionario INT NOT NULL,
    CONSTRAINT pk_acesso
        PRIMARY KEY (cd_acesso),
    CONSTRAINT fk_acesso_funcionario
        FOREIGN KEY (cd_funcionario)
            REFERENCES tb_funcionario(cd_funcionario)
);

CREATE TABLE tb_proprietario
(
    cd_proprietario INT NOT NULL AUTO_INCREMENT,
    ic_status BOOLEAN NOT NULL,
    cd_pessoa INT NOT NULL,
    CONSTRAINT pk_proprietario
        PRIMARY KEY (cd_proprietario),
    CONSTRAINT fk_pessoa_proprietario
        FOREIGN KEY (cd_pessoa)
            REFERENCES tb_pessoa(cd_pessoa)
);

CREATE TABLE tb_categoria_imovel
(
    cd_categoria_imovel INT NOT NULL AUTO_INCREMENT,
    ic_status BOOLEAN NOT NULL,
    nm_categoria_imovel VARCHAR(45) NOT NULL,
    CONSTRAINT pk_categoria_imovel
        PRIMARY KEY (cd_categoria_imovel)
);

CREATE TABLE tb_imovel
(
    cd_imovel INT NOT NULL AUTO_INCREMENT,
    qt_area_util DECIMAL(10, 2) NOT NULL,
    qt_area_total DECIMAL(10, 2) NOT NULL,
    vl_preco VARCHAR(30) NOT NULL,
    ic_vendido BOOLEAN NOT NULL,
    ds_imovel VARCHAR(30) NOT NULL,
    ds_imagem VARCHAR(30) DEFAULT "default.png",
    cd_latitude VARCHAR(30),
    cd_longitude VARCHAR(30),
    cd_categoria_imovel INT NOT NULL,
    cd_proprietario INT NOT NULL,
    CONSTRAINT pk_imovel
        PRIMARY KEY (cd_imovel),
    CONSTRAINT fk_categoria_imovel
        FOREIGN KEY (cd_categoria_imovel)
            REFERENCES tb_categoria_imovel(cd_categoria_imovel),
    CONSTRAINT fk_proprietario_imovel
        FOREIGN KEY (cd_proprietario)
            REFERENCES tb_proprietario(cd_proprietario)
);

-- Categorias dos Funcionarios
INSERT INTO tb_categoria_funcionario (cd_categoria, ic_status, nm_categoria, nm_sigla) VALUES (1, 1, 'Administrador', 'ADM');

-- Categorias de Imóvel
INSERT INTO tb_categoria_imovel (cd_categoria_imovel, nm_categoria_imovel, ic_status) VALUES (1, 'Casa', 1), (2, 'Apartamento', 1);



-- Insert de Teste
-- Pessoa
INSERT INTO tb_pessoa (cd_pessoa, nm_primeiro, nm_meio, nm_ultimo, dt_nascimento, dt_criado, dt_editado, cd_cpf) VALUES (1, 'Nome', 'do Meio', 'Final', '1000-10-10', '1000-10-10 00:00:01', '1000-10-10 00:00:01', 123);

-- Funcionario
INSERT INTO tb_funcionario (cd_funcionario, ic_status, cd_categoria, cd_creci, cd_pessoa) VALUES (1, 1, 1, 123456, 1);

-- Acesso ao Sistema
INSERT INTO tb_acesso (cd_acesso, ic_status, nm_login, nm_password, cd_funcionario) VALUES (1, 1, 'admin', 'admin', 1);