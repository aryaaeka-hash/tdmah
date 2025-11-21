CREATE TABLE IF NOT EXISTS registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mhid VARCHAR(10) UNIQUE,
    firstname VARCHAR(100),
    lastname VARCHAR(100),
    email VARCHAR(255) UNIQUE,
    dob DATE,
    phone VARCHAR(20),
    gender VARCHAR(20),
    password VARCHAR(255),

    state_id INT,
    district_id INT,
    college_id INT,

    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
