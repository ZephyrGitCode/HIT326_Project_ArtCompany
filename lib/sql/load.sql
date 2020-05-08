use art_db;

# Users
INSERT INTO `users` (`title`, `fname`, `lname`, `email`, `shipping_address`, `city`, `shipping_state`, `country`, `postcode`, `phone`, `hashed_password`, `salt`) VALUES ('Ms.', 'Sarah', 'O\'lachlan', 'sarah@gmail.com', '21 Melody Street', 'Darwin', 'NT', 'Australia', '', '0474567321', '1234', '1234');
INSERT INTO `users` (`title`, `fname`, `lname`, `email`, `shipping_address`, `city`, `shipping_state`, `country`, `postcode`, `phone`, `hashed_password`, `salt`) VALUES ('Mr.', 'Zephyr', 'Dobson', 'zephyr.dobson@outlook.com', '21 Melody Street', 'Darwin', 'NT', 'Australia', '', '0474567321', '1234', '1234');
# Artworks
INSERT INTO `art` (`artNo`, `title`, `artdesc`, `price`, `category`, `size`, `link`) VALUES (NULL, 'Sonic Meme', 'That one sonic meme', '12.50', 'Hand Drawn', '30x25 cm', 'https://i.ytimg.com/vi/IJo7HN4DR6U/maxresdefault.jpg');

# purchase
INSERT INTO `purchase` (`purchaseNo`, `user_email`, `pdate`) VALUES (NULL, 'zephyr.dobson@outlook.com', current_timestamp());
INSERT INTO `purchase` (`purchaseNo`, `user_email`, `pdate`) VALUES (NULL, 'sarah@gmail.com', '2020-05-08');

# purchaseitem
INSERT INTO `purchaseitem` (`itemNo`, `purchaseNo`, `artNo`, `quantity`) VALUES (NULL, '1', '1', '2');
INSERT INTO `purchaseitem` (`itemNo`, `purchaseNo`, `artNo`, `quantity`) VALUES (NULL, '2', '1', '1');
