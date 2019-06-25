LOAD DATA LOCAL INFILE '/var/www/CMPT470/MySQL/data/teams.csv' replace INTO TABLE teams FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';

LOAD DATA LOCAL INFILE '/var/www/CMPT470/MySQL/data/players.csv' replace INTO TABLE players FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';

source /var/www/CMPT470/MySQL/data/overwatchStats.sql;

source /var/www/CMPT470/MySQL/data/dotaStats.sql;

LOAD DATA LOCAL INFILE '/var/www/CMPT470/MySQL/data/matches.csv' replace INTO TABLE matches FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';

source /var/www/CMPT470/MySQL/data/transactions.sql;

LOAD DATA LOCAL INFILE '/var/www/CMPT470/MySQL/data/userAccounts.csv' replace INTO TABLE users FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';

LOAD DATA LOCAL INFILE '/var/www/CMPT470/MySQL/data/bets.csv' replace INTO TABLE bets FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';

LOAD DATA LOCAL INFILE '/var/www/CMPT470/MySQL/data/mediaLinks.csv' replace INTO TABLE media_links FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';

source /var/www/CMPT470/MySQL/data/generalUserInfo.sql;
