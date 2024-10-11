-- Create the Student table
CREATE TABLE Student (
    student_id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    organization VARCHAR(100) NOT NULL,
    address VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    state_province VARCHAR(100) NOT NULL,
    telephone VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    dob DATE NOT NULL
);

-- Create the Course table
CREATE TABLE Course (
    course_code VARCHAR(10) PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL
);

-- Create the Grade table
CREATE TABLE Grade (
    grade_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    course_code VARCHAR(10),
    final_marks INT NOT NULL,
    semester INT CHECK (semester IN (1, 2)),
    year INT CHECK (year >= 1000 AND year <= 9999),
    FOREIGN KEY (student_id) REFERENCES Student(student_id),
    FOREIGN KEY (course_code) REFERENCES Course(course_code)
);
