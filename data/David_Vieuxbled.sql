DROP DATABASE IF EXISTS Saltain_Banque;
CREATE DATABASE Saltain_Banque CHARACTER SET 'utf8';
USE Saltain_Banque;

CREATE TABLE IF NOT EXISTS customer (
    id INT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    adress VARCHAR(50) NOT NULL,
    birth_date DATE NOT NULL,
    advisor VARCHAR(30) NOT NULL,
    phone_number VARCHAR NOT NULL,
    customer_mail VARCHAR NOT NULL,
    customer_password VARCHAR(30) NOT NULL,
    PRIMARY KEY(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS account (
    id INT NOT NULL AUTO_INCREMENT,
    account_number INT(20) NOT NULL,
    account_type VARCHAR NOT NULL,
    creation_date DATE NOT NULL,
    account_customer_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (account_customer_id) REFERENCES customer(id);
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS last_op (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    transaction_type VARCHAR(10),
    op_date DATE,
    amount VARCHAR(10),
    last_op_account_id INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (last_op_account_id) REFERENCES account(id)
) ENGINE = InnoDB;

INSERT INTO customer (firstname, lastname, adress, birth_date, advisor, phone_number, account_mail, account_password)
VALUES ('David', 'VIEUXBLED', '123 rue de landelle', '1995-11-15', 'Fred UJOUR', '06.07.08.09.10', 'david.vieuxbled@outlook.fr', '12troisquatre'),
       ('Julie', 'LEJOURNAL', '12 avenue Commun-Vert', '1989-09-09', 'John POUSSIN', '06.05.04.03.02', 'julie.lejournal@outlook.fr', '56septhuit');

INSERT INTO account (account_number, account_type, creation_date)
VALUES ('15111995010203', 'PEL', '2021-12-08'),
       ('09091989040506', 'Livret A', '2021-12-08');

INSERT INTO last_op (transaction_type, op_date, amount)
VALUES ('dépôt', '2021-12-08', 1500),
       ('retrait', '2021-12-08', 500);