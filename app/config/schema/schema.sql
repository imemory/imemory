

--------------------------------------------------------------------------------
begin;


-- States
--------------------------------------------------------------------------------
drop table if exists states cascade;
create table states (
    id    integer primary key,
    name  character varying not null unique,
    code  character varying not null unique
);


-- Cities
--------------------------------------------------------------------------------
drop table if exists cities cascade;
create table cities (
    id       integer primary key,
    state_id integer not null references states(id),
    name     character varying not null,
    unique (state_id, name)
);


-- Users
--------------------------------------------------------------------------------
drop table if exists users cascade;
create table users (
    id              serial primary key,
    username        character varying not null unique,
    email           character varying not null unique,
    password        character varying not null,
    following_count integer not null default 0,
    is_blocked      boolean not null default false,
    is_admin        boolean not null default false,
    is_moderator    boolean not null default false,
    language        character varying not null check(language in ('pt_br', 'en_us')),
    first_time      boolean not null default true,
    created         timestamp without time zone default null,
    updated         timestamp without time zone default null
);


-- Users Total Flashcard Views
--------------------------------------------------------------------------------
drop table if exists users_total_views;
create table users_total_views (
    user_id integer primary key,
    total   numeric not null default 1.0
);


-- Profiles
--------------------------------------------------------------------------------
drop table if exists profiles cascade;
create table profiles (
    id         serial primary key,
    user_id    integer not null references users(id) unique,
    city_id    integer references cities(id),
    name       character varying,
    gender     integer,
    birthday   date,
    about      text,
    scholarity integer,
    created    timestamp without time zone default null,
    updated    timestamp without time zone default null
);


-- User Messages
--------------------------------------------------------------------------------
drop table if exists user_messages cascade;
create table user_messages (
    id      serial primary key,
    user_id integer not null references users(id),
    from_id integer not null references users(id),
    message text not null default '',
    created timestamp without time zone default null
);


-- Groups
--------------------------------------------------------------------------------
drop table if exists groups cascade;
create table groups (
    id               serial primary key,
    owner_id         integer not null references users(id),
    name             character varying not null unique,
    description      text not null,
    membership_count integer not null default 0,
    flashcard_count  integer not null default 0,
    created          timestamp without time zone default null,
    updated          timestamp without time zone default null
);


-- Group Messages
--------------------------------------------------------------------------------
drop table if exists group_messages cascade;
create table group_messages (
    id       serial primary key,
    group_id integer not null references groups(id),
    user_id  integer not null references users(id),
    message  text not null,
    created  timestamp without time zone default null,
    updated  timestamp without time zone default null
);


-- Memberships
--------------------------------------------------------------------------------
drop table if exists memberships cascade;
create table memberships (
    id       serial primary key,
    group_id integer not null references groups(id),
    user_id  integer not null references users(id),
    created  timestamp without time zone default null,
    unique (group_id, user_id)
);


-- Friendships
--------------------------------------------------------------------------------
drop table if exists friendships cascade;
create table friendships (
    id        serial primary key,
    user_id   integer not null references users(id),
    friend_id integer not null references users(id),
    created   timestamp without time zone default null,
    unique (user_id, friend_id)
);


-- Flashcards
--------------------------------------------------------------------------------
drop table if exists flashcards cascade;
create table flashcards (
    id        serial primary key,
    user_id   integer not null references users(id),
    front     text not null,
    back      text not null,
    created   timestamp without time zone default null,
    updated   timestamp without time zone default null
);


-- Flashcards x Users
--------------------------------------------------------------------------------
drop table if exists flashcards_users cascade;
create table flashcards_users (
    id           serial primary key,
    flashcard_id integer not null references flashcards(id),
    user_id      integer not null references users(id),
    views        numeric not null default 1.0,
    hits         numeric not null default 0.0,
    created      timestamp without time zone default null,
    updated      timestamp without time zone default null,
    unique (flashcard_id, user_id)
);


-- Flashcards x Groups
--------------------------------------------------------------------------------
drop table if exists flashcards_groups cascade;
create table flashcards_groups (
    id           serial primary key,
    flashcard_id integer not null references flashcards(id),
    group_id     integer not null references groups(id),
    user_id      integer not null references users(id),
    created      timestamp without time zone default null,
    updated      timestamp without time zone default null,
    unique (flashcard_id, group_id)
);


-- Tags
--------------------------------------------------------------------------------
drop table if exists tags cascade;
create table tags (
    id              serial primary key,
    name            character varying not null unique,
    flashcard_count integer not null default 0,
    created         timestamp without time zone default null
);


-- Flashcards x Tags
--------------------------------------------------------------------------------
drop table if exists flashcards_tags cascade;
create table flashcards_tags (
    id           serial primary key,
    flashcard_id integer not null references flashcards(id),
    tag_id       integer not null references tags(id),
    created      timestamp without time zone default null,
    unique (flashcard_id, tag_id)
);


-- Logs
--------------------------------------------------------------------------------
drop table if exists logs;
create table logs (
    id serial primary key,
    user_id   integer not null references users(id),
    message   text
);


-- Funções

CREATE OR REPLACE FUNCTION calc_max_r(user_id integer) RETURNS numeric AS $$
    --
    -- Função calc_max_r(user_id integer)
    --
    -- Retorna o flashcard com maior R dentre os flashcard do usuário passado por user_id
    --
    DECLARE
        max_r numeric := 0;
    BEGIN
        SELECT     round(max((2.0 - fu.hits/fu.views - fu.views/utv.total) / 2.0), 2) as r
        INTO       max_r
        FROM       flashcards_users as fu
        INNER JOIN users_total_views as utv
        ON         (fu.user_id = utv.user_id)
        WHERE      fu.user_id = user_id;
        
        RETURN max_r;
    END;
$$ LANGUAGE plpgsql;


-- Root
insert into users(username, email, password, is_admin, is_moderator, language) values
    ('admin', 'admin@root', '26a4d69a22d2a0713ff778a77f7011e6052709ac', true, true, 'pt_br');

insert into profiles(user_id) values (1);

insert into users_total_views(user_id) select id from users;
--------------------------------------------------------------------------------

commit;


