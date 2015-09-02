<div class="icon icon-divider"></div><!--divider-->
<footer>
<?php wp_footer(); ?> 
    <a href="http://cashmusic.org/" target="_blank">Made with &#9825; by CASH Music. Nonprofit, Open-source &amp; Free forever.</a>
</footer>
</div><!-- Sidebar --><?php get_sidebar(); ?>
</div><!--main-->
<div id="social">
        <?php if (get_option('itunes_link') ){ ?><a class="itunes" href="<?php echo get_option('itunes_link')?>" target="_blank">iTunes</a><?php } ?>
        <?php if (get_option('sc_id') ){ ?><a class="soundcloud" href="https://soundcloud.com/<?php echo get_option('sc_id'); ?>" target="_blank">Soundcloud</a><?php } ?>
        <?php if (get_option('ig_id') ){ ?><a class="instagram" href="https://instagram.com/<?php echo get_option('ig_id')?>" target="_blank">Instagram</a><?php } ?>
        <?php if (get_option('fb_link') ){ ?><a class="facebook" href="https://www.facebook.com/<?php echo get_option('fb_link')?>" target="_blank">Facebook</a><?php } ?>
        <?php if (get_option('twitter_id') ){ ?><a class="twitter" href="https://twitter.com/<?php echo get_option('twitter_id')?>" target="_blank">Twitter</a><?php } ?>
        <?php if (get_option('yt_id') ){ ?><a class="yt" href="https://www.youtube.com/<?php echo get_option('yt_id')?>" target="_blank">YouTube</a><?php } ?>
</div><!--social-->

</div><!--wrapper-->
</body>
</html>