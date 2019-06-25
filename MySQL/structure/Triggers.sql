DELIMITER $$

CREATE TRIGGER after_insert_user
	AFTER INSERT ON users
	FOR EACH ROW
	BEGIN
		INSERT INTO users_general (user_id, balance) VALUES (NEW.username, 0);

END$$

CREATE TRIGGER after_delete_user
	AFTER DELETE ON users
	FOR EACH ROW
	BEGIN
		DELETE FROM users_general WHERE users_general.user_id = OLD.username;

END$$


CREATE TRIGGER after_insert_team
	AFTER INSERT ON teams
	FOR EACH ROW
	BEGIN
		INSERT INTO media_links (name, type) VALUES (NEW.team_name, 'Team');

END$$


CREATE TRIGGER after_delete_team
	AFTER DELETE ON teams
	FOR EACH ROW
	BEGIN
		DELETE FROM media_links WHERE name = OLD.team_name;

END$$


CREATE TRIGGER after_insert_player
	AFTER INSERT ON players
	FOR EACH ROW
	BEGIN
		INSERT INTO media_links (name, type) VALUES (NEW.player_id, 'Player');

END$$


CREATE TRIGGER after_delete_player
	AFTER DELETE ON players
	FOR EACH ROW
	BEGIN
		DELETE FROM media_links WHERE name = OLD.player_id;

END$$

CREATE TRIGGER after_insert_player_OW
	AFTER INSERT ON players
	FOR EACH ROW
	BEGIN
		INSERT INTO overwatch_stats (player_id) VALUES (NEW.player_id);

END$$


CREATE TRIGGER after_delete_player_OW
	AFTER DELETE ON players
	FOR EACH ROW
	BEGIN
		DELETE FROM overwatch_stats WHERE player_id = OLD.player_id;

END$$

CREATE TRIGGER after_insert_player_DOTA
	AFTER INSERT ON players
	FOR EACH ROW
	BEGIN
		INSERT INTO dota2_stats (player_id) VALUES (NEW.player_id);

END$$


CREATE TRIGGER after_delete_player_DOTA
	AFTER DELETE ON players
	FOR EACH ROW
	BEGIN
		DELETE FROM dota2_stats WHERE player_id = OLD.player_id;

END$$