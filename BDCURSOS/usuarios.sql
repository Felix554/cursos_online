--
-- PostgreSQL database dump
--

-- Dumped from database version 12.2
-- Dumped by pg_dump version 12.2

-- Started on 2023-06-14 00:00:14

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2843 (class 1262 OID 36570)
-- Name: cursos_online; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE cursos_online WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Venezuela.1252' LC_CTYPE = 'Spanish_Venezuela.1252';


ALTER DATABASE cursos_online OWNER TO postgres;

\connect cursos_online

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2837 (class 0 OID 36573)
-- Dependencies: 203
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.usuarios (cedula, id, nacionalidad, sexo, telefono, f_nacimiento, correo, clave, tipo_usuario, status, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, dfecha_creacion, dfecha_actualizacion) VALUES ('V234234', 1, '2', '2', '23423423423', '2023-05-03', '', '0e9212587d373ca58e9bada0c15e6fe4', '2', 'A', '324234', '2342', '23424', '4234', NULL, NULL);
INSERT INTO public.usuarios (cedula, id, nacionalidad, sexo, telefono, f_nacimiento, correo, clave, tipo_usuario, status, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, dfecha_creacion, dfecha_actualizacion) VALUES ('V123456', 4, '1', '2', '34234234234', '2023-05-10', '2ew@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2', 'A', 'REWR', 'RWER', 'EWR', 'WER', NULL, NULL);
INSERT INTO public.usuarios (cedula, id, nacionalidad, sexo, telefono, f_nacimiento, correo, clave, tipo_usuario, status, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, dfecha_creacion, dfecha_actualizacion) VALUES ('V123456', 5, '1', '2', '34234234234', '2023-05-10', '2ew@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2', 'A', 'REWR', 'RWER', 'EWR', 'WER', NULL, NULL);
INSERT INTO public.usuarios (cedula, id, nacionalidad, sexo, telefono, f_nacimiento, correo, clave, tipo_usuario, status, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, dfecha_creacion, dfecha_actualizacion) VALUES ('V454545', 6, '1', '2', '35235234234', '2023-05-03', 'felix@gmail.com', '9ea5e6f10d48803ae38499c0d5e6d93f', '2', 'A', 'DFSDF', 'FDSF', 'DFSDF', 'SDFS', NULL, NULL);
INSERT INTO public.usuarios (cedula, id, nacionalidad, sexo, telefono, f_nacimiento, correo, clave, tipo_usuario, status, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, dfecha_creacion, dfecha_actualizacion) VALUES ('V454545', 7, '1', '2', '35235234234', '2023-05-03', 'felix@gmail.com', '9ea5e6f10d48803ae38499c0d5e6d93f', '2', 'A', 'DFSDF', 'FDSF', 'DFSDF', 'SDFS', NULL, NULL);
INSERT INTO public.usuarios (cedula, id, nacionalidad, sexo, telefono, f_nacimiento, correo, clave, tipo_usuario, status, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, dfecha_creacion, dfecha_actualizacion) VALUES ('V654321', 8, '1', '2', '04551515151', '2023-05-10', 'felixrrf@gas.com', 'c33367701511b4f6020ec61ded352059', '2', 'A', 'PRUEBA', 'DSFSDFSD', 'DFSDF', 'FSDFSD', NULL, NULL);
INSERT INTO public.usuarios (cedula, id, nacionalidad, sexo, telefono, f_nacimiento, correo, clave, tipo_usuario, status, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, dfecha_creacion, dfecha_actualizacion) VALUES ('V654321', 9, '1', '2', '04551515151', '2023-05-10', 'felixrrf@gas.com', 'c33367701511b4f6020ec61ded352059', '2', 'A', 'PRUEBA', 'DSFSDFSD', 'DFSDF', 'FSDFSD', NULL, NULL);
INSERT INTO public.usuarios (cedula, id, nacionalidad, sexo, telefono, f_nacimiento, correo, clave, tipo_usuario, status, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, dfecha_creacion, dfecha_actualizacion) VALUES ('V654321', 10, '1', '2', '52523242424', '2023-05-10', 'felix554@gmail.com', 'c33367701511b4f6020ec61ded352059', '2', 'A', 'RETERT', 'ERTERT', 'ERTERT', 'ERTERT', NULL, NULL);
INSERT INTO public.usuarios (cedula, id, nacionalidad, sexo, telefono, f_nacimiento, correo, clave, tipo_usuario, status, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, dfecha_creacion, dfecha_actualizacion) VALUES ('V654321', 11, '1', '2', '52523242424', '2023-05-10', 'felix554@gmail.com', 'c33367701511b4f6020ec61ded352059', '2', 'A', 'RETERT', 'ERTERT', 'ERTERT', 'ERTERT', NULL, NULL);
INSERT INTO public.usuarios (cedula, id, nacionalidad, sexo, telefono, f_nacimiento, correo, clave, tipo_usuario, status, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, dfecha_creacion, dfecha_actualizacion) VALUES ('V1234567', 12, '1', '2', '32423423423', '2023-05-10', 'ferf@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2', 'A', 'DFSDF', 'FSDFSDF', 'SDFSDF', 'SDFSDF', NULL, NULL);
INSERT INTO public.usuarios (cedula, id, nacionalidad, sexo, telefono, f_nacimiento, correo, clave, tipo_usuario, status, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, dfecha_creacion, dfecha_actualizacion) VALUES ('V1234567', 13, '1', '2', '32423423423', '2023-05-10', 'ferf@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2', 'A', 'DFSDF', 'FSDFSDF', 'SDFSDF', 'SDFSDF', NULL, NULL);
INSERT INTO public.usuarios (cedula, id, nacionalidad, sexo, telefono, f_nacimiento, correo, clave, tipo_usuario, status, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, dfecha_creacion, dfecha_actualizacion) VALUES ('V1234567', 14, '1', '2', '32423423423', '2023-05-10', 'ferf@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2', 'A', 'DFSDF', 'FSDFSDF', 'SDFSDF', 'SDFSDF', NULL, NULL);
INSERT INTO public.usuarios (cedula, id, nacionalidad, sexo, telefono, f_nacimiento, correo, clave, tipo_usuario, status, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, dfecha_creacion, dfecha_actualizacion) VALUES ('V1234567', 15, '1', '2', '32423423423', '2023-05-10', 'ferf@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2', 'A', 'DFSDF', 'FSDFSDF', 'SDFSDF', 'SDFSDF', NULL, NULL);
INSERT INTO public.usuarios (cedula, id, nacionalidad, sexo, telefono, f_nacimiento, correo, clave, tipo_usuario, status, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, dfecha_creacion, dfecha_actualizacion) VALUES ('V19335554', 40, NULL, 'M', '04123779232', '1989-08-04', 'felix554@gmail.com', '1cd883ea9043f0d25edb9e903635e2d0', '2', 'A', 'FELIX', 'MEDINA', 'MANUEL', 'ORTEGA', NULL, NULL);


--
-- TOC entry 2845 (class 0 OID 0)
-- Dependencies: 202
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 40, true);


-- Completed on 2023-06-14 00:00:14

--
-- PostgreSQL database dump complete
--

