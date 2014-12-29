CREATE TABLE IF NOT EXISTS shippingmethods (
  id   INT          NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  url  LONGTEXT              DEFAULT NULL,
  PRIMARY KEY (id)
);