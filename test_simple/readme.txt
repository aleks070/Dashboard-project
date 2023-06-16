-db_conn.php a modifier avant les test

-le reste est du plug and play

table users : 

CREATE TABLE users (
    id int(11) NOT NULL AUTO_INCREMENT,
    user_name varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
);