<<<<<<< HEAD
CREATE DATABASE IF NOT EXISTS noticesystem;
USE noticesystem;
CREATE TABLE IF NOT EXISTS notice (
=======
<<<<<<< HEAD
CREATE DATABASE ns;
USE ns;
CREATE TABLE notice (
=======
CREATE DATABASE noticesystem;
USE noticesystem;
CREATE TABLE notice (A
>>>>>>> origin/master
>>>>>>> 855d16ba3bef7234de700af923918d0f5747b98f
  id int(11) NOT NULL auto_increment,
  title varchar(100) NOT NULL,
  description text NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO notice (title, description)
    VALUES  ('The  Military  Wives',  'In  My  Dreams');
INSERT INTO  notice (title, description)
    VALUES  ('Adele',  '21');
INSERT INTO notice (title, description)
    VALUES  ('Bruce  Springsteen',  'Wrecking Ball (Deluxe)');
INSERT INTO notice (title, description)
    VALUES  ('Lana  Del  Rey',  'Born  To  Die');
INSERT INTO notice (title, description)
<<<<<<< HEAD
    VALUES  ('Gotye',  'Making  Mirrors');
=======
    VALUES  ('Gotye',  'Making  Mirrors');
>>>>>>> origin/master
