<?php
include_once("includes/header.php");
include_once("includes/Email.php");

$mail_sent = false;
if(isset($_POST['cont_sbt'])){
    $email = new Email();
    $email->mail->Subject = "Bgfhomes Contact Us";
    $message = "<p> Name :- ".$_POST['uname']." </p>".
                "<p> email :- ".$_POST['email']." </p>".
                "<p> phone :- ".$_POST['phone']." </p>".
                "<p> Message :- ".$_POST['msg']."</p>".
                "<p> <a href='http://www.bgfhomes.com/login.php'>Login Here</a> </p>".
                "<p> Thanks </p>";
    $email->mail->Body = $message;
    $email->mail->addAddress("visitation@bgfhomes.com");
    if($email->send()){
        $mail_sent = true;
    }
}
?>
    <!--breadcrumbs start-->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-4">
            <h1>
              Contacts Us
            </h1>
          </div>
        </div>
      </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="container">

        <div class="row">
        <div class="col-lg-5 col-sm-5 address">
            <section class="contact-infos">
                <h4 class="title custom-font text-black">
                    <strong>Visit us</strong>
                </h4>
                <address>
                    Please E-mail : visitation@bgfhomes.com<br><strong>OR</strong><br>Book your visiting date and choose our nearest branch in your home country
                </address>
            </section>
            <section class="contact-infos">
                <h4 class="title custom-font text-green">
                    <strong>BUSINESS HOURS</strong>
                </h4>
                <p>Monday - Friday 8am to 4pm<br>Saturday - 9am to 2pm<br>Sunday - Closed<br></p>
            </section>
            <section class="contact-infos">
                <h4 class="title custom-font text-green">
                    <strong>TELEPHONE</strong>
                </h4>
                <p><i class="icon-phone"></i>(+1) 804 624 3689</p>
                <p><i class="icon-phone"></i>(+43) 670 308 0524</p>
            </section>
        </div>
        <div class="col-lg-7 col-sm-7 address">
         <h4 class="text-center">
         <strong>Drop us a line and our expert hands shall be in touch</strong></h4>
         <?php if($mail_sent){ echo "<p class='alert alert-success'>Mail sent successfully</p>"; } ?>
          <div class="contact-form">
            <form role="form" method="post" >
              <div class="form-group">
                <label for="name">
                  Name
                </label>
                <input type="text" placeholder="" id="name" name="uname" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">
                  Email
                </label>
                <input type="text" placeholder="" id="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <label for="phone">
                  Phone
                </label>
                <input type="text" id="phone" name="phone" class="form-control">
              </div>
              <div class="form-group">
                <label for="phone">
                  Message
                </label>
                <textarea placeholder="" rows="5" name="msg" id="msg" class="form-control"></textarea>
              </div>
              <button class="btn btn-info" type="submit" name="cont_sbt" value="cont_sbt">
                Submit
              </button>
            </form>

          </div>
        </div>
        </div>

    </div>
    <!--container end-->

    <!--google map start-->
    <div class="contact-map">	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7737116.92658594!2d8.441210646692404!3d61.74209176968949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465cb2396d35f0f1%3A0x22b8eba28dad6f62!2sSweden!5e0!3m2!1sen!2sng!4v1531329835356" width="1300" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>		</div>
    </div>
    <!--google map end-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&AMP;sensor=false"></script>

    <script>
      $(document).ready(function() {
        //Set the carousel options
        $('#quote-carousel').carousel({
          pause: true,
          interval: 4000,
        }
                                     );
      }
                       );

      //google map
      function initialize() {
        var myLatlng = new google.maps.LatLng(51.508742,-0.120850);
        var mapOptions = {
          zoom: 5,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Contact'
        }
                                           );
      }
      google.maps.event.addDomListener(window, 'load', initialize);



    </script>
<?php include_once("includes/footer.php"); ?>

