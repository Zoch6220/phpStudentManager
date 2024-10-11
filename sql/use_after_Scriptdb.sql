-- Add created_at column to student table
ALTER TABLE student ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

-- Add created_at column to course table
ALTER TABLE course ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

-- Add updated_at column to grade table
ALTER TABLE grade ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

-- Before
ALTER TABLE users MODIFY password VARCHAR(50);

-- After
ALTER TABLE users MODIFY password VARCHAR(255);