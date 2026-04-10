CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL
);
 
INSERT INTO products (name, description, price) VALUES 
('Test Product', 'This is a local test product.', 99.99),
('Bob', 'asdfg', 355.00);
