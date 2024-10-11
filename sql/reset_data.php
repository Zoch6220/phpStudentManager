<?php
require_once 'Database.php';

try {
    $db = Database::getInstance();
    $conn = $db->getConnection();

    // Disable foreign key checks
    $conn->exec('SET FOREIGN_KEY_CHECKS = 0');

    // List of tables to truncate
    $tables = ['students', 'courses', 'grades'];

    // Truncate each table and reseed
    foreach ($tables as $table) {
        $conn->exec("TRUNCATE TABLE $table");
        $conn->exec("ALTER TABLE $table AUTO_INCREMENT = 1");
    }

    // Re-enable foreign key checks
    $conn->exec('SET FOREIGN_KEY_CHECKS = 1');

    echo "All data deleted and tables reseeded successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
