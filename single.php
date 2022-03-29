<?php get_header(); ?> 
<div class="container">
<?php  
if ( have_posts() ) :  
    while ( have_posts() ) : the_post(); 
    ?> 

    <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2> 
    <!-- <p>Written by:  the_author(); </p> -->


<!-- ==================================================================== -->
    <!-- Custom control for showing author -->
<?php if (get_theme_mod('basic-author-callout-display') == 'Yes') { ?>
<div class="row row-padding author">

    <div class="col-6 author-content">
        <?php 
            $authorText = get_theme_mod('basic-author-callout-text');
            if ($authorText != '') {
                echo wpautop($authorText);
                // echo " ";
            } else {
                // echo "Edit this by going to your Dashboard -> Appearance -> Customise -> Author Editor";
                // echo "Author: ". the_author();
                // echo the_author();
                // echo wpautop($authorText);
                ?>
                <p>Written by: <?php the_author(); ?></p>
                <?php
                // echo wpautop($authorText);
                // echo $authorText;
            }
        ?>
    </div>
</div> 
<?php } ?>
<!-- ==================================================================== -->

    <p>Published: <?php echo get_the_date("l jS \of F Y"); ?></p>
    <p><?php the_content(); ?></p> 
    </br>
    <!-- <ul> -->
        <p><a href="<?php the_permalink() ?>"><?php the_category() ?></a></p> 
    <!-- </ul> -->
    <?php 
        endwhile; 
else : 
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' ); 
endif; 

?> 

<!-- Custom control for showing author -->
<?php if (get_theme_mod('basic-author-callout-display') == 'Yes') { ?>
    <p>Written by: <?php the_author(); ?></p>
<?php } ?>


<!-- ========================================================================================= -->
<!-- This will pull in the comments.php default wordpress template for enabling comments => in this case - within single posts -->
</br>
</br>
<div>
        <!-- <h1 class="homeTitle">Local</h1> -->
        <h1>Comments</h1>
        <!-- <div class="localBar container"> -->
        <div class="localBar"></div>
        </br>
        <p>To encourage thoughtful and respectful conversations, first and last names will apear with each submission to Hali News's online communities (except in children and youth-oriented communities). Pseudonyms will no longer be permitted.
            <br>
            By submitting a comment, you accept that Hali News has the right to reproduce and publish that comment in whole or in part, in any manner Hali News chooses. Please note that Hali News does not endorse the opinions expressed in the comments. Comments on this story are moderated according to your Submission Guidelines. Comments are welcome while open. We reserve the right to close comments at any time.
        </p>
        <h2>Join the discussion</h2>
        </br>

        <?php
        /*
             * Output comments wrapper if it's a post, or if comments are open,
             * or if there's a comment number â€“ and check for password.
             */
            if ( ( is_single() ) &&  ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
                ?>
        
                <div class="comments-wrapper section-inner container">
                    <?php comments_template(); ?>
                </div><!-- .comments-wrapper -->
        
                <?php
            }
        ?>
        </div>


</div>


<?php get_footer(); ?>


