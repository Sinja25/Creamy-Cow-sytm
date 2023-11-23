<html>

<head>
    <title> text over image css </title>
    <style>
        .image img {
            width: 100%;
            height: auto;
        }

        .image {
            position: relative;
        }

        .image figcaption {
            position: absolute;
            top: 50%;
            bottom: 50%;
            left: 40%;
        }
    </style>
</head>

<body>
    <figure class="image">
        <img src="images/gg.png" alt="background">
        <figcaption>This is the text over image</figcaption>
    </figure>
</body>

</html>