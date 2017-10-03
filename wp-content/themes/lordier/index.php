<?php get_header();?>
 <?php if ( is_user_logged_in() ) {?>     
        <!--Main Start-->
		<div class="main_part">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="main">
                        	<h1>Recently Modified Projects</h1>
                            <div class="row">
                            
                            	<?php $current_user = get_current_user_id(); $currentuid = $current_user; if ($currentuid == 1) { ?>
                            	<?php query_posts('post_type=project&projectcat=modified-projects&showposts=12');
                                if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                	<div class="project">
                                    	<a href="<?php the_permalink();?>">
                                            <?php
												 if(has_post_thumbnail())  {
													 
													//the_post_thumbnail('thumbnail');
													the_post_thumbnail('medium');
													//the_post_thumbnail('larg');
												 
												 }
											?>
                                            <h2><?php the_title();?></h2>
                                        </a>
                                    </div>
                                </div>
                                <?php endwhile; endif; ?>
                                <?php } else {  ?>
                                <?php query_posts('post_type=project&projectcat=modified-projects&showposts=12');
                                if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <?php
								 $allow_user = rwmb_meta( 'rs_ruser', get_the_ID() );
								if (in_array($currentuid, $allow_user)) { ?>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                	<div class="project">
                                    	<a href="<?php the_permalink();?>">
                                            <?php
												 if(has_post_thumbnail())  {
													 
													//the_post_thumbnail('thumbnail');
													the_post_thumbnail('medium');
													//the_post_thumbnail('larg');
												 
												 }
											?>
                                            <h2><?php the_title();?></h2>
                                        </a>
                                    </div>
                                </div>
                                <?php } endwhile; endif; }?>
                                
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<!--Main end-->
<?php }?>         
<?php get_footer();?>