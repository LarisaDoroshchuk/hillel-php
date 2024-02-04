CREATE TABLE books
(
    id               INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title            VARCHAR(255) NOT NULL,
    author           VARCHAR(255),
    publication_year INT,
    isbn             VARCHAR(20)  NOT NULL,
    genre            VARCHAR(100),
    price            DECIMAL(10, 2),
    created_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at       TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at       TIMESTAMP DEFAULT NULL
);

CREATE TABLE libraries
(
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(255) NOT NULL,
    address    VARCHAR(255),
    phone      VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP DEFAULT NULL
);

CREATE TABLE library_books
(
    library_id INT UNSIGNED,
    book_id    INT UNSIGNED,
    PRIMARY KEY (library_id, book_id),
    FOREIGN KEY (library_id) REFERENCES libraries (id) ON DELETE CASCADE,
    FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE CASCADE
);

INSERT INTO books (title, author, publication_year, isbn, genre, price)
VALUES ('The Great Gatsby', 'F. Scott Fitzgerald', 1925, '978-0743273565', 'Fiction', 10.99),
       ('To Kill a Mockingbird', 'Harper Lee', 1960, '978-0061120084', 'Fiction', 12.99),
       ('1984', 'George Orwell', 1949, '978-0451524935', 'Science Fiction', 9.99),
       ('Pride and Prejudice', 'Jane Austen', 1813, '978-0486284736', 'Romance', 8.99),
       ('The Catcher in the Rye', 'J.D. Salinger', 1951, '978-0316769488', 'Fiction', 11.99);


INSERT INTO libraries (name, address, phone)
VALUES ('Main Library', '123 Main Street', '+1234567890'),
       ('City Library', '456 City Avenue', '+9876543210'),
       ('Central Library', '789 Central Boulevard', '+1122334455'),
       ('Public Library', '246 Public Road', '+9988776655'),
       ('Community Library', '357 Community Lane', '+5544332211');


INSERT INTO library_books (library_id, book_id) VALUES (2, 1), (3, 2);

UPDATE libraries SET name = 'Community Library New' WHERE id = 5;
UPDATE books SET publication_year = 1961 WHERE id = 2;
UPDATE library_books SET book_id = 4 WHERE library_id = 3 AND book_id = 2;

DELETE FROM libraries WHERE id = 5;
DELETE FROM books WHERE id = 5;
DELETE FROM library_books WHERE library_id = 3 AND book_id = 4;
DELETE FROM books WHERE id = 1;
