CREATE TABLE players (
    player_id VARCHAR(50) NOT NULL,
    game VARCHAR(50) NOT NULL,
    player_name VARCHAR(255) DEFAULT 'Unspecified',
    team_name VARCHAR(50) NOT NULL,
    location VARCHAR(255) DEFAULT 'Unspecified',
    role VARCHAR(40) DEFAULT 'Unspecified',
    PRIMARY KEY (player_id, game)
);


CREATE TABLE overwatch_stats (
    player_id VARCHAR(50) NOT NULL,
    hero_list VARCHAR(255) DEFAULT '', 
    percent_played VARCHAR(255) DEFAULT '',
    elim FLOAT(6, 4) DEFAULT '0',
    death FLOAT(6, 4) DEFAULT '0',
    damage FLOAT(10, 4) DEFAULT '0',
    healing FLOAT(10,4) DEFAULT '0',
    final_blow FLOAT(6, 4) DEFAULT '0',
    PRIMARY KEY (player_id)
);


CREATE TABLE dota_stats (
    player_id VARCHAR(50) NOT NULL,
    lane VARCHAR(255) DEFAULT 'Unspecified',
    win_percent_general FLOAT(10, 3) DEFAULT '0',
    kda_general FLOAT(6, 4) DEFAULT '0',
    hero_list VARCHAR(255) DEFAULT '',
    hero_matches VARCHAR(255) DEFAULT '',
    hero_win_percent VARCHAR(255) DEFAULT '',
    hero_kda VARCHAR(255) DEFAULT '',
    PRIMARY KEY (player_id) 
);


CREATE TABLE teams (
    team_name VARCHAR(50) NOT NULL,
    game VARCHAR(25) NOT NULL,
    division VARCHAR(25) DEFAULT 'Unspecified',
    location VARCHAR(50) DEFAULT 'Unspecified',
    win INT DEFAULT '0',
    lose INT DEFAULT '0',
    tie INT DEFAULT '0',
    world_rank INT DEFAULT '0',
    PRIMARY KEY (team_name, game)
);


CREATE TABLE matches (
    match_id INT NOT NULL auto_increment,
    start_time DATETIME DEFAULT '2020-01-01 00:11:00',
    end_time DATETIME DEFAULT '2020-01-01 00:12:00',
    team1 VARCHAR(50) DEFAULT 'Unspecified',
    team2 VARCHAR(50),
    result VARCHAR(50),
    payout1 DECIMAL(8,3) DEFAULT '1.0',
    payout2 DECIMAL(8,3) DEFAULT '1.0',
    PRIMARY KEY (match_id)
);


CREATE TABLE bets (
    user_id VARCHAR(16),
    match_id INT,
    transaction_id INT,
    team_choice VARCHAR(50),
    PRIMARY KEY (transaction_id, user_id, match_id)
);


CREATE TABLE transactions (
    transaction_id INT NOT NULL auto_increment,
    datetime TIMESTAMP NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (transaction_id)
);


CREATE TABLE users (
    username VARCHAR(64) NOT NULL,
    password VARCHAR(64) NOT NULL,
    role VARCHAR(64) NOT NULL,
    PRIMARY KEY (username)
);


CREATE TABLE users_general (
    balance DECIMAL(10,2) NOT NULL,
    user_id VARCHAR(50) NOT NULL,
    followed_player VARCHAR(2000) DEFAULT '',
    followed_team VARCHAR(2000) DEFAULT '',
    name VARCHAR(200) DEFAULT 'Unspecified',
    location VARCHAR(200) DEFAULT 'Unspecified',
    address VARCHAR(500)DEFAULT 'Unspecified',
    PRIMARY KEY (user_id)
);


CREATE TABLE media_links (
    name VARCHAR(50) NOT NULL,
    type VARCHAR(50) NOT NULL,
    twitter VARCHAR(2083) DEFAULT 'N/A',
    twitch VARCHAR(2083) DEFAULT 'N/A',
    facebook VARCHAR(2083) DEFAULT 'N/A',
    instagram VARCHAR(2083) DEFAULT 'N/A',
    youtube VARCHAR(2083) DEFAULT 'N/A',
    discord VARCHAR(2083) DEFAULT 'N/A',
    PRIMARY KEY (name, type)
);

