<?php
error_reporting(0);
include('Database.php');
session_start();

if(!isset($_SESSION["uid"]))
{
    header("Location: login.php");
}

if(isset($_POST["bookroom"]))
{
    $roomid = $_POST["roomid"];
    $roomno = $_POST["roomno"];
    $roomtype = $_POST["roomtype"];
    $roomprice = $_POST["RoomPrice"];

}

if(isset($_POST["adddroom"]))
{
  $acid =  $_POST["aid"];
  $RoomID = $_POST["rid"];

  $Roomno = $_POST["rno"];
  $RoomType = $_POST["rtype"];
  $Cname = $_POST["cname"];
  $Cmail = $_POST["cmail"];
  $Cphone = $_POST["cphn"];
  $Caddrs = $_POST["caddr"];
  $Cidn = $_POST["cidn"];
  $Cindate = $_POST["cindate"];
  $Coutdate = $_POST["coutdate"];
  $Cadult = $_POST["cadlts"];
  $Cchild = $_POST["child"];

  // price
  $price = $_POST["rprice"];

  // total guest

  $totalguest = $Cadult + $Cchild;

  // calculate total price
  $indate = strtotime($_POST['cindate']);
  $outdate = strtotime($_POST['coutdate']);
  $day = $outdate - $indate;
  $totalday =  round($day / (60 * 60 * 24));

  $totalprice = $totalday * $price;
 
  // insert data
  $sql = "INSERT INTO `reservation`(`Acid`,`Rev_name`, `Rev_email`, `Rev_phone`, `Rev_IdnPan`, `Rev_Add`, `Rev_Sdate`, `Rev_Edate`, `rev_adults`, `rev_child`, `rev_totalguest`, `Rev_roomno`, `Rev_roomtype`, `Room_total`, `status`) 
  VALUES ('$acid','$Cname','$Cmail','$Cphone','$Cidn','$Caddrs','$Cindate','$Coutdate','$Cadult','$Cchild','$totalguest','$Roomno','$RoomType','$totalprice','0')";
  
  $conn->query($sql);
  echo '
  <script>
  alert("Booking information will be notified shortly through email or phone");
  window.location.href = "/account.php";
  </script>';


  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Booking Form
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" >
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
  </script>
</head>

<body>

  <!--Nevbar-->

  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand text-dark" href="#">The RIVERWAYS RETREAT</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#room">Rooms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#contactus">Contact Us</a>
          </li>
          <?php
          if(!$_SESSION["uid"])
          {
            echo '
            <li class="nav-item">
            <a class="nav-link" href="Login.php">Login</a>
             </li>';
          }
          else
          {
            echo '
            <li class="nav-item">
            <a class="nav-link" href="account.php">'.$_SESSION["uname"].'</a>
            </li>';
          }
          ?>
         
        </ul>

      </div>
    </div>
  </nav>

  <!-- Form -->

  <div class="container">
    <div class="row">
      <div class="col m-5">
        <form method="POST" action="">
          <input type="hidden" name="aid" value="<?php echo $_SESSION["uid"] ?>">
          <input type="hidden" name="rid" value="<?php echo $roomid ?>">

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label  text-dark">Room No</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" readonly  name="rno" value="<?php echo $roomno ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Room Type</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" readonly name="rtype" value="<?php echo $roomtype ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Room Price(One Night)</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" readonly name="rprice" value="<?php echo $roomprice ?>">
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Full Name</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" placeholder="Full Name" name="cname" value="<?php echo $_SESSION["uname"] ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Email</label>
            <div class="col-sm-10">
              <input type="email"  class="form-control" placeholder="Email Address" value="<?php echo $_SESSION["uemail"] ?>" name="cmail" >
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Phone No</label>
            <div class="col-sm-10">
              <input type="tel"  class="form-control" pattern="[789][0-9]{9}"  placeholder="e.g : 9876543210" name="cphn" required >
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Address</label>
            <div class="col-sm-10">
              <textarea type="text"  class="form-control" style="text-transform: capitalize;" placeholder="Your Full Address" name="caddr" required></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Identity(PAN)</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control text-uppercase" style="text-transform:uppercase" maxlength="10" minlength="10" placeholder="PAN CARD Number" name="cidn" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">CheckIn</label>
            <div class="col-sm-10">
              <input type="date"  class="form-control"  name="cindate" id="cindate" value="<?php echo date("Y-m-d");?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">CheckOUT</label>
            <div class="col-sm-10">
              <input type="date"  class="form-control"  name="coutdate" id="coutdate" value="<?php echo date("Y-m-d");?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Adults</label>
            <div class="col-sm-10">
              <select type="number"  class="form-control"  name="cadlts" required>
                <option selected>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label text-dark">Children</label>
            <div class="col-sm-10">
              <select type="number"  class="form-control" name="child" required>
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary p-3 mt-3 " name="adddroom">Confirm Booking</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!--footer-->

<footer>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12 segment-one">
            <h2>Find Us</h2>
            Jorhat<br>
            Assam<br>
            India 785001
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 segment-two">
            <h2>Contact Us</h2>
            <ul>
              <li><a href="#"></a>Email us at theriverways@gmail.com</li>
              <li><a href="#"></a>call us at 0373-2367549</li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 segment-three">
            <h2>Follow Us </h2>
            <p>Please follow us on our<br> social media profile</p>
            <a href="https://www.facebook.com/upasana.sarmah.92"><i class="fab fa-facebook"
                style="font-size: 150%;"></i></a>
            <a href="https://twitter.com/RKrishnatra"><i class="fab fa-twitter" style="font-size: 150%;"></i></a>
            <a href="https://www.instagram.com/rabinasharma_/"><i class="fab fa-instagram"
                style="font-size: 150%;"></i></a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 segment-four">
          <div class="copyright-text">
            <p><br>Copyright &copy; 2021 <br>Hemanga Bora
              <br><br>Login as Admin: <a href="/admin/">Login</a></p>
          </div>
        </div>

        </div>
        
      </div>

    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>