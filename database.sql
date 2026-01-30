CREATE DATABASE lost_found;
USE lost_found;

CREATE TABLE items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  type ENUM('Lost','Found') NOT NULL,
  name VARCHAR(100) NOT NULL,
  contact VARCHAR(50) NOT NULL,
  item_name VARCHAR(150) NOT NULL,
  description TEXT NOT NULL,
  image VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- Default admin (username: admin | password: admin123)
INSERT INTO admins (username, password)
VALUES ('admin', MD5('admin123'));
