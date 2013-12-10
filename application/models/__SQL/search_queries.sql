--Hybrid:


SELECT DISTINCT 
t1.order_id, 
orders.contact_id, 
contacts.first_name,
products.product_name, t1.product_id

FROM order_items t1

/* Include one of these for each AND query */ 
JOIN order_items t2 USING (order_id)

/* Standard Joins */
JOIN orders ON orders.id=t1.order_id
JOIN contacts ON contacts.id=orders.contact_id
JOIN products ON products.id=t1.product_id


WHERE 

/* Include one of these for each AND query */
(t1.product_id = 36 AND t1.`owner_id`=22220 AND t1.`deleted`=0) 
AND (t2.product_id = 37 AND t2.`owner_id`=22220 AND t2.`deleted`=0)

/* ...or Include this for OR query*/
OR (t1.product_id=45 OR t1.product_id=46)


AND (t1.`owner_id`=22220 AND t1.`deleted`=0)
AND (orders.`owner_id`=22220 AND orders.`deleted`=0)
AND (contacts.`owner_id`=22220 AND contacts.`deleted`=0)
AND (products.`owner_id`=22220 AND products.`deleted`=0)

GROUP BY contacts.id




























--And
SELECT DISTINCT 
t1.order_id, 
orders.contact_id, 
contacts.first_name,
products.product_name

FROM order_items t1

JOIN order_items t2 USING (order_id)
JOIN orders ON orders.id=t2.order_id
JOIN contacts ON contacts.id=orders.contact_id
JOIN products ON products.id=t2.product_id


WHERE (t1.product_id = 36 AND t1.`owner_id`=22220 AND t1.`deleted`=0) AND (t2.product_id = 37 AND t2.`owner_id`=22220 AND t2.`deleted`=0)

AND (t2.`owner_id`=22220 AND t2.`deleted`=0)
AND (orders.`owner_id`=22220 AND orders.`deleted`=0)
AND (contacts.`owner_id`=22220 AND contacts.`deleted`=0)
AND (products.`owner_id`=22220 AND products.`deleted`=0)

GROUP BY contacts.id


--OR
SELECT DISTINCT
contacts.id as contact_id, 
t1.product_id as product_id, 
t1.id as order_id

FROM order_items t1
JOIN orders ON orders.id=t1.order_id
JOIN contacts ON contacts.id=orders.contact_id
JOIN products ON products.id=t1.product_id

WHERE 
(t1.product_id=35 OR t1.product_id=36)

AND (t1.`owner_id`=22220 AND t1.`deleted`=0)
AND (orders.`owner_id`=22220 AND orders.`deleted`=0)
AND (contacts.`owner_id`=22220 AND contacts.`deleted`=0)
AND (products.`owner_id`=22220 AND products.`deleted`=0)

GROUP BY contacts.id








































//OR query 

SELECT 
contacts.id as contact_id, 
order_items.product_id as product_id, 
order_items.id as order_id

FROM order_items
JOIN orders ON orders.id=order_items.order_id
JOIN contacts ON contacts.id=orders.contact_id
JOIN products ON products.id=order_items.product_id

WHERE 
(order_items.`owner_id`=22220 AND order_items.`deleted`=0)
AND (orders.`owner_id`=22220 AND orders.`deleted`=0)
AND (contacts.`owner_id`=22220 AND contacts.`deleted`=0)
AND (products.`owner_id`=22220 AND products.`deleted`=0)

AND (order_items.product_id=35 OR order_items.product_id=36)



/*~~~~ Do the AND query ~~~~*/
AND contacts.id IN
(
	SELECT contacts.id
	FROM order_items
	JOIN orders on orders.id=order_items.`order_id`
	JOIN contacts ON contacts.id=orders.contact_id
	WHERE
	(order_items.`owner_id`=22220 AND order_items.`deleted`=0)
	AND (orders.`owner_id`=22220 AND orders.`deleted`=0)
	AND (contacts.`owner_id`=22220 AND contacts.`deleted`=0)
	AND (order_items.product_id=35 OR order_items.product_id=36 OR order_items.product_id=39)
)

GROUP BY contacts.id



--=====================================

//NOT Query

SELECT
contacts.id as contact_id, 
order_items.product_id as product_id, 
order_items.id as order_id

FROM order_items
JOIN orders ON orders.id=order_items.order_id
JOIN contacts ON contacts.id=orders.contact_id
JOIN products ON products.id=order_items.product_id

WHERE 
(order_items.`owner_id`=22220 AND order_items.`deleted`=0)
AND (orders.`owner_id`=22220 AND orders.`deleted`=0)
AND (contacts.`owner_id`=22220 AND contacts.`deleted`=0)
AND (products.`owner_id`=22220 AND products.`deleted`=0)

/*~~~~ Do the NOT query ~~~~*/
AND contacts.id NOT IN
(
	SELECT contacts.id
	FROM order_items
	JOIN orders on orders.id=order_items.`order_id`
	JOIN contacts ON contacts.id=orders.contact_id
	WHERE
	(order_items.`owner_id`=22220 AND order_items.`deleted`=0)
	AND (orders.`owner_id`=22220 AND orders.`deleted`=0)
	AND (contacts.`owner_id`=22220 AND contacts.`deleted`=0)
	AND (order_items.product_id=35 OR order_items.product_id=36 OR order_items.product_id=39)
)

