CREATE DATABASE IF NOT EXISTS tour_guide;

USE tour_guide;


CREATE TABLE IF NOT EXISTS places (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    dist INT NOT NULL
);

-- Insert sample data
INSERT INTO places (name, city, genre, dist) VALUES
('Sinhagad Fort', 'Pune', 'Adventure', 50),
('Lohagad Fort', 'Pune', 'Adventure', 50),
('Devikund Waterfall Trek', 'Pune', 'Adventure', 50),
('Pawna Lake', 'Pune', 'Adventure', 50),
('Kamshet', 'Pune', 'Adventure', 50);
