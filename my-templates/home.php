<?php
/*template name: home*/
get_header(); ?>
<!-- <section class="main-section" id="service">
	<div class="container">
    	<h2>Services</h2>
    	<h6>We offer exceptional service with complimentary hugs.</h6>
        <div class="row">
        	<div class="col-lg-4 col-sm-6 wow fadeInLeft delay-05s">
            	<div class="service-list">
                	<div class="service-list-col1">
                    	<i class="fa-paw"></i>
                    </div>
                	<div class="service-list-col2">
                        <h3>branding &amp; identity</h3>
                        <p>Proin iaculis purus digni consequat sem digni ssim. Donec entum digni ssim.</p>
                    </div>
                </div>
                <div class="service-list">
                	<div class="service-list-col1">
                    	<i class="fa-gear"></i>
                    </div>
                	<div class="service-list-col2">
                        <h3>web development</h3>
                        <p>Proin iaculis purus consequat sem digni ssim. Digni ssim porttitora .</p>
                    </div>
                </div>
                <div class="service-list">
                	<div class="service-list-col1">
                    	<i class="fa-apple"></i>
                    </div>
                	<div class="service-list-col2">
                        <h3>mobile design</h3>
                        <p>Proin iaculis purus consequat digni sem digni ssim. Purus donec porttitora entum.</p>
                    </div>
                </div>
                <div class="service-list">
                	<div class="service-list-col1">
                    	<i class="fa-medkit"></i>
                    </div>
                	<div class="service-list-col2">
                        <h3>24/7 Support</h3>
                        <p>Proin iaculis purus consequat sem digni ssim. Sem porttitora entum.</p>
                    </div>
                </div>
            </div>
            <figure class="col-lg-8 col-sm-6  text-right wow fadeInUp delay-02s">
            	<img src="<?php bloginfo('template_url'); ?>/img/macbook-pro.png" alt="">
            </figure>

        </div>
	</div>
</section>



<section class="main-section alabaster">
	<div class="container">
    	<div class="row">
			<figure class="col-lg-5 col-sm-4 wow fadeInLeft">
            	<img  src="<?php bloginfo('template_url'); ?>/img/iphone.png" alt="">
            </figure>
        	<div class="col-lg-7 col-sm-8 featured-work">
            	<h2>featured work</h2>
            	<P class="padding-b">Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit.</P>
            	<div class="featured-box">
                	<div class="featured-box-col1 wow fadeInRight delay-02s">
                    	<i class="fa-magic"></i>
                    </div>
                	<div class="featured-box-col2 wow fadeInRight delay-02s">
                        <h3>magic of theme development</h3>
                        <p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. </p>
                    </div>
                </div>
                <div class="featured-box">
                	<div class="featured-box-col1 wow fadeInRight delay-04s">
                    	<i class="fa-gift"></i>
                    </div>
                	<div class="featured-box-col2 wow fadeInRight delay-04s">
                        <h3>neatly packaged</h3>
                        <p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. </p>
                    </div>
                </div>
                <div class="featured-box">
                	<div class="featured-box-col1 wow fadeInRight delay-06s">
                    	<i class="fa-dashboard"></i>
                    </div>
                	<div class="featured-box-col2 wow fadeInRight delay-06s">
                        <h3>SEO optimized</h3>
                        <p>Proin iaculis purus consequat sem cure digni ssim. Donec porttitora entum suscipit aenean rhoncus posuere odio in tincidunt. </p>
                    </div>
                </div>
                <a class="Learn-More" href="#">Learn More</a>
            </div>
        </div>
	</div>
</section> -->


