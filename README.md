# UsersAddressBookMySQLPHP
Users address book/list from Mysql Database in PHP




online  http://userslist.cba.pl/


table users 
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `name` blob,
  `address` varchar(150)  NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
