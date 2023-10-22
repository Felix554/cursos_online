--
-- PostgreSQL database dump
--

-- Dumped from database version 12.2
-- Dumped by pg_dump version 12.2

-- Started on 2023-06-14 00:00:44

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
-- TOC entry 2848 (class 1262 OID 36570)
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
-- TOC entry 2841 (class 0 OID 44002)
-- Dependencies: 206
-- Data for Name: cursos_usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.cursos_usuarios (id, id_curso, id_usuario, status) VALUES (2, 2, 40, false);
INSERT INTO public.cursos_usuarios (id, id_curso, id_usuario, status) VALUES (1, 1, 40, true);


--
-- TOC entry 2850 (class 0 OID 0)
-- Dependencies: 207
-- Name: cursos_usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cursos_usuarios_id_seq', 2, true);


-- Completed on 2023-06-14 00:00:44

--
-- PostgreSQL database dump complete
--

