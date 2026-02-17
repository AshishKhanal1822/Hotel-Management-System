<?php

include 'config.php';
session_start();
if (isset($_POST['selectedRating'])) {
    $rating = intval($_POST['selectedRating']);
    // You can store this in a "ratings" table
    $query = "INSERT INTO ratings (rating) VALUES ('$rating')";
    mysqli_query($conn, $query);
    echo "<script>swal('Thank you!', 'You rated us $rating stars!', 'success');</script>";
}


// page redirect
$usermail="";
$usermail=$_SESSION['usermail'];
if($usermail == true){

}else{
  header("location: index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <title>Hotel Global</title>
    <!-- boot -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./admin/css/roombook.css">
    <style>
      #guestdetailpanel{
        display: none;
      }
      #guestdetailpanel .middle{
        height: 450px;
      }
    </style>
</head>

<body>
  <nav>
    <div class="logo">
      <img class="globallogo" src="image/globallogo.png" alt="logo">
      <p> GLOBAL HOTEL</p>
    </div>
    <ul>
      <li><a href="#firstsection">Home</a></li>
      <li><a href="#secondsection">Rooms</a></li>
      <li><a href="#thirdsection">Facilites</a></li>
      <li><a href="#contactus">contact us</a></li>
      <a href="./logout.php"><button class="btn btn-danger">Logout</button></a>
    </ul>
  </nav>

  <section id="firstsection" class="carousel slide carousel_section" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="carousel-image" src="./image/HOTEL1.jpeg">
        </div>
        <div class="carousel-item">
            <img class="carousel-image" src="./image/HOTEL2.webp">
        </div>
        <!-- <div class="carousel-item">
            <img class="carousel-image" src="./image/HOTEL13.jpg">
        </div>
        <div class="carousel-item">
            <img class="carousel-image" src="./image/HOTEL14.jpg">
        </div> -->

        <div class="welcomeline">
          <h1 class="welcometag">Welcome to Global Hospitalilty</h1><br><br>
         
        </div>
         
      <!-- bookbox -->
      <div id="guestdetailpanel">
        <form action="" method="POST" class="guestdetailpanelform">
            <div class="head">
                <h3>RESERVATION</h3>
                <i class="fa-solid fa-circle-xmark" onclick="closebox()"></i>
            </div>
            <div class="middle">
                <div class="guestinfo">
                    <h4>Guest information</h4>
                    <input type="text" name="Name" placeholder="Enter Full name" oninput="validateName(this)" />

                  <script>
                     function validateName(input) {
                        input.value = input.value.replace(/[^a-zA-Z\s]/g, '');
                                                   }
                  </script>

                    <input type="email" name="Email" placeholder="Enter Email">

                    <?php
                     $countries = array("Nepal")
                    ?>

                    <select name="Country" class="selectinput">
						<option value selected >Select your country</option>
                        <?php
							foreach($countries as $key => $value):
							echo '<option value="'.$value.'">'.$value.'</option>';
                            //close your tags!!
							endforeach;
						?>
                    </select>
                  
                    
                <!-- <label for="phone">Phone Number:</label><br> -->
            <input type="text" id="phoneInput" name="Phone" placeholder="Enter phone number">
            <small id="phoneError" style="color: red; display: none;">Invalid Nepali mobile number</small>

          <script>
                    const phoneInput = document.getElementById("phoneInput");
                    const phoneError = document.getElementById("phoneError");

                    phoneInput.addEventListener("input", function () {
                        const phone = phoneInput.value.trim();

                        // Accepts only Nepali mobile numbers starting with 97 or 98 and total 10 digits
                        const mobileRegex = /^(97|98)\d{8}$/;

                        if (mobileRegex.test(phone)) {
                            phoneError.style.display = "none";
                        } else {
                            phoneError.style.display = "block";
                        }
                    });     
          </script>



                </div>

                <div class="line"></div>

                <div class="reservationinfo">
                    <h4>Reservation information</h4>
                   
                    <select name="RoomType" class="selectinput">
						<option value selected >Type Of Room</option>
                        <option value="Superior Room">SUPERIOR ROOM</option>
                        <option value="Deluxe Room">DELUXE ROOM </option>
						<option value="Guest House">GUEST HOUSE</option>
						<option value="Single Room">SINGLE ROOM</option>
            
                    </select>
                    <select name="Bed" class="selectinput">
						<option value selected >Bedding Type</option>
                        <option value="Single">Single</option>
                        <option value="Double">Double</option>
						<option value="Triple">Triple</option>
                        <option value="Quad">Quad</option>
						<option value="None">None</option>
                    </select>
                    <select name="NoofRoom" class="selectinput">
						<option value selected >No. of Room</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <!-- <option value="1">2</option>
                        <option value="1">3</option> -->
                    </select>
                    <select name="Meal" class="selectinput">
						<option value selected >Meal</option>
						<option value="Half Board">Half Board</option>
						<option value="Full Board">Full Board</option>
					</select>
                <div class="datesection">
                      <span>
                        <label for="cin">Check-In</label>
                        <input name="cin" id="cin" type="date">
                      </span>
                      <span>
                          <label for="cout">Check-Out</label>
                           <input name="cout" id="cout" type="date">
                    </span>
              </div>

<script>
    // Get today's date in YYYY-MM-DD format
    const today = new Date().toISOString().split('T')[0];

    // Set min attribute to today for both fields
    document.getElementById('cin').setAttribute('min', today);
    document.getElementById('cout').setAttribute('min', today);

    // Optional: update Check-Out date to be at least the Check-In date
    document.getElementById('cin').addEventListener('change', function () {
        const checkInDate = this.value;
        document.getElementById('cout').setAttribute('min', checkInDate);
    });
