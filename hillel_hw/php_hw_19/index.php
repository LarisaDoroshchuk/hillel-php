<?php
declare(strict_types=1);

const APP_DIR = __DIR__ . '/';
const SERVERNAME = 'db';
const USERNAME = 'root';
const PASSWORD = 'root';
const DATABASE = 'hillel';

require_once APP_DIR . 'logger/LoggerMySQL.php';

$logger = new LoggerMySQL();

try {
    $conn = new PDO("mysql:host=" . SERVERNAME . ";dbname=" . DATABASE, USERNAME, PASSWORD);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS books (
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
    )";
    $conn->exec($sql);
    echo "Table 'books' created successfully" . PHP_EOL;

    $sql = "CREATE TABLE IF NOT EXISTS libraries (
        id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name       VARCHAR(255) NOT NULL,
        address    VARCHAR(255),
        phone      VARCHAR(20),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        deleted_at TIMESTAMP DEFAULT NULL
    )";
    $conn->exec($sql);
    echo "Table 'libraries' created successfully"  . PHP_EOL;

    $sql = "CREATE TABLE IF NOT EXISTS library_books (
        library_id INT UNSIGNED,
        book_id    INT UNSIGNED,
        PRIMARY KEY (library_id, book_id),
        FOREIGN KEY (library_id) REFERENCES libraries (id) ON DELETE CASCADE,
        FOREIGN KEY (book_id) REFERENCES books (id) ON DELETE CASCADE
    )";
    $conn->exec($sql);
    echo "Table 'library_books' created successfully"  . PHP_EOL;

    $sql = "INSERT INTO books (title, author, publication_year, isbn, genre, price)
    VALUES ('The Great Gatsby', 'F. Scott Fitzgerald', 1925, '978-0743273565', 'Fiction', 10.99),
           ('To Kill a Mockingbird', 'Harper Lee', 1960, '978-0061120084', 'Fiction', 12.99),
           ('1984', 'George Orwell', 1949, '978-0451524935', 'Science Fiction', 9.99),
           ('Pride and Prejudice', 'Jane Austen', 1813, '978-0486284736', 'Romance', 8.99),
           ('The Catcher in the Rye', 'J.D. Salinger', 1951, '978-0316769488', 'Fiction', 11.99)";
    $conn->exec($sql);
    echo "Records inserted into 'books' successfully"  . PHP_EOL;

    $sql = "INSERT INTO libraries (name, address, phone)
    VALUES ('Main Library', '123 Main Street', '+1234567890'),
           ('City Library', '456 City Avenue', '+9876543210'),
           ('Central Library', '789 Central Boulevard', '+1122334455'),
           ('Public Library', '246 Public Road', '+9988776655'),
           ('Community Library', '357 Community Lane', '+5544332211')";
    $conn->exec($sql);
    echo "Records inserted into 'libraries' successfully"  . PHP_EOL;

    $sql = "INSERT INTO library_books (library_id, book_id) VALUES (2, 1), (3, 2)";
    $conn->exec($sql);
    echo "Records inserted into 'library_books' successfully"  . PHP_EOL;

    $libraryIdUpdate = 5;
    $newLibraryName = 'Community Library New';
    $sql = "UPDATE libraries SET name = :name WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $newLibraryName);
    $stmt->bindParam(':id', $libraryIdUpdate);
    $stmt->execute();
    echo "Record updated in 'libraries' successfully" . PHP_EOL;

    $bookIdUpdate = 2;
    $newPublicationYear = 1961;
    $sql = "UPDATE books SET publication_year = :publication_year WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':publication_year', $newPublicationYear);
    $stmt->bindParam(':id', $bookIdUpdate);
    $stmt->execute();
    echo "Record updated in 'books' successfully" . PHP_EOL;

    $libraryIdUpdate = 3;
    $bookIdUpdate = 2;
    $newBookId = 4;
    $sql = "UPDATE library_books SET book_id = :new_book_id WHERE library_id = :library_id AND book_id = :book_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':new_book_id', $newBookId);
    $stmt->bindParam(':library_id', $libraryIdUpdate);
    $stmt->bindParam(':book_id', $bookIdUpdate);
    $stmt->execute();
    echo "Record updated in 'library_books' successfully" . PHP_EOL;

    $libraryIdDelete = 5;
    $sql = "DELETE FROM libraries WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $libraryIdDelete);
    $stmt->execute();
    echo "Record deleted from 'libraries' successfully" . PHP_EOL;

    $bookIdDelete = 5;
    $sql = "DELETE FROM books WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $bookIdDelete);
    $stmt->execute();
    echo "Record deleted from 'books' successfully" . PHP_EOL;

    $libraryIdDelete = 3;
    $bookIdDelete = 4;
    $sql = "DELETE FROM library_books WHERE library_id = :library_id AND book_id = :book_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':library_id', $libraryIdDelete);
    $stmt->bindParam(':book_id', $bookIdDelete);
    $stmt->execute();
    echo "Record deleted from 'library_books' successfully" . PHP_EOL;

    $bookIdDelete = 1;
    $sql = "DELETE FROM books WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $bookIdDelete);
    $stmt->execute();
    echo "Record deleted from 'books' successfully" . PHP_EOL;

} catch (PDOException $exception) {
    $logger->error($exception->getMessage());
}
$conn = null;
