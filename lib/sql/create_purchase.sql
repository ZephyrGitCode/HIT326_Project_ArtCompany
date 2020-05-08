USE art_db;

CREATE TABLE `purchase` (
  purchaseNo int(11) NOT NULL auto_increment,
  PRIMARY KEY (purchaseNo),
  user_email varchar(60) NOT NULL,
  CONSTRAINT FOREIGN KEY (user_email) REFERENCES users(email),
  pdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;