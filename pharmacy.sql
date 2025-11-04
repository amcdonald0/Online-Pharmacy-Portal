-- create the tables
CREATE TABLE ph_products (
  productID       VARCHAR(12)    NOT NULL AUTO_INCREMENT,
  productName     VARCHAR(255)   NOT NULL,
  productDes      VARCHAR(255)  NOT NULL,
  price           DECIMAL(10,2) NOT NULL,
  stockQuantity   DECIMAL(10) NOT NULL,
  PRIMARY KEY (productID)
);

CREATE TABLE ph_customers (
  customerID    INT(11) NOT NULL AUTO_INCREMENT,
  productID      VARCHAR(12)    NOT NULL,
  firstName    VARCHAR(255)   NOT NULL,
  lastName     VARCHAR(255)   NOT NULL,
  email        VARCHAR(255)   NOT NULL,
  orderNum      DECIMAL(12)   NOT NULL,
  PRIMARY KEY (customerID),
  FOREIGN KEY (orderNum)
);

CREATE TABLE ph_orders (
  orderID DECIMAL(12) NOT NULL AUTO_INCREMENT, 
  customerID INT(11) NOT NULL, 
  orderDate DATE NOT NULL,
  PRIMARY KEY (orderID),
  FOREIGN KEY (customerID)
);

CREATE TABLE ph_admin (
  adminID DECIMAL(12) NOT NULL AUTO_INCREMENT, 
  firstName    VARCHAR(255)   NOT NULL,
  lastName     VARCHAR(255)   NOT NULL,
  email     VARCHAR(255)   NOT NULL,
  Username        VARCHAR(255)   NOT NULL,
  password      VARCHAR(255)   NOT NULL,
  PRIMARY KEY (orderID),

);


-- insert data into the database
INSERT INTO ph_products VALUES
('P001', 'Aspirin', 'Pain Reliever', 5.99, 100),
('P002', 'Tylenol Extra Strength', 'Pain Reliever', 6.39, 100),
('P003', 'Vitamin C', 'Dietary Supplement', 9.99, 200),
('P004', 'Ibuprofen', 'Anti-inflammatory', 8.49, 150),
('P005', 'Cetirizine', 'Antihistamine', 6.99, 100),
('P006', 'Omeprazole', 'Acid Reducer', 12.99, 80),
('P007', 'Amoxicillin', 'Antibiotic', 19.99, 60),
('P008', 'Loratadine', 'Allergy Relief', 7.99, 120),
('P009', 'Metformin', 'Diabetes Medication', 15.99, 50),
('P010', 'Paracetamol', 'Pain Reliever/Fever Reducer', 5.49, 200),
('P011', 'Losartan', 'Blood Pressure Medication', 18.99, 70),
('P012', 'Simvastatin', 'Cholesterol Lowering', 14.99, 90),
('P013', 'Albuterol Inhaler', 'Bronchodilator', 29.99, 40),
('P014', 'Fluconazole', 'Antifungal', 10.99, 110),
('P015', 'Hydrocortisone Cream', 'Anti-inflammatory Cream', 6.49, 140),
('P016', 'Diphenhydramine', 'Sleep Aid/Antihistamine', 5.99, 130),
('P017', 'Lisinopril', 'Blood Pressure Medication', 16.49, 75),
('P018', 'Tums', 'Antacid', 4.99, 180),
('P019', 'Vitamin B12', 'Dietary Supplement', 13.99, 200),
('P020', 'Tylenol Cold+Flu', 'Flu/Cold Medicine', 9.79, 130),
('P021', 'Zinc', 'Dietary Supplement', 9.99, 75),
('P022', 'Advil', 'Pain Reliever', 5.49, 150),
('P023', 'Vitamin D3', 'Dietary Supplement', 15.89, 200),
('P024', 'DayQuil/NyQuil Sever Cold+Flu', 'Flu/Cold Medicine', 15.29, 144),
('P025', 'Mucinex Max Strength', 'Flu/Cold Medicine', 18.99, 99);

INSERT INTO ph_customers VALUES
('001', 'John', 'Doe', 'john.doe@hotmail.com', 1),
('002', 'Jane', 'Smith', 'jane.smith@outlook.com', 2),
('003', 'Alice', 'Johnson', 'alice.johnson@gmail.com', 3);

INSERT INTO ph_orders VALUES
(1, '001', '2024-08-17'),
(2, '005', '2024-08-16'),
(3, '002', '2024-08-15'),
(4, '003', '2024-08-14'),
(5, '004', '2024-08-13'),
(6, '010', '2024-08-12')
;