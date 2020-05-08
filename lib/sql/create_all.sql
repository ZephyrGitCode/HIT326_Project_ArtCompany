USE art_db;

CREATE TABLE `users` (
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
  salt char(16) NOT NULL,
  PRIMARY KEY (email)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

USE art_db;

CREATE TABLE `purchase` (
  purchaseNo int(11) NOT NULL auto_increment,
  PRIMARY KEY (purchaseNo),
  user_email varchar(60) NOT NULL,
  CONSTRAINT FOREIGN KEY (user_email) REFERENCES users(email),
  pdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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

use art_db;

# Users
INSERT INTO `users` (`title`, `fname`, `lname`, `email`, `shipping_address`, `city`, `shipping_state`, `country`, `postcode`, `phone`, `hashed_password`, `salt`) VALUES ('Ms.', 'Sarah', 'O\'lachlan', 'sarah@gmail.com', '21 Melody Street', 'Darwin', 'NT', 'Australia', '', '0474567321', '1234', '1234');
INSERT INTO `users` (`title`, `fname`, `lname`, `email`, `shipping_address`, `city`, `shipping_state`, `country`, `postcode`, `phone`, `hashed_password`, `salt`) VALUES ('Mr.', 'Zephyr', 'Dobson', 'zephyr.dobson@outlook.com', '21 Melody Street', 'Darwin', 'NT', 'Australia', '', '0474567321', '1234', '1234');

# Artworks
INSERT INTO `art` (`artNo`, `title`, `artdesc`, `price`, `category`, `size`, `link`) VALUES (NULL, 'Sonic Meme', 'That one sonic meme', '12.50', 'Hand Drawn', '30x25 cm', 'https://i.ytimg.com/vi/IJo7HN4DR6U/maxresdefault.jpg');
INSERT INTO `art` (`artNo`, `title`, `artdesc`, `price`, `category`, `size`, `link`) VALUES (NULL, 'Mona Lisa', 'Famous rendition', '50', 'Painted', '30cm x 40cm', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg/1200px-Mona_Lisa%2C_by_Leonardo_da_Vinci%2C_from_C2RMF_retouched.jpg');

# purchase
INSERT INTO `purchase` (`purchaseNo`, `user_email`, `pdate`) VALUES (NULL, 'zephyr.dobson@outlook.com', current_timestamp());
INSERT INTO `purchase` (`purchaseNo`, `user_email`, `pdate`) VALUES (NULL, 'sarah@gmail.com', '2020-05-08');

# purchaseitem
INSERT INTO `purchaseitem` (`itemNo`, `purchaseNo`, `artNo`, `quantity`) VALUES (NULL, '1', '1', '2');
INSERT INTO `purchaseitem` (`itemNo`, `purchaseNo`, `artNo`, `quantity`) VALUES (NULL, '2', '1', '1');
