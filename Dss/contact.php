<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Gerry Designs - Contact</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- all css here -->
        <!-- bootstrap v3.3.7 css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- animate css -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- owl.carousel.2.0.0-beta.2.4 css -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <!-- font-awesome v4.6.3 css -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- magnific-popup.css -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <!-- flaticon.css -->
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <!-- slicknav.min.css -->
        <link rel="stylesheet" href="assets/css/slicknav.min.css">
        <!-- style css -->
        <link rel="stylesheet" href="assets/css/styles.css">
        <!-- responsive css -->
        <link rel="stylesheet" href="assets/css/responsive.css">
        <!-- modernizr css -->
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <!-- header-area end -->

        <!-- breadcumb-area start -->
        <div class="breadcumb-area bg-img-5 black-opacity">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcumb-wrap text-center">
                            <h2>Contact us</h2>
                            <ul>
                                <li><a href="index2.php">Home</a></li>
                                <li>/</li>
                                <li class="active">contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcumb-area end -->

        <!-- contact-area start -->
        <div class="contact-area bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <div class="contact-form">
                            <div class="cf-msg"></div>
                            <form action="mail.php" method="post" id="cf">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <input type="text" placeholder="Name" id="fname" name="fname">
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <input type="text" placeholder="Email" id="email" name="email">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" placeholder="Subject" id="subject" name="subject">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <textarea class="contact-textarea" placeholder="Message" id="msg" name="msg"></textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <button id="submit" class="cont-submit btn-contact btn-style" name="submit">SEND MESSAGE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="contact-wrap">
                            <ul>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    Phone number
                                    <p>
                                        <span>+263 782 876 828 </span>
                                        <span>+263 772 756 744</span>
                                    </p>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    Email Id
                                    <p>
                                        <span>GerryDesigns17@gmail.com</span>
                                        <span>Gerrychigwandaza17@gmail.com</span>
                                    </p>
                                </li>
                                <li>
                                    <i class="fa fa-location-arrow"></i>
                                    Location
                                    <p>
                                        <span>Suit 20-21 Ngonidzashe Complex Marondera</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="googleMap"></div>
        </div>
        <!-- contact-area end -->

        <!-- footer-area start -->
        <!-- footer-area end -->

		<!-- all js here -->
		<!-- jquery latest version -->
        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
		<!-- bootstrap js -->
        <script src="assets/js/bootstrap.min.js"></script>
		<!-- owl.carousel.2.0.0-beta.2.4 css -->
        <script src="assets/js/owl.carousel.min.js"></script>
		<!-- counterup.main.js -->
        <script src="assets/js/counterup.main.js"></script>
		<!-- isotope.pkgd.min.js -->
        <script src="assets/js/imagesloaded.pkgd.min.js"></script>
		<!-- isotope.pkgd.min.js -->
        <script src="assets/js/isotope.pkgd.min.js"></script>
		<!-- jquery.waypoints.min.js -->
        <script src="assets/js/jquery.waypoints.min.js"></script>
		<!-- jquery.magnific-popup.min.js -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
		<!-- jquery.slicknav.min.js -->
        <script src="assets/js/jquery.slicknav.min.js"></script>
		<!-- wow js -->
        <script src="assets/js/wow.min.js"></script>
		<!-- plugins js -->
        <script src="assets/js/plugins.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbeBYsZSDkbIyfUkoIw1Rt38eRQOQQU0o"></script>
        <script>
            function initialize() {
                var mapOptions = {
                    zoom: 15,
                    scrollwheel: false,
                    center: new google.maps.LatLng(-18.189800, 31.550696),
                    styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#222222"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#222222"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#222222"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#222222"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#222222"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#222222"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#222222"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#222222"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#222222"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#222222"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#222222"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#222222"},{"lightness":17}]}]
                };

                var map = new google.maps.Map(document.getElementById('googleMap'),
                    mapOptions);


                var marker = new google.maps.Marker({
                    position: map.getCenter(),
                    animation: google.maps.Animation.BOUNCE,
                    map: map
                });

            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
		<!-- main js -->
        <script src="assets/js/scripts.js"></script>
    </body>
</html>
