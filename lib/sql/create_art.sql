USE art_db;

CREATE TABLE `art` (
  artNo int(11) NOT NULL auto_increment,
  title varchar(40) NOT NULL,
  artdesc varchar(255) NOT NULL,
  price float(24) NOT NULL,
  category varchar(25) NOT NULL,
  size varchar(25) NOT NULL,
  link varchar(255) NOT NULL,
  PRIMARY KEY (artNo)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
