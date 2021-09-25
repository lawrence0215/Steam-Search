create table steam_support_info(
	steam_appid int not NULL,
    website TEXT,
    support_url TEXT,
    support_email TEXT,
    primary key (steam_appid)
    );
    
load data local infile './steam_support_info.csv'
into table steam_support_info
fields terminated by ','
OPTIONALLY enclosed by '"'
lines terminated by '\n'
ignore 1 lines;
