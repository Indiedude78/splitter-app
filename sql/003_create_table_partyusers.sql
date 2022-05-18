CREATE TABLE IF NOT EXISTS `PartyUsers` (
    `id` INT NOT NULL AUTO_INCREMENT
    ,`party_id` INT NOT NULL
    ,`user_id` INT NOT NULL
    ,`is_creator` TINYINT(1) NOT NULL
    ,`created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ,PRIMARY KEY (`id`)
)