CREATE TABLE IF NOT EXISTS Ratings(
    id int AUTO_INCREMENT PRIMARY  KEY,
    product_id int,
    user_id int,
    rating tinyint,
    comment text,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    check (rating >= 0 AND rating <= 5), -- rating must be between 0 and 5
    FOREIGN KEY (`user_id`) REFERENCES Users(`id`),
    FOREIGN KEY (`product_id`) REFERENCES Products(`id`)
)