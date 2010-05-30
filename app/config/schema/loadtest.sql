
-- Users
--------------------------------------------------------------------------------
SET @I = 0;
--
SET @username = STRING(5, 15, 1);
SET @created  = DATETIME('2009-01-01 14:00:00', '2010-05-10 15:00:00', 1);
--
WHILE @I < 100
BEGIN
	INSERT INTO users(username, email, password, created, updated)
	VALUES (lower('@username'), lower('@username\@gmail.com'), '0c3271509ae2990522fc1ed2dee66fde12c8c265', '@created', '@created');
	SET @I = @I + 1;
END


-- Profiles
--------------------------------------------------------------------------------
SET @I = 0;
--
SET @user_id    = REFERENCE('users', 'id', 1);
SET @first_name = STRING(5, 15, 1);
SET @last_name  = STRING(5, 15, 1);
SET @gender     = INTEGER(1, 2);
SET @birthday   = DATE('1986-01-01', '2000-12-01', 1);
SET @created    = DATETIME ('2009-01-01 14:00:00', '2010-05-10 15:00:00', 1);
--
WHILE @I < 400
BEGIN
	INSERT INTO profiles(user_id, first_name, last_name, gender, birthday, created, updated)
	VALUES ('@user_id', '@first_name', '@last_name', @gender, '@birthday', '@created', '@created');
	SET @I = @I + 1;
END


-- User Messages
--------------------------------------------------------------------------------
SET @I = 0;
--
SET @user_id  = REFERENCE('users', 'id', 1);
SET @from_id  = REFERENCE('users', 'id', 0);
SET @message  = STRING(3, 8, 20);
SET @created  = DATETIME('2009-01-01 14:00:00', '2010-05-10 15:00:00', 1);
--
WHILE @I < 300
BEGIN
	INSERT INTO user_messages(user_id, from_id, message, created)
	VALUES (@user_id, @from_id, lower('@message'), '@created');
	SET @I = @I + 1;
END


-- Groups
--------------------------------------------------------------------------------
SET @I = 0;
--
SET @owner_id         = REFERENCE('users', 'id', 1);
SET @name             = STRING(5, 10, 3);
SET @description      = STRING(3, 8, 25);
SET @membership_count = INTEGER(0, 200);
SET @created          = DATETIME('2009-01-01 14:00:00', '2010-05-10 15:00:00', 1);
--
WHILE @I < 30
BEGIN
	INSERT INTO groups(owner_id, name, description, membership_count, created, updated)
	VALUES (@owner_id, '@name', lower('@description'), @membership_count, '@created', '@created');
	SET @I = @I + 1;
END


-- Group Messages
--------------------------------------------------------------------------------
SET @I = 0;
--
SET @group_id = REFERENCE('groups', 'id', 1);
SET @user_id  = REFERENCE('users', 'id', 0);
SET @message  = STRING(3, 8, 20);
SET @created  = DATETIME('2009-01-01 14:00:00', '2010-05-10 15:00:00', 1);
--
WHILE @I < 300
BEGIN
	INSERT INTO group_messages(group_id, user_id, message, created, updated)
	VALUES (@group_id, @user_id, lower('@message'), '@created', '@created');
	SET @I = @I + 1;
END


-- Tags
--------------------------------------------------------------------------------
SET @I = 0;
--
SET @name            = STRING(7, 12, 1);
SET @flashcard_count = INTEGER(2, 50);
SET @created         = DATETIME('2009-01-01 14:00:00', '2010-05-10 15:00:00', 1);
--
WHILE @I < 50
BEGIN
	INSERT INTO tags(name, flashcard_count, created)
	VALUES (lower('@name'), @flashcard_count, '@created');
	SET @I = @I + 1;
END


-- Memberships
--------------------------------------------------------------------------------
SET @I = 0;
--
SET @group_id = REFERENCE('groups', 'id', 1);
SET @user_id  = REFERENCE('users', 'id', 0);
SET @created  = DATETIME('2009-01-01 14:00:00', '2010-05-10 15:00:00', 1);
--
WHILE @I < 500
BEGIN
	INSERT INTO memberships(group_id, user_id, created)
	VALUES (@group_id, @user_id, '@created');
	SET @I = @I + 1;
END


-- friendships
--------------------------------------------------------------------------------
SET @I = 0;
--
SET @user_id    = REFERENCE('users', 'id', 1);
SET @friend_id  = REFERENCE('users', 'id', 0);
SET @created    = DATETIME('2009-01-01 14:00:00', '2010-05-10 15:00:00', 1);
--
WHILE @I < 500
BEGIN
	INSERT INTO friendships(user_id, friend_id, created)
	VALUES (@user_id, @friend_id, '@created');
	SET @I = @I + 1;
END

