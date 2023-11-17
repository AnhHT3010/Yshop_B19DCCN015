<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/assets/css/banner.css">

</head>

<body>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <?php
            for ($i = 0; $i < count($data_slider); $i++) {
                $item = $data_slider[$i];
                $active = ($i === 0) ? "active" : "";
                echo '<div class="carousel-item ' . $active . '">';
                echo '<img src="public/assets/images/banners/' . $item['Anh'] . '" alt="' . $item['TenBN'] . '">';
                if ($item['TenBN'] != "") {
                    echo '<div class="carousel-caption">';
                    echo '<h3 class = "text-white  p-3 w-50 mx-auto rounded" style = "background-color: rgba(0, 0, 0, 0.5);">' . $item['TenBN'] . '</h3>'; // Hiển thị tên ở đây
                    echo '</div>';
                }
                echo '</div>';
            }
            ?>
        </div>

        <a class="carousel-control-prev custom" style="background-color: #333;
            border-radius: 50%; 
            width: 70px; 
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            color: #fff; " href="#myCarousel" data-slide="prev">
            <span>&#9664;</span> <!-- Mũi tên trái -->
        </a>
        <a class="carousel-control-next custom" style="background-color: #333;
            border-radius: 50%; 
            width: 70px; 
            height: 70px;
            display: flex;
            margin: auto;
            justify-content: center;
            align-items: center;
            color: #fff; " href="#myCarousel" data-slide="next">
            <span>&#9654;</span> <!-- Mũi tên phải -->
        </a>
    </div>
</body>

</html>