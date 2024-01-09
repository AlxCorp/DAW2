CREATE DATABASE IF NOT EXISTS porfolio;

CREATE USER 'porfolio'@'%' IDENTIFIED BY 'porfolio_password';
GRANT ALL PRIVILEGES ON porfolio.* TO 'porfolio'@'%';
FLUSH PRIVILEGES;

USE porfolio;

CREATE TABLE Users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL,
    surname VARCHAR(128) NOT NULL,
    photo VARCHAR(128),
    categoria_profesional VARCHAR(64),
    email VARCHAR(64) NOT NULL UNIQUE,
    profile_summary TINYTEXT,
    password VARCHAR(64),
    visible TINYINT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    token VARCHAR(128),
    token_creation_date TIMESTAMP,
    active_account TINYINT DEFAULT 0,
    INDEX(name),
    INDEX(surname),
    INDEX(profile_summary)
);

CREATE TABLE Jobs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(128) NOT NULL,
    description VARCHAR(256) NOT NULL,
    start_date DATE NOT NULL,
    finish_date DATE,
    achievements VARCHAR(512),
    visible TINYINT NOT NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL,
    user_id INT,
    INDEX(title),
    INDEX(user_id),
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

CREATE TABLE Projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(128) NOT NULL,
    description VARCHAR(256) NOT NULL,
    logo VARCHAR(128),
    technologies VARCHAR(256),
    visible TINYINT NOT NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL,
    user_id INT,
    INDEX(title),
    INDEX(user_id),
    INDEX(technologies),
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

CREATE TABLE Social_Networks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(64) NOT NULL,
    url VARCHAR(256) NOT NULL,
    visible TINYINT NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    user_id INT,
    INDEX(name),
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

CREATE TABLE Skill_Categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    category VARCHAR(32),
    user_id INT,
    INDEX(category),
    FOREIGN KEY (user_id) REFERENCES Users(id)
);

CREATE TABLE Skills (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(256) NOT NULL,
    visible TINYINT NOT NULL,
    created_at TIMESTAMP NOT NULL,
    updated_at TIMESTAMP NOT NULL,
    skill_category INT,
    user_id INT,
    INDEX(name),
    FOREIGN KEY (skill_category) REFERENCES Skill_Categories(id),
    FOREIGN KEY (user_id) REFERENCES Users(id)
);