</script>
                </div>
            </div>
            <div class="footer">
                <button class="btn btn-success" name="guestdetailsubmit">Submit</button>
            </div>
        </form>

        <!-- ==== room book php ====-->
        <?php       
            if (isset($_POST['guestdetailsubmit'])) {
                $Name = $_POST['Name'];
                $Email = $_POST['Email'];
                $Country = $_POST['Country'];
                $Phone = $_POST['Phone'];
                $RoomType = $_POST['RoomType'];
                $Bed = $_POST['Bed'];
                $NoofRoom = $_POST['NoofRoom'];
                $Meal = $_POST['Meal'];
                $cin = $_POST['cin'];
                $cout = $_POST['cout'];

                if($Name == "" || $Email == "" || $Country == ""){
                    echo "<script>swal({
                        title: 'Fill the proper details',
                        icon: 'error',
                    });
                    </script>";
                }
                else{
                    $sta = "NotConfirm";
                    $sql = "INSERT INTO roombook(Name,Email,Country,Phone,RoomType,Bed,NoofRoom,Meal,cin,cout,stat,nodays) VALUES ('$Name','$Email','$Country','$Phone','$RoomType','$Bed','$NoofRoom','$Meal','$cin','$cout','$sta',datediff('$cout','$cin'))";
                    $result = mysqli_query($conn, $sql);

                    
                        if ($result) {
                            echo "<script>swal({
                                title: 'Reservation successful',
                                icon: 'success',
                            });
                        </script>";
                        } else {
                            echo "<script>swal({
                                    title: 'Something went wrong',
                                    icon: 'error',
                                });
                        </script>";
                        }
                }
            }
            ?>
          </div>

    </div>
  </section>
    
  <section id="secondsection"> 
    <img src="./image/homeanimatebg.svg">
    <div class="ourroom">
      <h1 class="head"> Our room </h1>
      <div class="roomselect">
        <div class="roombox">
          <div class="hotelphoto h1"></div>
          <div class="roomdata">
            <h2>Superior Room</h2>
            <p class="price">NRP 5000/night</p>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
              <i class="fa-solid fa-paw"></i>
              <i class="fa-solid fa-dumbbell"></i>
              <i class="fa-solid fa-person-swimming"></i>
            </div>
            <!-- <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button> -->
          </div>
        </div>
        <div class="roombox">
          <div class="hotelphoto h2"></div>
          <div class="roomdata">
            <h2>Deluxe Room</h2>
             <p class="price">NRP 3000/night</p>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
              <i class="fa-solid fa-paw"></i>
              <i class="fa-solid fa-dumbbell"></i>
            </div>
            <!-- <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button> -->
          </div>
        </div>
        <div class="roombox">
          <div class="hotelphoto h3"></div>
          <div class="roomdata">
            <h2>Guest Room</h2>
             <p class="price">NRP 2000/night</p>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
              <i class="fa-solid fa-paw"></i>
            </div>
            <!-- <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button> -->
          </div>
        </div>
        <div class="roombox">
          <div class="hotelphoto h4"></div>
          <div class="roomdata">
            <h2>Single Room</h2>
             <p class="price">NRP 1000/night</p>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
            </div>
            <!-- <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="bookbtn-container" style="text-align: center; margin-top: -35px;">
  <button class="btn btn-danger bookbtn" style="font-size: 18px; padding: 20px 30px;" onclick="openbookbox()">Book Now</button>
</div>




  <section id="thirdsection">
    <h1 class="head"> Facilities </h1>
    <div class="facility">
      <div class="box">
        <h2>Swimming pool</h2>
      </div>
      <div class="box">
        <h2>Pet Friendly </h2>
      </div>
      <div class="box">
        <h2>Foods</h2>
      </div>
      <div class="box">
        <h2>24*7 Gym</h2>
      </div>
      <div class="box">
        <h2> Wifi</h2>
      </div>
    </div>
  </section>
  <section id="rating" style="text-align:center; padding: 40px 0;">
  <h2 style="font-weight:bold;">Rate Our Hotel</h2>
  <form method="post" id="ratingForm">
    <div id="starRating" style="font-size: 30px; color: gray; cursor: pointer;">
      <i class="fa-solid fa-star" data-value="1"></i>
      <i class="fa-solid fa-star" data-value="2"></i>
      <i class="fa-solid fa-star" data-value="3"></i>
      <i class="fa-solid fa-star" data-value="4"></i>
      <i class="fa-solid fa-star" data-value="5"></i>
    </div>
    <input type="hidden" name="selectedRating" id="selectedRating">
    <button type="submit" class="btn btn-success mt-3">Submit Rating</button>
  </form>
</section>


  <section id="contactus">
    <div class="social">
    <a href="https://www.instagram.com/yourusername" target="_blank">
  <i class="fa-brands fa-instagram"></i>
</a>

     <a href="https://www.facebook.com/yourusername" target="_blank">
  <i class="fa-brands fa-facebook"></i>
</a>

    <a href="mailto:yourname@example.com">
  <i class="fa-solid fa-envelope"></i>
</a>


    </div>

  
  </section>
</body>

<script>

    var bookbox = document.getElementById("guestdetailpanel");

    openbookbox = () =>{
      bookbox.style.display = "flex";
    }
    closebox = () =>{
      bookbox.style.display = "none";
    }

</script>
<script>
  const stars = document.querySelectorAll('#starRating i');
  const ratingInput = document.getElementById('selectedRating');

  stars.forEach((star, index) => {
    star.addEventListener('click', () => {
      const rating = star.getAttribute('data-value');
      ratingInput.value = rating;

      // Highlight stars
      stars.forEach((s, i) => {
        s.style.color = i < rating ? 'gold' : 'gray';
      });
    });
  });
</script>

</html>