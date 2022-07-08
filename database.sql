CREATE USER 'testuser'@'localhost' IDENTIFIED BY 'testpassword';
CREATE DATABASE testdatabase;
GRANT ALL PRIVILEGES ON *.* TO 'testuser'@'localhost' ;
