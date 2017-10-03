<?php get_header();?>
<?php if ( is_user_logged_in() ) {?>  
		<!--Main Start-->
		<div class="main_part">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="main">
                        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php $current_user = get_current_user_id();
							$allow_user = rwmb_meta( 'rs_ruser', get_the_ID() ); 
							if (in_array($current_user, $allow_user)) :?>
                        	<h1><?php the_title();?></h1>
                            
                            <div class="row">
                            	
                            	<?php
								$files = rwmb_meta( 'rs_pdf', 'type=file_advanced' );
								foreach ( $files as $info )
								{ ?>
                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                        <div class="project">
                                    		<?php
												echo "<a target='_blank' href='{$info['description']}'>";
												echo "<img src='{$info['full_url']}' alt='{$info['alt']}' />";
												echo "<h2>{$info['title']}</h2>";
												echo "</a>";
												echo "<a href='{$info['description']}' class='btn btn-primary btn-sm' target='_blank'>View Project</a>";
												$catipon = $info['caption'];
												if ($catipon!=NULL){
												echo "<a href='{$info['caption']}' class='btn btn-info btn-sm pull-right' target='_blank'>Change Data</a>";
												}
											 ?>
                                             
										</div>
									</div>
                                <?php }?>
                                
                            </div>
                            <?php endif; endwhile; endif; ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<!--Main end-->

<?php }?>        
<?php get_footer();?>