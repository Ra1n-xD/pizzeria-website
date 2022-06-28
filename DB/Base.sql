
CREATE TABLE addition
(
	id_addition          INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name                 VARCHAR(50) NOT NULL,
	price                INTEGER NOT NULL,
	picture              VARCHAR(150) NOT NULL
);



CREATE TABLE cart
(
	id_cart              INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	price                INTEGER NOT NULL,
	id_order             INTEGER NULL,
	amount               INTEGER NOT NULL
);



CREATE TABLE cart_addition
(
	id_cart_addition    INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_cart              INTEGER NULL,
	id_addition          INTEGER NULL
);



CREATE TABLE cart_product
(
	id_cart_product     INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	id_cart              INTEGER NULL,
	id_product           INTEGER NULL
);





CREATE TABLE news
(
	id_news              INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name                 VARCHAR(100) NOT NULL,
	description          VARCHAR(1000) NOT NULL,
	picture              VARCHAR(150) NOT NULL
);




CREATE TABLE ordered
(
	id_order             INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	order_date           DATE NOT NULL,
	adress               VARCHAR(50) NOT NULL,
	id_user              INTEGER NULL,
	isPaied              boolean NOT NULL,
	active               VARCHAR(50) NOT NULL
);




CREATE TABLE product
(
	id_product           INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name                 VARCHAR(50) NOT NULL,
	price                INTEGER NOT NULL,
	weight               INTEGER NULL,
	availability         boolean NOT NULL,
	picture              VARCHAR(150) NOT NULL,
	size                 VARCHAR(50) NULL
);



CREATE TABLE users
(
	id_user              INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name                 VARCHAR(100) NOT NULL,
	surname              VARCHAR(100) NOT NULL,
	phone                VARCHAR(12) NOT NULL,
	email                VARCHAR(100) NULL,
	role                 VARCHAR(50) NOT NULL,
	password             VARCHAR(100) NULL
);



ALTER TABLE cart
ADD FOREIGN KEY R_6 (id_order) REFERENCES ordered (id_order);



ALTER TABLE cart_addition
ADD FOREIGN KEY R_11 (id_cart) REFERENCES cart (id_cart);



ALTER TABLE cart_addition
ADD FOREIGN KEY R_12 (id_addition) REFERENCES addition (id_addition);



ALTER TABLE cart_product
ADD FOREIGN KEY R_9 (id_cart) REFERENCES cart (id_cart);



ALTER TABLE cart_product
ADD FOREIGN KEY R_10 (id_product) REFERENCES product (id_product);



ALTER TABLE ordered
ADD FOREIGN KEY R_5 (id_user) REFERENCES users (id_user);


