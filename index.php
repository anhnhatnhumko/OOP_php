<?php
$servername = "localhost";
$username = "root";
$password = "101204";
$dbname = "product_hades";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn lấy danh sách sản phẩm
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <title>PREMIUM QUALITY STREETWEAR - HADES STUDIO</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

<div class="product-layout">
    <div class="product-container font-oswald">
        
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="product">
                    <div class="image-container">
                        <img src="'.$row['photo_url'].'" class="default-image" alt="'.$row['name'].'" />
                        <div class="buttons">
                            <button>Mua Ngay</button>
                            <button>Thêm Vào Giỏ</button>
                        </div>
                    </div>
                    <h3>'.$row['name'].'</h3>
                    <p>' . number_format($row['price'], 0, ',', '.') . 'đ</p>
                </div>
                ';
            }
        } else {
            echo "<p>Không có sản phẩm nào!</p>";
        }
        $conn->close();
        ?>

    </div>
</div>

</body>
</html>
