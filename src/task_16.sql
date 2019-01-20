CREATE TABLE `product_descriptions` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `language` VARCHAR(255) DEFAULT 'EN',
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO product_descriptions (name, description)
    SELECT name, description FROM products;

ALTER TABLE products
    DROP COLUMN name,
    DROP COLUMN description;

SELECT * FROM product_descriptions; -- for checking
SELECT * FROM products; -- for checking
