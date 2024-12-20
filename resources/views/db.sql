-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY,
    role ENUM('admin', 'client', 'freelancer'),
    username VARCHAR(50),
    email VARCHAR(100),
    password_hash VARCHAR(255),
    status ENUM('active', 'suspended'),
    created_at TIMESTAMP
);

-- Jobs table
CREATE TABLE jobs (
    id INT PRIMARY KEY,
    client_id INT,
    title VARCHAR(200),
    description TEXT,
    budget DECIMAL(10,2),
    status ENUM('open', 'in_progress', 'completed'),
    created_at TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES users(id)
);

-- Proposals table
CREATE TABLE proposals (
    id INT PRIMARY KEY,
    job_id INT,
    freelancer_id INT,
    price DECIMAL(10,2),
    description TEXT,
    status ENUM('pending', 'accepted', 'rejected'),
    created_at TIMESTAMP,
    FOREIGN KEY (job_id) REFERENCES jobs(id),
    FOREIGN KEY (freelancer_id) REFERENCES users(id)
);

-- Payments table
CREATE TABLE payments (
    id INT PRIMARY KEY,
    proposal_id INT,
    client_id INT,
    freelancer_id INT,
    amount DECIMAL(10,2),
    platform_fee DECIMAL(10,2),
    status ENUM('pending', 'completed', 'failed'),
    created_at TIMESTAMP,
    FOREIGN KEY (proposal_id) REFERENCES proposals(id),
    FOREIGN KEY (client_id) REFERENCES users(id),
    FOREIGN KEY (freelancer_id) REFERENCES users(id)
);

-- Milestones table
CREATE TABLE milestones (
    id INT PRIMARY KEY,
    job_id INT,
    freelancer_id INT,
    client_id INT,
    amount DECIMAL(10,2),
    description TEXT,
    status ENUM('todo', 'in_progress', 'completed'),
    created_at TIMESTAMP,
    FOREIGN KEY (job_id) REFERENCES jobs(id),
    FOREIGN KEY (freelancer_id) REFERENCES users(id),
    FOREIGN KEY (client_id) REFERENCES users(id)
);
