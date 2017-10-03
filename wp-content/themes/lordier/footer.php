<?php if ( is_user_logged_in() ) {?> 
        <!--Footer Start-->
		<div class="footer_part">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="footer">
                        	Copyright &copy; 2017, All right Reserved www.lordier.fr
                        </div>
					</div>
				</div>
			</div>
		</div>
		<!--Footer end-->
<?php }?>        
		
		

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-3.1.1.min.js"><\/script>')</script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>

        <?php wp_footer();?>
    </body>
</html>
