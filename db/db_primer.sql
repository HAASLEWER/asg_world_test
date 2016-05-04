# db_primer.sql
# Creates the required db and tables for the contact manager application

# drop db if it exists
DROP DATABASE IF EXISTS contact_manager;

# create the db
CREATE DATABASE contact_manager;

# select the db
USE contact_manager;

# drop the table if it exists
DROP TABLE IF EXISTS contacts;

# create the contacts tabel
CREATE TABLE contacts (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	surname VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	created DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;