<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        <div class="error-content text-center"
            style="background-image: url(public/assets/images/backgrounds/error-bg.jpg)">
            <div class="container">
                <h1 class="error-title">Error 404</h1>
                <p>We are sorry, the page you've requested is not available.</p>
                <a href="./trangchu" class="btn btn-danger btn-minwidth-lg">
                    <span>BACK TO HOMEPAGE</span>
                    <i class="icon-long-arrow-right"></i>
                </a>
            </div>
        </div>
    </main>
    <script src="//static.filestackapi.com/filestack-js/3.x.x/filestack.min.js"></script>

    <script>
    const client = filestack.init("AdJg69GnASJiAP5DB1CYsz");
    client.picker().open();
    </script>
</body>

</html>