CREATE TABLE IF NOT EXISTS locations (id INT NOT NULL AUTO_INCREMENT, customer_id INT NOT NULL, location_id VARCHAR(100) NULL, name VARCHAR(100) NOT NULL, address1 VARCHAR(100) DEFAULT NULL, a
ddress2 VARCHAR(250) DEFAULT NULL, city VARCHAR(150) NOT NULL, state_id INT NOT NULL, postal_code VARCHAR(10) NOT NULL, active TINYINT(1) DEFAULT 1, pimary_contact VARCHAR(100) NULL, phone BIGINT NUL
L, fax BIGINT NULL, PRIMARY KEY (id)); 