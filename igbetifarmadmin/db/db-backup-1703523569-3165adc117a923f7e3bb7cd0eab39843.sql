DROP TABLE IF EXISTS ad_info;

CREATE TABLE `ad_info` (
  `ad_id` int(200) NOT NULL AUTO_INCREMENT,
  `cat_id` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sub_cat_id` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ad_title` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ad_description` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ad_price` float NOT NULL,
  `ad_location` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ad_phone` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ad_feature_image` text NOT NULL,
  `multiple_images` text NOT NULL,
  `user_id` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 Active = 0 In-Active',
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO ad_info VALUES("15","99","42","Modi mollit quae aut","Aut facere nemo et fasdfasfasfscac adsddasd adsdas","39500","Qui mollitia obcaeca","63252334","17015942431.jpg","170159424313.jpg","1","1"),
("16","99","44","Rerum dolorem commod","Et et ipsa irure so dfdf sdfsdfsd hghgh sfsf dfsf fsdfs","4350","Minima cum deserunt ","80696786","17015943911.jpg","170159439113.jpg","1","1"),
("17","99","47","Enim delectus velit","Id aut iste quia qui","19200","Autem ea voluptatem","44068987","17015953121.jpg","170159531213.jpg","1","1"),
("18","99","49","Nihil et blanditiis ","Aperiam facilis eos ","44300","Consequatur Archite","425463434","17015954131.jpg","170159541313.jpg","1","1"),
("19","99","48","Eiusmod aut nisi qua","Adipisci aut exercit","8400","Esse aute ducimus a","2634254634","17015955261.jpg","170159552613.jpg","1","1"),
("20","99","44","Nemo ut eaque amet ","Reprehenderit sit e sdasdasd","614","Soluta amet dolorem","335674564","17015956771.jpg","170159567713.jpg","1","1"),
("21","99","43","Eligendi iure exerci","Culpa sapiente et c","450","Quia tempore suscip","2654346236","17015957761.jpg","170159577613.jpg","1","1"),
("22","99","47","Aliquip iste exceptu","Dolor veritatis irur","3840","Reprehenderit reici","8624343424","17015958971.jpg","170159589713.jpg","1","1"),
("23","99","42","Et dolore recusandae","Perferendis quisquam jbkk mmjakk kasnns quisquam sksdn cjjs mwqsssm","7500","Qui non molestiae eu","91354675687","17015959971.jpg","170159599713.jpg","1","1"),
("24","99","47","Iste incididunt numq","Quis cillum et dolor dornkjee dfsjbfkso sdkjfodbfje skjbkueibkjc ","278000","Vel velit beatae bla","6778675566","17015962461.jpg","170159624613.jpg","1","1"),
("25","99","50","tiller & cultivator","Dolor sint in place dfsdf dfsdfc dsfsdf r sint in place as vd vgfg sdefd ","7480","Harum dolor deserunt","8163579256","17016871051.jpg","170168710513.jpg","1","1");



DROP TABLE IF EXISTS banner;

CREATE TABLE `banner` (
  `bannre_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_img` varchar(200) NOT NULL,
  `publish` varchar(200) NOT NULL,
  PRIMARY KEY (`bannre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO banner VALUES("3","slider-1.jpg","1"),
("6","slider-2.jpg","1"),
("7","slider-3.jpg","1"),
("8","slider-8.jpg","1"),
("9","slider-4.jpg","1"),
("10","slider-5.jpg","1"),
("11","slider-6.jpg","1"),
("12","slider-7.jpg","1");



DROP TABLE IF EXISTS carts;

CREATE TABLE `carts` (
  `cart_id` int(200) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_selling_price` float NOT NULL,
  `in_stock` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` float NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1463 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS categories;

CREATE TABLE `categories` (
  `cat_id` int(200) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(200) NOT NULL,
  `cat_desc` longtext NOT NULL,
  `sortinfo` varchar(200) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO categories VALUES("99","CEREALS & GRAINS","1",""),
("100","ROOTS & TUBERS","2",""),
("101","MACHINERY & EQUIPMENT","3",""),
("102","FRUITS","4",""),
("103","LIVESSTOCK","5",""),
("104","FLOURICULTURE","6",""),
("105","VEGETABLES","7",""),
("106","FIBER","8",""),
("107","BIOMASS","9",""),
("108","OIL SEED","10",""),
("110","AQUACULTURE","12",""),
("111","SEA FOOD","13",""),
("112","MEAT & POUTRY","14",""),
("113","OTHER AGRO PRODUCTS","15",""),
("114","FOOD & BEVERAGES","16",""),
("115","AGRI TOURISM","16",""),
("116","AGRICULTURAL LOAN","17",""),
("117","JOB & SERVICES","18",""),
("118","REPAIR & CONSTRUCTION","19",""),
("119","AGRO CHEMICAL","20",""),
("120","AGRO INDUSTRIES","21",""),
("121","TRANSPORTATION PRODUCTS","22",""),
("122","STORAGE & WAREHOUSE","23","");



DROP TABLE IF EXISTS customers;

CREATE TABLE `customers` (
  `cust_id` int(200) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(200) NOT NULL,
  `cust_add` varchar(200) NOT NULL,
  `cust_phone` varchar(200) NOT NULL,
  `cust_type` varchar(200) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS expense_categories;

CREATE TABLE `expense_categories` (
  `expense_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_cat_name` varchar(80) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`expense_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS expenses;

CREATE TABLE `expenses` (
  `date` date NOT NULL,
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_cat_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`expense_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS footer_image;

CREATE TABLE `footer_image` (
  `f_id` int(255) NOT NULL AUTO_INCREMENT,
  `footer_top_image` text NOT NULL,
  `f_status` int(11) NOT NULL DEFAULT 0 COMMENT '0 activate= 1 deactivate',
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO footer_image VALUES("5","1701841925new.jpg","1"),
("6","17035234441701841925new.jpg","0");



DROP TABLE IF EXISTS order_items;

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `rate` varchar(200) NOT NULL,
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4353 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS orders;

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `cust_id` int(11) NOT NULL,
  `sub_total` float NOT NULL,
  `vat` float NOT NULL,
  `discount` float NOT NULL,
  `grand_total` float NOT NULL,
  `paid` float NOT NULL,
  `due` float NOT NULL,
  `cash` float NOT NULL,
  `changed` float NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `payment_status` varchar(11) NOT NULL,
  `date_time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4369 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS products;

CREATE TABLE `products` (
  `product_id` int(200) NOT NULL AUTO_INCREMENT,
  `cat_id` varchar(200) NOT NULL,
  `sub_cat_id` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `product_purchase_price` float NOT NULL,
  `product_selling_price` float NOT NULL,
  `product_qty` varchar(200) NOT NULL,
  `product_image` text NOT NULL,
  `supplier_id` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=InnoDB AUTO_INCREMENT=1505 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS raw_products;

CREATE TABLE `raw_products` (
  `raw_product_id` int(200) NOT NULL,
  `date` date NOT NULL,
  `raw_product_name` varchar(200) NOT NULL,
  `raw_product_code` varchar(200) NOT NULL,
  `raw_product_purchase_price` float NOT NULL,
  `raw_product_qty` varchar(200) NOT NULL,
  `raw_product_image` text NOT NULL,
  `supplier_id` varchar(100) NOT NULL,
  `comments` longtext NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO raw_products VALUES("0","2023-06-02","Beef 10 Kg","91","8000","10","1685701335","10","Paid Fully"),
("0","2023-06-02","Tomatto 2 Kg","92","200","20","1685701453toamtto.jpeg","10","Fully Paid");



DROP TABLE IF EXISTS settings;

CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `system_name` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `vat` float NOT NULL,
  `stock_warning_limit` int(11) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `vat_reg_no` varchar(30) NOT NULL,
  `logo` text NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO settings VALUES("1","IGBT","IGBT Admin","Dhaka","+8801629581211","igbt@yahoo.conm","0","10","","","1685706549reslogo.jpg");



DROP TABLE IF EXISTS staffs;

CREATE TABLE `staffs` (
  `staff_id` int(5) NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(45) NOT NULL,
  `identification_no` varchar(35) NOT NULL,
  `address` varchar(68) NOT NULL,
  `phone` varchar(46) NOT NULL,
  `staff_image` text NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO staffs VALUES("1","Mr karim","1515456454","Dhaka","01625441","16785257238dbc8903-050f-42be-b4e6-63e1baf50c55.jpg"),
("2","Mr Tilok","324242432","Dhaka","9324234243","1685708555user8-128x128.jpg");



DROP TABLE IF EXISTS sub_categories;

CREATE TABLE `sub_categories` (
  `sub_cat_id` int(200) NOT NULL AUTO_INCREMENT,
  `sub_cat_name` varchar(200) NOT NULL,
  `sub_cat_desc` text NOT NULL,
  `cat_id` int(200) NOT NULL,
  PRIMARY KEY (`sub_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO sub_categories VALUES("42","Rice ( Oryza sativa) ","1","99"),
("43","name2","","99"),
("44","name3","","99"),
("45","name4","","99"),
("46","name5","","99"),
("47","name6","","99"),
("48","name7","","99"),
("49","name8","","99"),
("50","name9","","99"),
("51","GROUNDNUTS IN SHELL","24","108");



DROP TABLE IF EXISTS suppliers;

CREATE TABLE `suppliers` (
  `supplier_id` int(200) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(200) NOT NULL,
  `supplier_description` varchar(200) NOT NULL,
  `supplier_phone` varchar(20) NOT NULL,
  `supplier_email` varchar(50) NOT NULL,
  `supplier_address` varchar(200) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS userinfo;

CREATE TABLE `userinfo` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_phone` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `user_status` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO userinfo VALUES("1","Hasan","seller","123456","hasan@gmail.com","01746817782","","1");



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `admin_id` int(200) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `branch` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO users VALUES("13","zahid","e10adc3949ba59abbe56e057f20f883e","admin","central"),
("14","tilok","e10adc3949ba59abbe56e057f20f883e","admin",""),
("15","monir","e10adc3949ba59abbe56e057f20f883e","sales",""),
("16","hasan","e10adc3949ba59abbe56e057f20f883e","report","");



DROP TABLE IF EXISTS wastages;

CREATE TABLE `wastages` (
  `wastage_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` float NOT NULL,
  `details` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`wastage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




