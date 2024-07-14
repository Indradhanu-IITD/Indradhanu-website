CREATE DATABASE ally_form;

USE ally_form;

CREATE TABLE submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    pronouns VARCHAR(100),
    email VARCHAR(100) NOT NULL,
    affiliation VARCHAR(50),
    knowledge INT,
    workshop VARCHAR(10),
    actions TEXT,
    volunteer VARCHAR(10),
    events VARCHAR(10),
    feedback TEXT,
    pledge TINYINT(1) NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
