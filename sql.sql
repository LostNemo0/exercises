CREATE TABLE form_data (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  a INT(11),
  b INT(11),
  c VARCHAR(30) NOT NULL,
  sum INT(11),
  timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
