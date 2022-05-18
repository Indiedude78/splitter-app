CREATE TABLE IF NOT EXISTS `Party` (
    `id` INT NOT NULL AUTO_INCREMENT
    ,`party_name` VARCHAR(60) NOT NULL
    ,`party_id` INT(8) NOT NULL
    ,`creator_id` INT NOT NULL
    ,`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    ,`is_settled` TINYINT(1) DEFAULT 0
    ,PRIMARY KEY(`id`)
    ,UNIQUE (`party_id`)
    ,FOREIGN KEY (`creator_id`) REFERENCES `Users`(`id`)
)