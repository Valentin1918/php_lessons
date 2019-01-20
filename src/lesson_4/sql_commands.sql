CREATE TABLE `categories` (
`id` INT(11) NOT NULL AUTO_INCREMENT,
`name` VARCHAR(255) NOT NULL,
`description` TEXT,
PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `products` (
`id` INT(11) NOT NULL AUTO_INCREMENT,
`category_id` INT(11) NOT NULL,
`name` VARCHAR(255) NOT NULL,
`price` DECIMAL(12,2) NOT NULL,
`description` TEXT,
PRIMARY KEY (`id`)
) ENGINE = InnoDB;

DROP TABLE categories;

INSERT INTO categories (name, description) VALUES
('Phones', 'Apple iPphone, Samsung, e.t.c');

INSERT INTO categories (name, description) VALUES
('Monitors', '2k, 4k e.t.c'),
('HDD', 'HDD drives up to 2Tb'),
('Keyboards and mouses', 'Many items');

INSERT INTO products (category_id, name, price, description) VALUES
(1, 'iPhone 7', 500, 'Amazing phone'),
(1, 'iPhone 8', 600, 'Amazing phone'),
(2, 'Dell monitor', 300, 'Awesome monitor'),
(3, 'Seagate 1Tb', 300, 'Seagate 1Tb HDD drive'),
(4, 'Microsoft keyboard', 50, 'Microsoft keyboard');

ALTER TABLE products ADD COLUMN keywords VARCHAR(255);
ALTER TABLE products MODIFY keywords TEXT;
ALTER TABLE products DROP COLUMN keywords;
ALTER TABLE products DROP COLUMN description; /*delete column*/

SELECT * FROM products;
SELECT name FROM products;
SELECT name, id FROM products;
SELECT MAX(id) FROM products;
SELECT MAX(price) FROM products;
SELECT AVG(price) FROM products;
SELECT * FROM products WHERE category_id = 1;
SELECT * FROM products WHERE category_id = 1 LIMIT 10;
SELECT * FROM products WHERE category_id = 1 LIMIT 10 OFFSET 10;
SELECT MAX(price) FROM products WHERE category_id = 1;
SELECT category_id, MAX(price) FROM products GROUP BY category_id;
SELECT id, name, CONCAT(name, id) as trololo FROM products; --make other column

UPDATE products SET price = 60 WHERE category_id = 4;
UPDATE products SET price = price + 1; --incremented all rows
UPDATE products SET description = CONCAT(name, '; ' , description);

DELETE FROM products WHERE category_id = 4;
DELETE FROM products WHERE id = 3; /*#delete row*/

INSERT INTO table2 (column1, column2, column3, ...)
SELECT column1, column2, column3, ...
FROM table1
WHERE condition;
