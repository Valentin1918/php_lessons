ALTER TABLE product_descriptions ADD INDEX lang(lang);
ALTER TABLE category_descriptions ADD INDEX lang(lang);

-- then indicated below selector will procured quicker:

EXPLAIN SELECT
	p.*, pd.*, cd.*
FROM products p
JOIN product_descriptions pd
	ON p.id = pd.product_id
		AND pd.lang = 'eng'
JOIN categories c
	ON p.category_id = p.id
JOIN category_descriptions cd
	ON c.id = cd.category_id
		AND cd.lang = 'eng';
