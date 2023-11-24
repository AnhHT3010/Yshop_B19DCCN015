<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        #imageContainer {
            width: 300px;
            max-height: 100px;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
            box-sizing: border-box;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .imageItem {
            position: relative;
            width: 50%;
            height: 100px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .imageItem img {
            width: 100%;
            height: auto;
        }

        .deleteButton {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: #ff6262;
            color: #fff;
            border: none;
            padding: 5px;
            cursor: pointer;
            font-size: 12px;
            border-radius: 50%;
            outline: none;
        }
    </style>
</head>

<body>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./trangchu">Home</a></li>
                    <li class="breadcrumb-item"><a href="./trangchu">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">404</li>
                </ol>
            </div>
        </nav>

        <div class="error-content text-center" style="background-image: url(public/assets/images/backgrounds/error-bg.jpg)">
            <div class="container">
                <h1 class="error-title">Error 404</h1>
                <p>We are sorry, the page you've requested is not available.</p>
                <a href="./trangchu" class="btn btn-danger btn-minwidth-lg">
                    <span>BACK TO HOMEPAGE</span>
                    <i class="icon-long-arrow-right"></i>
                </a>
            </div>
        </div>
        <div id="imageContainer"></div>
    </main>
    <script src="//static.filestackapi.com/filestack-js/3.x.x/filestack.min.js"></script>

    <script>
        const client = filestack.init("AdJg69GnASJiAP5DB1CYsz");
        const fileImageArray = [];
        const imageContainer = document.getElementById("imageContainer"); // Đặt ID của phần tử chứa ảnh

        const options = {
            maxFiles: 5,
            onFileUploadFinished(file) {
                fileImageArray.push(file);

                // Hiển thị các ảnh vừa upload
                displayUploadedImages();
            }
        };

        client.picker(options).open();

        function displayUploadedImages() {
            imageContainer.innerHTML = "";

            fileImageArray.forEach((file, index) => {
                const imageItem = document.createElement("div");
                imageItem.classList.add("imageItem");

                const imgElement = document.createElement("img");
                imgElement.src = file.url;

                const deleteButton = document.createElement("button");
                deleteButton.innerHTML = "X";
                deleteButton.classList.add("deleteButton");
                deleteButton.addEventListener("click", function() {
                    fileImageArray.splice(index, 1);
                    console.log(fileImageArray)
                    displayUploadedImages();
                });

                imageItem.appendChild(imgElement);
                imageItem.appendChild(deleteButton);

                imageContainer.appendChild(imageItem);
            });
        }
    </script>
</body>

</html>