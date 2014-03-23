INSERT INTO users (username, password, name) 
    VALUES ('joku', 'salasana', 'Reino');

INSERT INTO polls (topic, description, start_date, end_date, user_id)
    VALUES ('Onko kissat kivoja?', 'Kissa', '2014-01-01', '2014-03-30', 1);

INSERT INTO votes (cast_date, poll_id, user_id)
    VALUES ('2014-01-02', 1, 1);

INSERT INTO voteoptions (option_name, vote_count, poll_id)
    VALUES ('On!', 0, 1);
INSERT INTO voteoptions (option_name, vote_count, poll_id)
    VALUES ('Ei!', 0, 1); 
INSERT INTO voteoptions (option_name, vote_count, poll_id)
    VALUES ('Ehkä', 1, 1); 