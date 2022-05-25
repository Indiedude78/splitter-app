CREATE TABLE IF NOT EXISTS `Comments` (
    `id` INT NOT NULL AUTO_INCREMENT
    ,`comment_text` TEXT NOT NULL
    ,`c_user_id` INT NOT NULL
    ,`c_party_id` INT NOT NULL
    ,`created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ,PRIMARY KEY (`id`)
    ,FOREIGN KEY (`c_user_id`) REFERENCES Users (`id`)
    ,FOREIGN KEY (`c_party_id`) REFERENCES Party (`id`) 
)