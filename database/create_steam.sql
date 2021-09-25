create table steam(
    appid int not NULL,
    name varchar(75) not NULL,
    release_date varchar(11),
    english tinyint,
    developer varchar(50),
    publisher varchar(50),
    platforms varchar(30),
    require_age int default 0,
    categories varchar(200),
    genres varchar(200),
    steamspy_tags varchar(200),
    achievements int default 0,
    positive_ratings int,
    negative_ratings int,
    average_playtime int,
    median_playtime int,
    owners varchar(40),
    price float,
    primary key(appid)
);

load data local infile './steam.csv'
into table steam
fields terminated by ','
enclosed by '"'
lines terminated by '\n'
ignore 1 lines;

