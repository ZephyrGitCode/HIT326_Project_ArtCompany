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