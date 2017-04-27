<!-- postmeta.php -->

<p class="foot_content"> Cat&eacute;gorie: <?php the_category(', ') ?> | <?php comments_popup_link('Laisser un commentaire', '1 Commentaire', '% Commentaires'); ?> <?php edit_post_link('Editer', ' &#124; ', ''); ?></p>

<h5><span class="date"><?php the_time('d/m/Y') ?></span> | Par <span class="auteur"><?php 

// récupération des auteurs avec le plugin Co-Author-Plus
if ( function_exists( 'coauthors_posts_links' ) ) {
    //coauthors();
    coauthors_posts_links();
} else {
    //the_author();
    the_author_posts_link();
}
//the_author() ?></span></h5>

<!-- fin postmeta.php -->