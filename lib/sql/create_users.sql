USE art_db;

CREATE TABLE `users` (
  id int(11) NOT NULL auto_increment,
  PRIMARY KEY (id),
  title varchar(10),
  fname varchar(40) NOT NULL,
  lname varchar(40) NOT NULL,
  email varchar(60) NOT NULL,
  shipping_address varchar(120),
  city varchar(100),
  shipping_state char(3),
  country varchar(120),
  postcode varchar(4),
  phone varchar(12),
  # Assuming SHA256 hash
  hashed_password char(64) NOT NULL,
  # Assuming 16 chars in salt
  salt char(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

# Users
INSERT INTO `users` (`title`, `fname`, `lname`, `email`, `shipping_address`, `city`, `shipping_state`, `country`, `postcode`, `phone`, `hashed_password`, `salt`) VALUES ('Ms.', 'Sarah', 'smith', 'sarah@gmail.com', '21 Melody Street', 'Darwin', 'NT', 'Australia', '', '0474567321', '1234', '1234');
INSERT INTO `users` (`title`, `fname`, `lname`, `email`, `shipping_address`, `city`, `shipping_state`, `country`, `postcode`, `phone`, `hashed_password`, `salt`) VALUES ('Mr.', 'Zephyr', 'Dobson', 'zephyr.dobson@outlook.com', '21 Melody Street', 'Darwin', 'NT', 'Australia', '', '0474567321', '1234', '1234');