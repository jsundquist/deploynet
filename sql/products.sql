CREATE TABLE IF NOT EXISTS products (
  id              INT          NOT NULL AUTO_INCREMENT,
  part_number     VARCHAR(100) NOT NULL,
  alt_part_number VARCHAR(100)          DEFAULT NULL,
  description     VARCHAR(250)          DEFAULT NULL,
  manufacturer_id INT          NOT NULL,
  PRIMARY KEY (id)
);