CREATE TABLE IF NOT EXISTS `Orders`(
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `user_id` int,
    `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `total_price` bigint,
    `address` text,
    `payment_method` varchar(30),
    `money_recieved` bigint,
    `first_name` varchar(30),
    `last_name` varchar(30),
    FOREIGN KEY (`user_id`) REFERENCES Users(`id`)
)