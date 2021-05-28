-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-04-2021 a las 01:41:20
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mallavial`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `COSTO_TOTAL_ENTRANTE` (`IDENTIFICADOR` INT(100) UNSIGNED) RETURNS INT(100) UNSIGNED BEGIN

            DECLARE  stock_actual     INT;
            DECLARE  stock_anterior   INT;
            DECLARE  stock_calcular   INT;
            DECLARE  costo_unidad	  INT;
            DECLARE  costo_total	  INT;        


            SET stock_actual = (  
                                    SELECT 
                                    inv_existencia
                                    FROM tblinventario
                                    WHERE inv_id = IDENTIFICADOR
                                 );


            SET  stock_anterior = (  
                                    SELECT 
                                    cantidad_anterior
                                    FROM tblinventario
                                    WHERE inv_id = IDENTIFICADOR
                                  );
                                  
                                
            SET stock_calcular = stock_actual - stock_anterior;
            
                                 
            SET costo_unidad = 	 (  
                                    SELECT 
                                    inv_costo
                                    FROM tblinventario
                                    WHERE inv_id = IDENTIFICADOR
                                 );

           CASE stock_anterior
             WHEN stock_actual THEN
               RETURN stock_actual*costo_unidad;
             ELSE
               SET costo_total =  costo_unidad * stock_calcular;
               RETURN costo_total;
           END CASE;
            
            

			

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `COSTO_TOTAL_INVENTARIO` (`IDENTIFICADOR` INT(100) UNSIGNED) RETURNS INT(100) UNSIGNED BEGIN

            DECLARE  stock_entrante   INT;
            DECLARE  costo_unidad	  INT;
            DECLARE  costo_total	  INT;        


            SET stock_entrante = (  
                                    SELECT 
                                    inv_existencia
                                    FROM tblinventario
                                    WHERE inv_id = IDENTIFICADOR
                                 );


            SET costo_unidad = 	 (  
                                    SELECT 
                                    inv_costo
                                    FROM tblinventario
                                    WHERE inv_id = IDENTIFICADOR
                                 );


            SET costo_total =  stock_entrante * costo_unidad;

            RETURN costo_total;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `STOCK_ENTRANTE` (`IDENTIFICADOR` INT(100) UNSIGNED) RETURNS INT(255) UNSIGNED BEGIN

            DECLARE  stock_anterior   INT;
            DECLARE  stock_actual     INT;
            DECLARE  stock_entrante   INT;        


            SET stock_anterior = (  
                                    SELECT 
                                    cantidad_anterior
                                    FROM tblinventario
                                    WHERE inv_id = IDENTIFICADOR
                                 );


            SET stock_actual =   (  
                                    SELECT 
                                    inv_existencia
                                    FROM tblinventario
                                    WHERE inv_id = IDENTIFICADOR
                                 );


          
          CASE stock_anterior
            WHEN stock_actual THEN
              RETURN stock_actual;
            ELSE
            SET stock_entrante = stock_actual - stock_anterior;
               RETURN stock_entrante;
      END CASE;
      
      END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblbodega`
--

