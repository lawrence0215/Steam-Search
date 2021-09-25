create table steam_requirements_data(
	steam_appid int not NULL,
    pc_requirements TEXT,
    mac_requirements TEXT,
    linux_requirements TEXT,
    minimum TEXT,
    recommended TEXT,
    primary key (steam_appid)
    );
    
load data local infile './steam_requirements_data.csv' 
into table steam_requirements_data
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;