<!-- postmeta.php -->
<p class="postmetadata"> 
<span class="date"><?php the_time('d/m/Y') ?></span> |
Par <span class="auteur"><?php 

// récupération des auteurs avec le plugin Co-Author-Plus
if ( function_exists( 'coauthors_posts_links' ) ) {
    //coauthors();
    coauthors_posts_links();
} else {
    //the_author();
    the_author_posts_link();
}
//the_author() ?></span> 

</p>