<section class="main-section paddind mb-5" id="Portfolio">
	<div class="custom-container ">
		<h2>Portafolio</h2>
		<h6>Nuestro portafolio de trabajo.</h6>
		<div class="portfolioFilter d-none">
			<?php
			$args = array(
				'post_type' => 'trabajo',
				"posts_per_page" => 12

			);

			$the_query = new WP_Query($args); ?>

			<?php if ($the_query->have_posts()) : ?>

				<ul class="Portfolio-nav ">
					<li><a href="#" data-filter="*" class="current">Todo</a></li>

					<?php $cat_args = array(
						'orderby'       => 'term_id',
						'order'         => 'ASC',
						'hide_empty'    => true,
					);

					$terms = get_terms('categoria', $cat_args);

					foreach ((array) $terms as $taxonomy) {
						$term_slug = $taxonomy->slug;
					?>
						<li class=" wow fadeIn delay-02s"><a href="#" data-filter=".<?php echo $term_slug; ?>"><?php echo $taxonomy->name; ?></a></li>

					<?php } ?>

				</ul>
				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
		</div>

	</div>
	<div class="custom-container  delay-04s">

		<?php
		$args = array(
			'post_type' => 'trabajo',
			"posts_per_page" => 12

		);

		$the_query = new WP_Query($args); ?>
		<div class="row">


			<?php if ($the_query->have_posts()) : ?>

				<?php while ($the_query->have_posts()) : $the_query->the_post();

					$terms = get_the_terms($post->ID, 'categoria');
					foreach ((array) $terms as $term) {
						$categoria_name = $term->slug; ?>
						<div class="col-md-6 col-lg-4 col-xl-3">
							<div class=" Portfolio-box <?php echo $categoria_name; ?>">
								<div class="wow fadeInUp">
									<a href="<?= get_field('link') ? the_field('link') : the_post_thumbnail_url('full') ?>" target="new"><img src="<?php the_post_thumbnail_url('full'); ?>" alt=""></a>
									<h3><?php the_title(); ?></h3>
									<p><?php echo $categoria_name; ?></p>
								</div>

							</div>
						</div>

					<?php  }
					?>

				<?php endwhile; ?>
			<?php endif; ?>
		</div>

	</div>
</section>

<section id="soluciones" class="my-5">
	<div class="custom-container">
		<div class="row justify-content-between">
			<div class="col-md-5  col-xxl-4 offset-xxl-1">
				<div class="sticky-section">
					<div class="circle-frame"></div>
					<h2 class=" text-md-start">Conoce nuestras Soluciones tecnológicas</h2>
				</div>
			</div>
			<div class="col-md-6 card-tech-container">
				<?php
				$techItems = [
					[
						"title" => "Desarrollo de plataformas web y apps",
						"description" => "Creación de soluciones digitales optimizadas para web y móviles.",
						"imageurl" => "https://intuitionstudio.co/wp-content/uploads/2025/03/website.svg",
						"tag" => ["Wordpress", "Strapi", "Ecommerce"]
					],
					[
						"title" => "Integraciones con APIs y automatización",
						"description" => "Conectividad eficiente entre sistemas para mejorar procesos.",
						"imageurl" => "https://intuitionstudio.co/wp-content/uploads/2025/03/connection.svg                                                         ",
						"tag" => ["AWS", "Zapier", 'PayU']
					],
					[
						"title" => "Inteligencia artificial aplicada al marketing",
						"description" => "Uso de IA para optimizar campañas y mejorar conversiones.",
						"imageurl" => "https://intuitionstudio.co/wp-content/uploads/2025/03/brain.svg",
						"tag" => ["Python", "Deeplearing",  "IA"]
					],
					[
						"title" => "Desarrollo de software a la medida",
						"description" => "Software personalizado para necesidades específicas y escalables.",
						"imageurl" => "https://intuitionstudio.co/wp-content/uploads/2025/03/code.svg",
						"tag" => ["React", "Next.js", "Javascript"]
					],
					[
						"title" => "Estrategias SEO para un posicionamiento efectivo",
						"description" => "Optimización SEO para mayor visibilidad y tráfico orgánico.",
						"imageurl" => "https://intuitionstudio.co/wp-content/uploads/2025/03/seo.svg",
						"tag" => ["Semrush", "GA5", "Jetpack"]
					],

				];
				foreach ($techItems as $key => $techItem):

					cardTech($key, $techItem);

				endforeach ?>
			</div>
		</div>
	</div>
</section>

<section id="clientes" class="main-section">
	<div class="container">

		<h2>Nuestros Clientes</h2>
		<h6>Conozca algunos de nuestros clientes.</h6>
		<ul>
			<?php
			$clientes = (new WP_Query(
				array(
					"post_type" => "cliente",
					"posts_per_page" => -1
				)
			))->posts;
			foreach ($clientes as $cliente) : ?>
				<li>
					<img src="<?= get_the_post_thumbnail_url($cliente, "medium") ?>" alt="<?= $cliente->post_title ?>">
				</li>
			<?php endforeach; ?>
		</ul>
	</div>


</section>


