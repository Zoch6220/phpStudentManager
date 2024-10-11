-- Disable foreign key checks
SET FOREIGN_KEY_CHECKS = 0;

-- Truncate tables
TRUNCATE TABLE student;
TRUNCATE TABLE course;
TRUNCATE TABLE grade;

-- Reseed tables
ALTER TABLE student AUTO_INCREMENT = 1;
ALTER TABLE course AUTO_INCREMENT = 1;
ALTER TABLE grade AUTO_INCREMENT = 1;

-- Re-enable foreign key checks
SET FOREIGN_KEY_CHECKS = 1;