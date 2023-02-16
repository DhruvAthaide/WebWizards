<?php
session_start();

$userprofile = $_SESSION['user_name'];

if ($userprofile == true) {
} else {
  header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <style>
    /* Navbar */
    nav {
      padding-top: 19px;
      width: 70vw;
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: auto;
    }

    .navlogo {
      display: flex;
      max-width: 10%;
      height: auto;
    }

    .navbar {
      position: relative;
      text-decoration: none;
      color: #0A2540;
      font-size: 18px;
      letter-spacing: 5px;
      padding: 0 20px;
      cursor: pointer;
    }

    .navbar:before,
    .navbar:after {
      content: "";
      position: absolute;
      height: 3px;
      width: 0;
      background: #0A2540;
      transition: 0.5s;
    }

    .navbar:after {
      left: 0;
      bottom: -10px;
    }

    .navbar:before {
      right: 0;
      top: -10px;
    }

    .navbar:hover:after,
    a:hover:before {
      width: 100%;
    }

    /* NavBar Ends */

    /* Pages */
    .body {
      margin: 0em;
    }

    .page {
      width: 100vw;
      height: 100vh;
      position: fixed;
      top: 0;
      left: -100vw;
      overflow-y: auto;
      z-index: 0;
      background-color: hsl(0, 0%, 100%);
    }

    .page:target {
      left: 0vw;
      z-index: 1;
    }

    /* Pages End */


    /* About */
    #two>.maincontent {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
      min-height: 82vh;
      width: 100%;
      background: #DADADA;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 10px;
    }

    .about-us {
      height: 100vh;
      width: 1155px;
      padding: 5px 0;
      background: #ddd;
      /* display: flex;
      align-items: center;
      justify-content: center; */
      text-align: center;
      margin: auto;
      /* margin-left: 400px; */
    }

    /*.pic{}*/
    .about {
      width: 1130px;
      max-width: 85%;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-around;
    }

    .text {
      width: 95%;
    }

    .text h2 {
      font-size: 90px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .text h5 {
      font-size: 22px;
      font-weight: 500;
      margin-bottom: 20px;
    }

    span {
      color: #4070f4;
    }

    .text p {
      font-size: 18px;
      line-height: 25px;
      letter-spacing: 1px;
    }


    /* Contact */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

    #three>.maincontent {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
      min-height: 82vh;
      width: 100%;
      background: #DADADA;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {

      width: 85%;
      background: #fff;
      border-radius: 6px;
      padding: 20px 60px 30px 40px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .container .content {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .container .content .left-side {
      width: 25%;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-top: 15px;
      position: relative;
    }

    .content .left-side::before {
      content: "";
      position: absolute;
      height: 70%;
      width: 2px;
      right: -15px;
      top: 50%;
      transform: translateY(-50%);
      background: #DADADA;
    }

    .content .left-side .details {
      margin: 14px;
      text-align: center;
    }

    .content .left-side .details i {
      font-size: 30px;
      color: #0A2540;
      margin-bottom: 10px;
    }

    .content .left-side .details .topic {
      font-size: 18px;
      font-weight: 500;
    }

    .content .left-side .details .text-one,
    .content .left-side .details .text-two {
      font-size: 14px;
      color: #afafb6;
    }

    .container .content .right-side {
      width: 75%;
      margin-left: 75px;
    }

    .content .right-side .topic-text {
      font-size: 23px;
      font-weight: 600;
      color: #0A2540;
    }

    .right-side .input-box {
      height: 50px;
      width: 100%;
      margin: 12px 0;
    }

    .right-side .input-box input,
    .right-side .input-box textarea {
      height: 100%;
      width: 100%;
      border: none;
      outline: none;
      font-size: 16px;
      background: #f0f1f8;
      border-radius: 6px;
      padding: 0 15px;
      resize: none;
    }

    .right-side .message-box {
      min-height: 110px;
    }

    .right-side .input-box textarea {
      padding-top: 6px;
    }

    .right-side .button {
      display: inline-block;
      margin-top: 12px;
    }

    .right-side .button input[type="button"] {
      color: #fff;
      font-size: 18px;
      outline: none;
      border: none;
      padding: 8px 16px;
      border-radius: 6px;
      background: #0A2540;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .button input[type="button"]:hover {
      background: #5029bc;
    }

    @media (max-width: 950px) {
      .container {
        width: 90%;
        padding: 30px 40px 40px 35px;
      }

      .container .content .right-side {
        width: 75%;
        margin-left: 55px;
      }
    }

    @media (max-width: 820px) {
      .container {
        margin: 40px 0;
        height: 100%;
      }

      .container .content {
        flex-direction: column-reverse;
      }

      .container .content .left-side {
        width: 100%;
        flex-direction: row;
        margin-top: 40px;
        justify-content: center;
        flex-wrap: wrap;
      }

      .container .content .left-side::before {
        display: none;
      }

      .container .content .right-side {
        width: 100%;
        margin-left: 0;
      }
    }


    /* Events */
    .event-container {
      font-family: Arial, Helvetica, sans-serif;
      background-color: #f7f7f7;
    }

    .event-container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 100px rgba(0, 0, 0, 0.1);
    }

    .event-container>form {
      display: flex;
      flex-direction: column;
    }

    .event-container>label {
      margin-bottom: 10px;
      font-weight: bold;
    }

    .event-container>input[type="text"],
    .event-container>textarea {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 20px;
      font-size: 16px;
    }

    .event-container>input[type="checkbox"] {
      margin-right: 10px;
    }

    .event-container>input[type="submit"] {
      background-color: #008cba;
      color: #fff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }

    .event-container>input[type="submit"]:hover {
      background-color: #0077a3;
    }


    /* Footer */
    @import url(https://fonts.googleapis.com/css?family=Alegreya+Sans:300);

    body {
      font-family: 'Alegreya Sans', sans-serif;
    }

    .footer {
      /* position: absolute;
      bottom: 0; */
      height: 0px;
      align-items: center;
      width: 100%;
      justify-content: center;
      display: flex;
      height: min-content;
    }

    footer {
      padding-top: 0;
      background-color: #4F5254;
      color: #bbb;
    }

    .one>.navbar {
      /* position: absolute;
      bottom: 0; */
      height: 0px;
      align-items: center;
      width: 100%;
      justify-content: center;
      display: flex;
      height: min-content;
    }

    .events {
      height: 480px;
      overflow: auto;
    }

    .one>.maincontent {
      margin-top: 20px;
      display: flex;
      justify-content: space-around;
      height: 568px;
    }

    #sep {
      background-color: transparent;
      height: 10px;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <!-- Page 1-Home -->
  <div class="one" style="background-color: #A9AAA9;">
    <nav>
      <img src="mh1.png" alt="logo" class="navlogo" />
      <a href="#one" class="navbar">Home</a>
      <a href="#two" class="navbar">About</a>
      <a href="#three" class="navbar">Contact</a>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </nav>
    <div class="maincontent">
      <div class="events">
        <div class="card" style="width: 18rem;">
          <?php



          $conn = new mysqli("localhost", "sam", "", "sam");

          $sql = "SELECT * FROM events";

          $result = $conn->query($sql);

          if (!$result) {
            die("Invalid query" . $conn->error);
          }

          while ($row = $result->fetch_assoc()) {


            echo "
            <div class='card-body'>
              <h5 class='card-title'>$row[event_name]</h5>
              <p class='card-text'>$row[description]</p>
              <p class='card-text'>$row[location]</p>
              <p class='card-text'>$row[date], $row[time]</p>
            </div>
            <div id='sep'>
            <hr>
            </div>
          ";
          }

          ?>
        </div>
      </div>
      <div class="chats">
        <iframe src="https://deadsimplechat.com/UqctFJJw8" width="600" height="480" scrolling="no" style="overflow: hidden;border-radius: 40px; border: 2px solid #000000;" frameborder=" 1"></iframe>
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
      <br>
      <div class="content">
        <p align="center">&copy; 2023 Nirman -Web Wizards</p>
      </div>
  </div>
  </footer>

  <!-- Page 2-About -->
  <div class="page" id="two" style="background-color: #DADADA;">
    <nav>
      <img src="mh1.png" alt="logo" class="navlogo" />
      <a href="#one" class="navbar">Home</a>
      <a href="#two" class="navbar">About</a>
      <a href="#three" class="navbar">Contact</a>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </nav>

    <div class="maincontent">
      <section class="about-us">
        <div class="about">
          <!--<img src="girl.png" class="pic">-->
          <div class="text">
            <h2>About Us</h2>
            <h5>Front-end Developers & <span>Designers</span></h5>
            <p>Welcome to our team's about us section! We are a group of skilled and passionate coders who have come together to create an exceptional
              website that boasts both front-end and back-end development.
              Our team is composed of talented individuals with diverse backgrounds, including computer science and web development.
              With years of experience under our belts, we have honed our skills in a range of programming languages, including JavaScript, HTML, CSS, PHP, and more.<br>
              Our goal is to create a seamless user experience by designing an intuitive and aesthetically pleasing front-end that caters to our users' needs.
              We believe that the front-end is a critical component of any website, and we strive to create a visually stunning and engaging interface that is user-friendly and functional.
              On the back-end, our team's expertise lies in developing robust and scalable systems that support our website's core functionality. <br>
              We are proficient in building APIs, integrating databases, managing servers, and ensuring that our website runs smoothly and efficiently.
              Our team's commitment to excellence is reflected in the quality of our work. <br>
              We approach every project with attention to detail, dedication, and creativity, ensuring that our website stands out from the rest. Our work is a reflection of our passion for coding and our desire to create the best possible user experience.
              We are proud of the work we have done, and we look forward to taking on new challenges in the future.
              Thank you for considering our team for your next web development project.</p>
          </div>
        </div>
      </section>
    </div>


    <!-- Footer -->
    <footer class="footer">
      <br>
      <div class="content">
        <p align="center">&copy; 2023 Nirman -Web Wizards</p>
      </div>
  </div>
  </footer>

  <!-- Page 3-Contact -->
  <div class="page" id="three" style="background-color: #DADADA;">
    <nav>
      <img src="mh1.png" alt="logo" class="navlogo" />
      <a href="#one" class="navbar">Home</a>
      <a href="#two" class="navbar">About</a>
      <a href="#three" class="navbar">Contact</a>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </nav>
    <div class="maincontent">
      <div class="container">
        <div class="content">
          <div class="left-side">
            <div class="address details">
              <i class="fas fa-map-marker-alt"></i>
              <div class="topic">Address</div>
              <div class="text-one">Amity Mumbai</div>
              <div class="text-two">Bhatan Mumbai Pune Expressway</div>
            </div>
            <div class="phone details">
              <i class="fas fa-phone-alt"></i>
              <div class="topic">Phone</div>
              <div class="text-one">+91 9320693337</div>
              <div class="text-two">+91 9372660546</div>
            </div>
            <div class="email details">
              <i class="fas fa-envelope"></i>
              <div class="topic">Email</div>
              <div class="text-one">webwizards@gmail.com</div>
              <div class="text-two">nirman@gmail.com</div>
            </div>
          </div>
          <div class="right-side">
            <div class="topic-text">Send us a message</div>
            <form id="myform" method="post" action="https://script.google.com/macros/s/AKfycbw64ay3jQ29EtPS5l7-IINyEp0tSY3vJ0Ur01q4_NUwLB0hhzDeqRY545Hkku05iGMHAg/exec">
              <div class="input-box">
                <input type="text" placeholder="Enter your name" id="full_name" name="full_name" autocomplete="off" required>
              </div>
              <div class="input-box">
                <input type="text" placeholder="Enter your email" id="full_email" name="full_email" autocomplete="off" required>
              </div>
              <div class="input-box message-box">
                <input type="text" placeholder="Enter your Message" id="full_message" name="full_message" autocomplete="off" required>
              </div>
              <div class="button">
                <input type="submit" class="submit-finalbtn" name="submit" required="" placeholder="SUBMIT">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
      <br>
      <div class="content">
        <p align="center">&copy; 2023 Nirman -Web Wizards</p>
      </div>
  </div>
  </div>
  </div>
  </footer>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script>
    // Form Submition Code
    var $form = $('form#test-form'),
      url = 'https://script.google.com/macros/s/AKfycbwTVyK2PUBa1wys5WBpD-H81tutzxw6-463RWPFkmtv8OVoN573TEZJYpXESCkm9HlHWw/exec'

    $('#submit-form').on('click', function(e) {
      e.preventDefault();
      var jqxhr = $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        data: $form.serializeObject()
      }).success(
        // do something
      );
    })
  </script>
</body>

</html>