-- transitops_schema.sql – Database schema for TransitOps application
-- Generated on 2026-07-12
-- This file defines the core tables needed for the TransitOps platform.
-- It is intended for use with MySQL / MariaDB (compatible with Laravel's default driver).

-- ------------------------------------------------------------
-- Users table (Laravel default users with role‑based access control)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('admin','manager','dispatcher','safety','finance') NOT NULL DEFAULT 'manager',
    `remember_token` VARCHAR(100) NULL,
    `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Vehicles table
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `vehicles` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `registration_number` VARCHAR(50) NOT NULL UNIQUE,
    `type` VARCHAR(100) NOT NULL,
    `capacity` DECIMAL(10,2) NOT NULL COMMENT 'cargo capacity in kg',
    `status` ENUM('available','on_trip','in_shop','maintenance') NOT NULL DEFAULT 'available',
    `current_odometer` BIGINT UNSIGNED NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Drivers table
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `drivers` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `license_number` VARCHAR(100) NOT NULL UNIQUE,
    `license_expiry` DATE NOT NULL,
    `availability` ENUM('available','on_trip','off_duty') NOT NULL DEFAULT 'available',
    `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Trips table
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `trips` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `vehicle_id` BIGINT UNSIGNED NOT NULL,
    `driver_id` BIGINT UNSIGNED NOT NULL,
    `source` VARCHAR(255) NOT NULL,
    `destination` VARCHAR(255) NOT NULL,
    `cargo_weight` DECIMAL(10,2) NOT NULL COMMENT 'weight in kg',
    `status` ENUM('planned','dispatched','completed','cancelled') NOT NULL DEFAULT 'planned',
    `started_at` DATETIME NULL,
    `completed_at` DATETIME NULL,
    `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT `fk_trip_vehicle` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles`(`id`) ON DELETE RESTRICT,
    CONSTRAINT `fk_trip_driver` FOREIGN KEY (`driver_id`) REFERENCES `drivers`(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Maintenance records table
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `maintenance_records` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `vehicle_id` BIGINT UNSIGNED NOT NULL,
    `description` TEXT NOT NULL,
    `cost` DECIMAL(12,2) NOT NULL,
    `status` ENUM('in_shop','completed') NOT NULL DEFAULT 'in_shop',
    `started_at` DATETIME NULL,
    `completed_at` DATETIME NULL,
    `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT `fk_maint_vehicle` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles`(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Fuel & expense tracking table
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `fuel_expenses` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `vehicle_id` BIGINT UNSIGNED NOT NULL,
    `date` DATE NOT NULL,
    `liters` DECIMAL(10,2) NOT NULL,
    `price_per_liter` DECIMAL(8,3) NOT NULL,
    `total_cost` DECIMAL(12,2) AS (liters * price_per_liter) STORED,
    `description` VARCHAR(255) NULL,
    `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT `fk_fuel_vehicle` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles`(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Reports / analytics placeholder table (optional – can be generated on‑the‑fly)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `reports` (
    `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `generated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `data` JSON NOT NULL,
    `created_by` BIGINT UNSIGNED NOT NULL,
    CONSTRAINT `fk_report_user` FOREIGN KEY (`created_by`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Indexes for performance
-- ------------------------------------------------------------
CREATE INDEX idx_vehicle_status ON `vehicles`(`status`);
CREATE INDEX idx_driver_availability ON `drivers`(`availability`);
CREATE INDEX idx_trip_status ON `trips`(`status`);
CREATE INDEX idx_maintenance_status ON `maintenance_records`(`status`);

-- End of schema
