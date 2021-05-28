/* BASE DE DATOS PROYECTO MALLA VIAL COSTOS E INVENTARIO*/

    /*BASE DE DATOS*/

        CREATE DATABASE MallaVial

    /*TABLAS*/

        /*TABLA MOVIMIENTO #1*/
            CREATE TABLE tblmovimiento(
                mov_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                mov_tipo_movimiento VARCHAR(50) NOT NULL,
                mov_fecha_movimiento DATE,
                mov_numero_factura INT(20)unsigned NOT NULL,
                mov_concepto VARCHAR(50) NOT NULL,
                /*Foraneas en tabla 1*/
                tblproveedor_pro_id INT(30)unsigned NOT NULL,
                tblusuario_usu_id INT(30)unsigned NOT NULL
            );
        
        /*TABLA PROVEEDOR #2*/
            CREATE TABLE tblproveedor(
                pro_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                pro_nit VARCHAR(10) NOT NULL,
                pro_razon_social VARCHAR(50) NOT NULL,
                pro_correo VARCHAR(100) NOT NULL,
                pro_direccion VARCHAR(50) NOT NULL,
                pro_telefono INT(20)unsigned NOT NULL,
                pro_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /* Foraneas en tabla 2 */
                tblestado_general_est_gen_id INT(30)unsigned NOT NULL
            );

        /*TABLA MOVIMIENTO INVENTARIO #3*/
            CREATE TABLE tblmovimiento_inventario(
                mov_inv_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                mov_inv_cantidad INT(30)unsigned NOT NULL,
                mov_inv_valor_total FLOAT(30) NOT NULL,
                mov_inv_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                /*Foraneas en tabla 2*/
                tblmovimiento_mov_id INT(30)unsigned NOT NULL,
                tblinventario_inv_id INT(30)unsigned NOT NULL
            );

        /*TABLA INVENTARIO #4*/
            CREATE TABLE tblinventario(
                inv_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                inv_descripcion VARCHAR(100)NOT NULL,
                inv_costo FLOAT(30) NOT NULL,
                inv_stock_min INT(30)unsigned NOT NULL,
                inv_stock_max INT(30)unsigned NOT NULL,
                inv_existencia INT(30)unsigned NOT NULL,
                inv_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                /*Foraneas en tabla 3*/
                tblherramienta_her_id INT(30)unsigned NULL,
                tblmaterial_mat_id INT(30)unsigned NULL,
                tblmaquinaria_maq_id INT(30)unsigned NULL,
                tblbodega_bod_id INT(30)unsigned NOT NULL,
                tblestado_est_id INT(30)unsigned NOT NULL,
                tbltipo_herramienta_tip_her_id INT(30)unsigned NULL,
                tbltipo_material_tip_mat_id INT(30)unsigned NULL,
                tbltipo_maquinaria_tip_maq_id INT(30)unsigned NOT NULL,
                tblproveedor_pro_id INT(30)unsigned NOT NULL
            );

        /*TABLA HERRAMIENTA #5*/
        CREATE TABLE tblherramienta(
                her_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                her_descripcion VARCHAR(100) NOT NULL,
                her_costo FLOAT(30) NOT NULL,
                her_stock_min INT(30)unsigned NOT NULL,
                her_stock_max INT(30)unsigned NOT NULL,
                her_existencia INT(30)unsigned NOT NULL,
                her_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /* Foraneas en tabla #5 */
                tbltipo_herramienta_tip_her_id INT(30)unsigned NOT NULL,
                tblestado_est_id INT(30)unsigned NOT NULL,
                tblbodega_bod_id INT(30)unsigned NOT NULL,
                tblproveedor_pro_id INT(30)unsigned NOT NULL
            );

        /*TABLA TIPO HERRAMIENTA #6*/
        CREATE TABLE tbltipo_herramienta(
                tip_her_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                tip_her_descripcion VARCHAR(100) NOT NULL,
                tip_her_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /* Foraneas en tabla 6 */
                tblestado_general_est_gen_id INT(30)unsigned NOT NULL
            );


        /*TABLA MATERIAL #7*/
        CREATE TABLE tblmaterial(
                mat_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                mat_descripcion VARCHAR(100) NOT NULL,
                mat_costo FLOAT(30) NOT NULL,
                mat_stock_min INT(30)unsigned NOT NULL,
                mat_stock_max INT(30)unsigned NOT NULL,
                mat_existencia INT(30)unsigned NOT NULL,
                mat_fecha_vencimiento DATE NOT NULL,
                mat_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /* Foraneas en tabla 5 */
                tbltipo_material_tip_mat_id INT(30)unsigned NOT NULL,
                tblestado_est_id INT(30)unsigned NOT NULL,
                tblbodega_bod_id INT(30)unsigned NOT NULL,
                tblproveedor_pro_id INT(30)unsigned NOT NULL
            );

        /*TABLA TIPO MATERIAL #8*/
            CREATE TABLE tbltipo_material(
                tip_mat_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                tip_mat_descripcion VARCHAR(100) NOT NULL,
                tip_mat_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /* Foraneas en tabla 8 */
                tblestado_general_est_gen_id INT(30)unsigned NOT NULL
            );

        /*TABLA MAQUINARIA #9*/
        CREATE TABLE tblmaquinaria(
                maq_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                maq_descripcion VARCHAR(100) NOT NULL,
                maq_costo FLOAT(30) NOT NULL,
                maq_stock_min INT(30)unsigned NOT NULL,
                maq_stock_max INT(30)unsigned NOT NULL,
                maq_existencia INT(30)unsigned NOT NULL,
                maq_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /* Foraneas en tabla #9 */
                tbltipo_maquinaria_tip_maq_id INT(30)unsigned NOT NULL,
                tblestado_est_id INT(30)unsigned NOT NULL,
                tblbodega_bod_id INT(30)unsigned NOT NULL,
                tblproveedor_pro_id INT(30)unsigned NOT NULL
            );

        /*TABLA TIPO MAQUINARIA #10*/
        CREATE TABLE tbltipo_maquinaria(
                tip_maq_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                tip_maq_descripcion VARCHAR(100) NOT NULL,
                tip_maq_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /* Foraneas en tabla 10 */
                tblestado_general_est_gen_id INT(30)unsigned NOT NULL
            );
        /*TABLA BODEGA #11*/
            CREATE TABLE tblbodega(
                bod_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                bod_descripcion VARCHAR(100) NOT NULL,
                bod_direccion VARCHAR(50) NOT NULL,
                bod_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /* Foraneas en tabla 11 */
                tbltipo_zona_tip_zon_id INT(30)unsigned NOT NULL,
                tblestado_general_est_gen_id INT(30)unsigned NOT NULL
            );

        /*TABLA TIPO ZONA #12*/
        CREATE TABLE tbltipo_zona(
                tip_zon_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                tip_zon_descripcion VARCHAR(100) NOT NULL,
                tip_zon_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /* Foraneas en tabla 12 */
                tblestado_general_est_gen_id INT(30)unsigned NOT NULL
            );

        /*TABLA ESTADO #13*/
            CREATE TABLE tblestado(
                est_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                est_nombre VARCHAR(50) NOT NULL,
                est_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /* Foraneas en tabla 8 */
                tbltipo_estado_tip_est_id INT(30)unsigned NOT NULL
            ); 
        
        /*TABLA TIPO ESTADO #14*/
        CREATE TABLE tbltipo_estado(
                tip_est_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                tip_est_descripcion VARCHAR(50) NOT NULL,
                tip_est_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ); 

        /*TABLA TIPO USUARIO #15*/
            CREATE TABLE tblusuario(
                    usu_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    usu_numero_documento INT(20)unsigned NOT NULL,
                    usu_nombre1 VARCHAR(30) NOT NULL,
                    usu_nombre2 VARCHAR(30) NULL,
                    usu_apellido1 VARCHAR(30) NOT NULL,
                    usu_apellido2 VARCHAR(30) NOT NULL,
                    usu_correo VARCHAR(50) NOT NULL,
                    usu_contraseña VARCHAR(50) NOT NULL,
                    usu_direccion VARCHAR(50) NOT NULL,
                    usu_telefono INT(30)unsigned NOT NULL,
                    usu_foto VARCHAR(100) NULL,
                    usu_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    /*Foraneas en tabla 9*/
                    tbltipo_documento_tip_doc_id INT(30)unsigned NOT NULL,
                    tblrol_rol_id INT(30)unsigned NOT NULL,
                    tblestado_general_est_gen_id INT(30)unsigned NOT NULL
            );

        /*TABLA TIPO DOCUMENTO #16*/
            CREATE TABLE tbltipo_documento(
                tip_doc_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                tip_doc_descripcion VARCHAR(50) NOT NULL,
                tip_doc_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /* foraneas en la tabla */
                tblestado_general_est_gen_id INT(30)unsigned NOT NULL
            );

        /*TABLA ROL #17*/
            CREATE TABLE tblrol(
                rol_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                rol_descripcion VARCHAR(50) NOT NULL,
                rol_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /* foraneas en la tabla */
                tblestado_general_est_gen_id INT(30)unsigned NOT NULL
            );

        /*TABLA TERCERO #18*/
            CREATE TABLE tbltercero(
                    ter_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    ter_numero_documento INT(20)unsigned NOT NULL,
                    ter_nombre1 VARCHAR(50) NOT NULL,
                    ter_nombre2 VARCHAR(50) NULL,
                    ter_apellido1 VARCHAR(50) NOT NULL,
                    ter_apellido2 VARCHAR(50) NOT NULL,
                    ter_correo VARCHAR(100) NOT NULL,
                    ter_direccion VARCHAR(50) NOT NULL,
                    ter_telefono INT(50)unsigned NOT NULL,
                    ter_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    /*Foraneas en tabla 10*/
                    tbltipo_documento_tip_doc_id INT(30)unsigned NOT NULL,
                    tblrol_rol_id INT(30)unsigned NOT NULL,
                    tblestado_general_est_gen_id INT(30)unsigned NOT NULL
            );

        /*TABLA MOVIMIENTO TERCERO #19*/
            CREATE TABLE tblmovimiento_tercero(
                mov_ter_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                tblmovimiento_mov_id INT(30)unsigned NOT NULL,
                tbltercero_ter_id INT(30)unsigned NOT NULL
            );

        /*TABLA GENERAL #19*/
            CREATE TABLE tblestado_general(
                est_gen_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                est_gen_nombre VARCHAR(50) NOT NULL,
                est_gen_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            );

        /*TABLA TIPO DAÑO #20*/
            CREATE TABLE tbltipo_daño(
                tip_dañ_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                tip_dañ_descripcion VARCHAR(100) NOT NULL,
                tip_dañ_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /* Foraneas en tabla 20 */
                tblestado_general_est_gen_id INT(30)unsigned NOT NULL
            );


            /*TABLA CASO #21*/
            CREATE TABLE tblcaso(
                cas_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                cas_numero_tramo INT(30)unsigned NOT NULL,
                cas_direccion_caso VARCHAR(100) NOT NULL,
                cas_profundidad INT(30)unsigned NOT NULL, 
                cas_largo INT(30)unsigned NOT NULL,
                cas_ancho INT(30)unsigned NOT NULL,
                cas_foto_daño VARCHAR(100) NOT NULL,
                cas_descripcion VARCHAR(255) NOT NULL,
                cas_prioridad VARCHAR(30) NOT NULL,
                cas_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /*Foraneas en tabla caso*/
                tbltipo_daño_tip_dañ_id INT(30)unsigned NOT NULL,
                tblorden_ord_id INT(30)unsigned NOT NULL,
                tblusuario_usu_id INT(30)unsigned NOT NULL,
                tblestado_est_id INT(30)unsigned NOT NULL
            );

            /*TABLA ORDEN #22*/
            CREATE TABLE tblorden(
                ord_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                ord_prioridad VARCHAR(100) NOT NULL,
                ord_fecha_registro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                /*Foraneas en tabla orden*/
                tblusuario_usu_id INT(30)unsigned NOT NULL,
                tbltercero_ter_id INT(30)unsigned NOT NULL,
                tblinventario_inv_id INT(30)unsigned NOT NULL,
                tblestado_est_id INT(30)unsigned NOT NULL
            );


            /*TABLA ORDEN_INVENTARIO #23*/
            CREATE TABLE tblorden_inventario(
                ord_inv_id INT(30)unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
                ord_inv_cantidad INT(30)unsigned NOT NULL,
                ord_inv_costo_total_material INT(30)unsigned NULL,
                ord_inv_total_orden INT(30)unsigned NOT NULL,
                tblinventario_inv_id INT(30)unsigned NOT NULL,
                tblorden_ord_id INT(30)unsigned NOT NULL
            );

        /*LLAVES FORANEAS*/
            -- Foreanea orden
                ALTER TABLE tblorden
                ADD FOREIGN KEY(tblusuario_usu_id) 
                REFERENCES tblusuario(usu_id);

                ALTER TABLE tblorden
                ADD FOREIGN KEY(tbltercero_ter_id) 
                REFERENCES tbltercero(ter_id);

                ALTER TABLE tblorden
                ADD FOREIGN KEY(tblinventario_inv_id) 
                REFERENCES tblinventario(inv_id);

                ALTER TABLE tblorden
                ADD FOREIGN KEY(tblestado_est_id) 
                REFERENCES tblestado(est_id);

            -- Foranea tabla caso
                ALTER TABLE tblcaso
                ADD FOREIGN KEY(tbltipo_daño_tip_dañ_id) 
                REFERENCES tbltipo_daño(tip_dañ_id);

                ALTER TABLE tblcaso
                ADD FOREIGN KEY(tblorden_ord_id) 
                REFERENCES tblorden(ord_id);

                ALTER TABLE tblcaso
                ADD FOREIGN KEY(tblusuario_usu_id) 
                REFERENCES tblusuario(usu_id);

                ALTER TABLE tblcaso
                ADD FOREIGN KEY(tblestado_est_id) 
                REFERENCES tblestado(est_id);

            -- Foreaneas orden_inventario
            
                ALTER TABLE tblorden_inventario
                ADD FOREIGN KEY(tblinventario_inv_id) 
                REFERENCES tblinventario(inv_id);

                ALTER TABLE tblorden_inventario
                ADD FOREIGN KEY(tblorden_ord_id) 
                REFERENCES tblorden(ord_id);



            /*foraneas tabla movimiento */
                ALTER TABLE tblmovimiento 
                ADD FOREIGN KEY(tblproveedor_pro_id) 
                REFERENCES tblproveedor(pro_id);
            
                ALTER TABLE tblmovimiento 
                ADD FOREIGN KEY(tblusuario_usu_id) 
                REFERENCES tblusuario(usu_id);

                /*foraneas tabla inventario 3*/
                ALTER TABLE tblinventario 
                ADD FOREIGN KEY(tblherramienta_her_id) 
                REFERENCES tblherramienta(her_id);
            
                ALTER TABLE tblinventario
                ADD FOREIGN KEY(tblmaterial_mat_id) 
                REFERENCES tblmaterial(mat_id);

                ALTER TABLE tblinventario 
                ADD FOREIGN KEY(tblmaquinaria_maq_id) 
                REFERENCES tblmaquinaria(maq_id);
            
                ALTER TABLE tblinventario
                ADD FOREIGN KEY(tblbodega_bod_id) 
                REFERENCES tblbodega(bod_id);

                ALTER TABLE tblinventario
                ADD FOREIGN KEY(tblestado_est_id) 
                REFERENCES tblestado(est_id);

                ALTER TABLE tblinventario 
                ADD FOREIGN KEY(tbltipo_herramienta_tip_her_id) 
                REFERENCES tbltipo_herramienta(tip_her_id);

                ALTER TABLE tblinventario 
                ADD FOREIGN KEY(tbltipo_material_tip_mat_id) 
                REFERENCES tbltipo_material(tip_mat_id);

                ALTER TABLE tblinventario 
                ADD FOREIGN KEY(tblproveedor_pro_id) 
                REFERENCES tblproveedor(pro_id);


            /*foraneas tabla movimiento inventario 2*/
                ALTER TABLE tblmovimiento_inventario 
                ADD FOREIGN KEY(tblmovimiento_mov_id) 
                REFERENCES tblmovimiento(mov_id);
        
                ALTER TABLE tblmovimiento_inventario
                ADD FOREIGN KEY(tblinventario_inv_id) 
                REFERENCES tblinventario(inv_id);


            /*foraneas tabla movimiento tercero */
                ALTER TABLE tblmovimiento_tercero 
                ADD FOREIGN KEY(tblmovimiento_mov_id) 
                REFERENCES tblmovimiento(mov_id);
            
                ALTER TABLE tblmovimiento_tercero 
                ADD FOREIGN KEY(tbltercero_ter_id) 
                REFERENCES tbltercero(ter_id);

            /* foraneas tabla tipo daño */
                ALTER TABLE tbltipo_daño
                ADD FOREIGN KEY(tblestado_general_est_gen_id) 
                REFERENCES tblestado_general(est_gen_id);
        
            /* foraneas tabla tipo material */
                ALTER TABLE tbltipo_material
                ADD FOREIGN KEY(tblestado_general_est_gen_id) 
                REFERENCES tblestado_general(est_gen_id);

            /* foraneas tabla material */
                ALTER TABLE tblmaterial 
                ADD FOREIGN KEY(tbltipo_material_tip_mat_id) 
                REFERENCES tbltipo_material(tip_mat_id);

                ALTER TABLE tblmaterial
                ADD FOREIGN KEY(tblestado_est_id) 
                REFERENCES tblestado(est_id);

                ALTER TABLE tblmaterial
                ADD FOREIGN KEY(tblbodega_bod_id) 
                REFERENCES tblbodega(bod_id);

                ALTER TABLE tblmaterial
                ADD FOREIGN KEY(tblproveedor_pro_id) 
                REFERENCES tblproveedor(pro_id);

            /* foraneas tabla tipo herramienta */
                ALTER TABLE tbltipo_herramienta
                ADD FOREIGN KEY(tblestado_general_est_gen_id) 
                REFERENCES tblestado_general(est_gen_id);

            /* foraneas  tabla herramienta 4 */
                ALTER TABLE tblherramienta 
                ADD FOREIGN KEY(tbltipo_herramienta_tip_her_id) 
                REFERENCES tbltipo_herramienta(tip_her_id);

                ALTER TABLE tblherramienta
                ADD FOREIGN KEY(tblestado_est_id) 
                REFERENCES tblestado(est_id);

                ALTER TABLE tblherramienta
                ADD FOREIGN KEY(tblbodega_bod_id) 
                REFERENCES tblbodega(bod_id);

                ALTER TABLE tblherramienta 
                ADD FOREIGN KEY(tblproveedor_pro_id) 
                REFERENCES tblproveedor(pro_id);

            /* foraneas tabla tipo maquinaria */
                ALTER TABLE tbltipo_maquinaria
                ADD FOREIGN KEY(tblestado_general_est_gen_id) 
                REFERENCES tblestado_general(est_gen_id);

            /* foraneas tabla maquinaria */
                ALTER TABLE tblmaquinaria 
                ADD FOREIGN KEY(tbltipo_maquinaria_tip_maq_id) 
                REFERENCES tbltipo_maquinaria(tip_maq_id); 

                ALTER TABLE tblmaquinaria
                ADD FOREIGN KEY(tblestado_est_id) 
                REFERENCES tblestado(est_id);

                ALTER TABLE tblmaquinaria
                ADD FOREIGN KEY(tblbodega_bod_id) 
                REFERENCES tblbodega(bod_id);

                ALTER TABLE tblmaquinaria
                ADD FOREIGN KEY(tblproveedor_pro_id) 
                REFERENCES tblproveedor(pro_id);

            /* foraneas tabla tipo zona */
                ALTER TABLE tbltipo_zona
                ADD FOREIGN KEY(tblestado_general_est_gen_id) 
                REFERENCES tblestado_general(est_gen_id);

            /* foraneas  tabla bodega */
                ALTER TABLE tblbodega 
                ADD FOREIGN KEY(tbltipo_zona_tip_zon_id) 
                REFERENCES tbltipo_zona(tip_zon_id);

                ALTER TABLE  tblbodega
                ADD FOREIGN KEY(tblestado_general_est_gen_id) 
                REFERENCES tblestado_general(est_gen_id);

            /*foraneas  tabla proveedor*/ 
                ALTER TABLE tblproveedor
                ADD FOREIGN KEY(tblestado_general_est_gen_id) 
                REFERENCES tblestado_general(est_gen_id);

            /*foraneas  tabla estado*/ 
                ALTER TABLE tblestado
                ADD FOREIGN KEY(tbltipo_estado_tip_est_id) 
                REFERENCES tbltipo_estado(tip_est_id);

            /*foraneas tabla usuario*/
                ALTER TABLE tblusuario 
                ADD FOREIGN KEY(tbltipo_documento_tip_doc_id) 
                REFERENCES tbltipo_documento(tip_doc_id);
            
                ALTER TABLE tblusuario
                ADD FOREIGN KEY(tblrol_rol_id) 
                REFERENCES tblrol(rol_id);

                ALTER TABLE tblusuario 
                ADD FOREIGN KEY(tblestado_general_est_gen_id) 
                REFERENCES tblestado_general(est_gen_id);

            /*foraneas tabla tercero*/
                ALTER TABLE tbltercero 
                ADD FOREIGN KEY(tbltipo_documento_tip_doc_id) 
                REFERENCES tbltipo_documento(tip_doc_id);

                ALTER TABLE tbltercero
                ADD FOREIGN KEY(tblrol_rol_id) 
                REFERENCES tblrol(rol_id);

                ALTER TABLE tbltercero
                ADD FOREIGN KEY(tblestado_general_est_gen_id) 
                REFERENCES tblestado_general(est_gen_id);

            /*foraneas tabla tipo de documento 10*/
                ALTER TABLE tbltipo_documento
                ADD FOREIGN KEY(tblestado_general_est_gen_id) 
                REFERENCES tblestado_general(est_gen_id);

            /*foraneas tabla rol 10*/
                ALTER TABLE tblrol
                ADD FOREIGN KEY(tblestado_general_est_gen_id) 
                REFERENCES tblestado_general(est_gen_id);

    /* INSERTS */

    /* INSERTAR ESTADO GENERAL */

    INSERT INTO `tblestado_general` (`est_gen_id`, `est_gen_nombre`, `est_gen_fecha_registro`) VALUES (NULL, 'ACTIVO', current_timestamp()), (NULL, 'INACTIVO', current_timestamp());

    /* INSERTAR TIPO DE DOCUMENTO  */
        INSERT INTO tbltipo_documento (tip_doc_descripcion,tblestado_general_est_gen_id) VALUES ('Cedula de ciudadania',1);
        INSERT INTO tbltipo_documento (tip_doc_descripcion,tblestado_general_est_gen_id) VALUES ('Registro Civil',1);
        INSERT INTO tbltipo_documento (tip_doc_descripcion,tblestado_general_est_gen_id) VALUES ('Cedula de extranjeria',1);
        INSERT INTO tbltipo_documento (tip_doc_descripcion,tblestado_general_est_gen_id) VALUES ('Pasaporte',1);

    /* INSERTAR ROL */
        INSERT INTO tblrol (rol_descripcion,tblestado_general_est_gen_id) VALUES ('Administrador',1);
        INSERT INTO tblrol (rol_descripcion,tblestado_general_est_gen_id) VALUES ('Secretario de Infraestructura',1);
        INSERT INTO tblrol (rol_descripcion,tblestado_general_est_gen_id) VALUES ('Subsecretario',1);
        INSERT INTO tblrol (rol_descripcion,tblestado_general_est_gen_id) VALUES ('Gestor vial',1);
        INSERT INTO tblrol (rol_descripcion,tblestado_general_est_gen_id) VALUES ('Jefe de Bodega',1);
        INSERT INTO `tblrol` (`rol_id`, `rol_descripcion`, `rol_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Tercero', current_timestamp(), '1');

    /* INSERTAR PROVEDORES */
    INSERT INTO tblproveedor (pro_nit,pro_razon_social,pro_correo,pro_direccion,pro_telefono,tblestado_general_est_gen_id) VALUES (860350697,'CONCRETOS ARGOS S.A.S','acastrillonj@summa-sci.com','Calle 24 A No. 59-42 Torre 3 Piso 9',3198700,1);

    INSERT INTO tblproveedor (pro_nit,pro_razon_social,pro_correo,pro_direccion,pro_telefono,tblestado_general_est_gen_id) VALUES (860500480,'ALMACENES CORONA S.A.S.','burrea@corona.com.co','carrera 48 72 sur 01',4547700,1);

    INSERT INTO tblproveedor (pro_nit,pro_razon_social,pro_correo,pro_direccion,pro_telefono,tblestado_general_est_gen_id) VALUES (890900148,'COMPAÑÍA GLOBAL DE PINTURAS S.A.','lily.botero@pintuco.com','Calle 19a N° 43b- 41',3848484,1);

    INSERT INTO tblproveedor (pro_nit,pro_razon_social,pro_correo,pro_direccion,pro_telefono,tblestado_general_est_gen_id) VALUES (860005396,'PHILIPS COLOMBIANA S.A.S. - PHILIPS S.A.S','adriana.marulanda@philips.com','Cra 19 No 100-45 Piso 10',3212416771,1);


    -- INSERTAR USUARIOS
    INSERT INTO `tblusuario` (`usu_id`, `usu_numero_documento`, `usu_nombre1`, `usu_nombre2`, `usu_apellido1`, `usu_apellido2`, `usu_correo`, `usu_contraseña`, `usu_direccion`, `usu_telefono`, `usu_foto`, `usu_fecha_registro`, `tbltipo_documento_tip_doc_id`, `tblrol_rol_id`, `tblestado_general_est_gen_id`) VALUES (NULL, '1006051548', 'Jonathan', NULL, 'Rodriguez', 'Lopez', 'jrodriguez8451@misena.edu.co', '1006051548', '72853 Kailey Mount Apt. 974', '3005575730', 'views/assets/img/users/Jonathan_20210313_183506.jpg', current_timestamp(), '1', '1', '1');

    INSERT INTO `tblusuario` (`usu_id`, `usu_numero_documento`, `usu_nombre1`, `usu_nombre2`, `usu_apellido1`, `usu_apellido2`, `usu_correo`, `usu_contraseña`, `usu_direccion`, `usu_telefono`, `usu_foto`, `usu_fecha_registro`, `tbltipo_documento_tip_doc_id`, `tblrol_rol_id`, `tblestado_general_est_gen_id`) VALUES (NULL, '1005829334', 'Yeyson', 'Andres', 'Quiñones', 'Caicedo', 'yaquinones43@misena.edu.co', '1005829334', '661 Wunsch Port Apt. 908', '3137279511', 'views/assets/img/users/Yeyson_20210313_183523.jpg', current_timestamp(), '1', '1', '1');

    INSERT INTO `tblusuario` (`usu_id`, `usu_numero_documento`, `usu_nombre1`, `usu_nombre2`, `usu_apellido1`, `usu_apellido2`, `usu_correo`, `usu_contraseña`, `usu_direccion`, `usu_telefono`, `usu_foto`, `usu_fecha_registro`, `tbltipo_documento_tip_doc_id`, `tblrol_rol_id`, `tblestado_general_est_gen_id`) VALUES (NULL, '1193149321', 'Jose', 'Andres', 'Toro', 'Narvaez', 'jatoro1239@misena.edu.co', '1193149321', '5218 Blanda Canyon Apt. 856', '3203883550', 'views/assets/img/users/Jose_20210313_183528.jpg', current_timestamp(), '1', '1', '1');

    INSERT INTO `tblusuario` (`usu_id`, `usu_numero_documento`, `usu_nombre1`, `usu_nombre2`, `usu_apellido1`, `usu_apellido2`, `usu_correo`, `usu_contraseña`, `usu_direccion`, `usu_telefono`, `usu_foto`, `usu_fecha_registro`, `tbltipo_documento_tip_doc_id`, `tblrol_rol_id`, `tblestado_general_est_gen_id`) VALUES (NULL, '1094881080', 'Sergio', 'Alejandro', 'Hernandez', 'Patiño', 'sahernandez0801@misena.edu.co', '1094881080', '1505 Dale Freeway Suite 770', '3128560843', 'views/assets/img/users/Sergio_20210313_183418.jpg', current_timestamp(), '1', '1', '1');


    -- INSERTAR ZONAS
    INSERT INTO `tbltipo_zona` (`tip_zon_id`, `tip_zon_descripcion`, `tip_zon_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Centro', current_timestamp(), '1');

    INSERT INTO `tbltipo_zona` (`tip_zon_id`, `tip_zon_descripcion`, `tip_zon_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Noroccidente', current_timestamp(), '1');

    INSERT INTO `tbltipo_zona` (`tip_zon_id`, `tip_zon_descripcion`, `tip_zon_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Nororiente', current_timestamp(), '1');

    INSERT INTO `tbltipo_zona` (`tip_zon_id`, `tip_zon_descripcion`, `tip_zon_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Norte', current_timestamp(), '1');

    INSERT INTO `tbltipo_zona` (`tip_zon_id`, `tip_zon_descripcion`, `tip_zon_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Occidente', current_timestamp(), '1');

    INSERT INTO `tbltipo_zona` (`tip_zon_id`, `tip_zon_descripcion`, `tip_zon_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Oriente', current_timestamp(), '1');

    INSERT INTO `tbltipo_zona` (`tip_zon_id`, `tip_zon_descripcion`, `tip_zon_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Sur', current_timestamp(), '1');

    INSERT INTO `tbltipo_zona` (`tip_zon_id`, `tip_zon_descripcion`, `tip_zon_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Suroccidente', current_timestamp(), '1');

    INSERT INTO `tbltipo_zona` (`tip_zon_id`, `tip_zon_descripcion`, `tip_zon_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Suroriente', current_timestamp(), '1');

    -- BODEGAS
    INSERT INTO `tblbodega` (`bod_id`, `bod_descripcion`, `bod_direccion`, `bod_fecha_registro`, `tbltipo_zona_tip_zon_id`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Unidad de Celltowa', '247 Kirlin Village', current_timestamp(), '1', '1');

    INSERT INTO `tblbodega` (`bod_id`, `bod_descripcion`, `bod_direccion`, `bod_fecha_registro`, `tbltipo_zona_tip_zon_id`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Lote de Derriere Lingerie', '041 Moore Island', current_timestamp(), '2', '1');

    INSERT INTO `tblbodega` (`bod_id`, `bod_descripcion`, `bod_direccion`, `bod_fecha_registro`, `tbltipo_zona_tip_zon_id`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Wholesale Forniture', '086 Megane Freeway', current_timestamp(), '3', '1');

    INSERT INTO `tblbodega` (`bod_id`, `bod_descripcion`, `bod_direccion`, `bod_fecha_registro`, `tbltipo_zona_tip_zon_id`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Anexo de Fridgit', '507 Kareem Bypass', current_timestamp(), '4', '1');

    INSERT INTO `tblbodega` (`bod_id`, `bod_descripcion`, `bod_direccion`, `bod_fecha_registro`, `tbltipo_zona_tip_zon_id`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Edificio LS Marine 3', '919 Bartell Mission', current_timestamp(), '5', '1');

    -- TIPOS DE ESTADO
    INSERT INTO `tbltipo_estado` (`tip_est_id`, `tip_est_descripcion`, `tip_est_fecha_registro`) VALUES
                                (1, 'HURTO', '2021-03-04 14:53:55'),
                                (2, 'DEFECTUOSO', '2021-03-04 14:53:55'),
                                (3, 'ACTIVO', '2021-03-04 14:54:05'),
                                (4, 'INACTIVO', '2021-03-04 14:54:05');




    -- ESTADOS
    INSERT INTO `tblestado` (`est_id`, `est_nombre`, `est_fecha_registro`, `tbltipo_estado_tip_est_id`) VALUES
                            (1, 'Material', '2021-03-07 21:46:28', 2),
                            (2, 'Material', '2021-03-04 15:00:53', 3),
                            (3, 'Material', '2021-03-04 15:00:53', 1),
                            (4, 'Material', '2021-03-04 15:00:53', 4),
                            (5, 'Maquinaria', '2021-03-04 15:01:56', 3),
                            (6, 'Maquinaria', '2021-03-04 15:01:56', 2),
                            (7, 'Maquinaria', '2021-03-04 15:01:56', 1),
                            (8, 'Maquinaria', '2021-03-04 15:01:56', 4),
                            (9, 'Herramienta', '2021-03-04 15:03:23', 3),
                            (10, 'Herramienta', '2021-03-04 15:03:23', 2),
                            (11, 'Herramienta', '2021-03-04 15:03:23', 1),
                            (12, 'Herramienta', '2021-03-04 15:03:23', 4);


    -- TIPOS DE HERRAMIENTAS
    INSERT INTO `tbltipo_herramienta` (`tip_her_id`, `tip_her_descripcion`, `tip_her_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Corte', current_timestamp(), '1');

    INSERT INTO `tbltipo_herramienta` (`tip_her_id`, `tip_her_descripcion`, `tip_her_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Electrica', current_timestamp(), '1');

    INSERT INTO `tbltipo_herramienta` (`tip_her_id`, `tip_her_descripcion`, `tip_her_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Manual', current_timestamp(), '1');

    INSERT INTO `tbltipo_herramienta` (`tip_her_id`, `tip_her_descripcion`, `tip_her_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Automatica', current_timestamp(), '1');

    INSERT INTO `tbltipo_herramienta` (`tip_her_id`, `tip_her_descripcion`, `tip_her_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Montaje', current_timestamp(), '1');

    -- HERRAMIENTAS
    INSERT INTO `tblherramienta` (`her_id`, `her_descripcion`, `her_costo`, `her_stock_min`, `her_stock_max`, `her_existencia`, `her_fecha_registro`, `tbltipo_herramienta_tip_her_id`, `tblestado_est_id`) VALUES (NULL, 'Martillo', '36.900', '100', '200', '150', current_timestamp(), '3', '9'), (NULL, 'Mazo', '70.000', '200', '400', '100', current_timestamp(), '3', '9');

    -- TERCEROS
    INSERT INTO `tbltercero` (`ter_id`, `ter_numero_documento`, `ter_nombre1`, `ter_nombre2`, `ter_apellido1`, `ter_apellido2`, `ter_correo`, `ter_direccion`, `ter_telefono`, `ter_fecha_registro`, `tbltipo_documento_tip_doc_id`, `tblrol_rol_id`, `tblestado_general_est_gen_id`) VALUES (NULL, '1006051548', 'Jose', 'Alejandro', 'Salgado', 'Acero', 'jasalgado042@misena.edu.co ', '41986 Tatyana Loop', '3043379918', current_timestamp(), '1', '6', '1');

    INSERT INTO `tbltercero` (`ter_id`, `ter_numero_documento`, `ter_nombre1`, `ter_nombre2`, `ter_apellido1`, `ter_apellido2`, `ter_correo`, `ter_direccion`, `ter_telefono`, `ter_fecha_registro`, `tbltipo_documento_tip_doc_id`, `tblrol_rol_id`, `tblestado_general_est_gen_id`) VALUES (NULL, '1006010437', 'Andres', 'Felipe', 'Chicaiza', 'Ortiz', 'afchicaiza734@misena.edu.co', '8849 Chandler Harbors', '3182647202', current_timestamp(), '1', '6', '1');

    INSERT INTO `tbltercero` (`ter_id`, `ter_numero_documento`, `ter_nombre1`, `ter_nombre2`, `ter_apellido1`, `ter_apellido2`, `ter_correo`, `ter_direccion`, `ter_telefono`, `ter_fecha_registro`, `tbltipo_documento_tip_doc_id`, `tblrol_rol_id`, `tblestado_general_est_gen_id`) VALUES (NULL, '1004691567', 'Evander', 'Camilo', 'Cuastumal', 'Pastas', 'eccuastumal@misena.edu.co', '1000 Salvador Forest', '3005464649', current_timestamp(), '1', '6', '1');

    INSERT INTO `tbltercero` (`ter_id`, `ter_numero_documento`, `ter_nombre1`, `ter_nombre2`, `ter_apellido1`, `ter_apellido2`, `ter_correo`, `ter_direccion`, `ter_telefono`, `ter_fecha_registro`, `tbltipo_documento_tip_doc_id`, `tblrol_rol_id`, `tblestado_general_est_gen_id`) VALUES (NULL, '1110599066', 'Katherine', '', 'Ocampo', 'Varon', 'kocampo01@misena.edu.co', '750 Bryon Brook', '3124974341', current_timestamp(), '1', '6', '1');

    INSERT INTO `tbltercero` (`ter_id`, `ter_numero_documento`, `ter_nombre1`, `ter_nombre2`, `ter_apellido1`, `ter_apellido2`, `ter_correo`, `ter_direccion`, `ter_telefono`, `ter_fecha_registro`, `tbltipo_documento_tip_doc_id`, `tblrol_rol_id`, `tblestado_general_est_gen_id`) VALUES (NULL, '1005874500', 'Luis', 'Andres', 'Posso', 'Caicedo', 'laposso0@misena.edu.co', '47287 Reina Hills', '3168150662', current_timestamp(), '1', '6', '1');


    -- TIPOS MAQUINARIA
    INSERT INTO `tbltipo_maquinaria` (`tip_maq_id`, `tip_maq_descripcion`, `tip_maq_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Pesada', current_timestamp(), '1');

    INSERT INTO `tbltipo_maquinaria` (`tip_maq_id`, `tip_maq_descripcion`, `tip_maq_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Semipesada', current_timestamp(), '1');

    INSERT INTO `tbltipo_maquinaria` (`tip_maq_id`, `tip_maq_descripcion`, `tip_maq_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Ligera', current_timestamp(), '1');

    -- MAQUINARIA
    INSERT INTO `tblmaquinaria` (`maq_id`, `maq_descripcion`, `maq_costo`, `maq_stock_min`, `maq_stock_max`, `maq_existencia`, `maq_fecha_registro`, `tbltipo_maquinaria_tip_maq_id`, `tblestado_est_id`) VALUES (NULL, 'Excavadora', '100.000', '10', '20', '12', current_timestamp(), '1', '5');
    INSERT INTO `tblmaquinaria` (`maq_id`, `maq_descripcion`, `maq_costo`, `maq_stock_min`, `maq_stock_max`, `maq_existencia`, `maq_fecha_registro`, `tbltipo_maquinaria_tip_maq_id`, `tblestado_est_id`) VALUES (NULL, 'Polea', '95.000', '10', '20', '15', current_timestamp(), '2', '5');


    -- TIPO DE MATERIAL
    INSERT INTO `tbltipo_material` (`tip_mat_id`, `tip_mat_descripcion`, `tip_mat_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Metalico', current_timestamp(), '1');

    INSERT INTO `tbltipo_material` (`tip_mat_id`, `tip_mat_descripcion`, `tip_mat_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Madera', current_timestamp(), '1');

    INSERT INTO `tbltipo_material` (`tip_mat_id`, `tip_mat_descripcion`, `tip_mat_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Ceramico', current_timestamp(), '1');

    INSERT INTO `tbltipo_material` (`tip_mat_id`, `tip_mat_descripcion`, `tip_mat_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Textil', current_timestamp(), '1');

    INSERT INTO `tbltipo_material` (`tip_mat_id`, `tip_mat_descripcion`, `tip_mat_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Arena', current_timestamp(), '1');

    -- MATERIAL
    INSERT INTO `tblmaterial` (`mat_id`, `mat_descripcion`, `mat_costo`, `mat_stock_min`, `mat_stock_max`, `mat_existencia`, `mat_fecha_vencimiento`, `mat_fecha_registro`, `tbltipo_material_tip_mat_id`, `tblestado_est_id`) VALUES (NULL, 'Cemento', '55.000', '300', '500', '400', '2021-04-29', current_timestamp(), '5', '3');

    INSERT INTO `tblmaterial` (`mat_id`, `mat_descripcion`, `mat_costo`, `mat_stock_min`, `mat_stock_max`, `mat_existencia`, `mat_fecha_vencimiento`, `mat_fecha_registro`, `tbltipo_material_tip_mat_id`, `tblestado_est_id`) VALUES (NULL, 'Estuco', '68.000', '300', '500', '400', '2021-07-28', current_timestamp(), '3', '3');

    -- TIPO DE DAÑO
    INSERT INTO `tbltipo_daño` (`tip_dañ_id`, `tip_dañ_descripcion`, `tip_dañ_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Fisuras', current_timestamp(), '1');

    INSERT INTO `tbltipo_daño` (`tip_dañ_id`, `tip_dañ_descripcion`, `tip_dañ_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Deformaciones', current_timestamp(), '1');

    INSERT INTO `tbltipo_daño` (`tip_dañ_id`, `tip_dañ_descripcion`, `tip_dañ_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Perdida de capas estructurales', current_timestamp(), '1');

    INSERT INTO `tbltipo_daño` (`tip_dañ_id`, `tip_dañ_descripcion`, `tip_dañ_fecha_registro`, `tblestado_general_est_gen_id`) VALUES (NULL, 'Daños superficiales', current_timestamp(), '1');

    
    /* Tyggers */

    /* tiggers de actualizar */
    CREATE TRIGGER actualizar_maquinaria_AU AFTER UPDATE ON tblmaquinaria FOR EACH ROW UPDATE tblinventario SET inv_descripcion = NEW.maq_descripcion, inv_costo = NEW.maq_costo , inv_stock_min = NEW.maq_stock_min, inv_stock_max = NEW.maq_stock_max, inv_existencia = NEW.maq_existencia  WHERE tblmaquinaria_maq_id = NEW.maq_id;

    CREATE TRIGGER actualizar_material_AU AFTER UPDATE ON tblmaterial FOR EACH ROW UPDATE tblinventario SET inv_descripcion = NEW.mat_descripcion, inv_costo = NEW.mat_costo , inv_stock_min = NEW.mat_stock_min, inv_stock_max = NEW.mat_stock_max, inv_existencia = NEW.mat_existencia  WHERE tblmaterial_mat_id = NEW.mat_id;

    CREATE TRIGGER actualizar_herramienta_AU AFTER UPDATE ON tblherramienta FOR EACH ROW UPDATE tblinventario SET inv_descripcion = NEW.her_descripcion, inv_costo = NEW.her_costo , inv_stock_min = NEW.her_stock_min, inv_stock_max = NEW.her_stock_max, inv_existencia = NEW.her_existencia  WHERE tblherramienta_her_id = NEW.her_id;