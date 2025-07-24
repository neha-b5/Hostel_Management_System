--User Table 
CREATE TABLE users (
    user_name VARCHAR(50),
    password VARCHAR(100),
    Type ENUM('admin', 'staff'),
    PRIMARY KEY (user_name, password)
);
--Staff Table 
CREATE TABLE staff_list (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Age INT,
    Mobile VARCHAR(15)
);

-- Resident table 
CREATE TABLE resident_list (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Age INT,
    Mobile VARCHAR(15),
    Profession VARCHAR(100),
    DateJoined DATE,
    Staff_id INT,
    FOREIGN KEY (Staff_id) REFERENCES staff_list(ID)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);

--Inserting in users table
INSERT INTO `users` (`user_name`, `password`, `Type`) VALUES ('admin', 'test1234', 'admin');
INSERT INTO `users` (`user_name`, `password`, `Type`) VALUES ('staff', 'test2345', 'staff');

--Inserting in Staff table
INSERT INTO staff_list (FirstName, LastName, Age, Mobile) VALUES
('Alice', 'Thomas', 35, '9876543210'),
('Ravi', 'Kumar', 42, '9123456789'),
('Meera', 'Shah', 29, '9988776655');

--Inserting is Residents table 
INSERT INTO resident_list (FirstName, LastName, Age, Mobile, Profession, DateJoined, Staff_id) VALUES
('John', 'Doe', 24, '8001234567', 'Engineer', '2024-06-01', 1),
('Priya', 'Menon', 27, '8112233445', 'Teacher', '2024-06-10', 1),
('Sanjay', 'Patel', 22, '8223344556', 'Student', '2024-07-05', 2),
('Aisha', 'Khan', 30, '8334455667', 'Designer', '2024-06-15', 3),
('David', 'Mathews', 28, '8445566778', 'Chef', '2024-07-01', 3);


