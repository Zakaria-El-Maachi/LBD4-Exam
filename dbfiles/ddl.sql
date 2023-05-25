drop database if exists Voting;
create database Voting;
use Voting;

create table users(
    userId integer primary key auto_increment,
    username varchar(100) not null,
    email varchar(100) not null,
    passwrd varchar(200) not null,
    isAdmin boolean not null
);

create table elections(
    electionId integer primary key auto_increment,
    title varchar(300) not null,
    descr varchar(10000) not null,
    startDate date not null,
    endDate date not null
);

create table candidates(
    candidateId integer,
    electionId integer not null,
    candidateName varchar(100) not null,
    photo varchar(400) not null,
    primary key (candidateId, electionId),
    foreign key (candidateId) references users(userId) on delete cascade,
    foreign key (electionId) references elections(electionId) on delete cascade
);

create table votes(
    electionId integer not null,
    userId integer not null,
    vote integer not null,
    SDate date not null,
    primary key(electionId, userId),
    foreign key (userId) references users(userid) on delete cascade,
    foreign key (electionId) references elections(electionId) on delete cascade,
    foreign key (vote) references candidates(candidateId) on delete cascade
);

create table programs(
    programId integer primary key auto_increment,
    candidateId integer not null,
    title varchar(300) not null,
    descr varchar(10000) not null,
    vid varchar(400) not null,
    flyer varchar(400) not null,
    foreign key (candidateId) references candidates(candidateId) on delete cascade
);

-- UserId must not be null
-- foreign key (candidateId) references users(userId) on delete cascade

create table candidateRequests(
    electionId integer not null,
    userId integer not null,
    photo varchar(400) not null,
    title varchar(300) not null,
    descr varchar(10000) not null,
    vid varchar(400) not null,
    flyer varchar(400) not null,
    primary key(electionId, userId),
    foreign key (electionId) references elections(electionId) on delete cascade
);


insert into users values (1, "zakaria", "zakaria.elmaachi@um6p.ma","$2y$10$M7/iYaATJbDYSp3neG2FZu1dpfAB6KEurhy1rjxiUyx26ViE01HhG" ,1);

insert into elections values (1, "delegate", "", "2016-11-01" , "2018-11-01");
insert into elections values (2, "quoi", "", "2015-11-01" , "2019-11-01");
insert into elections values (3, "como", "", "2013-11-01" , "2020-11-01");

insert into candidates values (1, 1,"Zakaria", "https://img.freepik.com/free-photo/portrait-handsome-young-boy_23-2148414490.jpg?size=626&ext=jpg&ga=GA1.2.1687857673.1684429251&semt=sph");
insert into candidates values (2, 1,"Aya", "https://img.freepik.com/free-photo/close-up-portrait-cheerful-glamour-girl-with-cute-make-up-smiling-white-teeth-looking-happy-camera-standing-blue-background_1258-70300.jpg?size=626&ext=jpg&ga=GA1.2.1687857673.1684429251&semt=sph");
insert into candidates values (3, 1,"Abdellatif", "https://img.freepik.com/free-photo/portrait-handsome-young-boy_23-2148414490.jpg?size=626&ext=jpg&ga=GA1.2.1687857673.1684429251&semt=sph");
insert into candidates values (4, 2,"Aziza", "https://img.freepik.com/free-photo/close-up-portrait-cheerful-glamour-girl-with-cute-make-up-smiling-white-teeth-looking-happy-camera-standing-blue-background_1258-70300.jpg?size=626&ext=jpg&ga=GA1.2.1687857673.1684429251&semt=sph");
insert into candidates values (5, 3,"Zineb", "https://img.freepik.com/free-photo/close-up-portrait-cheerful-glamour-girl-with-cute-make-up-smiling-white-teeth-looking-happy-camera-standing-blue-background_1258-70300.jpg?size=626&ext=jpg&ga=GA1.2.1687857673.1684429251&semt=sph");

insert into programs values(1 , 1, "Nthg", "nthg", "jD97hNDiyvI", "https://img.freepik.com/free-photo/aerial-view-business-team_53876-124515.jpg?size=626&ext=jpg&ga=GA1.1.1687857673.1684429251&semt=sph");
insert into programs values(2 , 2, "Uniqueness", "the best", "JZjAg6fK-BQ", "");
insert into programs values(3 , 3, "Patience", "legendary", "sVx1mJDeUjY", "https://img.freepik.com/free-photo/futuristic-finance-digital-market-graph-user-interface-with-diagram-technology-hud-graphic-concept_90220-1365.jpg?size=626&ext=jpg&ga=GA1.1.1687857673.1684429251&semt=sph");
insert into programs values(4 , 4, "Love", "Angel", "JZjAg6fK-BQ", "");
insert into programs values(5 , 5, "Strength", "Principles", "sVx1mJDeUjY", "https://img.freepik.com/free-photo/futuristic-finance-digital-market-graph-user-interface-with-diagram-technology-hud-graphic-concept_90220-1365.jpg?size=626&ext=jpg&ga=GA1.1.1687857673.1684429251&semt=sph");
