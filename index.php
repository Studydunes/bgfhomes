<?php 
  include_once("includes/header.php");
  if($_REQUEST['user_id'])
	{
		$SQL="SELECT * FROM `user` WHERE user_id = $_REQUEST[user_id]";
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}
?>

    <!-- Sequence Modern Slider -->
    <div id="da-slider" class="da-slider" style="top:1px;">

            <div class="da-slide">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
              <h2>
                <i>WE ARE HERE FOR YOU</i>
                <br>
                <i>WE PROVIDE ALL YOU NEED</i>
                <br>
                <i>TO BUILD YOUR DREAMS</i>
              </h2>
              <p>
                <i>Easily manage </i>
                <br />
                <i>your finance from a simple click</i>
              </p>
              <a href="contact.php" class="btn btn-info btn-lg da-link">
				  Read more
				</a>
              <div class="da-img">
                <img class="img-responsive" src="img/parallax-slider/images/1.png" alt="image01"/>
              </div>
            </div>
          </div>
        </div>
      </div>


            <div class="da-slide">
            <div class="container">
        <div class="row">
          <div class="col-md-12">
        <h2>
          <i>CUSTOMER FIRST</i>
            <br />
          <i>SERVICE FORMOST</i>
            <br />
          <i>THAT'S WHAT WE PROMISE</i>
        </h2>
        <p>
          <i>Offering customers the most</i>
            <br />
          <i>competitive rates and fees</i>
        </p>
        <a href="contact.php" class="btn btn-info btn-lg da-link">
          Contact us
        </a>
        <div class="da-img">
          <img class="img-responsive" src="img/parallax-slider/images/2.png" alt="image01" />
        </div>
      </div>
          </div>
        </div>
      </div>


      <div class="da-slide">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
        <h2>
           <i>WE HELP YOU</i>            </br>          <i>MANAGE & INVEST</i>            </br>          <i>AND WE HANDLE THE RISKS TOO</i>
        </h2>
        <p>
          <i>Take control of your investments</i>          <br />          <i>remember, we cover all the risks involved </i>
        </p>
        <a href="contact.php" class="btn btn-info btn-lg da-link">
          Contact us
        </a>
        <div class="da-img">
          <img class="img-responsive" src="img/parallax-slider/images/3.png" alt="image01" />
        </div>
      </div>
      </div>
      </div>
      </div>

      <nav class="da-arrows">
        <span class="da-arrows-prev">
        </span>
        <span class="da-arrows-next">
        </span>
      </nav>
    </div>

    <div class="container">
      <div class="row mar-b-30">
        <div class="col-md-12">
            <div class="text-center feature-head wow fadeInDown">
              <h1 class="" style="margin:30px;">
                Welcome to Bank Giro Finance Homes
              </h1>
            </div>
            <div class="row feature-box">
              <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 text-center wow fadeInUp">                <div class="feature-box-heading">                  <em>                    <img class="img-responsive" src="img/22.png" alt="">                  </em>                                 <h4>                  <b>E-Banking made easy</b>                </h4>              </div>              <p class="text-center">              Our online platform leaves you that experience and feel of security.   			  </p>              </div>			  
              <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 text-center wow fadeInUp">
                <div class="feature-box-heading">
                  <em>
                    <img class="img-responsive" src="img/44.png" alt="">
                  </em>
                                 <h4>                  <b>Gold Bullion Investment</b>                </h4>              </div>              <p class="text-center">Safe vault services for your investments and savings.</p>
              </div>
              <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 text-center wow fadeInUp">
                <div class="feature-box-heading">
                  <em>
                    <img class="img-responsive" src="img/33.png" alt="">
                  </em>
                  <h4>                  <b>Mortgage Investment</b>                </h4>              </div>              <p class="text-center">              Watch your investment grow from zero to tripple. We take control, giving you ease of mind</p>
              </div>
            </div>

          <!--feature end-->
        </div>
      </div>
    </div>

    <!--property start-->
    <div class="property gray-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-lg-offset-0 col-sm-8 col-sm-offset-2 text-center wow fadeInLeft">
            <img class="img-responsive" src="img/parallax-slider/images/p3.jpg" alt="" style="height: 100%;width: 100%;">
          </div>
          <div class="col-lg-6 col-lg-offset-0 col-sm-8 col-sm-offset-2 wow fadeInRight">
            <h1>About Bank Giro Finance Homes</h1>
            <hr>
            <p>Bank Giro Finance Homes is an secured multinational banking organisation headquartered in an undisclose location in Singapore, with branches in undisclose locations in Europe and Asian countries. Founded in 1895 by groups of retired goverment secret agents around the globe, and later restructured to offer service strictly to the likes of both active and retired government secret agents of partner country, licenced private detective, UN verified bounty hunters and high profile personel with referal and recomendations from either active or retired government agent of partner country or licenced private detective/investigator</p>
            <p>Bank Giro Finance Homes has been busy in recent years. Not content to be anything less than the best in the anonymous banking industries,</p>
            <a href="about.php" class="btn btn-success btn-md"><b>Read more</b></a>
            <hr>
          </div>
        </div>
      </div>
    </div>
    <!--property end-->
    <script type="text/javascript" src="js/parallax-slider/jquery.cslider.js"></script>
	<script type="text/javascript">
		  $(function() {

			$('#da-slider').cslider({
			  autoplay    : true,
			  bgincrement : 100
			});

		  });
	</script>
<?php include_once("includes/footer.php"); ?>