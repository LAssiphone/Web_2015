/* Создаем БД */
mysql> CREATE database rental;
mysql> USE rental;

/* Создаем таблицы */
mysql> CREATE TABLE dvd
    -> (
    -> dvd_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    -> title VARCHAR(255),
    -> production_year YEAR
    -> );
    
mysql> CREATE TABLE customer
    -> (
    -> customer_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    -> first_name VARCHAR(255),
    -> last_name VARCHAR(255),
    -> passport_code INT(10),
    -> registration_date DATE
    -> );
    
mysql> CREATE TABLE offer
    -> (
    -> offer_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    -> dvd_id INT(11),
    -> customer_id INT(11),
    -> offer_date DATE,
    -> return_date DATE
    -> );
    
/* Заносим ДВД в БД */
mysql> INSERT INTO dvd
    -> (title, production_year)
    -> VALUES
    -> ('The Shawshank Redemption', 1994),
    -> ('The Green Mile', 1999),
    -> ('Forrest Gump', 1994),
    -> ('Schindlers List', 1993),
    -> ('Inception ', 2010),
    -> ('How to Train Your Dragon ', 2010);
    
/* Заносим клиента в БД */
mysql> INSERT INTO customer
    -> (first_name, last_name, passport_code, registration_date)
    -> VALUES
    -> ('Karpov', 'Vladimir', 1234567890, 2015-05-27),
    -> ('Hardy', 'Tom', 1234554321, 2014-05-27),
    -> ('Miller', 'George', 1234512345, 1999-05-27),
    -> ('Theron', 'Charlize', 0987654321, 2000-05-27);

/* Выдаем ДВД */    
mysql> INSERT INTO offer
    -> (dvd_id, customer_id, offer_date)
    -> VALUES
    -> (1, 1, '2015-03-27'),
    -> (1, 2, '2015-01-01'),
    -> (2, 3, '2014-03-27'),
    -> (3, 4, '2015-03-27'),
    -> (4, 2, '2014-12-27');
    
/* ДВД Возврат */    
mysql> UPDATE offer SET return_date = '2015-05-27'
    -> WHERE offer_id=1;
mysql> UPDATE offer SET return_date = '2015-03-22'
    -> WHERE offer_id=2
mysql> UPDATE offer SET return_date = '2015-05-20'
    -> WHERE offer_id=5
    
/* SQL запрос получения списка всех DVD, год выпуска которых 2010, 
отсортированных в алфавитном порядке по названию DVD. */
mysql> SELECT * FROM dvd
    -> WHERE production_year=2010
    -> ORDER BY title;
    
/* SQL запрос для получения списка DVD дисков, которые в настоящее время
находятся у клиентов. */
mysql> SELECT d.title FROM dvd d
    -> JOIN offer of ON (of.return_date IS NULL);
    

/* Напишите SQL запрос для получения списка клиентов, которые брали какие-либо DVD 
диски в текущем году. В результатах запроса необходимо также отразить какие диски 
брали клиенты. */
mysql> SELECT c.first_name, c.last_name, d.title, o.offer_date
    -> FROM customer c
    -> JOIN dvd d USING (dvd_id)
    -> JOIN offer o USING (customer_id)
    -> WHERE YEAR(o.offer_date) = YEAR(CURDATE());
