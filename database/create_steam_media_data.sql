create table steam_media_data(
    steam_appid int not NULL,
    header_image TEXT,
    screenshoots TEXT,
    background TEXT,
    movie TEXT,
    primary key (steam_appid)
);

load data local infile './steam_media_data.csv'
into table steam_media_data
fields terminated by ','
OPTIONALLY ENCLOSED BY  '\"'
lines terminated by '\r\n'
ignore 1 lines;