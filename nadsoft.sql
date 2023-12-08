CREATE TABLE Members (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    CreatedDate DATETIME,
    Name VARCHAR(50),
    ParentId INT,
    FOREIGN KEY (ParentId) REFERENCES Members(Id)
);

INSERT INTO Members (Name, ParentId, CreatedDate) VALUES
('user1', NULL, NOW()),
('abcd', NULL, NOW()),
('xyz', NULL, NOW()),
('abc', NULL, NOW()),
('Test', NULL, NOW());

INSERT INTO Members (Name, ParentId, CreatedDate) VALUES
('yash', 1, NOW()),
('prathamesh', 1, NOW()),
('hgdfhd', 1, NOW()),
('Mohit', 5, NOW());


INSERT INTO Members (Name, ParentId, CreatedDate) VALUES
('test2', 2, NOW()),
('test3', 2, NOW()),
('test4', 6, NOW()),
('test5', 6, NOW()),
('test6', 7, NOW());

INSERT INTO Members (Name, ParentId, CreatedDate) VALUES
('test7', 8, NOW()),
('trst8', 8, NOW()),
('test9', 8, NOW());

INSERT INTO Members (Name, ParentId, CreatedDate) VALUES
('test10', 9, NOW());

INSERT INTO Members (Name, ParentId, CreatedDate) VALUES
('test11', 10, NOW());