CREATE TABLE IF NOT EXISTS event_registrations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  mhid VARCHAR(20) NOT NULL,
  event_name VARCHAR(255) NOT NULL,
  category VARCHAR(255) NOT NULL,
  subcategory VARCHAR(255) NOT NULL,
  participant_name VARCHAR(255) NOT NULL,
  phone VARCHAR(30),
  registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY unique_user_event (user_id, event_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
