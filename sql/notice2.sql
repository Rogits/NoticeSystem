CREATE DATABASE IF NOT EXISTS noticesystem;
USE noticesystem;
CREATE TABLE notice (
  id int(11) NOT NULL auto_increment,
  title varchar(100) NOT NULL,
  description text NOT NULL,
  /* new field */
  category varchar(100) NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO notice (title, description, category)
    VALUES  ('The  Military  Wives',  'In  My  Dreams', 'Choral');
INSERT INTO  notice (title, description, category)
    VALUES  ('Adele',  '21', 'Soft Rock');
INSERT INTO notice (title, description, category)
    VALUES  ('Bruce  Springsteen',  'Hard Rock');
INSERT INTO notice (title, description, category)
    VALUES  ('Lana  Del  Rey',  'Born  To  Die', 'Pop');
INSERT INTO notice (title, description, category)
    VALUES  ('Gotye',  'Making  Mirrors', 'Soft Rock');