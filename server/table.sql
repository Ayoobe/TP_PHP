CREATE TABLE IF NOT EXISTS `event` (
    `event_id` INT(11) NOT NULL AUTO_INCREMENT,
    `event_price` DECIMAL(10,2) NOT NULL,  
    `event_name` VARCHAR(100) NOT NULL,
    `event_description` TEXT NOT NULL,
    `event_category` ENUM('workshop', 'congress', 'contest','hackathon') NOT NULL,
    `event_datetime` DATETIME NOT NULL,
    `event_image1` VARCHAR(255) NOT NULL,
    `event_image2` VARCHAR(255) NOT NULL,
    `event_image3` VARCHAR(255),
    `event_image4` VARCHAR(255),
    PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `orders` (
    `order_id` INT(11) NOT NULL AUTO_INCREMENT,
    `order_cost` DECIMAL(6,2) NOT NULL,
    `order_status` VARCHAR(100) NOT NULL DEFAULT 'Unpaid',
    `user_id` INT(11) NOT NULL,
    `user_phone` VARCHAR(10) NOT NULL,
    `user_email` VARCHAR(255) NOT NULL,
    `user_name` VARCHAR(255) NOT NULL,
    `user_university` VARCHAR(255) NOT NULL,
    `order_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `order_items` (
    `item_id` INT(11) NOT NULL AUTO_INCREMENT,
    `order_id` INT(11) NOT NULL,
    `event_id` VARCHAR(255) NOT NULL,
    `event_name` VARCHAR(255) NOT NULL,
    `event_image` VARCHAR(255) NOT NULL,
    `user_id` INT(11) NOT NULL,
    `order_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `users` (
    `user_id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(100) NOT NULL, 
    `user_email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`user_id`),
    UNIQUE KEY `UX_constraint` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE admin (
    admin_email VARCHAR(255) NOT NULL,
    admin_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    admin_name VARCHAR(100) NOT NULL
);
