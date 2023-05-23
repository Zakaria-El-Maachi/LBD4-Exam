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