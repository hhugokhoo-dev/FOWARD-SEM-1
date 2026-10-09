-- ============================================================
-- RBAC Exercise: Database Setup
-- ============================================================

-- STEP 1: Create the users table with a role column
-- The role column defaults to 'user' for every new account
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- If you already have a users table, add the role column instead:
-- ALTER TABLE users ADD COLUMN role VARCHAR(50) NOT NULL DEFAULT 'user';

-- STEP 2: Add a constraint so only valid roles can be inserted
ALTER TABLE users ADD CONSTRAINT chk_role CHECK (role IN ('user', 'editor', 'admin'));

-- STEP 3: Insert test users (password is "password" for all three)
INSERT INTO users (email, password, role) VALUES
('user@example.com',   '$2y$12$vDD9CdtB4qSWvau/HEkyvemwhypxKAwgyMgeU5R6gNC6lr2w31MLS', 'user'),
('editor@example.com', '$2y$12$vDD9CdtB4qSWvau/HEkyvemwhypxKAwgyMgeU5R6gNC6lr2w31MLS', 'editor'),
('admin@example.com',  '$2y$12$vDD9CdtB4qSWvau/HEkyvemwhypxKAwgyMgeU5R6gNC6lr2w31MLS', 'admin');
