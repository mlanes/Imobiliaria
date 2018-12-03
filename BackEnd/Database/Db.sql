create database imobiliaria;
use imobiliaria;

create table admin
(
	cd_admin int not null,
    nm_admin varchar(45) not null,
    nm_senha varchar (45) not null,
    constraint pk_admin
        primary key (cd_admin)
);

create table tb_codigo
(
    cd_codigo int not null auto_increment,
    nm_codigo_log varchar(10),
    nm_computador varchar(60),
    cd_admin int,
    constraint pk_codigo
        primary key(cd_codigo),
    constraint fk_admin_code
        foreign key (cd_admin)
            references admin (cd_admin)
);

create table tb_mensagem
(
    cd_mensagem int not null auto_increment,
    nm_nome varchar (45),
    nm_titulo varchar (45),
    nm_email varchar (45),
    ds_mensagem varchar (1000),
    dt_criacao date,
    hr_criacao time,
    cd_admin int,
    ic_mensagem_lida enum('S','N') DEFAULT 'N',
    constraint pk_mensagem
        primary key (cd_mensagem),
    constraint fk_admin
        foreign key (cd_admin)
            references admin (cd_admin)
);

create table categoria_func
(
    cd_categoria_func int not null,
    nm_categoria_func varchar (45),
    ic_categoria_func enum('1','2','3','4'),
    constraint pk_categoria_func
        primary key (cd_categoria_func)
);

create table tb_uf
(
	sg_estado char(2) not null,
	nm_estado varchar(20) default null,
	constraint pk_estado
		primary key(sg_estado)
);

create table tb_cidade
(
	cd_cidade int not null auto_increment,
	sg_estado char(2) not null,
	nm_cidade varchar(45),
	constraint pk_cidade
		primary key(cd_cidade),
	constraint fk_uf_cidade
		foreign key(sg_estado)
			references tb_uf(sg_estado)
);

create table tb_bairro
(
	cd_bairro int not null,
	cd_cidade int,
	nm_bairro varchar(45),
	constraint pk_bairro
		primary key(cd_bairro),
	constraint fk_bairro_cidade
		foreign key(cd_cidade)
			references tb_cidade(cd_cidade)
);

create table tb_endereco
(
	cd_endereco int not null auto_increment,
	cd_bairro int,
	nm_endereco varchar(45),
    nm_complemento varchar(100),
    cd_numero_casa int,
	constraint pk_endereco
        primary key(cd_endereco),
	constraint fk_endereco_bairro
		foreign key(cd_bairro)
			references tb_bairro(cd_bairro)
);


create table tb_funcionario
(
	cd_funcionario int(4) auto_increment,
    cd_categoria_func int not null,
	nm_funcionario_primeiro varchar(45),
	nm_funcionario_segundo varchar(45),
	cd_cpf varchar(14),
	constraint pk_funcionario
		primary key(cd_funcionario),
    constraint fk_categoria_func
        foreign key (cd_categoria_func)
            references categoria_func(cd_categoria_func)
);

create table tb_corretor
(
    cd_corretor int(4) auto_increment,
    cd_creci varchar (8),
    cd_funcionario int,
    constraint pk_corretor
        primary key (cd_corretor),
    constraint fk_funcionario_corretor
        foreign key (cd_funcionario)
            references tb_funcionario(cd_funcionario)
                on delete cascade
);

create table tb_proprietario
(
    cd_proprietario int not null auto_increment,
    nm_proprietario_primeiro varchar (45),
    nm_proprietario_segundo varchar (45),
    constraint pk_proprietario
        primary key(cd_proprietario)
);

create table tb_contato
(
    cd_contato int not null auto_increment,
    cd_telefone varchar (15),
    nm_email varchar (45),
    cd_proprietario int,
    cd_funcionario int,
    constraint pk_contato
        primary key (cd_contato),
    constraint fk_contato_prop
        foreign key (cd_proprietario)
            references tb_proprietario(cd_proprietario)
                on delete cascade,
    constraint fk_contato_func
        foreign key (cd_funcionario)
            references tb_funcionario(cd_funcionario)
                on delete cascade
);

create table categoria_imovel
(
    cd_categoria int not null,
    nm_categoria varchar (45),
    constraint pk_categoria
        primary key (cd_categoria)
);

create table tb_imovel
(
	cd_imovel int not null auto_increment,
    cd_categoria int,
	cd_endereco int,
    cd_admin int,
    nm_documentofisico varchar (11),
	qt_area_util decimal(10,2),
	qt_area_total decimal(10,2),
	ds_imovel varchar(300),
	vl_preco varchar(30),
    vl_iptu varchar(30),
    vl_condominio varchar(30),
	qt_comodos int,
	qt_dormitorios int,
    qt_suites int,
    qt_garagem int,
    qt_banheiro int,
    ic_mobilia enum('S','N') DEFAULT 'N',
    ds_chaves_imovel varchar (300),
	ic_vendido enum('S','N') DEFAULT 'N',
	dt_lancamento date,
    cd_proprietario int,
    ds_imagem varchar(100) default 'fotos/errorimg/padrao.jpg',
    nm_transacao varchar(45),
	constraint pk_imovel
        primary key(cd_imovel),
    constraint fk_admin_imovel
        foreign key (cd_admin)
            references admin(cd_admin),
    constraint fk_categoria_imovel
        foreign key (cd_categoria)
            references categoria_imovel(cd_categoria),
    constraint fk_proprietario
        foreign key (cd_proprietario)
            references tb_proprietario(cd_proprietario),
    constraint fk_endereco_imovel
        foreign key (cd_endereco)
            references tb_endereco(cd_endereco)
);

create table tb_imagem
(
	cd_imagem int not null auto_increment,
	nm_imagem varchar (100) default 'fotos/errorimg/padrao.jpg',
	cd_imovel int,
	constraint pk_imagem
		primary key (cd_imagem),
	constraint fk_imagem_imovel
		foreign key (cd_imovel)
			references tb_imovel (cd_imovel)
	            on delete cascade
);
