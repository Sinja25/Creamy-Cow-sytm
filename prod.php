<?php
include 'include/header.php';
?>

<style>
  .card {
    border: 2px solid sandybrown;
  }

  .container {
    margin-bottom: 2%;
  }

  .sidebar {
    margin: 0;
    padding: auto;
    width: 200px;
    background-color: #f1f1f1;
    position: absolute;
    overflow: hidden;
  }

  .sidebar a {
    display: block;
    color: black;
    padding: 16px;
    text-decoration: none;
    border-bottom: 2px solid sandybrown;
  }

  .sidebar a.active {
    background-color: #04AA6D;
    color: white;
  }

  .sidebar a:hover:not(.active) {
    background-color: #b5865e;
    color: white;
  }

  div.content {
    margin-top: 5%;
    margin-left: 200px;
    padding: 1px 16px;
    height: 1000px;
  }

  @media screen and (max-width: 920px) {
    .card-img-top {
      height: 10rem;
    }

    .sidebar {
      margin-top: 5%;
    }

    div.content {

      overflow-y: scroll;

    }

  }

  @media screen and (max-width: 720px) {
    .sidebar {
      width: auto;
      height: auto;
      position: relative;
    }

    div.content {
      overflow-y: scroll;
    }

    .sidebar a {
      text-align: center;
      float: left;
    }

    div.content {
      margin-left: 0;
    }

  }

  @media screen and (max-width: 400px) {

    .sidebar {
      text-align: center;
    }

    .sidebar a {
      text-align: center;
      float: none;
    }
  }
</style>

<body>
  <div class="navtop">
    <?php
    include 'include/topbar.php';

    //initialize cart if not set or is unset
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
    }

    if (!isset($_SESSION['user'])) {
      // header("Location: login.php");
      echo "<script>
        window.location.href='login.php';
    </script>";
      exit();
    }
    ?>
  </div>
  <br>
  <br>
  <br>
  <div class="main-container">
    <br><br>
    <div class="container">
      <div class="sidebar text-center">
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
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script type="text/javascript">

                      Swal.fire({
                        toast: true,
                        icon: 'success',
                        title: '<?= $_SESSION['message'] ?>',
                        animation: false,
                        position: 'top-right',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                      })
                    </script>
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

                  <div class="col text-center main">
                    <div class="card h-100">
                      <img src="admin/<?php echo $row['image_name'] ?>" class="card-img-top" width="100%" height="250px">
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