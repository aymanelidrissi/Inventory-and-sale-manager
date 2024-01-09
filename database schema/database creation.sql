
CREATE TABLE customers (
  customer_id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  contact_info VARCHAR(255),
  address VARCHAR(255)
);

CREATE TABLE suppliers (
  supplier_id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  contact_info VARCHAR(255)
);

CREATE TABLE sales (
  sale_id SERIAL PRIMARY KEY,
  date TIMESTAMP NOT NULL,
  customer_id INT NOT NULL,
  total_amount DECIMAL NOT NULL,
  CONSTRAINT fk_customer
    FOREIGN KEY(customer_id)
    REFERENCES customers(customer_id)
);

CREATE TABLE products (
  product_id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  price DECIMAL NOT NULL,
  supplier_id INT,  -- Veronderstelt een relatie met Leveranciers
  CONSTRAINT fk_supplier
    FOREIGN KEY(supplier_id) 
    REFERENCES suppliers(supplier_id)
);

CREATE TABLE inventory (
  inventory_id SERIAL PRIMARY KEY,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  CONSTRAINT fk_product
    FOREIGN KEY(product_id)
    REFERENCES products(product_id)
);



CREATE TABLE sale_details (
  sale_detail_id SERIAL PRIMARY KEY,
  sale_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL,
  price_per_unit DECIMAL NOT NULL,
  CONSTRAINT fk_sale
    FOREIGN KEY(sale_id)
    REFERENCES sales(sale_id),
  CONSTRAINT fk_product_sale
    FOREIGN KEY(product_id)
    REFERENCES products(product_id)
);
