<?php include 'include/header.php'; ?>
<!-- <link rel="stylesheet" href="css/new2.css"> -->
<style>
  .sticky-top {
    position: fixed;
    top: 0;
  }

  /* .bgNew {
    margin-top: 3rem;
    background: url(images/gg.png) no-repeat;
    background-size: 100% 85%;
  } */


  .bgNew {
    margin-top: 3.5rem;
  }

  .image img {
    width: 100%;
    height: auto;
  }

  .image {
    position: relative;
  }

  .image figcaption {
    position: absolute;
    top: 35%;
    left: 20%;
  }

  h1.tit,
  p.hero_p {
    color: white;
  }

  h1.tit {
    font-size: 34px;
    width: 100%;
  }

  p.hero_p {
    font-size: 20px;
    width: 100%;
  }

  @media only screen and (max-width: 1024px) {

    .image figcaption {
      position: absolute;
      top: 20%;
      left: 10%;
    }

    h1.tit {
      font-size: 34px;
      width: 100%;
    }

    p.hero_p {
      font-size: 20px;
      width: 100%;
    }
  }

  @media screen and (max-width: 920px) {

    .image img {
      width: 100%;
      height: auto;
    }

    .image {
      position: relative;
    }

    .image figcaption {
      position: absolute;
      top: 35%;
      left: 10%;

    }

    h1.tit {
      font-size: 24px;
      width: 100%;
    }

    p.hero_p {
      font-size: 16px;
      width: 100%;
    }

    a.btn-ord {
      font-size: 22px;
      padding: 3.4px 1px;
      width: 8rem;
      height: 2.3rem;
      margin-left: 10px;
      margin-top: -20px;
    }

  }

  @media screen and (max-width: 700px) {

    .image figcaption {
      position: absolute;
      top: 18%;
      left: 8%;
    }

    h1.tit {
      font-size: 16px;
      width: 100%;
    }

    p.hero_p {
      font-size: 10px;
      width: 100%;
    }

    a.btn-ord {
      font-size: 10px;
      padding: .4px 1px;
      width: 5rem;
      height: 1rem;
      margin-top: -30px;
    }
  }

  @media screen and (max-width: 400px) {

    .image figcaption {
      position: absolute;
      top: 18%;
      left: 8%;
    }

    h1.tit {
      font-size: 16px;
      width: 100%;
    }

    p.hero_p {
      font-size: 10px;
      width: 100%;
    }

    a.btn-ord {
      font-size: 10px;
      padding: .4px 1px;
      width: 5rem;
      height: 1rem;
      margin-top: -30px;
    }
  }
</style>

<body>
  <header class="sticky-top">
    <!-- As a heading -->
    <?php include 'include/topbar.php'; ?>
  </header>
  <br><br>
  <main class="main-container">
    <div class="bgNew">
    <center>
        <figure class="image">
          <img src="images/gg.png" alt="background">
          <figcaption>
            <h1 class="tit">Leave you feeling refreshed</h1>
            <p class="hero_p">Are you thirsty? Order here what you<br> want, and in an instant it will be in <br>front
              of you.
            </p>
            <a class="btn btn-ord btn-xl text-decoration-none text-light" href="login.php">Order Now</a>
          </figcaption>
        </figure>
      </center>
      <!-- <div class="container-fluid bg-2">
        <div class="pads text-light">
          <div class="row">
          </div>
          <br>
          <div class="row">
            <div class="col-7 text-center">
              <h1 class="tit">Leave you feeling refreshed</h1>
              <p class="hero_p">Are you thirsty? Order here what you want, and in an instant it will be in front of you.
              </p>
              <a class="btn btn-ord btn-xl text-decoration-none text-light" href="login.php">Order Now</a>
              <br>
              <br>
              <br>
            </div>
            <div class="row">
              <div class="col-7 text-center">
              </div>
            </div>
            <div class="row">
              <div class="col-7 text-center">
              </div>
              <br><br>
            </div>
          </div>
        </div>
      </div> -->
      <!-- <img src="images/gg.png" class="d-block w-100" alt="..."> -->
    </div>

    <div class="container-fluid p-5 " id="promo">
      <div class="row d-flex justify-content-center mb-5">
        <br>
        <h1 class="text-center m-5">Exclusive Promos</h1>
        <div class="col-3 ">
          <img src="images/loyalty.jpg" class="im-card" width="100%" alt="">
        </div>
        <!-- <div class="col-3 ">
        <img src="images/prod/promo2.jpg" class="im-card" width="100%" alt="">
      </div>
      <div class="col-3 ">
        <img src="images/prod/promo3.jpg" class="im-card" width="100%" alt="">
      </div> -->
      </div>
    </div>
    <div class="container-fluid p-5 bg-3">
      <div class="row d-flex justify-content-center">
        <h1 class="text-center m-5">Featured Menu Items</h1>

        <div class="col-sm-2 text-center card card-hover bgg-2">
          <h1 class="text-light">Ice Coffee</h1>
          <img src="images/coffee.png" class="card-sm" width="100%" alt="">
        </div>
        <div class="col-sm-2 text-center card card-hover bgg-1">
          <h1 class="text-light">Ice Cream</h1>
          <img src="images/ice.png" class="card-sm" width="100%" alt="">
        </div>
        <div class="col-sm-2 text-center card card-hover bgg-4">
          <h1 class="text-light">Milktea</h1>
          <img src="images/mtea.png" class="card-sm" width="100%" alt="">
        </div>
        <div class="col-sm-2 text-center card card-hover bgg-3">
          <h1 class="text-light">Sundae</h1>
          <img src="images/sundae.png" class="card-sm" width="100%" alt="">
        </div>
        <div class="col-12 text-center m-4">
          <a href="prod.php" class="btn-ord text-decoration-none text-light">View Menu</a>
        </div>
      </div>
    </div>

    <div class="container-fluid ">
      <div class="row d-flex justify-content-center ">

        <div class="col-sm-5 card card-featured text-center">
          <div class="row justify-content-center">
            <div class="col-12">
              <img src="images/p2.jpg" class="shadow1" width="30%" alt="">
            </div>
            <div class="col-5 border-bottom pt-5 pb-1">
              <h1 class="text-dark titel">What We Do</h1>
            </div>
            <div class="col-8 text-f pt-3">
              <p>Creamy Cow's mission is to serve and satisfy your daily doses of cravings and happiness.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-5 card card-featured text-center">
          <div class="row justify-content-center">
            <div class="col-12 ">
              <img src="images/p1.jpg" class="shadow2" width="30%" alt="">
            </div>
            <div class="col-5 border-bottom2 pt-5 pb-1">
              <h1 class="text-dark titel">What We Stand For</h1>
            </div>
            <div class="col-8 text-f pt-3">
              <p>To create awareness of the healthy lifestyle with foods.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include 'include/footer.php'; ?>
</body>