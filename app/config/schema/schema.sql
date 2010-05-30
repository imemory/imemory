

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
	id        serial primary key,
	username  character varying not null unique,
	email     character varying not null unique,
	password  character varying not null,
	blocked   boolean not null default false,
	created   timestamp without time zone default null,
	updated   timestamp without time zone default null
);


-- Profiles
--------------------------------------------------------------------------------
drop table if exists profiles cascade;
create table profiles (
	id         serial primary key,
	user_id    integer not null references users(id) unique,
	first_name character varying not null default '',
	last_name  character varying not null default '',
	gender     integer not null default 0,
	birthday   date not null default null,
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


-- Tags
--------------------------------------------------------------------------------
drop table if exists tags cascade;
create table tags (
	id              serial primary key,
	name            character varying not null unique,
	flashcard_count integer not null default 0,
	created         timestamp without time zone default null
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


--------------------------------------------------------------------------------
commit;


