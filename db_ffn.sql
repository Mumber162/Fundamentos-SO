-- criandoObanco
drop database if exists db_ffn;
create database db_ffn;
use db_ffn;
-- criandoAsttabelas

create table tb_polarizacoes(
	pol_codigo int auto_increment,
    pol_polarizacao varchar(45) not null,
    constraint pk_polarizacoes primary key(pol_codigo)
);

INSERT INTO tb_polarizacoes (pol_polarizacao) VALUES
('Esquerda'),
('Direita'),
('Neutra');

create table tb_fontes(
	fon_codigo int auto_increment,
    fon_nome varchar(45) not null,
    fon_logo varchar(45),
    fon_confiabilidade decimal(4,2) not null,
    fon_website varchar(300),
    fon_pol_codigo int not null,
    constraint pk_fontes primary key(fon_codigo),
    constraint fk_pol_fon foreign key(fon_pol_codigo) references tb_polarizacoes(pol_codigo)
);

INSERT INTO tb_fontes (fon_nome, fon_logo, fon_confiabilidade, fon_website, fon_pol_codigo) 
VALUES
('Fonte 1 ', 'https://seeklogo.com/images/U/uol-logo-05BC90368D-seeklogo.com.gif ', '25.00', 'www.site1.com', 1),
('Fonte 2', 'https://i.imgur.com/8VVJGFP.png', '35.00', 'www.site2.com', 2),
('Fonte 3', 'https://i.imgur.com/tjG3CwT.png', '45.00', 'www.site3.com', 3);

create table tb_redes_sociais(
	rcs_codigo int not null auto_increment, 
	rcs_rede_social varchar(46) not null,
	constraint pk_redes_sociais primary key(rcs_codigo)
); 

INSERT INTO tb_redes_sociais (rcs_rede_social) VALUES
('Facebook'),
('Twitterrrrrrrrrrrrrrrrrrrrrrrrrrrrrr'),
('Instagram');

create table tb_redes_sociais_fontes(
	rdf_rcs_codigo int,
    rdf_fon_codigo int,
    constraint pk_redes_fontes primary key(rdf_rcs_codigo,rdf_fon_codigo),
    constraint fk_fon_rdf foreign key(rdf_fon_codigo) references tb_fontes(fon_codigo),
	constraint fk_rcs_rdf foreign key(rdf_rcs_codigo) references tb_redes_sociais(rcs_codigo)
);

INSERT INTO tb_redes_sociais_fontes (rdf_rcs_codigo, rdf_fon_codigo) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(3, 2),
(2, 3),
(3, 3);

create table tb_temas(
	tem_codigo int auto_increment,
    tem_tema varchar(45),
    constraint pk_temas primary key(tem_codigo)
);

INSERT INTO tb_temas (tem_tema) VALUES
('Economia'),
('Ciência'),
('Medicina'),
('Programação');

create table tb_noticias(
	not_codigo int auto_increment,
    not_titulo varchar(150) not null,
    not_data timestamp,
    not_confiabilidade decimal(4,2) not null,
    not_tem_codigo int not null,
    fulltext(not_titulo),
    constraint pk_noticias primary key(not_codigo),
    constraint fk_tem_not foreign key(not_tem_codigo) references tb_temas(tem_codigo)
);

INSERT INTO tb_noticias (not_titulo, not_confiabilidade, not_tem_codigo) VALUES
('Vírus aumenta a inteligência dos seres que o contraem.', '25.00', 2),
('Bolsa de valores aumenta em 500% e homem enrica.', '85.00', 1),
('Max consegue compreender o mistério por trás do if(1==1)', '5.00', 4),
('Paciente quebra a perna e em 24horas obtem 100% de melhora.', '0.00', 3);

create table tb_palavras_chaves(
	pcs_codigo int not null auto_increment, 
	pcs_palavra_chave varchar(46) not null,
	constraint pk_palavras_chaves primary key(pcs_codigo)
); 

INSERT INTO tb_palavras_chaves (pcs_palavra_chave) VALUES
('Riqueza'),
('Médico'),
('Max'),
('Gambiarra'),
('Milagre'),
('Sorte');

create table tb_palavras_chaves_das_noticias(
	pcn_pcs_codigo int not null,
    pcn_not_codigo int not null,
    constraint pk_palavras_chaves_das_noticias primary key(pcn_pcs_codigo, pcn_not_codigo) ,
    constraint fk_not_pcn foreign key(pcn_not_codigo) references tb_noticias(not_codigo),
	constraint fk_pcs_pcn foreign key(pcn_pcs_codigo) references tb_palavras_chaves(pcs_codigo)
);

INSERT INTO tb_palavras_chaves_das_noticias (pcn_pcs_codigo, pcn_not_codigo) VALUES
(6, 1),
(1, 2),
(5, 2),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(2, 4),
(5, 4),
(6, 4);

create table tb_fontes_das_noticias(
	fdn_fon_codigo int not null,
    fdn_not_codigo int not null,
    constraint pk_fontes_das_noticias primary key(fdn_fon_codigo, fdn_not_codigo),
    constraint fk_not_fdn foreign key(fdn_not_codigo) references tb_noticias(not_codigo),
    constraint fk_fon_fdn foreign key(fdn_fon_codigo) references tb_fontes(fon_codigo)
);

INSERT INTO tb_fontes_das_noticias (fdn_fon_codigo, fdn_not_codigo) VALUES
(1, 1),
(2, 2),
(3, 3),
(3, 4);
