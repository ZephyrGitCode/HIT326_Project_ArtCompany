USE art_db;

CREATE TABLE `purchase` (
  purchaseNo int(11) NOT NULL auto_increment,
  PRIMARY KEY (purchaseNo),
  id int(11) NOT NULL,
  CONSTRAINT FOREIGN KEY (id) REFERENCES users(id),
  pdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

# purchase
INSERT INTO `purchase` (`purchaseNo`, `id`, `pdate`) VALUES (NULL, 1, current_timestamp());
INSERT INTO `purchase` (`purchaseNo`, `id`, `pdate`) VALUES (NULL, 2, '2020-05-08');
