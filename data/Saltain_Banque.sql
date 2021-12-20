DROP DATABASE IF EXISTS Saltain_Banque;
CREATE DATABASE Saltain_Banque CHARACTER SET 'utf8';
USE Saltain_Banque;

DROP USER IF EXISTS 'BanquePHP'@'Localhost';
CREATE USER 'BanquePHP'@'Localhost';
GRANT ALL PRIVILEGES ON Saltain_Banque.* TO 'BanquePHP'@'Localhost' IDENTIFIED BY 'banque76';

CREATE TABLE IF NOT EXISTS Customer (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    adress VARCHAR(50) NOT NULL,
    birth_date DATE NOT NULL,
    advisor VARCHAR(30) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pword VARCHAR(30) NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Account (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    account_number INT(20) NOT NULL,
    account_type VARCHAR(10) NOT NULL,
    creation_date DATE NOT NULL,
    account_customer_id INT UNSIGNED NOT NULL,
    amount FLOAT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (account_customer_id) REFERENCES Customer(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Operation (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    operation_type VARCHAR(10),
    operation_date DATE,
    operation_amount VARCHAR(10),
    operation_account_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (operation_account_id) REFERENCES Account(id)
) ENGINE = InnoDB;

INSERT INTO Customer (firstname, lastname, adress, birth_date, advisor, phone_number, email, pword)
VALUES ('David', 'VIEUXBLED', '123 rue de landelle', '1995-11-15', 'Fred UJOUR', '06.07.08.09.10', 'david.vieuxbled@outlook.fr', 'pword1'),
       ('Julie', 'LEJOURNAL', '12 avenue Commun-Vert', '1989-09-09', 'John POUSSIN', '06.05.04.03.02', 'julie.lejournal@outlook.fr', 'pword2');

INSERT INTO Account (account_number, account_type, creation_date, account_customer_id, amount)
VALUES ('15111995010203', 'PEL', '2021-12-08', 1, '35000'),
       ('09091989040506', 'Livret A', '2021-12-08', 1, '75000');

INSERT INTO Operation (operation_type, operation_date, operation_amount, operation_account_id)
VALUES ('dépôt', '2021-12-08', 1500, 1),
       ('retrait', '2021-12-08', 500, 1);