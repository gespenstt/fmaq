/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     23-10-2015 12:52:12                          */
/*==============================================================*/


drop table if exists campo;

drop table if exists cliente;

drop table if exists curriculum;

drop table if exists maquinaria;

drop table if exists maquinaria_foto;

drop table if exists marca_maquinaria;

drop table if exists noticia;

drop table if exists potrero;

drop table if exists promocion;

drop table if exists proyecto;

drop table if exists proyecto_archivo;

drop table if exists seccion;

drop table if exists tipo_proyecto;

drop table if exists usuario;

/*==============================================================*/
/* Table: campo                                                 */
/*==============================================================*/
create table campo
(
   cam_id               int not null auto_increment,
   cli_id               int,
   cam_nombre           varchar(50),
   cam_direccion        varchar(100),
   cam_contacto         varchar(50),
   created_at           datetime,
   updated_at           datetime,
   primary key (cam_id)
)
type = innodb;

/*==============================================================*/
/* Table: cliente                                               */
/*==============================================================*/
create table cliente
(
   cli_id               int not null auto_increment,
   cli_nombre           varchar(50),
   cli_apellido         varchar(50),
   cli_usuario          varchar(20),
   cli_password         varchar(50),
   cli_empresa          varchar(100),
   cli_correo           varchar(100),
   created_at           datetime,
   primary key (cli_id)
)
type = innodb;

/*==============================================================*/
/* Table: curriculum                                            */
/*==============================================================*/
create table curriculum
(
   cur_id               int not null auto_increment,
   cur_carta_presentacion text,
   cur_nombre_archivo   varchar(100),
   cur_ruta             varchar(100),
   cur_nombre           varchar(100),
   cur_rut              varchar(15),
   cur_telefono         varchar(15),
   created_at           datetime,
   primary key (cur_id)
)
type = innodb;

/*==============================================================*/
/* Table: maquinaria                                            */
/*==============================================================*/
create table maquinaria
(
   maq_id               int not null auto_increment,
   mar_id               int,
   maq_modelo           varchar(50),
   maq_descripcion      text,
   maq_precio           int,
   maq_fono             varchar(15),
   maq_contacto         varchar(100),
   maq_correo           varchar(100),
   maq_ano              varchar(10),
   maq_horas            varchar(15),
   created_at           datetime,
   updated_at           datetime,
   primary key (maq_id)
)
type = innodb;

/*==============================================================*/
/* Table: maquinaria_foto                                       */
/*==============================================================*/
create table maquinaria_foto
(
   mfo_id               int not null auto_increment,
   maq_id               int,
   mfo_nombre           varchar(100),
   mfo_ruta             varchar(100),
   created_at           datetime,
   primary key (mfo_id)
)
type = innodb;

/*==============================================================*/
/* Table: marca_maquinaria                                      */
/*==============================================================*/
create table marca_maquinaria
(
   mar_id               int not null auto_increment,
   mar_nombre           varchar(100),
   created_at           datetime,
   primary key (mar_id)
)
type = innodb;

/*==============================================================*/
/* Table: noticia                                               */
/*==============================================================*/
create table noticia
(
   not_id               int not null auto_increment,
   not_titulo           text,
   not_url              text,
   not_imagen           varchar(255),
   not_descripcion      text,
   created_at           datetime,
   updated_at           datetime,
   primary key (not_id)
)
type = innodb;

/*==============================================================*/
/* Table: potrero                                               */
/*==============================================================*/
create table potrero
(
   pot_id               int not null auto_increment,
   cam_id               int,
   pot_nombre           varchar(100),
   pot_ubicacion        varchar(100),
   pot_cantidad_hectareas varchar(50),
   created_at           datetime,
   updated_at           datetime,
   primary key (pot_id)
)
type = innodb;

/*==============================================================*/
/* Table: promocion                                             */
/*==============================================================*/
create table promocion
(
   prom_id              int not null auto_increment,
   prom_titulo          varchar(50),
   prom_descripcion     text,
   prom_urlvideo        varchar(100),
   created_at           datetime,
   updated_at           datetime,
   primary key (prom_id)
)
type = innodb;

/*==============================================================*/
/* Table: proyecto                                              */
/*==============================================================*/
create table proyecto
(
   pro_id               int not null auto_increment,
   pot_id               int,
   tpr_id               int,
   pro_nombre           text,
   pro_fecha            datetime,
   pro_descripcion      text,
   created_at           datetime,
   primary key (pro_id)
)
type = innodb;

/*==============================================================*/
/* Table: proyecto_archivo                                      */
/*==============================================================*/
create table proyecto_archivo
(
   par_id               int not null auto_increment,
   pro_id               int,
   par_nombre           varchar(100),
   par_ruta             varchar(100),
   par_descripcion      text,
   created_at           datetime,
   primary key (par_id)
)
type = innodb;

/*==============================================================*/
/* Table: seccion                                               */
/*==============================================================*/
create table seccion
(
   sec_id               int not null auto_increment,
   sec_nombre           varchar(20),
   created_at           datetime,
   updated_at           datetime,
   primary key (sec_id)
)
type = innodb;

alter table seccion comment 'quienes somos
home
galeria
servicios
                            -&#&';

/*==============================================================*/
/* Table: tipo_proyecto                                         */
/*==============================================================*/
create table tipo_proyecto
(
   tpr_id               int not null auto_increment,
   tpr_nombre           varchar(100),
   created_at           datetime,
   primary key (tpr_id)
)
type = innodb;

alter table tipo_proyecto comment 'Siembra
Cosecha
Fumigacion
Fertilizacion
                                  ';

/*==============================================================*/
/* Table: usuario                                               */
/*==============================================================*/
create table usuario
(
   usu_id               int not null auto_increment,
   usu_nombre           varchar(100),
   usu_apellido         varchar(100),
   usu_correo           varchar(100),
   usu_usuario          varchar(50),
   usu_password         varchar(50),
   created_at           datetime,
   primary key (usu_id)
)
type = innodb;

alter table campo add constraint fk_relationship_7 foreign key (cli_id)
      references cliente (cli_id) on delete restrict on update restrict;

alter table maquinaria add constraint fk_relationship_6 foreign key (mar_id)
      references marca_maquinaria (mar_id) on delete restrict on update restrict;

alter table maquinaria_foto add constraint fk_relationship_5 foreign key (maq_id)
      references maquinaria (maq_id) on delete restrict on update restrict;

alter table potrero add constraint fk_relationship_8 foreign key (cam_id)
      references campo (cam_id) on delete restrict on update restrict;

alter table proyecto add constraint fk_relationship_11 foreign key (tpr_id)
      references tipo_proyecto (tpr_id) on delete restrict on update restrict;

alter table proyecto add constraint fk_relationship_9 foreign key (pot_id)
      references potrero (pot_id) on delete restrict on update restrict;

alter table proyecto_archivo add constraint fk_relationship_10 foreign key (pro_id)
      references proyecto (pro_id) on delete restrict on update restrict;
	  
INSERT INTO `usuario` (`usu_id`, `usu_nombre`, `usu_apellido`, `usu_correo`, `usu_usuario`, `usu_password`, `created_at`) VALUES
(1, 'Admin', 'Futumaq', 'admin@futumaq.cl', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-10-17 00:57:23');

