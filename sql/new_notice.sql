USE noticesystem;
CREATE TABLE notice (
  id int(11) NOT NULL auto_increment,
  title varchar(100) NOT NULL,
  description text NOT NULL,
  category varchar(100) NOT NULL,
  PRIMARY KEY (id)
);
