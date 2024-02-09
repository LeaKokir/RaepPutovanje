<!DOCTYPE HTML>
<!--
	Traveler by freehtml5.co
	Twitter: http://twitter.com/fh5co
	URL: http://freehtml5.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Traveler &mdash; Free Website Template, Free HTML5 Template by FreeHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="stylelea.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
		<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">
				
				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<div id="gtco-logo"><a href="index.html">Travel <em>.</em></a></div>
					</div>
					<div class="col-xs-8 text-right menu-1">
						<ul>
							<li><a href="destination.php">Putovanja</a></li>
						
							<li><a href="pricing.php">Izmena putovanja</a></li>
							
							<li><a href="contact.php">Unos putovanja</a></li>
							<li><a href="delete.php">Brisanje putovanja</a></li>
						</ul>	
					</div>
				</div>
				
			</div>
		</nav>
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Planirate putovanje? Dosli ste na pravo mesto!</h1>	
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									<img src="images/slike/6.jpg">
									
										
									</div>
								</div>
							</div>
						</div>
					</div>
							
					
				</div>
			</div>
		</div>
	</header>
	
	
	<h1>Prikaz dostupnih putovanja</h1>


<form class="forma1" method="post">
	<input type="submit" value="Prikaži podatke">
</form>


<div id="rezultati">
<?php


try {
    $pdo = new PDO("mysql:host=localhost;dbname=projekat", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $sql = "SELECT drzava, grad FROM dostupno";
        $stmt = $pdo->query($sql);

        if ($stmt === false) {
            throw new Exception("Greška prilikom izvršavanja upita: " . $pdo->errorInfo()[2]);
        }

        echo "<table border='1'>
                <tr>
                    <th>Država</th>
                    <th>Grad</th>
                </tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$row['drzava']}</td>
                    <td>{$row['grad']}</td>
                  </tr>";
        }

        echo "</table>";
    }
} catch (Exception $e) {
    echo "Greška: " . $e->getMessage();
}

?>
    </div>

<div class="text">

<h3>Putovanja autobusom</h3>

<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=projekat", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    $prevoz = "autobus";  // Postavite prevoz na vrednost koja vam je potrebna
    $sql = "SELECT drzava, grad, cena, mesec FROM putovanja WHERE prevoz = :prevoz";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":prevoz", $prevoz);
    $stmt->execute();

    if ($stmt === false) {
        throw new Exception("Greška prilikom izvršavanja upita: " . $pdo->errorInfo()[2]);
    }

    // Prikaz rezultata u uređenoj listi
    echo "<ol>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<li><strong>Država:</strong> {$row['drzava']}</li>";
        echo "<li><strong>Grad:</strong> {$row['grad']}</li>";
        echo "<li><strong>Cena:</strong> {$row['cena']}</li>";
        echo "<li><strong>Mesec:</strong> {$row['mesec']}</li>";
        echo "<hr>"; // Dodajte horizontalnu liniju između svakog unosa
    }
    echo "</ol>";

 
} catch (Exception $e) {
   
    echo "Greška: " . $e->getMessage();
}
?>



</div>






	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>TRAVEL</h3>
						<p>Putujte sigurno i birajte najbolje uz vas TRAVEL tim. Vec 10 godina putujemo zajedno</p>
					</div>
				</div>


				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Kontakt</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +381 60 000 000</a></li>
							<li><a href="#"><i class="icon-mail2"></i> travelinfo@gmail.com</a></li>
							<li><a href="#"><i class="icon-chat"></i> Konverzacija</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; TRAVEL group All Rights Reserved.</small> 
						<small class="block">Designed by <a href="https://freehtml5.co/" target="_blank">uazalenje</a> </small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
	
</html>

