-- TransitOps MySQL schema (normalized)
-- Run: mysql -u root -p transitops < transitops_schema.sql

CREATE DATABASE IF NOT EXISTS transitops DEFAULT CHARACTER SET = 'utf8mb4' COLLATE = 'utf8mb4_unicode_ci';
USE transitops;

-- Users
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) NOT NULL UNIQUE,
  email VARCHAR(150) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  full_name VARCHAR(150),
  role ENUM('admin','dispatcher','viewer') NOT NULL DEFAULT 'dispatcher',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Vehicles
CREATE TABLE vehicles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  registration_no VARCHAR(50) NOT NULL UNIQUE,
  type VARCHAR(50) NOT NULL,
  capacity INT DEFAULT 0,
  status ENUM('Active','In Maintenance','Inactive') NOT NULL DEFAULT 'Active',
  assigned_driver_id INT NULL,
  insurance_expiry DATE,
  permit_expiry DATE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX(status),
  INDEX(permit_expiry),
  INDEX(insurance_expiry),
  CONSTRAINT fk_vehicle_driver FOREIGN KEY (assigned_driver_id) REFERENCES drivers(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Drivers
CREATE TABLE drivers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(150) NOT NULL,
  license_number VARCHAR(100) NOT NULL UNIQUE,
  license_expiry DATE NOT NULL,
  contact_phone VARCHAR(50),
  assigned_vehicle_id INT NULL,
  status ENUM('Active','Suspended','Inactive') NOT NULL DEFAULT 'Active',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX(license_expiry),
  CONSTRAINT fk_driver_vehicle FOREIGN KEY (assigned_vehicle_id) REFERENCES vehicles(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Trips
CREATE TABLE trips (
  id INT AUTO_INCREMENT PRIMARY KEY,
  vehicle_id INT NOT NULL,
  driver_id INT NOT NULL,
  route VARCHAR(255),
  start_time DATETIME NOT NULL,
  end_time DATETIME NOT NULL,
  distance_km DECIMAL(10,2) DEFAULT 0,
  status ENUM('Scheduled','In Transit','Completed','Cancelled') NOT NULL DEFAULT 'Scheduled',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX(vehicle_id),
  INDEX(driver_id),
  INDEX(start_time),
  INDEX(status),
  CONSTRAINT fk_trip_vehicle FOREIGN KEY (vehicle_id) REFERENCES vehicles(id) ON DELETE RESTRICT,
  CONSTRAINT fk_trip_driver FOREIGN KEY (driver_id) REFERENCES drivers(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- Maintenance logs
CREATE TABLE maintenance_logs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  vehicle_id INT NOT NULL,
  service_type VARCHAR(100),
  service_date DATE NOT NULL,
  cost DECIMAL(10,2) DEFAULT 0,
  notes TEXT,
  next_due_date DATE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX(vehicle_id),
  INDEX(next_due_date),
  CONSTRAINT fk_maint_vehicle FOREIGN KEY (vehicle_id) REFERENCES vehicles(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Fuel logs
CREATE TABLE fuel_logs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  vehicle_id INT NOT NULL,
  driver_id INT NULL,
  fill_date DATE NOT NULL,
  liters DECIMAL(10,2) NOT NULL,
  cost DECIMAL(10,2) NOT NULL,
  odometer INT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX(vehicle_id),
  INDEX(fill_date),
  CONSTRAINT fk_fuel_vehicle FOREIGN KEY (vehicle_id) REFERENCES vehicles(id) ON DELETE CASCADE,
  CONSTRAINT fk_fuel_driver FOREIGN KEY (driver_id) REFERENCES drivers(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Expenses
CREATE TABLE expenses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  trip_id INT NULL,
  vehicle_id INT NULL,
  category VARCHAR(100),
  amount DECIMAL(10,2) NOT NULL,
  incurred_at DATE NOT NULL,
  notes TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX(vehicle_id),
  INDEX(trip_id),
  CONSTRAINT fk_expense_trip FOREIGN KEY (trip_id) REFERENCES trips(id) ON DELETE SET NULL,
  CONSTRAINT fk_expense_vehicle FOREIGN KEY (vehicle_id) REFERENCES vehicles(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Sample seed data (minimal)
INSERT INTO users (username, email, password_hash, full_name, role) VALUES
('admin','admin@example.test','$2y$10$examplehashplaceholder', 'TransitOps Admin','admin');

INSERT INTO vehicles (registration_no, type, capacity, status, insurance_expiry, permit_expiry) VALUES
('ABC-123','Truck',1000,'Active','2027-01-01','2026-12-31'),
('XYZ-999','Van',500,'Active','2025-06-30','2025-07-31');

INSERT INTO drivers (full_name, license_number, license_expiry, contact_phone, status) VALUES
('Saman Perera','LIC-1001','2026-10-01','0771234567','Active'),
('Nimal Silva','LIC-1002','2024-08-15','0779876543','Active');

-- Link sample assignments
UPDATE vehicles SET assigned_driver_id = 1 WHERE id = 1;
UPDATE drivers SET assigned_vehicle_id = 1 WHERE id = 1;

-- Sample trip
INSERT INTO trips (vehicle_id, driver_id, route, start_time, end_time, distance_km, status) VALUES
(1,1,'Colombo -> Kandy','2026-07-13 08:00:00','2026-07-13 12:00:00',120.5,'Scheduled');

COMMIT;
