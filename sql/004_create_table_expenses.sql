CREATE TABLE IF NOT EXISTS `Expenses` (
    `id` INT NOT NULL AUTO_INCREMENT
    ,`party_id` INT(8) NOT NULL
    ,`user_id` INT NOT NULL
    ,`amount` INT NOT NULL
    ,`for` VARCHAR(100) NOT NULL
    ,`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    ,PRIMARY KEY (`id`)
    ,FOREIGN KEY (`party_id`) REFERENCES PartyUsers (`party_id`)
    ,FOREIGN KEY (`user_id`) REFERENCES PartyUsers (`user_id`)
)