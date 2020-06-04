USE art_db;

CREATE TABLE `testimonial` (
  testNo int(11) NOT NULL auto_increment,
  PRIMARY KEY (testNo),
  id int(11) NOT NULL,
  CONSTRAINT FOREIGN KEY (id) REFERENCES users(id),
  artNo int(11) NOT NULL,
  CONSTRAINT FOREIGN KEY (artNo) REFERENCES art(artNo),
  test varchar(255) NOT NULL,
  approved VARCHAR(5) DEFAULT 'false'
) ENGINE=InnoDB AUTO_INCREMENT=1 CHARSET=utf8;

# testimonial insert
INSERT INTO `testimonial` (`id`, `artNo`, `test`) VALUES (1, 1, 'Great product');