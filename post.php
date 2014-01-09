<!-- post.php -->
<div class="post" id="post-<?php the_ID(); ?>">
    
        
        <div class="post_content">
        	<h2 class="titre"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            
            <?php get_template_part('postmeta');?>
            </br>

            <?php the_content(); ?>

            <p class="foot_content"> Cat&eacute;gorie: <?php the_category(', ') ?> | <?php comments_popup_link('Laisser un commentaire', '1 Commentaire', '% Commentaires'); ?> <?php edit_post_link('Editer', ' &#124; ', ''); ?></p>
        </div>
    </br>
</div>