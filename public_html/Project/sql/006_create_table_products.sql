CREATE TABLE IF NOT EXISTS `Products` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(30) UNIQUE,
    `description` TEXT,
    `category` VARCHAR(30),
    `stock` INT DEFAULT 0,
    `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `modified` TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    `unit_price` BIGINT default 999999999, --going to store cost as pennies and divide by 100 to display value
    `visibility` TINYINT(1) default 0,
    CHECK(`stock`>=0),
    CHECK(`unit_price`>=0)
)