<?php  get_header(); ?>
<!-- <div class="container">
</div> -->

<!-- <ul> -->
<!-- <div class="articlesContainer"> -->
<div class="container">
    <!-- <ul> -->
        <div>
            <div class="row">

<?php

$featured_posts = get_posts(array(
    'numberposts' => 1,
    'post_status' => 'publish',
    'tag' => 'Featured'));


foreach($featured_posts as $featured_post){
    ?>
        <div class="featureDiv">
    <?php

    // echo '<img src="'. get_the_post_thumbnail_url($featured_post).'" alt="post" class="featuredImage" >';
    echo '<div class="mainPicture"><a href="'.get_permalink($featured_post).'"><img src="'. get_the_post_thumbnail_url($featured_post).'" alt="post" class="featuredImage" ></a></div>';
    // echo '<h3>'.$featured_post->post_title.'</h3>';
    echo '<div><p><a href="'.get_permalink($featured_post).'">'.$featured_post->post_title.'</a></p>';
    echo "</br>";


    ?>
<!-- Custom control for showing author -->
<?php if (get_theme_mod('basic-author-callout-display') == 'Yes') { ?>

    <?php 
    
        $post_author_id = get_post_field( 'post_author', $featured_post ); 
        $actual_author_name = get_the_author_meta('display_name', $post_author_id);
    
    ?> 
    <p>Written by: <?php echo $actual_author_name; ?></p>
<?php } ?>



<!-- ==================================================================== -->
<?php


    // echo date("l jS \of F Y h:i:s A");
    echo get_post_field( 'post_date', $featured_post );
    echo '<br>';

    // the_excerpt('<li>', '</li>'); 
    echo '<p>'.the_excerpt().'</p></div></div>'; 

    // echo '<span>'.$featured_post->post_excerpt->post_excerpt.'</p>';
// I'm confused over how to seperate the image from the content, and the excerpt
// For the time being I have disabled the large image because for some reason the content is b ringing in the image as a thumbnail as well

}
?>

<?php

$categories = get_categories();
foreach($categories as $category){

    echo '<div class="categoryDiv"><h4><a href="'.get_category_link($category).'">'.$category->name.'</a></h4><div class="bar"></div>';

    echo '<h2><a href="'.get_permalink($category).'">'.$category->category_title.'</a></h2>';
    ?>

    <?php   

    $featured_posts = get_posts(array(
        'numberposts' => 1,
        'post_status' => 'publish',
        'tag' => 'Featured'));
    
    $posts = get_posts(array(
        "numberposts"  => 3,
        "category"     =>  $category->term_id));
    
        foreach($posts as $post){

            if(array_search($post, $posts) == 0){
                echo '<a href="'.get_permalink($post).'"><img src="'. get_the_post_thumbnail_url($post).'" alt="post" style="width: 100% !important;"></a>';

                echo '<a href="'.get_permalink($post).'" style="text-decoration:none; color: black;"><h4>'.$post->post_title.'</h4></a>';   
            }
            else {

                // echo '<p><a href="'.get_permalink($post).'" style="color: rgb(39, 39, 39);">'.$post->post_title.'</a></p>';
                echo '<p><a href="'.get_permalink($post).'">'.$post->post_title.'</a></p>';
            }

        }

    echo '</div>';
}
?>
            </div>
        </div>
<!-- <ul> -->
</div>
</br>

<!-- Local Posts title and divider -->

<div class="titleHeading">	
    <!-- <div class="bar"></div> -->
</div>

    <div class="container">
        <!-- <h1 class="homeTitle">Local</h1> -->
        <h1>Local</h1>
        <!-- <div class="localBar container"> -->
        <div class="localBar">
        
        </div>
            <div class="container">
                <div class="row">
        
        <?php
// This is where the Local Posts loop will live!
$local_posts = get_posts(array(
    'numberposts' => 4,
    'post_status' => 'publish',
    'tag' => 'Local'));
    
    
    foreach($local_posts as $local_post){
        echo '<div class="categoryDiv"><a href="'.get_permalink($local_post).'"><img src="'. get_the_post_thumbnail_url($local_post).'" alt="post" style="width: 100% !important;"></a>';
        // echo '<h3>'.$featured_post->post_title.'</h3>';
        echo '<p><a href="'.get_permalink($local_post).'">'.$local_post->post_title.'</a></p></div>';
        echo "</br>";
        // echo date("l jS \of F Y h:i:s A");
        echo '<br>';
        
    }
    
    
    
            ?>
            <!-- </div> -->
        </div>
    </div>
</div>

<!-- <p><i>This in my Home.php page.</i></p> -->



<?php get_footer(); ?>