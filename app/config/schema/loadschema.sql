
-- Load schema
SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET client_min_messages = warning;
SET escape_string_warning = off;
SET search_path = public;

\i schema.sql


-- Load geography

\i geography.sql

vacuum full analyze verbose;

