USE art_db;

CREATE TABLE `users` (
  id int(11) NOT NULL auto_increment,
  PRIMARY KEY (id),
  title varchar(10),
  fname varchar(40) NOT NULL,
  lname varchar(40) NOT NULL,
  email varchar(60) NOT NULL,
  UNIQUE (email),
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

CREATE TABLE `purchase` (
  purchaseNo int(11) NOT NULL auto_increment,
  PRIMARY KEY (purchaseNo),
  id int(11) NOT NULL,
  CONSTRAINT FOREIGN KEY (id) REFERENCES users(id),
  pdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


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


CREATE TABLE `purchaseitem` (
  purchaseNo int(11) NOT NULL,
  artNo int(11) NOT NULL,
  quantity int(3) NOT NULL,
  PRIMARY KEY (purchaseNo, artNo),
  FOREIGN KEY (purchaseNo) REFERENCES purchase(purchaseNo) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (artNo) REFERENCES art(artNo) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

# Artworks
INSERT INTO `art` (`artNo`, `title`, `artdesc`, `price`, `category`, `size`, `link`) VALUES (NULL, 'Sonic Meme', 'That one sonic meme', '12.50', 'Hand Drawn', '60x55 cm', 'https://i.imgur.com/WijgGCs.png');
INSERT INTO `art` (`artNo`, `title`, `artdesc`, `price`, `category`, `size`, `link`) VALUES (NULL, 'Mona Lisa', 'Famous rendition', '70', 'Painted', '77x53 cm', 'https://i.imgur.com/eyKYGQG.jpg');
INSERT INTO `art` (`artNo`, `title`, `artdesc`, `price`, `category`, `size`, `link`) VALUES (NULL, 'Doge', 'Such painting. Much art.', '20', 'Painted', '60x60 cm', 'https://i.imgur.com/rfYJHXS.jpg');
INSERT INTO `art` (`artNo`, `title`, `artdesc`, `price`, `category`, `size`, `link`) VALUES (NULL, 'Starry Night', 'Depicts a wonderful view', '40', 'Painted', '73.7×92.1 cm', 'https://i.imgur.com/rOAvk9H.jpg');
INSERT INTO `art` (`artNo`, `title`, `artdesc`, `price`, `category`, `size`, `link`) VALUES (NULL, 'Big Chungus', 'He’s a big chunky boy', '30', 'Painted', '75x60 cm', 'https://i.imgur.com/9owPUb7.jpg');
INSERT INTO `art` (`artNo`, `title`, `artdesc`, `price`, `category`, `size`, `link`) VALUES (NULL, 'The Great Wave off Kanagawa', 'A powerful display of nature', '45', 'Painted', '26x38 cm', 'https://i.imgur.com/pjQd18j.jpg');
INSERT INTO `art` (`artNo`, `title`, `artdesc`, `price`, `category`, `size`, `link`) VALUES (NULL, 'Sans', 'Sans Undertale', '66.60', 'Painted', '75x65 cm', 'https://i.imgur.com/wyNwkli.png');
INSERT INTO `art` (`artNo`, `title`, `artdesc`, `price`, `category`, `size`, `link`) VALUES (NULL, 'Girl with a Pearl Earring', 'A beautiful figure', '60', 'Painted', '44x39 cm', 'https://i.imgur.com/CeFjsBd.jpg');
INSERT INTO `art` (`artNo`, `title`, `artdesc`, `price`, `category`, `size`, `link`) VALUES (NULL, 'Ugandan Knuckles', 'Do you know the way?', '15', 'Hand Drawn', '50x50 cm', 'https://i.imgur.com/cJwaIPk.jpg');
INSERT INTO `art` (`artNo`, `title`, `artdesc`, `price`, `category`, `size`, `link`) VALUES (NULL, 'The Persistence of Memory', 'Famous surrealism', '55', 'Painted', '30x25 cm', 'https://i.imgur.com/jn3dSsy.jpg');