<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maiphuongle";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Thêm dữ liệu vào bảng
$insertSql = "INSERT INTO my_contacts (full_names, gender, contact_no, email, city, country)
              VALUES ('Taylor Swift', 'Female', '1234', 'taylor@swift.com', 'Los Angeles', 'USA')";

if ($conn->query($insertSql) === TRUE) {
    echo "New record created successfully.<br>";
} else {
    echo "Error inserting data: " . $conn->error . "<br>";
}

// 2. Cập nhật dữ liệu trong bảng
$updateSql = "UPDATE my_contacts SET email='phuwin@tang.com' WHERE full_names='Phuwin Tangsakyuen'";

if ($conn->query($updateSql) === TRUE) {
    echo "Record updated successfully.<br>";
} else {
    echo "Error updating data: " . $conn->error . "<br>";
}

// 3. Xóa dữ liệu từ bảng
$deleteSql = "DELETE FROM my_contacts WHERE full_names='Le Mai Phuong'";

if ($conn->query($deleteSql) === TRUE) {
    echo "Record deleted successfully.<br>";
} else {
    echo "Error deleting data: " . $conn->error . "<br>";
}

// 4. Hiển thị dữ liệu từ bảng
$selectSql = "SELECT id, full_names, gender, contact_no, email, city, country FROM my_contacts";
$result = $conn->query($selectSql);

if ($result->num_rows > 0) {
    // Hiển thị dữ liệu cho mỗi hàng
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["full_names"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results<br>";
}

$conn->close();
?>