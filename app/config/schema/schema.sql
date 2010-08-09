

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
	created         timestamp without time zone default null,
	updated         timestamp without time zone default null
);


-- Profiles
--------------------------------------------------------------------------------
drop table if exists profiles cascade;
create table profiles (
	id         serial primary key,
	user_id    integer not null references users(id) unique,
	city_id    integer not null references cities(id),
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


-- Decks
--------------------------------------------------------------------------------
drop table if exists decks cascade;
create table decks (
	id serial primary key,
	user_id   integer not null references users(id),
	title     character varying not null,
	created   timestamp without time zone default null,
	updated   timestamp without time zone default null,
	unique (user_id, title)
);


-- Flashcards
--------------------------------------------------------------------------------
drop table if exists flashcards cascade;
create table flashcards (
	id        serial primary key,
	user_id   integer not null references users(id),
	deck_id   integer not null references decks(id),
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
	views        integer not null default 0,
	hits         integer not null default 0,
	created      timestamp without time zone default null,
	updated      timestamp without time zone default null,
	unique (flashcard_id, user_id)
);


-- Decks x Users
--------------------------------------------------------------------------------
drop table if exists decks_users cascade;
create table decks_users (
	id      serial primary key,
	deck_id integer not null references decks(id),
	user_id integer not null references users(id),
	created timestamp without time zone default null,
	unique (deck_id, user_id)
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


--------------------------------------------------------------------------------
commit;


