<?php
    $msg = "";
  use PHPMailer\PHPMailer\PHPMailer;
  include_once "PHPMailer/PHPMailer.php";
  include_once "PHPMailer/Exception.php";
  include_once "PHPMailer/SMTP.php";

  if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (isset($_FILES['attachment']['name']) && $_FILES['attachment']['name'] != "") {
      $file = "attachment/" . basename($_FILES['attachment']['name']);
      move_uploaded_file($_FILES['attachment']['tmp_name'], $file);
    } else
      $file = "";

    $mail = new PHPMailer();

    //if we want to send via SMTP
    $mail->Host = "smtp.gmail.com";
    //$mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = "norsemyth7698@gmail.com";
    $mail->Password = "Norse777";
    $mail->SMTPSecure = "ssl"; //TLS
    $mail->Port = 465; //587

    $mail->addAddress('norsemyth7698@gmail.com');
    $mail->setFrom($email);
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $message;
    $mail->addAttachment($file);

    if ($mail->send())
        $msg = "Your email has been sent, thank you!";
    else
        $msg = "Please try again!";

    unlink($file);
  }
?>
<!doctype html>
<html lang="en">
<head>
   
 
    <title>The Tales & legends of norse mythology and the vikings </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="style1.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
  


  <style>

        body {
              font-family: Montserrat, sans-serif;
            color: #777;
        }
        .navbar {
              font-family: Montserrat, sans-serif;
              margin-bottom: 0;
              background-color: #000;
              border: 0;
              font-size: 11px !important;
              letter-spacing: 4px;
              opacity: 0.9;
               }
          .thumbnail {
                padding: 0px;
             border: none;
               border-radius: 0;
        }
          .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
.thumbnail p {
      margin-top: 15px;
      color: #555;
  }
                    .container {
             padding: 80px 120px;
                    }


      </style>

</head>



<body id="HomePage" data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="#myPage">norse</a></div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.html">HOME</a></li>
            <li><a href="index.html#history">HISTORY</a></li>
            <li><a href="index.html#contacts">CONTACT</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="merchandise1.html">Merchandise</a></li>
            <li><a href="index.html#books">BOOKS</a></li>
            <li><a href="media1.html">MEDIA</a></li>
            </ul>
            <li>
          </ul>
        </div>
        </div>
    </nav>





<!-- Container (Contact Section) -->
<div class="container">
  <?php if ($msg != "") echo "$msg<br><br>"; ?>
  <form method="post" action="contact.php" enctype="multipart/form-data">
  <h3 class="text-center">Contact</h3>
  <p class="text-center"><em>We love our fans!</em></p>

  <div class="row">
    <div class="col-md-4">
      <p>Fan? Drop a note.</p>


      <p><span class="glyphicon glyphicon-map-marker"></span>Chicago, US</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: mail@mail.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="subject" name="subject" placeholder="subject" type="text" >
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email">
        </div>
      </div>
      <textarea class="form-control" id="message" name="message" placeholder="Your Message" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <input class="btn pull-right" name="submit" type="submit" value="Send Mail"></button>
<input class="form-control" type="file" name="attachment"><br>
                  
        </div>
      </div>
    </div>
  </div>
</form>
</div>


<!-- Footer -->

<footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $("a").toggle();
    });
});
</script>



<button class="btn">A project BY TEIT</button>

    <a> <img src="twitter.png" height="50px" width="50px"></a>
    <a> <img src="fb1.png" height="50px" width="50px"></a>


      </footer>



  
</body>
</html>






