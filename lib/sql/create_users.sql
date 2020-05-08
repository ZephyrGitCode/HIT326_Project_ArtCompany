USE art_db;

CREATE TABLE `users` (
  id int(11) NOT NULL auto_increment,
  fname varchar(40) NOT NULL,
  lname varchar(40) NOT NULL,
  email varchar(60) NOT NULL,
  # Assuming SHA256 hash
  hashed_password char(64) NOT NULL,
  # Assuming 16 chars in salt
  salt char(16) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;