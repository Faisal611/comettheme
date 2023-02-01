<?php get_header() ?>
    <section class="page-title parallax">
        <div data-parallax="scroll"
             data-image-src="<?php echo get_template_directory_uri() . '/assets/images/bg/18.jpg' ?>"
             class="parallax-bg"></div>
        <div class="parallax-overlay">
            <div class="centrize">
                <div class="v-center">
                    <div class="container">
                        <div class="title center">
                            <h1 class="upper">This is our blog<span class="red-dot"></span></h1>
                            <h4>We have a few tips for you.</h4>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="col-md-8">
                <div class="blog-posts">
	                <?php while (have_posts()) : the_post();?>
                        <article class="post-single">
                            <div class="post-info">
                                <h2><a href="<?php the_permalink();?>>"><?php the_title()?></a></h2>
                                <h6 class="upper"><span>By </span><a href="<?php site_url();?>"><?php the_author()?></a>
                                    <span class="dot"></span><span><?php the_time('d F Y');?></span>
                                    <span class="dot"></span><a href="#" class="post-tag"><?php the_tags('');?></a>
                                </h6>
                            </div>
                            <div class="post-media">
                                <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
                            </div>
                            <div class="post-body">
                                <p> <?php the_content(); ?> </p>
                                <p><a href="<?php the_permalink();?>" class="btn btn-color btn-sm">Read More</a></p>
                            </div>
                        </article>
	                <?php endwhile; wp_reset_postdata();?>
                </div>
                <?php the_posts_pagination(array(
	                'prev_text' =>'<span aria-hidden="true"><i class="ti-arrow-left"></i></span>',
                    'next_text'=>'<span aria-hidden="true"><i class="ti-arrow-right"></i></span>',
	                'screen_reader_text' => ' ',
                    'type'=>'list'
                ));?>
            </div>

	        <?php get_sidebar(); ?>
        </div>
    </section>
<?php get_footer() ?>