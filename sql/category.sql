USE noticesystem;
CREATE TABLE category
(
id INT NOT NULL AUTO_INCREMENT,
name varchar(100) UNIQUE NOT NULL REFERENCES notice(category),
PRIMARY KEY(id)
);