<!-- <section class="main-section client-part" id="client">
	<div class="container">
		<b class="quote-right wow fadeInDown delay-03"><i class="fa-quote-right"></i></b>
    	<div class="row">
        	<div class="col-lg-12">
            	<p class="client-part-haead wow fadeInDown delay-05">It was a pleasure to work with the guys at Knight Studio. They made sure
we were well fed and drunk all the time!</p>
            </div>
        </div>
    	<ul class="client wow fadeIn delay-05s">
        	<li><a href="#">
            	<img src="<?php bloginfo('template_url'); ?>/img/client-pic1.jpg" alt="">
                <h3>James Bond</h3>
                <span>License To Drink Inc.</span>
            </a></li>
        </ul>
    </div>
</section>
<div class="c-logo-part">
	<div class="container">
    	<ul>
        	<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/c-liogo1.png" alt=""></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/c-liogo2.png" alt=""></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/c-liogo3.png" alt=""></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/c-liogo4.png" alt=""></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/c-liogo5.png" alt=""></a></li>
    	</ul>
	</div>
</div>-->
<!-- <section class="main-section team" id="team">
	<div class="container">
        <h2>Clientes</h2>
        <h6>Nuestros clientes.</h6>
        <div class="team-leader-block clearfix">
            <div class="team-leader-box">
                <div class="team-leader wow fadeInDown delay-03s">
                    <div class="team-leader-shadow"><a href="#"></a></div>
                    <img src="<?php bloginfo('template_url'); ?>/img/team-leader-pic1.jpg" alt="">
                    <ul>
                        <li><a href="#" class="fa-twitter"></a></li>
                        <li><a href="#" class="fa-facebook"></a></li>
                        <li><a href="#" class="fa-pinterest"></a></li>
                        <li><a href="#" class="fa-google-plus"></a></li>
                    </ul>
                </div>
                <h3 class="wow fadeInDown delay-03s">Walter White</h3>
                <span class="wow fadeInDown delay-03s">Chief Executive Officer</span>
                <p class="wow fadeInDown delay-03s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>
            </div>
            <div class="team-leader-box">
                <div class="team-leader  wow fadeInDown delay-06s">
                    <div class="team-leader-shadow"><a href="#"></a></div>
                    <img src="<?php bloginfo('template_url'); ?>/img/team-leader-pic2.jpg" alt="">
                    <ul>
                        <li><a href="#" class="fa-twitter"></a></li>
                        <li><a href="#" class="fa-facebook"></a></li>
                        <li><a href="#" class="fa-pinterest"></a></li>
                        <li><a href="#" class="fa-google-plus"></a></li>
                    </ul>
                </div>
                <h3 class="wow fadeInDown delay-06s">Jesse Pinkman</h3>
                <span class="wow fadeInDown delay-06s">Product Manager</span>
                <p class="wow fadeInDown delay-06s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>
            </div>
            <div class="team-leader-box">
                <div class="team-leader wow fadeInDown delay-09s">
                    <div class="team-leader-shadow"><a href="#"></a></div>
                    <img src="<?php bloginfo('template_url'); ?>/img/team-leader-pic3.jpg" alt="">
                    <ul>
                        <li><a href="#" class="fa-twitter"></a></li>
                        <li><a href="#" class="fa-facebook"></a></li>
                        <li><a href="#" class="fa-pinterest"></a></li>
                        <li><a href="#" class="fa-google-plus"></a></li>
                    </ul>
                </div>
                <h3 class="wow fadeInDown delay-09s">Skyler white</h3>
                <span class="wow fadeInDown delay-09s">Accountant</span>
                <p class="wow fadeInDown delay-09s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.</p>
            </div>
        </div>
    </div>
</section> -->

<section class="business-talking">
	<div class="container">
		<h2>“El diseño crea cultura. La cultura moldea valores. Los valores determinan el futuro.”<br><em>Robert L. Peters</em></h2>
	</div>
