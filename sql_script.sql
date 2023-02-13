-- MySQL SQL script to create 'quiz' database, tables and sample data.

DROP DATABASE IF EXISTS quiz;
CREATE DATABASE quiz;

USE quiz;

DROP TABLE IF EXISTS data, options;

CREATE TABLE data (
    id INT NOT NULL AUTO_INCREMENT,
    question VARCHAR(500) NOT NULL,
    type VARCHAR(1) NOT NULL,
    notes VARCHAR(500),
    PRIMARY KEY (id)
) CHARACTER SET utf8;

CREATE TABLE options (
    id INT NOT NULL AUTO_INCREMENT,
    quiz_id INT NOT NULL,
    value VARCHAR(100) NOT NULL,
    is_answer BOOLEAN NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (quiz_id) REFERENCES data (id)
) CHARACTER SET utf8;

INSERT INTO data (question, type, notes) VALUES ("Is <code>1800</code> a leap year?.", "S", "False.<br>A leap year is divisible by <code>4</code>, but not divisible by <code>100</code>. When divisible by <code>100</code>, must also be divisible by <code>400</code>.");

INSERT INTO data (question, type, notes) VALUES ("Which of these received Nobel prizes?", "M", "a, b and d are correct.<br>Hammarskjöld got the Nobel peace prize (posthumously), Tagore got the literature prize and Thomson got physics prize.");

-- NOTE: 
-- The 'quiz_id' value of 'options' table must be the same 'id' value 
-- from the 'data' table for each quiz item.

INSERT INTO options (quiz_id, value, is_answer) VALUES (1, "(a) True", false);
INSERT INTO options (quiz_id, value, is_answer) VALUES (1, "(b) False", true);
INSERT INTO options (quiz_id, value, is_answer) VALUES (2, "(a) Dag Hammarskjöld", true);
INSERT INTO options (quiz_id, value, is_answer) VALUES (2, "(b) Rabindranath Tagore", true);
INSERT INTO options (quiz_id, value, is_answer) VALUES (2, "(c) Nicola Tesla", false);
INSERT INTO options (quiz_id, value, is_answer) VALUES (2, "(d) J.J. Thomson", true);

-- End of script