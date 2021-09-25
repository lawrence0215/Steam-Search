create table steam_description_data(
	steam_appid int not NULL,
    detailed_description TEXT,
    about_the_game TEXT,
    short_description TEXT,
    primary key (steam_appid)
    );
    
load data local infile './steam_description_data.csv'
into table steam_description_data
fields terminated by ','
OPTIONALLY ENCLOSED BY  '\"'
lines terminated by '\r\n'
ignore 1 lines;