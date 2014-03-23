CREATE TABLE users
(
user_id SERIAL PRIMARY KEY,
username varchar(15) UNIQUE NOT NULL,
password varchar(255) NOT NULL,
name varchar(30)
);

CREATE TABLE polls
(
poll_id SERIAL PRIMARY KEY,
topic varchar(50) NOT NULL,
description varchar(255),
start_date date NOT NULL,
end_date date NOT NULL,
user_id int REFERENCES users ON DELETE CASCADE
);

CREATE TABLE votes
(
vote_id SERIAL PRIMARY KEY,
cast_date date NOT NULL,
poll_id int REFERENCES polls ON DELETE CASCADE,
user_id int REFERENCES users ON DELETE CASCADE
);

CREATE TABLE voteoptions
(
option_id SERIAL PRIMARY KEY,
option_name varchar(50) NOT NULL,
vote_count int,
poll_id int REFERENCES polls ON DELETE CASCADE
);
