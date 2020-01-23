<?php
include "header.php";

if (isset($_POST)){


}
?>
<main class="main-content">






	<!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Contact 1
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
	<h6 class="section-info" id="contact-1"><a href="#contact-1">Contact 1</a></h6>


	<section class="section">
		<div class="container">

			<h2 class="text-center">Let's Get In Touch</h2>

			<br><br>

			<div class="row">
				<div class="col-12 col-lg-6 offset-lg-3">

					<form class="p-30 bg-gray rounded" action="#" method="POST" data-form="mailer">
						
						<div class="row">
							<div class="form-group col-12 col-md-6">
								<input class="form-control form-control-lg" type="text" name="subject" placeholder="Your subject">
							</div>

							<div class="form-group col-12 col-md-6">
								<input class="form-control form-control-lg" type="email" name="email" placeholder="Your Email Address">
							</div>
						</div>


						<div class="form-group">
							<textarea class="form-control form-control-lg" rows="4" placeholder="Your Message" name="message"></textarea>
						</div>

						<div class="text-center">
							<button name="submit" class="btn btn-lg btn-primary" type="submit">Submit</button>
						</div>
					</form>

				</div>
			</div>

		</div>
	</section>


</main>
