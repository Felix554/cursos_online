--
-- PostgreSQL database dump
--

-- Dumped from database version 12.2
-- Dumped by pg_dump version 12.2

-- Started on 2023-06-14 00:02:06

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
-- TOC entry 2837 (class 0 OID 44033)
-- Dependencies: 209
-- Data for Name: clases; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.clases (id, nombre, id_curso, url_video) VALUES (1, 'Primera clase Curso 1', 1, 'cursos/curso1/Video1.mp4');
INSERT INTO public.clases (id, nombre, id_curso, url_video) VALUES (2, 'Segunda Clase C1', 1, 'cursos/curso1/Video2.mp4');
INSERT INTO public.clases (id, nombre, id_curso, url_video) VALUES (3, 'Tercera Clase C1', 1, 'cursos/curso1/Video3.mp4');
INSERT INTO public.clases (id, nombre, id_curso, url_video) VALUES (4, 'Cuarto Video', 1, 'cursos/curso1/Video3.mp4');
INSERT INTO public.clases (id, nombre, id_curso, url_video) VALUES (5, 'Video 1', 2, 'cursos/curso2/Video1.mp4');
INSERT INTO public.clases (id, nombre, id_curso, url_video) VALUES (6, 'Video 2', 2, 'cursos/curso2/Video2.mp4');


--
-- TOC entry 2845 (class 0 OID 0)
-- Dependencies: 208
-- Name: clases_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.clases_id_seq', 6, true);


-- Completed on 2023-06-14 00:02:06

--
-- PostgreSQL database dump complete
--