GROUP BY contacts.id


--====================================================

--=====================================

//AND Query

SELECT *
contacts.id as contact_id, 
order_items.product_id as product_id, 
order_items.id as order_id

FROM order_items
JOIN orders ON orders.id=t.order_id
JOIN contacts ON contacts.id=orders.contact_id
JOIN products ON products.id=t.product_id

WHERE 
(t.`owner_id`=22220 AND t.`deleted`=0)
AND (orders.`owner_id`=22220 AND orders.`deleted`=0)
AND (contacts.`owner_id`=22220 AND contacts.`deleted`=0)
AND (products.`owner_id`=22220 AND products.`deleted`=0)

/*~~~~ Do the NOT query ~~~~*/
AND contacts.id NOT IN
(
	SELECT contacts.id
	FROM order_items
	JOIN orders on orders.id=order_items.`order_id`
	JOIN contacts ON contacts.id=orders.contact_id
	WHERE
	(order_items.`owner_id`=22220 AND order_items.`deleted`=0)
	AND (orders.`owner_id`=22220 AND orders.`deleted`=0)
	AND (contacts.`owner_id`=22220 AND contacts.`deleted`=0)
	AND (order_items.product_id=35 OR order_items.product_id=36 OR order_items.product_id=39)
)

GROUP BY contacts.id


--====================================================



AND!!!

SELECT DISTINCT 
t1.order_id, 
orders.contact_id, 
contacts.first_name,
products.product_name

FROM order_items t1

JOIN order_items t2 USING (order_id)
JOIN orders ON orders.id=t2.order_id
JOIN contacts ON contacts.id=orders.contact_id
JOIN products ON products.id=t2.product_id

WHERE (t1.product_id = 36 AND t1.`owner_id`=22220 AND t1.`deleted`=0) AND (t2.product_id = 37 AND t2.`owner_id`=22220 AND t2.`deleted`=0)

AND (t2.`owner_id`=22220 AND t2.`deleted`=0)
AND (orders.`owner_id`=22220 AND orders.`deleted`=0)
AND (contacts.`owner_id`=22220 AND contacts.`deleted`=0)
AND (products.`owner_id`=22220 AND products.`deleted`=0)

GROUP BY contacts.id

























/* Query A: Find contacts with product A or product B or product C  */

-- SELECT orders.id, orders.`contact_id`, 
-- contacts.`first_name`, contacts.`last_name`,
-- order_items.`id` AS orderitemid, `order_items`.`product_id`,
-- products.`product_name`, products.`product_price`


-- FROM orders 
-- JOIN contacts ON contacts.id=orders.contact_id
-- JOIN order_items ON order_items.`order_id`=orders.`id`
-- JOIN products ON products.`id`=order_items.`product_id`

-- WHERE order_items.`product_id`=38 OR order_items.`product_id`=39 OR order_items.`product_id`=40
-- AND orders.`owner_id`=22220 AND orders.`deleted`=0
-- AND contacts.`owner_id`=22220 AND contacts.`deleted`=0
-- AND order_items.`owner_id`=22220 AND order_items.`deleted`=0

-- GROUP BY contacts.`id`




-- Find all the people who have not ordered item 35 

SELECT 
order_items.id AS orderitemsid, order_items.order_id as orderitemsOrderid, order_items.product_id as orderitemsproductid, 
orders.id order_id, orders.`contact_id`, 
contacts.id, contacts.first_name

FROM order_items 
JOIN orders ON orders.id=order_items.order_id
 JOIN contacts ON contacts.id=orders.contact_id

WHERE order_items.product_id = 33  OR order_items.product_id = 34

AND order_items.`owner_id`=22220 AND order_items.`deleted`=0
AND orders.`owner_id`=22220 AND orders.`deleted`=0
AND contacts.`owner_id`=22220 AND contacts.`deleted`=0

/*GROUP BY contacts.id*/
GROUP BY orders.`contact_id`

/* IN OTHERWORD...*/

SELECT {fields}

FROM order_items
JOIN orders ON orders.id=order_items.order_id
JOIN contacts ON contacts.id=orders.contact_id
JOIN products ON products.id=order_items.products.id

WHERE 
(order_items.`owner_id`=22220 AND order_items.`deleted`=0)
AND (orders.`owner_id`=22220 AND orders.`deleted`=0)
AND (contacts.`owner_id`=22220 AND contacts.`deleted`=0)
AND (products.`owner_id`=22220 AND products.`deleted`=0)

--If we're trying to find cotacts with productA OR productB etc
AND {order_items.product_id = XXX OR }

--If we're trying to find contacts with productA AND productB
AND order_items.id IN (SELECT id FROM order_items WHERE order_items.product_id=35 OR order_items.product_id=36)

--If we're trying to find contacts who have not ordered productA or productB
AND contacts.id NOT IN 
(
SELECT contacts.id 
FROM order_items 
JOIN orders ON orders.id=order_items.order_id
JOIN contacts ON contacts.id=orders.contact_id
WHERE
(order_items.`owner_id`=22220 AND order_items.`deleted`=0)
AND (orders.`owner_id`=22220 AND orders.`deleted`=0)
AND (contacts.`owner_id`=22220 AND contacts.`deleted`=0)
AND (order_items.product_id=35 OR order_items.product_id=36 OR order_items.product_id=37 OR order_items.product_id=38)
)
















array