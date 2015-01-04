CREATE TABLE IF NOT EXISTS contacts (id INT NOT NULL AUTO_INCREMENT, customer_id INT NOT NULL, location_id VARCHAR(100) NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, address1 VARCHAR(100) DEFAULT NULL, address2 VARCHAR(250) DEFAULT NULL, address3 VARCHAR(250) DEFAULT NULL, city VARCHAR(150) NOT NULL, state_id INT NOT NULL, postal_code VARCHAR(10) NOT NULL, phone BIGINT NULL, fax BIGINT NULL, cell_phone BIGINT NULL, extention VARCHAR(10) DEFAULT NULL, email VARCHAR(250) DEFAULT NULL, time_zone_id INT NULL, PRIMARY KEY (id)); 