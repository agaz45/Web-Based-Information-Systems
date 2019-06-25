You may need to set up CakePHP now just in case.
You do not need cakePHP at the moment, it needs to have the existing database first.
Setting up connections and queries are easier with CakePHP though, as its all in the config file.

Setup:
1) Create a database and switch to it with "USE" command.
	-ie "create database esportsDB; use esports DB;"
2) Run the command "source /var/www/CMPT470/MySQL/MakeDB.sql;" to create all the tables and their connections/auto_increment variables, along with triggers on insert and delete actions for tables that need it.
	-If this does not work make sure you have the MySQL folder with the files in it.

And that's it!

NOTE: If you used the old database code, I would reccomend dropping the database going through these steps again, as some of the tables have been changed. 

Database creation and table structure are found in the structure foder, and data/population values are in the data folder. 

Let me know if you encounter any problems!