CREATE TABLE `tblbodega` (
  `bod_id` int(30) UNSIGNED NOT NULL,
  `bod_descripcion` varchar(100) NOT NULL,
  `bod_direccion` varchar(50) NOT NULL,
  `bod_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tbltipo_zona_tip_zon_id` int(30) UNSIGNED NOT NULL,
  `tblestado_general_est_gen_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblbodega`
--

INSERT INTO `tblbodega` (`bod_id`, `bod_descripcion`, `bod_direccion`, `bod_fecha_registro`, `tbltipo_zona_tip_zon_id`, `tblestado_general_est_gen_id`) VALUES
(1, 'La Flora', 'CL 49N AV 5C y 6', '2021-03-28 00:31:28', 1, 1),
(2, 'Chapinero', 'CRA 19 CL 50 Y 49', '2021-03-28 00:32:30', 2, 1),
(3, 'El Trebol', 'C 57 / K 24', '2021-03-28 00:33:04', 3, 1),
(4, 'Calypso', 'C 72 y C 72A con K 28E', '2021-03-28 00:34:28', 4, 1),
(5, 'El Poblado I', 'K 28E2 / C 72 Y', '2021-03-28 00:34:57', 5, 1),
(6, 'El Ingenio', 'Cl 17 CRA 85A', '2021-03-28 00:38:01', 6, 1),
(7, 'ValleGrande', 'CRA 23 CLS 77B Y 78C', '2021-03-28 00:38:51', 7, 1),
(8, 'Las Acacias', 'CRA 23 CL 25', '2021-03-28 00:39:35', 8, 1),
(9, 'San Cristobal', 'CL 23 / CRAS 26 Y 28', '2021-03-28 00:40:20', 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcaso`
--

CREATE TABLE `tblcaso` (
  `cas_id` int(30) UNSIGNED NOT NULL,
  `cas_numero_caso` varchar(255) NOT NULL,
  `cas_direccion_caso` varchar(255) NOT NULL,
  `cas_profundidad` int(30) UNSIGNED NOT NULL,
  `cas_largo` int(30) UNSIGNED NOT NULL,
  `cas_ancho` int(30) UNSIGNED NOT NULL,
  `cas_foto_daño` varchar(100) NOT NULL,
  `cas_descripcion` varchar(255) NOT NULL,
  `cas_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `tbltipo_prioridad_tip_pri_id` int(30) UNSIGNED NOT NULL,
  `tbltipo_daño_tip_dañ_id` int(30) UNSIGNED NOT NULL,
  `tblorden_ord_id` int(30) UNSIGNED DEFAULT NULL,
  `tblusuario_usu_id` int(30) UNSIGNED NOT NULL,
  `tblestado_est_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblcaso`
--

INSERT INTO `tblcaso` (`cas_id`, `cas_numero_caso`, `cas_direccion_caso`, `cas_profundidad`, `cas_largo`, `cas_ancho`, `cas_foto_daño`, `cas_descripcion`, `cas_fecha_registro`, `tbltipo_prioridad_tip_pri_id`, `tbltipo_daño_tip_dañ_id`, `tblorden_ord_id`, `tblusuario_usu_id`, `tblestado_est_id`) VALUES
(1, 'CS-001', 'Calle 72C Carrera 28F', 300, 400, 250, 'views/assets/img/casos/CS-001_20210327_212015.png', 'El daño esta colapsado', '2021-04-01 02:20:15', 1, 3, 5, 7, 13),
(2, 'CS-002', 'Calle 44 con carrera 24C', 100, 300, 200, 'views/assets/img/casos/CS-002_20210327_212453.jpg', 'Se esta generando una deformacion en las grietas', '2021-04-01 02:24:53', 2, 2, NULL, 7, 16),
(3, 'CS-003', 'Calle 38 carrera 41H ', 67, 200, 400, 'views/assets/img/casos/CS-003_20210327_212650.jpg', 'Se estan fracturando las capas', '2021-04-01 02:26:50', 3, 1, 6, 7, 13),
(4, 'CS-004', 'Calle 13B entre carreras 64', 50, 300, 450, 'views/assets/img/casos/CS-004_20210327_212911.jpg', 'El daño es algo profundo, la comunidad rellenó con rocas', '2021-04-02 02:29:12', 2, 3, 7, 7, 13),
(5, 'CS-005', ' Carrera 23 con calle 120', 350, 300, 500, 'views/assets/img/casos/CS-005_20210327_213132.jpg', 'El daño almacena agua estancada y esta generando rupturas internas', '2021-04-02 02:31:32', 2, 4, NULL, 7, 14),
(6, 'CS-006', 'Calle 24B No.123 - 133', 43, 367, 543, 'views/assets/img/casos/CS-006_20210327_213427.jpg', 'La ruptura del daño ha generado una expansion de restos de asfalto', '2021-04-02 02:34:27', 3, 2, NULL, 7, 14),
(7, 'CS-007', 'Carrera 9 N° 2-91', 345, 545, 623, 'views/assets/img/casos/CS-007_20210327_213634.jpg', 'La comunidad ha rellenado el daño con rocas', '2021-04-03 02:36:34', 3, 3, 4, 7, 15),
(8, 'CS-008', 'Carrera 1D con calle 65', 200, 300, 243, 'views/assets/img/casos/CS-008_20210327_214048.jpg', 'Las capas se han fracturado y han generado escombros', '2021-04-03 02:40:48', 1, 2, 3, 7, 15),
(9, 'CS-009', 'Carrera 8N N° 70A-16', 57, 367, 534, 'views/assets/img/casos/CS-009_20210327_214243.jpg', 'El daño parece un crater, tiene un tamaño abismal', '2021-04-03 02:42:43', 2, 3, 2, 7, 13),
(10, 'CS-010', 'Transversal 86', 356, 234, 453, 'views/assets/img/casos/CS-010_20210405_181304.jpeg', 'El caso tiene residuos peligrosos', '2021-04-05 23:13:04', 1, 3, NULL, 1, 14),
(11, 'CS-011', 'Carrera 82c', 100, 256, 343, 'views/assets/img/casos/CS-011_20210405_181419.jpg', 'El caso posee agua estancada en su contenido', '2021-04-05 23:14:19', 2, 2, NULL, 1, 14),
(12, 'CS-012', 'Carrera 33A con Calle 31', 75, 234, 350, 'views/assets/img/casos/CS-012_20210405_181607.png', 'La comunidad uso grava para rellenar el daño', '2021-04-05 23:16:07', 3, 2, NULL, 1, 14),
(13, 'CS-013', 'Carrera 41B con calle 50', 200, 354, 456, 'views/assets/img/casos/CS-013_20210405_182717.JPG', 'Las capas estructurales estan desgastadas', '2021-04-05 23:27:17', 2, 3, NULL, 1, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblestado`
--

CREATE TABLE `tblestado` (
  `est_id` int(30) UNSIGNED NOT NULL,
  `est_nombre` varchar(50) NOT NULL,
  `est_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tbltipo_estado_tip_est_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblestado`
--

INSERT INTO `tblestado` (`est_id`, `est_nombre`, `est_fecha_registro`, `tbltipo_estado_tip_est_id`) VALUES
(1, 'Material', '2021-03-08 02:46:28', 2),
(2, 'Material', '2021-03-04 20:00:53', 3),
(3, 'Material', '2021-03-04 20:00:53', 1),
(4, 'Material', '2021-03-04 20:00:53', 4),
(5, 'Maquinaria', '2021-03-04 20:01:56', 3),
(6, 'Maquinaria', '2021-03-04 20:01:56', 2),
(7, 'Maquinaria', '2021-03-04 20:01:56', 1),
(8, 'Maquinaria', '2021-03-04 20:01:56', 4),
(9, 'Herramienta', '2021-03-04 20:03:23', 3),
(10, 'Herramienta', '2021-03-04 20:03:23', 2),
(11, 'Herramienta', '2021-03-04 20:03:23', 1),
(12, 'Herramienta', '2021-03-04 20:03:23', 4),
(13, 'Caso-Realizado', '2021-03-20 21:46:19', 5),
(14, 'Caso-Pendiente', '2021-03-20 21:46:26', 6),
(15, 'Caso-En Proceso', '2021-03-20 21:46:41', 7),
(16, 'Caso-Inactivo', '2021-03-20 21:46:49', 4),
(17, 'Orden', '2021-03-20 21:48:17', 8),
(18, 'Orden', '2021-03-20 21:48:22', 5),
(19, 'Orden', '2021-03-20 21:48:24', 6),
(20, 'Orden', '2021-03-20 21:48:26', 7),
(21, 'Orden', '2021-03-20 21:48:27', 4),
(22, 'Orden', '2021-03-25 17:03:39', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblestado_general`
--

CREATE TABLE `tblestado_general` (
  `est_gen_id` int(30) UNSIGNED NOT NULL,
  `est_gen_nombre` varchar(50) NOT NULL,
  `est_gen_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblestado_general`
--

INSERT INTO `tblestado_general` (`est_gen_id`, `est_gen_nombre`, `est_gen_fecha_registro`) VALUES
(1, 'ACTIVO', '2021-03-13 16:26:24'),
(2, 'INACTIVO', '2021-03-13 16:26:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblherramienta`
--

CREATE TABLE `tblherramienta` (
  `her_id` int(30) UNSIGNED NOT NULL,
  `her_descripcion` varchar(100) NOT NULL,
  `her_numero_factura` varchar(255) NOT NULL,
  `her_concepto` varchar(100) NOT NULL,
  `her_costo` int(225) NOT NULL,
  `her_stock_min` int(30) UNSIGNED NOT NULL,
  `her_stock_max` int(30) UNSIGNED NOT NULL,
  `her_existencia` int(30) UNSIGNED NOT NULL,
  `her_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `tbltipo_herramienta_tip_her_id` int(30) UNSIGNED NOT NULL,
  `tblestado_est_id` int(30) UNSIGNED NOT NULL,
  `tblbodega_bod_id` int(30) UNSIGNED NOT NULL,
  `tblproveedor_pro_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblherramienta`
--

INSERT INTO `tblherramienta` (`her_id`, `her_descripcion`, `her_numero_factura`, `her_concepto`, `her_costo`, `her_stock_min`, `her_stock_max`, `her_existencia`, `her_fecha_registro`, `tbltipo_herramienta_tip_her_id`, `tblestado_est_id`, `tblbodega_bod_id`, `tblproveedor_pro_id`) VALUES
(1, 'Pico', 'No aplica', 'Devolucion de insumo', 67631, 200, 500, 200, '2021-03-28 06:03:36', 3, 9, 1, 1),
(2, 'Pala', 'No aplica', 'Devolucion de insumo', 65000, 200, 500, 196, '2021-03-28 06:06:15', 3, 9, 2, 2),
(3, 'Martillo', 'FC-HR-003', 'Entran 250 martillos', 10500, 200, 500, 250, '2021-03-28 06:10:56', 3, 9, 5, 5);

--
-- Disparadores `tblherramienta`
--
DELIMITER $$
CREATE TRIGGER `actualizar_herramienta_AU` AFTER UPDATE ON `tblherramienta` FOR EACH ROW UPDATE tblinventario SET 
inv_descripcion = NEW.her_descripcion, 
inv_costo = NEW.her_costo , 
inv_stock_min = NEW.her_stock_min, 
inv_stock_max = NEW.her_stock_max, 
inv_existencia = NEW.her_existencia, 
tblbodega_bod_id = NEW.tblbodega_bod_id, tblestado_est_id = NEW.tblestado_est_id,
cantidad_anterior = OLD.her_existencia,
tblproveedor_pro_id = NEW.tblproveedor_pro_id,
inv_numero_factura = NEW.her_numero_factura,
inv_concepto = NEW.her_concepto
WHERE tblherramienta_her_id = NEW.her_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertar_herramienta_AI` AFTER INSERT ON `tblherramienta` FOR EACH ROW INSERT INTO tblinventario
(inv_descripcion, inv_costo, inv_stock_min, inv_stock_max, inv_existencia, inv_fecha_registro,tblherramienta_her_id,tblbodega_bod_id,tblestado_est_id,tblproveedor_pro_id,inv_numero_factura,inv_concepto,cantidad_anterior)
VALUES
(NEW.her_descripcion,NEW.her_costo,NEW.her_stock_min,NEW.her_stock_max,NEW.her_existencia,NOW(),NEW.her_id,NEW.tblbodega_bod_id,NEW.tblestado_est_id,NEW.tblproveedor_pro_id,NEW.her_numero_factura,NEW.her_concepto,NEW.her_existencia)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblinventario`
--

CREATE TABLE `tblinventario` (
  `inv_id` int(30) UNSIGNED NOT NULL,
  `inv_descripcion` varchar(100) NOT NULL,
  `inv_costo` int(255) NOT NULL,
  `inv_stock_min` int(30) UNSIGNED NOT NULL,
  `inv_stock_max` int(30) UNSIGNED NOT NULL,
  `inv_existencia` int(30) UNSIGNED NOT NULL,
  `inv_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `cantidad_anterior` int(255) UNSIGNED DEFAULT NULL,
  `tblherramienta_her_id` int(30) UNSIGNED DEFAULT NULL,
  `tblmaterial_mat_id` int(30) UNSIGNED DEFAULT NULL,
  `tblmaquinaria_maq_id` int(30) UNSIGNED DEFAULT NULL,
  `tblestado_est_id` int(30) UNSIGNED NOT NULL,
  `tblbodega_bod_id` int(30) UNSIGNED NOT NULL,
  `tblproveedor_pro_id` int(30) UNSIGNED DEFAULT NULL,
  `inv_numero_factura` varchar(255) DEFAULT NULL,
  `inv_concepto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblinventario`
--

INSERT INTO `tblinventario` (`inv_id`, `inv_descripcion`, `inv_costo`, `inv_stock_min`, `inv_stock_max`, `inv_existencia`, `inv_fecha_registro`, `cantidad_anterior`, `tblherramienta_her_id`, `tblmaterial_mat_id`, `tblmaquinaria_maq_id`, `tblestado_est_id`, `tblbodega_bod_id`, `tblproveedor_pro_id`, `inv_numero_factura`, `inv_concepto`) VALUES
(1, 'Cemento', 27990, 200, 500, 195, '2021-03-31 00:31:54', 196, NULL, 1, NULL, 2, 1, 1, 'FC-MT-001', 'Entran 250 bultos de cemento'),
(2, 'Emulsion Asfaltica', 32900, 200, 500, 196, '2021-03-31 00:31:54', 246, NULL, 2, NULL, 2, 2, 8, 'FC-MT-002', 'Entran 250 emulsiones asfalticas'),
(3, 'Hormigon Asfaltico', 22000, 200, 500, 196, '2021-03-31 00:31:54', 197, NULL, 3, NULL, 2, 5, 8, 'FC-MT-003', 'Entran 250 hormigones asfalticos'),
(4, 'Pintura Acrilica Base Solvente', 99265, 200, 500, 245, '2021-03-31 00:31:54', 250, NULL, 4, NULL, 2, 4, 6, 'FC-MT-004', 'Entran 250 pinturas acrilicas'),
(5, 'Pavimentadora de Asfalto', 18000000, 200, 500, 197, '2021-03-31 00:46:05', 196, NULL, NULL, 1, 5, 2, 2, 'No aplica', 'Devolucion de insumo'),
(6, 'Vibrocompactador', 55000000, 200, 500, 196, '2021-03-31 00:46:05', 195, NULL, NULL, 2, 5, 4, 3, 'No aplica', 'Devolucion de insumo'),
(7, 'Retroexcavadora', 220000000, 200, 500, 250, '2021-03-31 00:46:05', 250, NULL, NULL, 3, 5, 5, 4, 'FC-MQ-003', 'Entran 250 retroexcavadoras'),
(8, 'Pico', 67631, 200, 500, 200, '2021-03-31 00:47:27', 199, 1, NULL, NULL, 9, 1, 1, 'No aplica', 'Devolucion de insumo'),
(9, 'Pala', 65000, 200, 500, 196, '2021-03-31 00:47:27', 195, 2, NULL, NULL, 9, 2, 2, 'No aplica', 'Devolucion de insumo'),
(10, 'Martillo', 10500, 200, 500, 250, '2021-03-31 00:47:27', 250, 3, NULL, NULL, 9, 5, 5, 'FC-HR-003', 'Entran 250 martillos'),
(11, 'Aditivo', 18900, 200, 500, 195, '2021-04-01 22:38:10', 196, NULL, 5, NULL, 2, 8, 10, 'FC-MT-005', 'Ingreso de 250 aditivos');

--
-- Disparadores `tblinventario`
--
DELIMITER $$
CREATE TRIGGER `HISTORIAL_MOVIMIENTO_INVENTARIO_AI` AFTER UPDATE ON `tblinventario` FOR EACH ROW INSERT INTO tblmovimiento_inventario 
(mov_inv_descripcion,mov_inv_cantidad,mov_inv_valor_total,mov_inv_fecha_registro,mov_inv_stock_actual,mov_inv_costo_actual,tblinventario_inv_id,mov_inv_tipo_movimiento,mov_inv_numero_factura,mov_inv_concepto,tblproveedor_pro_id)
VALUES
(NEW.inv_descripcion,STOCK_ENTRANTE(NEW.inv_id),COSTO_TOTAL_ENTRANTE(NEW.inv_id),NOW(),NEW.inv_existencia,COSTO_TOTAL_INVENTARIO(NEW.inv_id),NEW.inv_id,'ENTRADA',NEW.inv_numero_factura,NEW.inv_concepto,NEW.tblproveedor_pro_id)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `INSERTAR_INVENTARIO_MOVIMIENTO_AI` AFTER INSERT ON `tblinventario` FOR EACH ROW INSERT INTO tblmovimiento_inventario
(tblinventario_inv_id,mov_inv_descripcion,mov_inv_cantidad,mov_inv_valor_total,mov_inv_fecha_registro,mov_inv_stock_actual,mov_inv_costo_actual,mov_inv_tipo_movimiento,mov_inv_numero_factura,mov_inv_concepto,tblproveedor_pro_id)
VALUES
(NEW.inv_id,NEW.inv_descripcion,STOCK_ENTRANTE(NEW.inv_id),COSTO_TOTAL_ENTRANTE(NEW.inv_id),NOW(),NEW.inv_existencia,COSTO_TOTAL_INVENTARIO(NEW.inv_id),'ENTRADA',NEW.inv_numero_factura,NEW.inv_concepto,NEW.tblproveedor_pro_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmaquinaria`
--

CREATE TABLE `tblmaquinaria` (
  `maq_id` int(30) UNSIGNED NOT NULL,
  `maq_descripcion` varchar(100) NOT NULL,
  `maq_numero_factura` varchar(255) NOT NULL,
  `maq_concepto` varchar(100) NOT NULL,
  `maq_costo` int(255) NOT NULL,
  `maq_stock_min` int(30) UNSIGNED NOT NULL,
  `maq_stock_max` int(30) UNSIGNED NOT NULL,
  `maq_existencia` int(30) UNSIGNED NOT NULL,
  `maq_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `tbltipo_maquinaria_tip_maq_id` int(30) UNSIGNED NOT NULL,
  `tblestado_est_id` int(30) UNSIGNED NOT NULL,
  `tblbodega_bod_id` int(30) UNSIGNED NOT NULL,
  `tblproveedor_pro_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblmaquinaria`
--

INSERT INTO `tblmaquinaria` (`maq_id`, `maq_descripcion`, `maq_numero_factura`, `maq_concepto`, `maq_costo`, `maq_stock_min`, `maq_stock_max`, `maq_existencia`, `maq_fecha_registro`, `tbltipo_maquinaria_tip_maq_id`, `tblestado_est_id`, `tblbodega_bod_id`, `tblproveedor_pro_id`) VALUES
(1, 'Pavimentadora de Asfalto', 'No aplica', 'Devolucion de insumo', 18000000, 200, 500, 197, '2021-03-28 06:22:40', 1, 5, 2, 2),
(2, 'Vibrocompactador', 'No aplica', 'Devolucion de insumo', 55000000, 200, 500, 196, '2021-03-28 06:29:40', 1, 5, 4, 3),
(3, 'Retroexcavadora', 'FC-MQ-003', 'Entran 250 retroexcavadoras', 220000000, 200, 500, 250, '2021-03-28 06:31:19', 1, 5, 5, 4);

--
-- Disparadores `tblmaquinaria`
--
DELIMITER $$
CREATE TRIGGER `actualizar_maquinaria_AU` AFTER UPDATE ON `tblmaquinaria` FOR EACH ROW UPDATE tblinventario SET 
inv_descripcion = NEW.maq_descripcion,
inv_costo = NEW.maq_costo ,
inv_stock_min = NEW.maq_stock_min, 
inv_stock_max = NEW.maq_stock_max, 
inv_existencia = NEW.maq_existencia,
tblbodega_bod_id = NEW.tblbodega_bod_id, tblestado_est_id = NEW.tblestado_est_id,
cantidad_anterior = OLD.maq_existencia,
tblproveedor_pro_id = NEW.tblproveedor_pro_id,
inv_numero_factura = NEW.maq_numero_factura,
inv_concepto = NEW.maq_concepto  
WHERE tblmaquinaria_maq_id = NEW.maq_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertar_maquinaria_AI` AFTER INSERT ON `tblmaquinaria` FOR EACH ROW INSERT INTO tblinventario
(inv_descripcion, inv_costo, inv_stock_min, inv_stock_max, inv_existencia, inv_fecha_registro,tblmaquinaria_maq_id,tblbodega_bod_id,tblestado_est_id,tblproveedor_pro_id,inv_numero_factura,inv_concepto, cantidad_anterior)
VALUES
(NEW.maq_descripcion,NEW.maq_costo,NEW.maq_stock_min,NEW.maq_stock_max,NEW.maq_existencia,NOW(),NEW.maq_id,NEW.tblbodega_bod_id,NEW.tblestado_est_id,NEW.tblproveedor_pro_id,NEW.maq_numero_factura,NEW.maq_concepto,NEW. maq_existencia)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmaterial`
--

CREATE TABLE `tblmaterial` (
  `mat_id` int(30) UNSIGNED NOT NULL,
  `mat_descripcion` varchar(100) NOT NULL,
  `mat_numero_factura` varchar(255) NOT NULL,
  `mat_concepto` varchar(100) NOT NULL,
  `mat_costo` int(255) NOT NULL,
  `mat_stock_min` int(30) UNSIGNED NOT NULL,
  `mat_stock_max` int(30) UNSIGNED NOT NULL,
  `mat_existencia` int(30) UNSIGNED NOT NULL,
  `mat_fecha_vencimiento` date NOT NULL,
  `mat_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `tbltipo_material_tip_mat_id` int(30) UNSIGNED NOT NULL,
  `tblestado_est_id` int(30) UNSIGNED NOT NULL,
  `tblbodega_bod_id` int(30) UNSIGNED NOT NULL,
  `tblproveedor_pro_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblmaterial`
--

INSERT INTO `tblmaterial` (`mat_id`, `mat_descripcion`, `mat_numero_factura`, `mat_concepto`, `mat_costo`, `mat_stock_min`, `mat_stock_max`, `mat_existencia`, `mat_fecha_vencimiento`, `mat_fecha_registro`, `tbltipo_material_tip_mat_id`, `tblestado_est_id`, `tblbodega_bod_id`, `tblproveedor_pro_id`) VALUES
(1, 'Cemento', 'FC-MT-001', 'Entran 250 bultos de cemento', 27990, 200, 500, 195, '0000-00-00', '2021-03-28 06:40:20', 8, 2, 1, 1),
(2, 'Emulsion Asfaltica', 'FC-MT-002', 'Entran 250 emulsiones asfalticas', 32900, 200, 500, 196, '2021-04-01', '2021-03-28 06:47:48', 11, 2, 2, 8),
(3, 'Hormigon Asfaltico', 'FC-MT-003', 'Entran 250 hormigones asfalticos', 22000, 200, 500, 196, '0000-00-00', '2021-03-28 06:59:03', 12, 2, 5, 8),
(4, 'Pintura Acrilica Base Solvente', 'FC-MT-004', 'Entran 250 pinturas acrilicas', 99265, 200, 500, 245, '2021-04-01', '2021-03-28 06:55:24', 11, 2, 4, 6),
(5, 'Aditivo', 'FC-MT-005', 'Ingreso de 250 aditivos', 18900, 200, 500, 195, '2021-04-30', '2021-04-01 22:38:10', 11, 2, 8, 10);

--
-- Disparadores `tblmaterial`
--
DELIMITER $$
CREATE TRIGGER `actualizar_inventario_AU` AFTER UPDATE ON `tblmaterial` FOR EACH ROW UPDATE tblinventario SET 
inv_descripcion = NEW.mat_descripcion, 
inv_costo = NEW.mat_costo , 
inv_stock_min = NEW.mat_stock_min, 
inv_stock_max = NEW.mat_stock_max, 
inv_existencia = NEW.mat_existencia,
tblbodega_bod_id = NEW.tblbodega_bod_id,
tblestado_est_id = NEW.tblestado_est_id,
cantidad_anterior = OLD.mat_existencia,
tblproveedor_pro_id = NEW.tblproveedor_pro_id,
inv_numero_factura = NEW.mat_numero_factura,
inv_concepto = NEW.mat_concepto
WHERE 
tblmaterial_mat_id = NEW.mat_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertar_inventario_AI` AFTER INSERT ON `tblmaterial` FOR EACH ROW INSERT INTO tblinventario
(inv_descripcion,inv_costo,inv_stock_min,inv_stock_max,inv_existencia,inv_fecha_registro,tblmaterial_mat_id,tblbodega_bod_id,tblestado_est_id,tblproveedor_pro_id,inv_numero_factura,inv_concepto,cantidad_anterior)
VALUES(NEW.mat_descripcion,NEW.mat_costo,NEW.mat_stock_min,NEW.mat_stock_max,NEW.mat_existencia,NOW(),
NEW.mat_id,NEW.tblbodega_bod_id,NEW.tblestado_est_id,NEW.tblproveedor_pro_id,NEW.mat_numero_factura,NEW.mat_concepto,NEW.mat_existencia)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmovimiento_inventario`
--

CREATE TABLE `tblmovimiento_inventario` (
  `mov_inv_id` int(30) UNSIGNED NOT NULL,
  `mov_inv_descripcion` varchar(100) NOT NULL,
  `mov_inv_cantidad` int(30) UNSIGNED DEFAULT NULL,
  `mov_inv_valor_total` double DEFAULT NULL,
  `mov_inv_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `mov_inv_stock_actual` int(255) UNSIGNED NOT NULL,
  `mov_inv_costo_actual` int(255) UNSIGNED NOT NULL,
  `tblinventario_inv_id` int(30) UNSIGNED NOT NULL,
  `mov_inv_tipo_movimiento` varchar(50) NOT NULL,
  `mov_inv_numero_factura` varchar(255) DEFAULT NULL,
  `mov_inv_concepto` varchar(255) NOT NULL,
  `tblproveedor_pro_id` int(30) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblmovimiento_inventario`
--

INSERT INTO `tblmovimiento_inventario` (`mov_inv_id`, `mov_inv_descripcion`, `mov_inv_cantidad`, `mov_inv_valor_total`, `mov_inv_fecha_registro`, `mov_inv_stock_actual`, `mov_inv_costo_actual`, `tblinventario_inv_id`, `mov_inv_tipo_movimiento`, `mov_inv_numero_factura`, `mov_inv_concepto`, `tblproveedor_pro_id`) VALUES
(1, 'Cemento', 250, 6997500, '2021-03-31 00:31:54', 250, 6997500, 1, 'ENTRADA', 'FC-MT-001', 'Entran 250 bultos de cemento', 1),
(2, 'Emulsion Asfaltica', 250, 8225000, '2021-03-31 00:31:54', 250, 8225000, 2, 'ENTRADA', 'FC-MT-002', 'Entran 250 emulsiones asfalticas', 8),
(3, 'Hormigon Asfaltico', 250, 5500000, '2021-03-31 00:31:54', 250, 5500000, 3, 'ENTRADA', 'FC-MT-003', 'Entran 250 hormigones asfalticos', 8),
(4, 'Pintura Acrilica Base Solvente', 250, 24816250, '2021-03-31 00:31:54', 250, 24816250, 4, 'ENTRADA', 'FC-MT-004', 'Entran 250 pinturas acrilicas', 6),
(5, 'Pavimentadora de Asfalto', 250, 4294967295, '2021-03-31 00:46:05', 250, 2147483647, 5, 'ENTRADA', 'FC-MQ-001', 'Entran 250 pavimentadoras', 2),
(6, 'Vibrocompactador', 250, 4294967295, '2021-03-31 00:46:05', 250, 2147483647, 6, 'ENTRADA', 'FC-MQ-002', 'Entran 250 vibrocompactadores', 3),
(7, 'Retroexcavadora', 250, 4294967295, '2021-03-31 00:46:05', 250, 2147483647, 7, 'ENTRADA', 'FC-MQ-003', 'Entran 250 retroexcavadoras', 4),
(8, 'Pico', 250, 16907750, '2021-03-31 00:47:27', 250, 16907750, 8, 'ENTRADA', 'FC-HR-001', 'Entran 250 picos', 1),
(9, 'Pala', 250, 16250000, '2021-03-31 00:47:27', 250, 16250000, 9, 'ENTRADA', 'FC-HR-002', 'Entran 250 palas', 2),
(10, 'Martillo', 250, 2625000, '2021-03-31 00:47:27', 250, 2625000, 10, 'ENTRADA', 'FC-HR-003', 'Entran 250 martillos', 5),
(13, 'Cemento', 50, 1399500, '2021-04-01 22:32:17', 200, 5598000, 1, 'SALIDA', 'FC-MT-001', 'Salida por orden de mantenimiento', 1),
(14, 'Hormigon Asfaltico', 50, 1399500, '2021-04-01 22:32:17', 200, 4400000, 3, 'SALIDA', 'FC-MT-003', 'Salida por orden de mantenimiento', 8),
(15, 'Pavimentadora de Asfalto', 50, 0, '2021-04-01 22:32:17', 200, 2147483647, 5, 'SALIDA', 'FC-MQ-001', 'Salida por orden de mantenimiento', 2),
(16, 'Pico', 50, 0, '2021-04-01 22:32:17', 200, 13526200, 8, 'SALIDA', 'FC-HR-001', 'Salida por orden de mantenimiento', 1),
(17, 'Pavimentadora de Asfalto', 50, 900000000, '2021-04-01 22:32:21', 250, 2147483647, 5, 'ENTRADA', 'No aplica', 'Devolucion de insumo', 2),
(18, 'Pico', 50, 3381550, '2021-04-01 22:32:21', 250, 16907750, 8, 'ENTRADA', 'No aplica', 'Devolucion de insumo', 1),
(19, 'Emulsion Asfaltica', 4, 131600, '2021-04-01 22:32:28', 246, 8093400, 2, 'SALIDA', 'FC-MT-002', 'Salida por orden de mantenimiento', 8),
(20, 'Pintura Acrilica Base Solvente', 5, 164500, '2021-04-01 22:32:28', 245, 24319925, 4, 'SALIDA', 'FC-MT-004', 'Salida por orden de mantenimiento', 6),
(21, 'Pala', 3, 0, '2021-04-01 22:32:28', 247, 16055000, 9, 'SALIDA', 'FC-HR-002', 'Salida por orden de mantenimiento', 2),
(22, 'Aditivo', 250, 4725000, '2021-04-01 22:38:10', 250, 4725000, 11, 'ENTRADA', 'FC-MT-005', 'Ingreso de 250 aditivos', 10),
(23, 'Cemento', 3, 83970, '2021-04-05 23:18:44', 197, 5514030, 1, 'SALIDA', 'FC-MT-001', 'Salida por orden de mantenimiento', 1),
(24, 'Hormigon Asfaltico', 3, 83970, '2021-04-05 23:18:44', 197, 4334000, 3, 'SALIDA', 'FC-MT-003', 'Salida por orden de mantenimiento', 8),
(25, 'Aditivo', 3, 83970, '2021-04-05 23:18:44', 197, 3723300, 11, 'SALIDA', 'FC-MT-005', 'Salida por orden de mantenimiento', 10),
(26, 'Pavimentadora de Asfalto', 1, 0, '2021-04-05 23:18:44', 199, 2147483647, 5, 'SALIDA', 'No aplica', 'Salida por orden de mantenimiento', 2),
(27, 'Pico', 1, 0, '2021-04-05 23:18:44', 199, 13458569, 8, 'SALIDA', 'No aplica', 'Salida por orden de mantenimiento', 1),
(28, 'Pavimentadora de Asfalto', 1, 18000000, '2021-04-05 23:18:50', 200, 2147483647, 5, 'ENTRADA', 'No aplica', 'Devolucion de insumo', 2),
(29, 'Pico', 1, 67631, '2021-04-05 23:18:50', 200, 13526200, 8, 'ENTRADA', 'No aplica', 'Devolucion de insumo', 1),
(30, 'Cemento', 1, 27990, '2021-04-05 23:20:46', 196, 5486040, 1, 'SALIDA', 'FC-MT-001', 'Salida por orden de mantenimiento', 1),
(31, 'Emulsion Asfaltica', 1, 27990, '2021-04-05 23:20:46', 196, 6448400, 2, 'SALIDA', 'FC-MT-002', 'Salida por orden de mantenimiento', 8),
(32, 'Hormigon Asfaltico', 1, 27990, '2021-04-05 23:20:46', 196, 4312000, 3, 'SALIDA', 'FC-MT-003', 'Salida por orden de mantenimiento', 8),
(33, 'Aditivo', 1, 27990, '2021-04-05 23:20:46', 196, 3704400, 11, 'SALIDA', 'FC-MT-005', 'Salida por orden de mantenimiento', 10),
(34, 'Pavimentadora de Asfalto', 1, 0, '2021-04-05 23:20:46', 196, 2147483647, 5, 'SALIDA', 'No aplica', 'Salida por orden de mantenimiento', 2),
(35, 'Pavimentadora de Asfalto', 1, 18000000, '2021-04-05 23:20:49', 197, 2147483647, 5, 'ENTRADA', 'No aplica', 'Devolucion de insumo', 2),
(36, 'Cemento', 1, 27990, '2021-04-05 23:28:17', 195, 5458050, 1, 'SALIDA', 'FC-MT-001', 'Salida por orden de mantenimiento', 1),
(37, 'Aditivo', 1, 27990, '2021-04-05 23:28:17', 195, 3685500, 11, 'SALIDA', 'FC-MT-005', 'Salida por orden de mantenimiento', 10),
(38, 'Vibrocompactador', 1, 0, '2021-04-05 23:28:17', 195, 2147483647, 6, 'SALIDA', 'No aplica', 'Salida por orden de mantenimiento', 3),
(39, 'Pala', 1, 0, '2021-04-05 23:28:17', 195, 12675000, 9, 'SALIDA', 'FC-HR-002', 'Salida por orden de mantenimiento', 2),
(40, 'Vibrocompactador', 1, 55000000, '2021-04-05 23:28:22', 196, 2147483647, 6, 'ENTRADA', 'No aplica', 'Devolucion de insumo', 3),
(41, 'Pala', 1, 65000, '2021-04-05 23:28:22', 196, 12740000, 9, 'ENTRADA', 'No aplica', 'Devolucion de insumo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblorden`
--

CREATE TABLE `tblorden` (
  `ord_id` int(30) UNSIGNED NOT NULL,
  `ord_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tbltipo_prioridad_tip_pri_id` int(30) UNSIGNED NOT NULL,
  `tblusuario_usu_id` int(30) UNSIGNED NOT NULL,
  `tbltercero_ter_id` int(30) UNSIGNED NOT NULL,
  `tblestado_est_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblorden`
--

INSERT INTO `tblorden` (`ord_id`, `ord_fecha_registro`, `tbltipo_prioridad_tip_pri_id`, `tblusuario_usu_id`, `tbltercero_ter_id`, `tblestado_est_id`) VALUES
(2, '2021-04-01 23:01:46', 2, 6, 6, 18),
(3, '2021-04-01 23:21:47', 1, 6, 5, 20),
(4, '2021-04-02 23:21:55', 3, 6, 7, 19),
(5, '2021-04-02 23:39:59', 1, 6, 2, 18),
(6, '2021-04-03 23:40:11', 3, 6, 4, 18),
(7, '2021-04-03 23:40:19', 2, 6, 3, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblorden_inventario`
--

CREATE TABLE `tblorden_inventario` (
  `ord_inv_id` int(30) UNSIGNED NOT NULL,
  `ord_inv_cantidad` int(30) UNSIGNED NOT NULL,
  `ord_inv_costo_total_material` int(30) UNSIGNED DEFAULT NULL,
  `ord_inv_total_orden` int(30) UNSIGNED NOT NULL,
  `ord_inv_id_insumo` int(30) UNSIGNED NOT NULL,
  `tblorden_ord_id` int(30) UNSIGNED NOT NULL,
  `ord_inv_tip_insumo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblorden_inventario`
--

INSERT INTO `tblorden_inventario` (`ord_inv_id`, `ord_inv_cantidad`, `ord_inv_costo_total_material`, `ord_inv_total_orden`, `ord_inv_id_insumo`, `tblorden_ord_id`, `ord_inv_tip_insumo`) VALUES
(2, 50, 27990, 1399500, 1, 2, 'material'),
(3, 50, 22000, 1100000, 3, 2, 'material'),
(4, 50, 0, 0, 1, 2, 'maquinaria'),
(5, 50, 0, 0, 1, 2, 'herramienta'),
(6, 4, 32900, 131600, 2, 3, 'material'),
(7, 5, 99265, 496325, 4, 3, 'material'),
(8, 3, 0, 0, 2, 3, 'herramienta'),
(9, 3, 0, 0, 1, 4, 'maquinaria'),
(10, 50, 0, 0, 2, 4, 'herramienta'),
(11, 3, 27990, 83970, 1, 5, 'material'),
(12, 3, 22000, 66000, 3, 5, 'material'),
(13, 3, 18900, 56700, 5, 5, 'material'),
(14, 1, 0, 0, 1, 5, 'maquinaria'),
(15, 1, 0, 0, 1, 5, 'herramienta'),
(16, 1, 27990, 27990, 1, 6, 'material'),
(17, 1, 32900, 32900, 2, 6, 'material'),
(18, 1, 22000, 22000, 3, 6, 'material'),
(19, 1, 18900, 18900, 5, 6, 'material'),
(20, 1, 0, 0, 1, 6, 'maquinaria'),
(21, 1, 27990, 27990, 1, 7, 'material'),
(22, 1, 18900, 18900, 5, 7, 'material'),
(23, 1, 0, 0, 2, 7, 'maquinaria'),
(24, 1, 0, 0, 2, 7, 'herramienta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproveedor`
--

CREATE TABLE `tblproveedor` (
  `pro_id` int(30) UNSIGNED NOT NULL,
  `pro_nit` varchar(10) NOT NULL,
  `pro_razon_social` varchar(50) NOT NULL,
  `pro_correo` varchar(100) NOT NULL,
  `pro_direccion` varchar(50) NOT NULL,
  `pro_telefono` int(20) UNSIGNED NOT NULL,
  `pro_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tblestado_general_est_gen_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblproveedor`
--

INSERT INTO `tblproveedor` (`pro_id`, `pro_nit`, `pro_razon_social`, `pro_correo`, `pro_direccion`, `pro_telefono`, `pro_fecha_registro`, `tblestado_general_est_gen_id`) VALUES
(1, '860350697', 'CONCRETOS ARGOS', 'acastrillonj@summa-sci.com', 'Calle 24 A No. 59-42 Torre 3 Piso 9', 3198700, '2021-03-31 00:38:41', 1),
(2, '860500480', 'ALMACENES CORONA', 'burrea@corona.com.co', 'Carrera 48 72 sur 01', 4547700, '2021-03-31 00:38:46', 1),
(3, '890900148', 'COMPAÑÍA GLOBAL PINTURAS', 'lily.botero@pintuco.com', 'Calle 19a N° 43b- 41', 3848484, '2021-03-31 00:41:39', 1),
(4, '860005396', 'PHILIPS COLOMBIANA', 'adriana.marulanda@philips.com', 'Cra 19 No 100-45 Piso 10', 3212416771, '2021-03-31 00:38:57', 1),
(5, '800242106', 'SODIMAC COLOMBIA', 'servicioalcliente@homecenter.co', ' Av. 6a Nte. ##21 Norte35', 3208899933, '2021-03-31 00:39:01', 1),
(6, '890900148', 'PINTUCO COLOMBIA', 'inddepinturas@une.net.co', 'Cl. 15 ## 21 - 26', 3827651, '2021-03-31 00:39:04', 1),
(7, '9001198952', 'PETROLEOS DE COLOMBIA', 'informacion@petroleosdecolombia.org', 'Calle 20 8 RTE 22, Cali', 3176672734, '2021-03-31 00:39:07', 1),
(8, '800128997', 'ASFALTOS S.A.S', 'asfaltosyfjr@gmail.com', 'Cr15 42-01', 4411022, '2021-03-31 00:40:01', 1),
(9, '900798939', 'CATERPILLAR', 'caterpillar@gmail.com', 'Carrera 9 #59-91', 2110326, '2021-03-28 00:18:34', 1),
(10, '805017030', 'FERRETUKA', 'ferretuka@patuca.com', 'Cra. 4N, Cali', 4408853, '2021-03-28 00:23:40', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrol`
--

CREATE TABLE `tblrol` (
  `rol_id` int(30) UNSIGNED NOT NULL,
  `rol_descripcion` varchar(50) NOT NULL,
  `rol_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tblestado_general_est_gen_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblrol`
--

INSERT INTO `tblrol` (`rol_id`, `rol_descripcion`, `rol_fecha_registro`, `tblestado_general_est_gen_id`) VALUES
(1, 'Administrador', '2021-03-13 16:26:24', 1),
(2, 'Secretario de Infraestructura', '2021-03-13 16:26:24', 1),
(3, 'Subsecretario', '2021-03-13 16:26:24', 1),
(4, 'Gestor vial', '2021-03-13 16:26:24', 1),
(5, 'Jefe de Bodega', '2021-03-13 16:26:24', 1),
(6, 'Tercero', '2021-03-13 16:26:24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltercero`
--

CREATE TABLE `tbltercero` (
  `ter_id` int(30) UNSIGNED NOT NULL,
  `ter_numero_documento` int(20) UNSIGNED NOT NULL,
  `ter_nombre1` varchar(50) NOT NULL,
  `ter_nombre2` varchar(50) DEFAULT NULL,
  `ter_apellido1` varchar(50) NOT NULL,
  `ter_apellido2` varchar(50) NOT NULL,
  `ter_correo` varchar(100) NOT NULL,
  `ter_direccion` varchar(50) NOT NULL,
  `ter_telefono` int(50) UNSIGNED NOT NULL,
  `ter_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tbltipo_documento_tip_doc_id` int(30) UNSIGNED NOT NULL,
  `tblrol_rol_id` int(30) UNSIGNED NOT NULL,
  `tblestado_general_est_gen_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltercero`
--

INSERT INTO `tbltercero` (`ter_id`, `ter_numero_documento`, `ter_nombre1`, `ter_nombre2`, `ter_apellido1`, `ter_apellido2`, `ter_correo`, `ter_direccion`, `ter_telefono`, `ter_fecha_registro`, `tbltipo_documento_tip_doc_id`, `tblrol_rol_id`, `tblestado_general_est_gen_id`) VALUES
(1, 1006010437, 'Andres', 'Felipe', 'Chicaiza', 'Ortiz', 'afchicaiza734@misena.edu.co', 'Diagonal 23 Autopista Sur', 3192415282, '2021-03-25 18:27:52', 1, 6, 1),
(2, 1000601440, 'Miguel', 'Angel', 'Chicaiza', 'Ortiz', 'machicaiza04@misena.edu.co', 'Diagonal 23 Autopista Sur', 3185693657, '2021-03-25 18:28:48', 1, 6, 1),
(3, 1004691567, 'Evander', 'Camilo', 'Cuastumal', 'Pastas', 'eccuastumal@misena.edu.co', 'Avenida 2e Norte', 3005464649, '2021-03-25 18:31:43', 1, 6, 1),
(4, 1144106618, 'Jose', 'Alejandro', 'Salgado', 'Acero', 'jasalgado042@misena.edu.co', 'Transversal 2a Bis', 3043379918, '2021-03-25 18:32:53', 1, 6, 1),
(5, 1110599066, 'Katherine', '', 'Ocampo', 'Varon', 'kocampo01@misena.edu.co', 'Transversal 28e', 3124974341, '2021-03-25 18:35:15', 1, 6, 1),
(6, 1005874500, 'Luis', 'Andres', 'Posso', 'Caicedo', 'laposso0@misena.edu.co', 'Carrera 2b Norte', 3168150662, '2021-03-25 18:36:13', 1, 6, 1),
(7, 1107517286, 'River', '', 'Bernal', 'Ramirez', 'rabernal682@misena.edu.co', 'Calle 13b Oeste', 3185566781, '2021-03-25 18:37:08', 1, 6, 1),
(8, 1006050528, 'Sebastian', '', 'Pinzon', 'Marin', 'spinzon825@misena.edu.co', 'Calle 26 Norte', 3178639747, '2021-03-25 18:37:53', 1, 6, 1),
(9, 1144168131, 'William', '', 'Moreno', 'Garcia', 'wmoreno13@misena.edu.co', 'Diagonal 23 Autopista Sur', 3153039830, '2021-03-25 18:38:39', 1, 6, 1),
(10, 1193399334, 'Samuel', '', 'Suarez', 'Zamora', 'ssuarez4339@misena.edu.co', 'Autopista Sur - C62', 3158216622, '2021-03-28 00:53:58', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipo_daño`
--

CREATE TABLE `tbltipo_daño` (
  `tip_dañ_id` int(30) UNSIGNED NOT NULL,
  `tip_dañ_descripcion` varchar(100) NOT NULL,
  `tip_dañ_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tblestado_general_est_gen_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipo_daño`
--

INSERT INTO `tbltipo_daño` (`tip_dañ_id`, `tip_dañ_descripcion`, `tip_dañ_fecha_registro`, `tblestado_general_est_gen_id`) VALUES
(1, 'Fisuras', '2021-03-13 16:26:25', 1),
(2, 'Deformaciones', '2021-03-13 16:26:25', 1),
(3, 'Perdida de capas estructurales', '2021-03-13 16:26:25', 1),
(4, 'Daños superficiales', '2021-03-13 16:26:25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipo_documento`
--

CREATE TABLE `tbltipo_documento` (
  `tip_doc_id` int(30) UNSIGNED NOT NULL,
  `tip_doc_descripcion` varchar(50) NOT NULL,
  `tip_doc_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tblestado_general_est_gen_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipo_documento`
--

INSERT INTO `tbltipo_documento` (`tip_doc_id`, `tip_doc_descripcion`, `tip_doc_fecha_registro`, `tblestado_general_est_gen_id`) VALUES
(1, 'Cedula de ciudadania', '2021-03-13 16:26:24', 1),
(2, 'Registro Civil', '2021-03-13 16:26:24', 1),
(3, 'Cedula de extranjeria', '2021-03-13 16:26:24', 1),
(4, 'Pasaporte', '2021-03-13 16:26:24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipo_estado`
--

CREATE TABLE `tbltipo_estado` (
  `tip_est_id` int(30) UNSIGNED NOT NULL,
  `tip_est_descripcion` varchar(50) NOT NULL,
  `tip_est_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipo_estado`
--

INSERT INTO `tbltipo_estado` (`tip_est_id`, `tip_est_descripcion`, `tip_est_fecha_registro`) VALUES
(1, 'HURTO', '2021-03-04 19:53:55'),
(2, 'DEFECTUOSO', '2021-03-04 19:53:55'),
(3, 'ACTIVO', '2021-03-04 19:54:05'),
(4, 'INACTIVO', '2021-03-04 19:54:05'),
(5, 'REALIZADO', '2021-03-20 21:40:56'),
(6, 'PENDIENTE', '2021-03-20 21:41:52'),
(7, 'EN PROCESO', '2021-03-20 21:41:52'),
(8, 'APROBADO', '2021-03-20 21:41:52'),
(9, 'SUSPENDIDO', '2021-03-25 17:03:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipo_herramienta`
--

CREATE TABLE `tbltipo_herramienta` (
  `tip_her_id` int(30) UNSIGNED NOT NULL,
  `tip_her_descripcion` varchar(100) NOT NULL,
  `tip_her_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tblestado_general_est_gen_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipo_herramienta`
--

INSERT INTO `tbltipo_herramienta` (`tip_her_id`, `tip_her_descripcion`, `tip_her_fecha_registro`, `tblestado_general_est_gen_id`) VALUES
(1, 'Corte', '2021-03-13 16:26:24', 1),
(2, 'Electrica', '2021-03-13 16:26:24', 1),
(3, 'Manual', '2021-03-13 16:26:24', 1),
(4, 'Automatica', '2021-03-13 16:26:24', 1),
(5, 'Montaje', '2021-03-13 16:26:24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipo_maquinaria`
--

CREATE TABLE `tbltipo_maquinaria` (
  `tip_maq_id` int(30) UNSIGNED NOT NULL,
  `tip_maq_descripcion` varchar(100) NOT NULL,
  `tip_maq_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tblestado_general_est_gen_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipo_maquinaria`
--

INSERT INTO `tbltipo_maquinaria` (`tip_maq_id`, `tip_maq_descripcion`, `tip_maq_fecha_registro`, `tblestado_general_est_gen_id`) VALUES
(1, 'Pesada', '2021-03-13 16:26:24', 1),
(2, 'Semipesada', '2021-03-13 16:26:24', 1),
(3, 'Ligera', '2021-03-13 16:26:25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipo_material`
--

CREATE TABLE `tbltipo_material` (
  `tip_mat_id` int(30) UNSIGNED NOT NULL,
  `tip_mat_descripcion` varchar(100) NOT NULL,
  `tip_mat_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tblestado_general_est_gen_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipo_material`
--

INSERT INTO `tbltipo_material` (`tip_mat_id`, `tip_mat_descripcion`, `tip_mat_fecha_registro`, `tblestado_general_est_gen_id`) VALUES
(1, 'Metalico', '2021-03-13 16:26:25', 1),
(2, 'Madera', '2021-03-13 16:26:25', 1),
(3, 'Ceramico', '2021-03-13 16:26:25', 1),
(4, 'Textil', '2021-03-13 16:26:25', 1),
(5, 'Arena', '2021-03-13 16:26:25', 1),
(8, 'Plastico', '2021-03-28 01:36:36', 1),
(9, 'Polvo Fino', '2021-03-28 01:36:41', 1),
(10, 'Pasta de Grano Fino', '2021-03-28 01:36:55', 1),
(11, 'Diluido', '2021-03-28 01:46:14', 1),
(12, 'Piedra Triturada', '2021-03-28 01:57:58', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipo_prioridad`
--

CREATE TABLE `tbltipo_prioridad` (
  `tip_pri_id` int(30) UNSIGNED NOT NULL,
  `tip_pri_descripcion` varchar(100) NOT NULL,
  `tip_pri_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tblestado_general_est_gen_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipo_prioridad`
--

INSERT INTO `tbltipo_prioridad` (`tip_pri_id`, `tip_pri_descripcion`, `tip_pri_fecha_registro`, `tblestado_general_est_gen_id`) VALUES
(1, 'Alta', '2021-03-22 04:01:31', 1),
(2, 'Media', '2021-03-22 04:01:31', 1),
(3, 'Baja', '2021-03-22 04:01:31', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipo_zona`
--

CREATE TABLE `tbltipo_zona` (
  `tip_zon_id` int(30) UNSIGNED NOT NULL,
  `tip_zon_descripcion` varchar(100) NOT NULL,
  `tip_zon_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tblestado_general_est_gen_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipo_zona`
--

INSERT INTO `tbltipo_zona` (`tip_zon_id`, `tip_zon_descripcion`, `tip_zon_fecha_registro`, `tblestado_general_est_gen_id`) VALUES
(1, 'Centro', '2021-03-13 16:26:24', 1),
(2, 'Noroccidente', '2021-03-13 16:26:24', 1),
(3, 'Nororiente', '2021-03-13 16:26:24', 1),
(4, 'Norte', '2021-03-13 16:26:24', 1),
(5, 'Occidente', '2021-03-13 16:26:24', 1),
(6, 'Oriente', '2021-03-13 16:26:24', 1),
(7, 'Sur', '2021-03-13 16:26:24', 1),
(8, 'Suroccidente', '2021-03-13 16:26:24', 1),
(9, 'Suroriente', '2021-03-26 20:01:14', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE `tblusuario` (
  `usu_id` int(30) UNSIGNED NOT NULL,
  `usu_numero_documento` int(20) UNSIGNED NOT NULL,
  `usu_nombre1` varchar(30) NOT NULL,
  `usu_nombre2` varchar(30) DEFAULT NULL,
  `usu_apellido1` varchar(30) NOT NULL,
  `usu_apellido2` varchar(30) NOT NULL,
  `usu_correo` varchar(50) NOT NULL,
  `usu_contraseña` varchar(50) NOT NULL,
  `usu_direccion` varchar(50) NOT NULL,
  `usu_telefono` int(30) UNSIGNED NOT NULL,
  `usu_foto` varchar(100) DEFAULT NULL,
  `usu_fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tbltipo_documento_tip_doc_id` int(30) UNSIGNED NOT NULL,
  `tblrol_rol_id` int(30) UNSIGNED NOT NULL,
  `tblestado_general_est_gen_id` int(30) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`usu_id`, `usu_numero_documento`, `usu_nombre1`, `usu_nombre2`, `usu_apellido1`, `usu_apellido2`, `usu_correo`, `usu_contraseña`, `usu_direccion`, `usu_telefono`, `usu_foto`, `usu_fecha_registro`, `tbltipo_documento_tip_doc_id`, `tblrol_rol_id`, `tblestado_general_est_gen_id`) VALUES
(1, 1006051548, 'Jonathan', '', 'Rodriguez', 'Lopez', 'jrodriguez8451@misena.edu.co', '09403a42472fc774606f2327098f0f16', 'Calle 15B K 42 y K 41c', 3005575730, 'views/assets/img/users/Jonathan_20210329_181351.jpg', '2021-04-05 22:35:37', 1, 1, 1),
(2, 1193149321, 'Jose', 'Andres', 'Toro', 'Narvaez', 'jatoro1239@misena.edu.co', '04f931c52a7284ea28c4670b1ba62928', 'K 41 entre C 31 Y 31A', 3203883550, 'views/assets/img/users/Jose_20210329_181356.jpg', '2021-03-29 23:13:56', 1, 1, 1),
(3, 1094881080, 'Sergio', 'Alejandro', 'Hernandez', 'Patiño', 'sahernandez0801@misena.edu.co', '8ef57f6d803609769492b5f2e1e76bdc', 'Calle 28 entre K92A y K94', 3128560843, 'views/assets/img/users/Sergio_20210329_181401.jpeg', '2021-03-31 14:56:35', 1, 1, 1),
(4, 1005829334, 'Yeyson', 'Andres', 'Quiñones', 'Caicedo', 'yaquinones43@misena.edu.co', '7a38a6fd2f627cb420545c403e8adf62', 'Cra 83 No. 34-26 Manzana M', 3137279511, 'views/assets/img/users/Yeyson_20210329_181406.jpg', '2021-03-29 23:14:06', 1, 1, 1),
(5, 1234193604, 'Sebastian', '', 'Ochoa', 'Aponte', 'sochoaa123@misena.edu', '432f45b44c432414d2f97df0e5743818', 'Carrera 23 Autopista Sur', 3106029393, 'views/assets/img/users/Sebastian_20210329_183732.jpg', '2021-03-29 23:41:49', 1, 2, 1),
(6, 1144207028, 'Jose', 'Daniel', 'Borja', 'Chocue', 'jdborja820@misena.edu', '432f45b44c432414d2f97df0e5743818', 'Calle 70 #3N 110', 3215555636, 'views/assets/img/users/Jose_20210329_183917.jpg', '2021-03-29 23:39:17', 1, 3, 1),
(7, 1144102577, 'Andres', 'David', 'Mesa', 'Ospina', 'admesa77@misena.edu', '432f45b44c432414d2f97df0e5743818', 'Calle 38 #80B 69 B', 3154502550, 'views/assets/img/users/Andres_20210329_184510.jpg', '2021-03-29 23:45:10', 1, 4, 1),
(8, 1234195472, 'Lady', 'Laura', 'Gomez', 'Hoyos', 'llgomezho06@gmail.com', '432f45b44c432414d2f97df0e5743818', 'Cra 42 A1# 44-12', 3213006624, 'views/assets/img/users/Lady_20210329_184642.jpg', '2021-03-29 23:46:42', 1, 5, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblbodega`
--
ALTER TABLE `tblbodega`
  ADD PRIMARY KEY (`bod_id`),
  ADD KEY `tbltipo_zona_tip_zon_id` (`tbltipo_zona_tip_zon_id`),
  ADD KEY `tblestado_general_est_gen_id` (`tblestado_general_est_gen_id`);

--
-- Indices de la tabla `tblcaso`
--
ALTER TABLE `tblcaso`
  ADD PRIMARY KEY (`cas_id`),
  ADD KEY `tbltipo_daño_tip_dañ_id` (`tbltipo_daño_tip_dañ_id`),
  ADD KEY `tblusuario_usu_id` (`tblusuario_usu_id`),
  ADD KEY `tblestado_est_id` (`tblestado_est_id`),
  ADD KEY `tblorden_ord_id` (`tblorden_ord_id`),
  ADD KEY `tbltipo_prioridad_tip_pri_id` (`tbltipo_prioridad_tip_pri_id`);

--
-- Indices de la tabla `tblestado`
--
ALTER TABLE `tblestado`
  ADD PRIMARY KEY (`est_id`),
  ADD KEY `tbltipo_estado_tip_est_id` (`tbltipo_estado_tip_est_id`);

--
-- Indices de la tabla `tblestado_general`
--
ALTER TABLE `tblestado_general`
  ADD PRIMARY KEY (`est_gen_id`);

--
-- Indices de la tabla `tblherramienta`
--
ALTER TABLE `tblherramienta`
  ADD PRIMARY KEY (`her_id`),
  ADD KEY `tbltipo_herramienta_tip_her_id` (`tbltipo_herramienta_tip_her_id`),
  ADD KEY `tblestado_est_id` (`tblestado_est_id`),
  ADD KEY `tblbodega_bod_id` (`tblbodega_bod_id`),
  ADD KEY `tblproveedor_pro_id` (`tblproveedor_pro_id`);

--
-- Indices de la tabla `tblinventario`
--
ALTER TABLE `tblinventario`
  ADD PRIMARY KEY (`inv_id`),
  ADD KEY `tblherramienta_her_id` (`tblherramienta_her_id`),
  ADD KEY `tblmaterial_mat_id` (`tblmaterial_mat_id`),
  ADD KEY `tblmaquinaria_maq_id` (`tblmaquinaria_maq_id`),
  ADD KEY `tblbodega_bod_id` (`tblbodega_bod_id`),
  ADD KEY `tblestado_est_id` (`tblestado_est_id`),
  ADD KEY `tblproveedor_pro_id` (`tblproveedor_pro_id`);

--
-- Indices de la tabla `tblmaquinaria`
--
ALTER TABLE `tblmaquinaria`
  ADD PRIMARY KEY (`maq_id`),
  ADD KEY `tbltipo_maquinaria_tip_maq_id` (`tbltipo_maquinaria_tip_maq_id`),
  ADD KEY `tblestado_est_id` (`tblestado_est_id`),
  ADD KEY `tblbodega_bod_id` (`tblbodega_bod_id`),
  ADD KEY `tblproveedor_pro_id` (`tblproveedor_pro_id`);

--
-- Indices de la tabla `tblmaterial`
--
ALTER TABLE `tblmaterial`
  ADD PRIMARY KEY (`mat_id`),
  ADD KEY `tbltipo_material_tip_mat_id` (`tbltipo_material_tip_mat_id`),
  ADD KEY `tblestado_est_id` (`tblestado_est_id`),
  ADD KEY `tblbodega_bod_id` (`tblbodega_bod_id`),
  ADD KEY `tblproveedor_pro_id` (`tblproveedor_pro_id`);

--
-- Indices de la tabla `tblmovimiento_inventario`
--
ALTER TABLE `tblmovimiento_inventario`
  ADD PRIMARY KEY (`mov_inv_id`),
  ADD KEY `tblinventario_inv_id` (`tblinventario_inv_id`),
  ADD KEY `tblproveedor_pro_id` (`tblproveedor_pro_id`);

--
-- Indices de la tabla `tblorden`
--
ALTER TABLE `tblorden`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `tblusuario_usu_id` (`tblusuario_usu_id`),
  ADD KEY `tbltercero_ter_id` (`tbltercero_ter_id`),
  ADD KEY `tblestado_est_id` (`tblestado_est_id`),
  ADD KEY `tbltipo_prioridad_tip_pri_id` (`tbltipo_prioridad_tip_pri_id`);

--
-- Indices de la tabla `tblorden_inventario`
--
ALTER TABLE `tblorden_inventario`
  ADD PRIMARY KEY (`ord_inv_id`),
  ADD KEY `tblorden_ord_id` (`tblorden_ord_id`);

--
-- Indices de la tabla `tblproveedor`
--
ALTER TABLE `tblproveedor`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `tblestado_general_est_gen_id` (`tblestado_general_est_gen_id`);

--
-- Indices de la tabla `tblrol`
--
ALTER TABLE `tblrol`
  ADD PRIMARY KEY (`rol_id`),
  ADD KEY `tblestado_general_est_gen_id` (`tblestado_general_est_gen_id`);

--
-- Indices de la tabla `tbltercero`
--
ALTER TABLE `tbltercero`
  ADD PRIMARY KEY (`ter_id`),
  ADD KEY `tbltipo_documento_tip_doc_id` (`tbltipo_documento_tip_doc_id`),
  ADD KEY `tblrol_rol_id` (`tblrol_rol_id`),
  ADD KEY `tblestado_general_est_gen_id` (`tblestado_general_est_gen_id`);

--
-- Indices de la tabla `tbltipo_daño`
--
ALTER TABLE `tbltipo_daño`
  ADD PRIMARY KEY (`tip_dañ_id`),
  ADD KEY `tblestado_general_est_gen_id` (`tblestado_general_est_gen_id`);

--
-- Indices de la tabla `tbltipo_documento`
--
ALTER TABLE `tbltipo_documento`
  ADD PRIMARY KEY (`tip_doc_id`),
  ADD KEY `tblestado_general_est_gen_id` (`tblestado_general_est_gen_id`);

--
-- Indices de la tabla `tbltipo_estado`
--
ALTER TABLE `tbltipo_estado`
  ADD PRIMARY KEY (`tip_est_id`);

--
-- Indices de la tabla `tbltipo_herramienta`
--
ALTER TABLE `tbltipo_herramienta`
  ADD PRIMARY KEY (`tip_her_id`),
  ADD KEY `tblestado_general_est_gen_id` (`tblestado_general_est_gen_id`);

--
-- Indices de la tabla `tbltipo_maquinaria`
--
ALTER TABLE `tbltipo_maquinaria`
  ADD PRIMARY KEY (`tip_maq_id`),
  ADD KEY `tblestado_general_est_gen_id` (`tblestado_general_est_gen_id`);

--
-- Indices de la tabla `tbltipo_material`
--
ALTER TABLE `tbltipo_material`
  ADD PRIMARY KEY (`tip_mat_id`),
  ADD KEY `tblestado_general_est_gen_id` (`tblestado_general_est_gen_id`);

--
-- Indices de la tabla `tbltipo_prioridad`
--
ALTER TABLE `tbltipo_prioridad`
  ADD PRIMARY KEY (`tip_pri_id`),
  ADD KEY `tblestado_general_est_gen_id` (`tblestado_general_est_gen_id`);

--
-- Indices de la tabla `tbltipo_zona`
--
ALTER TABLE `tbltipo_zona`
  ADD PRIMARY KEY (`tip_zon_id`),
  ADD KEY `tblestado_general_est_gen_id` (`tblestado_general_est_gen_id`);

--
-- Indices de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `tbltipo_documento_tip_doc_id` (`tbltipo_documento_tip_doc_id`),
  ADD KEY `tblrol_rol_id` (`tblrol_rol_id`),
  ADD KEY `tblestado_general_est_gen_id` (`tblestado_general_est_gen_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblbodega`
--
ALTER TABLE `tblbodega`
  MODIFY `bod_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tblcaso`
--
ALTER TABLE `tblcaso`
  MODIFY `cas_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tblestado`
--
ALTER TABLE `tblestado`
  MODIFY `est_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tblestado_general`
--
ALTER TABLE `tblestado_general`
  MODIFY `est_gen_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblherramienta`
--
ALTER TABLE `tblherramienta`
  MODIFY `her_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblinventario`
--
ALTER TABLE `tblinventario`
  MODIFY `inv_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tblmaquinaria`
--
ALTER TABLE `tblmaquinaria`
  MODIFY `maq_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblmaterial`
--
ALTER TABLE `tblmaterial`
  MODIFY `mat_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblmovimiento_inventario`
--
ALTER TABLE `tblmovimiento_inventario`
  MODIFY `mov_inv_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tblorden`
--
ALTER TABLE `tblorden`
  MODIFY `ord_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tblorden_inventario`
--
ALTER TABLE `tblorden_inventario`
  MODIFY `ord_inv_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tblproveedor`
--
ALTER TABLE `tblproveedor`
  MODIFY `pro_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tblrol`
--
ALTER TABLE `tblrol`
  MODIFY `rol_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbltercero`
--
ALTER TABLE `tbltercero`
  MODIFY `ter_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbltipo_daño`
--
ALTER TABLE `tbltipo_daño`
  MODIFY `tip_dañ_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbltipo_documento`
--
ALTER TABLE `tbltipo_documento`
  MODIFY `tip_doc_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbltipo_estado`
--
ALTER TABLE `tbltipo_estado`
  MODIFY `tip_est_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbltipo_herramienta`
--
ALTER TABLE `tbltipo_herramienta`
  MODIFY `tip_her_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbltipo_maquinaria`
--
ALTER TABLE `tbltipo_maquinaria`
  MODIFY `tip_maq_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbltipo_material`
--
ALTER TABLE `tbltipo_material`
  MODIFY `tip_mat_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbltipo_prioridad`
--
ALTER TABLE `tbltipo_prioridad`
  MODIFY `tip_pri_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbltipo_zona`
--
ALTER TABLE `tbltipo_zona`
  MODIFY `tip_zon_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `usu_id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblbodega`
--
ALTER TABLE `tblbodega`
  ADD CONSTRAINT `tblbodega_ibfk_1` FOREIGN KEY (`tbltipo_zona_tip_zon_id`) REFERENCES `tbltipo_zona` (`tip_zon_id`),
  ADD CONSTRAINT `tblbodega_ibfk_2` FOREIGN KEY (`tblestado_general_est_gen_id`) REFERENCES `tblestado_general` (`est_gen_id`);

--
-- Filtros para la tabla `tblcaso`
--
ALTER TABLE `tblcaso`
  ADD CONSTRAINT `tblcaso_ibfk_1` FOREIGN KEY (`tbltipo_daño_tip_dañ_id`) REFERENCES `tbltipo_daño` (`tip_dañ_id`),
  ADD CONSTRAINT `tblcaso_ibfk_2` FOREIGN KEY (`tblusuario_usu_id`) REFERENCES `tblusuario` (`usu_id`),
  ADD CONSTRAINT `tblcaso_ibfk_3` FOREIGN KEY (`tblestado_est_id`) REFERENCES `tblestado` (`est_id`),
  ADD CONSTRAINT `tblcaso_ibfk_4` FOREIGN KEY (`tblorden_ord_id`) REFERENCES `tblorden` (`ord_id`),
  ADD CONSTRAINT `tblcaso_ibfk_5` FOREIGN KEY (`tbltipo_prioridad_tip_pri_id`) REFERENCES `tbltipo_prioridad` (`tip_pri_id`);

--
-- Filtros para la tabla `tblestado`
--
ALTER TABLE `tblestado`
  ADD CONSTRAINT `tblestado_ibfk_1` FOREIGN KEY (`tbltipo_estado_tip_est_id`) REFERENCES `tbltipo_estado` (`tip_est_id`);

--
-- Filtros para la tabla `tblherramienta`
--
ALTER TABLE `tblherramienta`
  ADD CONSTRAINT `tblherramienta_ibfk_1` FOREIGN KEY (`tbltipo_herramienta_tip_her_id`) REFERENCES `tbltipo_herramienta` (`tip_her_id`),
  ADD CONSTRAINT `tblherramienta_ibfk_2` FOREIGN KEY (`tblestado_est_id`) REFERENCES `tblestado` (`est_id`),
  ADD CONSTRAINT `tblherramienta_ibfk_3` FOREIGN KEY (`tblbodega_bod_id`) REFERENCES `tblbodega` (`bod_id`),
  ADD CONSTRAINT `tblherramienta_ibfk_4` FOREIGN KEY (`tblproveedor_pro_id`) REFERENCES `tblproveedor` (`pro_id`);

--
-- Filtros para la tabla `tblinventario`
--
ALTER TABLE `tblinventario`
  ADD CONSTRAINT `tblinventario_ibfk_1` FOREIGN KEY (`tblherramienta_her_id`) REFERENCES `tblherramienta` (`her_id`),
  ADD CONSTRAINT `tblinventario_ibfk_2` FOREIGN KEY (`tblmaterial_mat_id`) REFERENCES `tblmaterial` (`mat_id`),
  ADD CONSTRAINT `tblinventario_ibfk_3` FOREIGN KEY (`tblmaquinaria_maq_id`) REFERENCES `tblmaquinaria` (`maq_id`),
  ADD CONSTRAINT `tblinventario_ibfk_4` FOREIGN KEY (`tblbodega_bod_id`) REFERENCES `tblbodega` (`bod_id`),
  ADD CONSTRAINT `tblinventario_ibfk_5` FOREIGN KEY (`tblestado_est_id`) REFERENCES `tblestado` (`est_id`),
  ADD CONSTRAINT `tblinventario_ibfk_9` FOREIGN KEY (`tblproveedor_pro_id`) REFERENCES `tblproveedor` (`pro_id`);

--
-- Filtros para la tabla `tblmaquinaria`
--
ALTER TABLE `tblmaquinaria`
  ADD CONSTRAINT `tblmaquinaria_ibfk_1` FOREIGN KEY (`tbltipo_maquinaria_tip_maq_id`) REFERENCES `tbltipo_maquinaria` (`tip_maq_id`),
  ADD CONSTRAINT `tblmaquinaria_ibfk_2` FOREIGN KEY (`tblestado_est_id`) REFERENCES `tblestado` (`est_id`),
  ADD CONSTRAINT `tblmaquinaria_ibfk_3` FOREIGN KEY (`tblbodega_bod_id`) REFERENCES `tblbodega` (`bod_id`),
  ADD CONSTRAINT `tblmaquinaria_ibfk_4` FOREIGN KEY (`tblproveedor_pro_id`) REFERENCES `tblproveedor` (`pro_id`);

--
-- Filtros para la tabla `tblmaterial`
--
ALTER TABLE `tblmaterial`
  ADD CONSTRAINT `tblmaterial_ibfk_1` FOREIGN KEY (`tbltipo_material_tip_mat_id`) REFERENCES `tbltipo_material` (`tip_mat_id`),
  ADD CONSTRAINT `tblmaterial_ibfk_2` FOREIGN KEY (`tblestado_est_id`) REFERENCES `tblestado` (`est_id`),
  ADD CONSTRAINT `tblmaterial_ibfk_3` FOREIGN KEY (`tblbodega_bod_id`) REFERENCES `tblbodega` (`bod_id`),
  ADD CONSTRAINT `tblmaterial_ibfk_4` FOREIGN KEY (`tblproveedor_pro_id`) REFERENCES `tblproveedor` (`pro_id`);

--
-- Filtros para la tabla `tblmovimiento_inventario`
--
ALTER TABLE `tblmovimiento_inventario`
  ADD CONSTRAINT `tblmovimiento_inventario_ibfk_1` FOREIGN KEY (`tblinventario_inv_id`) REFERENCES `tblinventario` (`inv_id`),
  ADD CONSTRAINT `tblmovimiento_inventario_ibfk_2` FOREIGN KEY (`tblproveedor_pro_id`) REFERENCES `tblproveedor` (`pro_id`);

--
-- Filtros para la tabla `tblorden`
--
ALTER TABLE `tblorden`
  ADD CONSTRAINT `tblorden_ibfk_1` FOREIGN KEY (`tblusuario_usu_id`) REFERENCES `tblusuario` (`usu_id`),
  ADD CONSTRAINT `tblorden_ibfk_2` FOREIGN KEY (`tbltercero_ter_id`) REFERENCES `tbltercero` (`ter_id`),
  ADD CONSTRAINT `tblorden_ibfk_4` FOREIGN KEY (`tblestado_est_id`) REFERENCES `tblestado` (`est_id`),
  ADD CONSTRAINT `tblorden_ibfk_5` FOREIGN KEY (`tbltipo_prioridad_tip_pri_id`) REFERENCES `tbltipo_prioridad` (`tip_pri_id`);

--
-- Filtros para la tabla `tblorden_inventario`
--
ALTER TABLE `tblorden_inventario`
  ADD CONSTRAINT `tblorden_inventario_ibfk_2` FOREIGN KEY (`tblorden_ord_id`) REFERENCES `tblorden` (`ord_id`);

--
-- Filtros para la tabla `tblproveedor`
--
ALTER TABLE `tblproveedor`
  ADD CONSTRAINT `tblproveedor_ibfk_1` FOREIGN KEY (`tblestado_general_est_gen_id`) REFERENCES `tblestado_general` (`est_gen_id`);

--
-- Filtros para la tabla `tblrol`
--
ALTER TABLE `tblrol`
  ADD CONSTRAINT `tblrol_ibfk_1` FOREIGN KEY (`tblestado_general_est_gen_id`) REFERENCES `tblestado_general` (`est_gen_id`);

--
-- Filtros para la tabla `tbltercero`
--
ALTER TABLE `tbltercero`
  ADD CONSTRAINT `tbltercero_ibfk_1` FOREIGN KEY (`tbltipo_documento_tip_doc_id`) REFERENCES `tbltipo_documento` (`tip_doc_id`),
  ADD CONSTRAINT `tbltercero_ibfk_2` FOREIGN KEY (`tblrol_rol_id`) REFERENCES `tblrol` (`rol_id`),
  ADD CONSTRAINT `tbltercero_ibfk_3` FOREIGN KEY (`tblestado_general_est_gen_id`) REFERENCES `tblestado_general` (`est_gen_id`);

--
-- Filtros para la tabla `tbltipo_daño`
--
ALTER TABLE `tbltipo_daño`
  ADD CONSTRAINT `tbltipo_daño_ibfk_1` FOREIGN KEY (`tblestado_general_est_gen_id`) REFERENCES `tblestado_general` (`est_gen_id`);

--
-- Filtros para la tabla `tbltipo_documento`
--
ALTER TABLE `tbltipo_documento`
  ADD CONSTRAINT `tbltipo_documento_ibfk_1` FOREIGN KEY (`tblestado_general_est_gen_id`) REFERENCES `tblestado_general` (`est_gen_id`);

--
-- Filtros para la tabla `tbltipo_herramienta`
--
ALTER TABLE `tbltipo_herramienta`
  ADD CONSTRAINT `tbltipo_herramienta_ibfk_1` FOREIGN KEY (`tblestado_general_est_gen_id`) REFERENCES `tblestado_general` (`est_gen_id`);

--
-- Filtros para la tabla `tbltipo_maquinaria`
--
ALTER TABLE `tbltipo_maquinaria`
  ADD CONSTRAINT `tbltipo_maquinaria_ibfk_1` FOREIGN KEY (`tblestado_general_est_gen_id`) REFERENCES `tblestado_general` (`est_gen_id`);

--
-- Filtros para la tabla `tbltipo_material`
--
ALTER TABLE `tbltipo_material`
  ADD CONSTRAINT `tbltipo_material_ibfk_1` FOREIGN KEY (`tblestado_general_est_gen_id`) REFERENCES `tblestado_general` (`est_gen_id`);

--
-- Filtros para la tabla `tbltipo_prioridad`
--
ALTER TABLE `tbltipo_prioridad`
  ADD CONSTRAINT `tbltipo_prioridad_ibfk_1` FOREIGN KEY (`tblestado_general_est_gen_id`) REFERENCES `tblestado_general` (`est_gen_id`);

--
-- Filtros para la tabla `tbltipo_zona`
--
ALTER TABLE `tbltipo_zona`
  ADD CONSTRAINT `tbltipo_zona_ibfk_1` FOREIGN KEY (`tblestado_general_est_gen_id`) REFERENCES `tblestado_general` (`est_gen_id`);

--
-- Filtros para la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD CONSTRAINT `tblusuario_ibfk_1` FOREIGN KEY (`tbltipo_documento_tip_doc_id`) REFERENCES `tbltipo_documento` (`tip_doc_id`),
  ADD CONSTRAINT `tblusuario_ibfk_2` FOREIGN KEY (`tblrol_rol_id`) REFERENCES `tblrol` (`rol_id`),
  ADD CONSTRAINT `tblusuario_ibfk_3` FOREIGN KEY (`tblestado_general_est_gen_id`) REFERENCES `tblestado_general` (`est_gen_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