</section>
<div class="container">
	<section class="main-section contact" id="contact">

		<div class="row">
			<div class="col-lg-6 col-sm-7 wow fadeInLeft">
				<div class="contact-info-box address clearfix">
					<h3><i class=" icon-map-marker"></i>Dirección:</h3>
					<span><?php the_field('direccion', 'option'); ?><br>Bogotá, Colombia.</span>
				</div>
				<div class="contact-info-box phone clearfix">
					<h3><i class="fa-phone"></i>Teléfono:</h3>
					<span><?php the_field('telefono', 'option'); ?></span>
					<span><?php the_field('celular', 'option'); ?></span>
				</div>
				<div class="contact-info-box email clearfix">
					<h3><i class="fa-pencil"></i>Email:</h3>
					<span><?php the_field('correo_electronico', 'option'); ?></span>
					<span><?php the_field('correo_electronico_2', 'option'); ?></span>
				</div>

				<ul class="social-link">
					<!--<li class="twitter"><a href="#"><i class="fa-twitter"></i></a></li>-->
					<li class="facebook"><a href="https://www.facebook.com/intuitionstudioco/" target="new"><i class="fa-facebook"></i></a></li>
					<li class="instagram"><a href="https://www.instagram.com/intuition.studio/  " target="new"><i class="fa-instagram"></i></a></li>
					<!-- <li class="pinterest"><a href="#"><i class="fa-pinterest"></i></a></li> -->
					<!--<li class="gplus"><a href="#"><i class="fa-google-plus"></i></a></li>-->
					<!-- <li class="dribbble"><a href="#"><i class="fa-dribbble"></i></a></li> -->
				</ul>
			</div>
			<div class="col-lg-6 col-sm-5 wow fadeInUp delay-05s">
				<div class="form">

					<div id="sendmessage">Your message has been sent. Thank you!</div>
					<div id="errormessage"></div>
					<form class="contactForm" id="form-contact">
						<div class="form-group">
							<input type="text" name="name" class="form-control input-text" id="name" placeholder="Nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required="" />
							<div class="validation"></div>
						</div>
						<div class="form-group">
							<input type="text" name="telefono" class="form-control input-text" id="telefono" placeholder="Telefono" data-rule="minlen:4" data-msg="Por favor ingrese un numero de telefono" required="" />
							<div class="validation"></div>
						</div>
						<div class="form-group">
							<input type="email" class="form-control input-text" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" required="" />
							<div class="validation"></div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control input-text" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required="" />
							<div class="validation"></div>
						</div>
						<div class="form-group">
							<textarea class="form-control input-text text-area" name="message" id="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Mensaje" required=""></textarea>
							<div class="validation"></div>
						</div>

						<div>
							<div id="contactSuccess"
							class="alert alert-success parrafo d-none"
							role="alert"></div>

							<div id="contactError"
							class="alert alert-danger parrafo d-none"
							role="alert"></div>
						</div>
						<?php wp_nonce_field( 'mi_accion_formulario', 'mi_nonce' ); ?>

						<div class="g-recaptcha"
						data-sitekey="6LfpDNYrAAAAAIM3IHJUuBCnzyUXCbnM3KJMiECg"
						data-callback="enviarFormulario"
						data-size="invisible"></div>
						<div class="text-center"><button type="submit" class="input-btn" id="send-email-contact">Enviar Mensaje</button></div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
<footer class="footer">
	<div class="container">
		<div class="footer-logo"><a href="#"><img src="<?php bloginfo('template_url'); ?>/img/logo-01.svg" alt=""></a></div>
		<span class="copyright">&copy; <span id="copyright-year"></span> Intuition Business. Todos los derechos reservados.</span>
	</div>
</footer>



<?php get_footer(); ?>
<script>
	// $("#formContact").submit(function(e) {
	// 	e.preventDefault()

	// 	var datosform = new FormData();
	// 	var name = $("#name").val();
	// 	var telefono = $("#telefono").val();
	// 	var email = $("#email").val();
	// 	var subject = $("#subject").val();
	// 	var message = $("#message").val();
	// 	if (name != "" && telefono != "" && email != "" && subject != "" && message != "") {
	// 		datosform.append('name', name);
	// 		datosform.append('telefono', telefono);
	// 		datosform.append('email', email);
	// 		datosform.append('subject', subject);
	// 		datosform.append('message', message);
	// 		datosform.append("action", "send_contact_form")
	// 		alert("Se está enviando el mensaje.")
	// 		$("#formContact")[0].reset();

	// 		$.ajax({
	// 			url: "<?= admin_url("admin-ajax.php") ?>",
	// 			type: "POST",
	// 			data: datosform,
	// 			cache: false,
	// 			contentType: false,
	// 			processData: false,
	// 			success: function(data) {
	// 				alert("Mensaje enviado con éxito, le responderemos lo más pronto posible");
	// 			},
	// 		});
	// 	} else {
	// 		alert("Todos los campos son obligatorios");
	// 	}

	// });
</script>