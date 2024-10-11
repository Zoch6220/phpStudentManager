-- data for course table
INSERT INTO course (course_code, course_name, description) VALUES
                                                               ('CS101', 'Introduction to Programming', 'Learn the basics of programming in various languages.'),
                                                               ('MATH201', 'Calculus I', 'Introduction to the concepts of limits, derivatives, and integrals.'),
                                                               ('PHY301', 'Physics I', 'Study of classical mechanics and wave phenomena.'),
                                                               ('HIST101', 'World History', 'Exploration of world history from ancient to modern times.');
-- data for student table
INSERT INTO student (full_name, organization, address, city, state_province, telephone, email, dob) VALUES
                                                                                                        ('Alice Johnson', 'Tech University', '123 Main St', 'Cityville', 'Province A', '123-456-7890', 'alice@example.com', '2000-01-15'),
                                                                                                        ('Bob Smith', 'Tech University', '456 Oak St', 'Cityville', 'Province A', '234-567-8901', 'bob@example.com', '1999-05-10'),
                                                                                                        ('Charlie Brown', 'Tech University', '789 Maple St', 'Cityville', 'Province A', '345-678-9012', 'charlie@example.com', '2001-03-22'),
                                                                                                        ('Diana Prince', 'Tech University', '159 Pine St', 'Cityville', 'Province A', '456-789-0123', 'diana@example.com', '1998-07-19'),
                                                                                                        ('Evan Parker', 'Tech University', '753 Cedar St', 'Cityville', 'Province B', '567-890-1234', 'evan@example.com', '2000-09-02'),
                                                                                                        ('Fiona Davis', 'Tech University', '951 Birch St', 'Cityville', 'Province B', '678-901-2345', 'fiona@example.com', '1999-12-12'),
                                                                                                        ('George Miller', 'Tech University', '357 Willow St', 'Cityville', 'Province C', '789-012-3456', 'george@example.com', '2001-04-01'),
                                                                                                        ('Hannah Lee', 'Tech University', '258 Poplar St', 'Cityville', 'Province C', '890-123-4567', 'hannah@example.com', '1998-08-25'),
                                                                                                        ('Ian Wright', 'Tech University', '852 Spruce St', 'Cityville', 'Province D', '901-234-5678', 'ian@example.com', '1999-06-18'),
                                                                                                        ('Jenny Turner', 'Tech University', '654 Redwood St', 'Cityville', 'Province D', '012-345-6789', 'jenny@example.com', '2000-11-30');
-- data for grade table
INSERT INTO grade (student_id, course_code, final_marks, semester, year) VALUES
                                                                             (1, 'CS101', 85, 1, 2024),
                                                                             (1, 'MATH201', 90, 2, 2024),
                                                                             (1, 'PHY301', 88, 1, 2024),
                                                                             (1, 'HIST101', 92, 2, 2024),

                                                                             (2, 'CS101', 80, 1, 2024),
                                                                             (2, 'MATH201', 78, 2, 2024),
                                                                             (2, 'PHY301', 85, 1, 2024),
                                                                             (2, 'HIST101', 87, 2, 2024),

                                                                             (3, 'CS101', 92, 1, 2024),
                                                                             (3, 'MATH201', 94, 2, 2024),
                                                                             (3, 'PHY301', 90, 1, 2024),
                                                                             (3, 'HIST101', 88, 2, 2024),

                                                                             (4, 'CS101', 89, 1, 2024),
                                                                             (4, 'MATH201', 85, 2, 2024),
                                                                             (4, 'PHY301', 87, 1, 2024),
                                                                             (4, 'HIST101', 90, 2, 2024),

                                                                             (5, 'CS101', 75, 1, 2024),
                                                                             (5, 'MATH201', 80, 2, 2024),
                                                                             (5, 'PHY301', 78, 1, 2024),
                                                                             (5, 'HIST101', 82, 2, 2024),

                                                                             (6, 'CS101', 88, 1, 2024),
                                                                             (6, 'MATH201', 91, 2, 2024),
                                                                             (6, 'PHY301', 87, 1, 2024),
                                                                             (6, 'HIST101', 89, 2, 2024),

                                                                             (7, 'CS101', 90, 1, 2024),
                                                                             (7, 'MATH201', 85, 2, 2024),
                                                                             (7, 'PHY301', 88, 1, 2024),
                                                                             (7, 'HIST101', 87, 2, 2024),

                                                                             (8, 'CS101', 79, 1, 2024),
                                                                             (8, 'MATH201', 82, 2, 2024),
                                                                             (8, 'PHY301', 80, 1, 2024),
                                                                             (8, 'HIST101', 85, 2, 2024),

                                                                             (9, 'CS101', 83, 1, 2024),
                                                                             (9, 'MATH201', 88, 2, 2024),
                                                                             (9, 'PHY301', 90, 1, 2024),
                                                                             (9, 'HIST101', 84, 2, 2024),

                                                                             (10, 'CS101', 87, 1, 2024),
                                                                             (10, 'MATH201', 89, 2, 2024),
                                                                             (10, 'PHY301', 86, 1, 2024),
                                                                             (10, 'HIST101', 88, 2, 2024);
-- End of file
-- End of file