CREATE DATABASE voting_system;
USE voting_system;

CREATE TABLE voters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    citizenship_id VARCHAR(50),
    dob DATE,
    citizenship_type VARCHAR(30),
    temp_address VARCHAR(150),
    perm_address VARCHAR(150),
    phone VARCHAR(20),
    citizenship_front VARCHAR(255),
    citizenship_back VARCHAR(255),
    voter_id VARCHAR(50),
    has_voted TINYINT DEFAULT 0
);

CREATE TABLE votes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    voter_id INT,
    candidate_no INT,
    vote_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
