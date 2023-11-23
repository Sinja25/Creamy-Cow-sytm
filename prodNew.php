<?php include 'include/header.php'; ?>

<style>
    .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #f1f1f1;
        position: fixed;
        overflow: auto;
    }

    .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
    }

    .sidebar a.active {
        background-color: #04AA6D;
        color: white;
    }

    .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
    }

    div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 1000px;
    }

    @media screen and (max-width: 700px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .sidebar a {
            float: left;
        }

        div.content {
            margin-left: 0;
        }
    }

    @media screen and (max-width: 400px) {
        .sidebar a {
            text-align: center;
            float: none;
        }
    }
</style>

<body>
    <div class="navtop">
        <?php include 'include/topbar.php'; ?>
    </div>
    <br>
    <br>
    <br>
    <div class="main-container">
        <br><br>
        <div class="container">
            <div class="sidebar">
                <?php
                $select = "SELECT * FROM tbl_category";

                $result = $con->query($select);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) { ?>
                        <a href="prod-list.php?category=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a>
                    <?php }
                }
                ?>
            </div>

            <div class="content">
                <div class="main-container">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <?php
                                if (!isset($_GET['id'])) {
                                    if (isset($_SESSION['message'])) {
                                        ?>
                                        <div class="alert alert-info text-center">

                                            <p class='text-center text-primary'>
                                                <?php echo $_SESSION['message']; ?>
                                            </p>

                                        </div>
                                        <?php
                                        unset($_SESSION['message']);
                                    }
                                }
                                $sql = "SELECT a.*,b.title as categ
        FROM tbl_food as a
        LEFT JOIN tbl_category as b
        ON a.category_id = b.id";
                                $query = $con->query($sql);
                                $inc = 4;
                                while ($row = $query->fetch_assoc()) {
                                    $inc = ($inc == 4) ? 1 : $inc + 1;
                                    if ($inc == 1) ?>

                                    <div class="col text-center">
                                        <div class="card h-100">
                                            <img src="admin/<?php echo $row['image_name'] ?>" class="card-img-top"
                                                width="100%" height="250px">
                                            <h5 class="card-title">
                                                <?php echo $row['title'] ?>
                                            </h5>
                                            <?php echo isset($_SESSION['id']) ? '<a href="add_cart.php?id=' . $row['id'] . '" class="btn-order btn-none text-decoration-none text-dark"><span class="glyphicon glyphicon-plus"></span> Add to cart</a>' : '<a href="registration.php" class="btn-order btn-none text-decoration-none text-dark"><span class="glyphicon glyphicon-plus"></span> Add to cart</a>' ?>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <?php include 'include/footer.php'; ?>
</body>