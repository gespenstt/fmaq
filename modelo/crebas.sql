/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     26/11/2015 17:12:17                          */
/*==============================================================*/


drop table if exists campo;

drop table if exists cliente;

drop table if exists cotizacion;

drop table if exists curriculum;

drop table if exists galeria;

drop table if exists galeria_archivo;

drop table if exists maquinaria;

drop table if exists maquinaria_foto;

drop table if exists marca_maquinaria;

drop table if exists noticia;

drop table if exists potrero;

drop table if exists promocion;

drop table if exists proyecto;

drop table if exists proyecto_archivo;

drop table if exists servicio;

drop table if exists subservicio;

drop table if exists subservicio_archivo;

drop table if exists tipo_maquinaria;

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
engine = innodb;

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
engine = innodb;

/*==============================================================*/
/* Table: cotizacion                                            */
/*==============================================================*/
create table cotizacion
(
   cot_id               int not null auto_increment,
   cot_nombre           text,
   cot_email            text,
   cot_fono             varchar(50),
   cot_asunto           text,
   cot_direccion        text,
   cot_hectareas        int,
   cot_mensaje          text,
   created_at           datetime,
   primary key (cot_id)
)
engine = innodb;

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
   cur_destacado        bool default false,
   cur_email            text,
   created_at           datetime,
   primary key (cur_id)
)
engine = innodb;

/*==============================================================*/
/* Table: galeria                                               */
/*==============================================================*/
create table galeria
(
   gal_id               int not null auto_increment,
   gal_nombre           text,
   gal_descripcion      text,
   created_at           datetime,
   updated_at           datetime,
   primary key (gal_id)
)
engine = innodb;

/*==============================================================*/
/* Table: galeria_archivo                                       */
/*==============================================================*/
create table galeria_archivo
(
   gar_id               int not null auto_increment,
   gal_id               int not null,
   gar_nombre           text,
   gar_ruta             text,
   created_at           datetime,
   primary key (gar_id)
)
engine = innodb;

/*==============================================================*/
/* Table: maquinaria                                            */
/*==============================================================*/
create table maquinaria
(
   maq_id               int not null auto_increment,
   mar_id               int,
   tma_id               int,
   maq_modelo           varchar(50),
   maq_descripcion      text,
   maq_precio           int,
   maq_fono             varchar(15),
   maq_contacto         varchar(100),
   maq_correo           varchar(100),
   maq_ano              varchar(10),
   maq_horas            varchar(15),
   maq_venta            bool default false,
   created_at           datetime,
   updated_at           datetime,
   primary key (maq_id)
)
engine = innodb;

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
engine = innodb;

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
engine = innodb;

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
engine = innodb;

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
engine = innodb;

/*==============================================================*/
/* Table: promocion                                             */
/*==============================================================*/
create table promocion
(
   prom_id              int not null auto_increment,
   prom_titulo          varchar(50),
   prom_descripcion     text,
   prom_urlvideo        varchar(100),
   prom_esvideo         bool default false,
   prom_nombreimagen    text,
   prom_rutaimagen      text,
   created_at           datetime,
   updated_at           datetime,
   primary key (prom_id)
)
engine = innodb;

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
engine = innodb;

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
engine = innodb;

/*==============================================================*/
/* Table: servicio                                              */
/*==============================================================*/
create table servicio
(
   ser_id               int not null auto_increment,
   ser_titulo           varchar(255),
   ser_contenido        text,
   ser_imagen           varchar(255),
   created_at           datetime,
   updated_at           datetime,
   primary key (ser_id)
)
engine = innodb;

/*==============================================================*/
/* Table: subservicio                                           */
/*==============================================================*/
create table subservicio
(
   sub_id               int not null auto_increment,
   ser_id               int not null,
   sub_titulo           varchar(300),
   sub_contenido        text,
   created_at           datetime,
   updated_at           datetime,
   primary key (sub_id)
)
engine = innodb;

/*==============================================================*/
/* Table: subservicio_archivo                                   */
/*==============================================================*/
create table subservicio_archivo
(
   sar_id               int not null auto_increment,
   sub_id               int not null,
   sar_nombre           varchar(300),
   sar_ruta             varchar(300),
   created_at           datetime,
   primary key (sar_id)
)
engine = innodb;

/*==============================================================*/
/* Table: tipo_maquinaria                                       */
/*==============================================================*/
create table tipo_maquinaria
(
   tma_id               int not null auto_increment,
   tma_nombre           varchar(300),
   created_at           datetime,
   primary key (tma_id)
)
engine = innodb;

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
engine = innodb;

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
engine = innodb;

alter table campo add constraint fk_relationship_7 foreign key (cli_id)
      references cliente (cli_id) on delete restrict on update restrict;

alter table galeria_archivo add constraint fk_galeria_galeriaarchivo foreign key (gal_id)
      references galeria (gal_id) on delete restrict on update restrict;

alter table maquinaria add constraint fk_relationship_12 foreign key (tma_id)
      references tipo_maquinaria (tma_id) on delete restrict on update restrict;

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

alter table subservicio add constraint fk_servicio_subservicio foreign key (ser_id)
      references servicio (ser_id) on delete restrict on update restrict;

alter table subservicio_archivo add constraint fk_subservicio_subservicioarchivo foreign key (sub_id)
      references subservicio (sub_id) on delete restrict on update restrict;



INSERT INTO `usuario` (`usu_id`, `usu_nombre`, `usu_apellido`, `usu_correo`, `usu_usuario`, `usu_password`, `created_at`) VALUES
(1, 'Admin', 'Futamaq', 'admin@futamaq.cl', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-10-17 00:57:23');