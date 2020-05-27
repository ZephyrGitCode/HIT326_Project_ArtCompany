USE art_db;

CREATE TABLE `purchaseitem` (
  itemNo int(11) NOT NULL auto_increment,
  PRIMARY KEY (itemNo),
  purchaseNo int(11) NOT NULL,
  CONSTRAINT FOREIGN KEY (purchaseNo) REFERENCES purchase(purchaseNo),
  artNo int(11) NOT NULL,
  CONSTRAINT FOREIGN KEY (artNo) REFERENCES art(artNo),
  quantity int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

# purchaseitem
INSERT INTO `purchaseitem` (`itemNo`, `purchaseNo`, `artNo`, `quantity`) VALUES (NULL, '1', '1', '2');
INSERT INTO `purchaseitem` (`itemNo`, `purchaseNo`, `artNo`, `quantity`) VALUES (NULL, '2', '1', '1');
