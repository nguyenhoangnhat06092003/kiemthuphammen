<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "restaurant_db";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công<br>";

// Chèn món ăn mẫu vào menu
$sql = "INSERT INTO menu (name, description, price) VALUES ('Pizza Margherita', 'Pizza phô mai và cà chua cổ điển', 9.99)";
if ($conn->query($sql) === TRUE) {
    echo "Thêm món ăn mới thành công<br>";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error . "<br>";
}

// Chèn mẫu đặt chỗ
$sql = "INSERT INTO reservations (customer_name, customer_email, reservation_date, guests) VALUES ('Nguyễn Văn A', 'nguyenvana@example.com', '2024-06-15 19:00:00', 4)";
if ($conn->query($sql) === TRUE) {
    echo "Thêm đặt chỗ mới thành công<br>";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error . "<br>";
}

// Lấy và hiển thị các món ăn trong menu
$sql = "SELECT id, name, description, price FROM menu";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<h2>Danh sách món ăn:</h2>";
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Tên món: " . $row["name"] . " - Mô tả: " . $row["description"] . " - Giá: $" . $row["price"] . "<br>";
    }
} else {
    echo "0 kết quả<br>";
}

// Lấy và hiển thị các đặt chỗ
$sql = "SELECT id, customer_name, customer_email, reservation_date, guests FROM reservations";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<h2>Danh sách đặt chỗ:</h2>";
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Tên khách: " . $row["customer_name"] . " - Email: " . $row["customer_email"] . " - Ngày đặt: " . $row["reservation_date"] . " - Số khách: " . $row["guests"] . "<br>";
    }
} else {
    echo "0 kết quả<br>";
}

// Cập nhật món ăn trong menu
$sql = "UPDATE menu SET price = 10.99 WHERE name = 'Pizza Margherita'";
if ($conn->query($sql) === TRUE) {
    echo "Cập nhật món ăn thành công<br>";
} else {
    echo "Lỗi cập nhật: " . $conn->error . "<br>";
}

// Xóa đặt chỗ
$sql = "DELETE FROM reservations WHERE customer_name = 'Nguyễn Văn A'";
if ($conn->query($sql) === TRUE) {
    echo "Xóa đặt chỗ thành công<br>";
} else {
    echo "Lỗi xóa: " . $conn->error . "<br>";
}

// Đóng kết nối
$conn->close();
?>
