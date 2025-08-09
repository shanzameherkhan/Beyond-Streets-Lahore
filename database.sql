CREATE DATABASE tourism;
USE tourism;

CREATE TABLE 'admin' (
  'aid' int(11) NOT NULL,
  'name' varchar(20) NOT NULL,
  'psw' varchar(20) NOT NULL
);
INSERT INTO `admin` (`aid`, `name`, `psw`) VALUES
(0, 'admin', 'admin');


CREATE TABLE 'bookings' (
  'id' INT PRIMARY KEY AUTO_INCREMENT,
  'user_id' INT NOT NULL,
  'tour_id' INT NOT NULL,
  'booking_date' DATE NOT NULL,
  'num_travelers' INT NOT NULL,
  'total_cost' DECIMAL(10, 2) NOT NULL,
  'status' ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO bookings (user_id, tour_id, booking_date, num_travelers, total_cost)
VALUES (:user_id, :tour_id, :booking_date, :num_travelers, :total_cost);

CREATE TABLE reviews (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  tour_id INT NOT NULL,
  rating INT NOT NULL,
  review TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);

