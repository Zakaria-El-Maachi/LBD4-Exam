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
    title varchar(100) not null,
    descr varchar(2000) not null,
    startDate date not null,
    endDate date not null
);

create table candidates(
    candidateId integer primary key auto_increment,
    electionId integer not null,
    candidateName varchar(2000) not null,
    photo varchar(200) not null,
    foreign key (electionId) references elections(electionId) on delete cascade
);

create table votes(
    voteId integer primary key auto_increment,
    electionId integer not null,
    userId integer not null,
    vote integer not null,
    SDate date not null,
    foreign key (userId) references users(userid) on delete cascade,
    foreign key (electionId) references elections(electionId) on delete cascade,
    foreign key (vote) references candidates(candidateId) on delete cascade
);

create table programs(
    programId integer primary key auto_increment,
    candidateId integer not null,
    title varchar(2000) not null,
    descr varchar(200) not null,
    vid varchar(200) not null,
    affiche varchar(200) not null,
    foreign key (candidateId) references candidates(candidateId) on delete cascade
);


insert into users values (1, "zakaria", "zakaria.elmaachi@um6p.ma","$2y$10$M7/iYaATJbDYSp3neG2FZu1dpfAB6KEurhy1rjxiUyx26ViE01HhG" ,1);

insert into elections values (1, "delegate", "", "2016-11-01" , "2018-11-01");
insert into elections values (2, "quoi", "", "2015-11-01" , "2019-11-01");
insert into elections values (3, "como", "", "2013-11-01" , "2020-11-01");

insert into candidates values (1, 1,"Zakaria", "https://img.freepik.com/free-photo/portrait-handsome-young-boy_23-2148414490.jpg?size=626&ext=jpg&ga=GA1.2.1687857673.1684429251&semt=sph");
insert into candidates values (2, 1,"Aya", "https://img.freepik.com/free-photo/close-up-portrait-cheerful-glamour-girl-with-cute-make-up-smiling-white-teeth-looking-happy-camera-standing-blue-background_1258-70300.jpg?size=626&ext=jpg&ga=GA1.2.1687857673.1684429251&semt=sph");
insert into candidates values (3, 2,"Aziza", "https://img.freepik.com/free-photo/close-up-portrait-cheerful-glamour-girl-with-cute-make-up-smiling-white-teeth-looking-happy-camera-standing-blue-background_1258-70300.jpg?size=626&ext=jpg&ga=GA1.2.1687857673.1684429251&semt=sph");
insert into candidates values (4, 3,"Zineb", "https://img.freepik.com/free-photo/close-up-portrait-cheerful-glamour-girl-with-cute-make-up-smiling-white-teeth-looking-happy-camera-standing-blue-background_1258-70300.jpg?size=626&ext=jpg&ga=GA1.2.1687857673.1684429251&semt=sph");