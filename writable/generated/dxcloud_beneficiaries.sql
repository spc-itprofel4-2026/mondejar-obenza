CREATE TABLE dxcloud_beneficiaries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(80) NOT NULL UNIQUE,
    address TEXT,
    birth_date DATE NOT NULL,
    monthly_income DECIMAL(10,2) NOT NULL,
    is_verified TINYINT(1),
    registered_at DATETIME NOT NULL
);
