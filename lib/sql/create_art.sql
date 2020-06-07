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


# Artwork data
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