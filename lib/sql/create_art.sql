USE art_db;

CREATE TABLE `products` (
  id int(11) NOT NULL auto_increment,
  title varchar(40) NOT NULL,
  price float(24) NOT NULL,
  category varchar(25) NOT NULL,
  size varchar(25) NOT NULL,
  link varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;