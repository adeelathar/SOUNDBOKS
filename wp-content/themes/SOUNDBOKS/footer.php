<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SOUNDBOKS
 */

?>

	</div><!-- #content -->
        
            <footer id="colophon" class="site-footer" role="contentinfo">
                <div class="container">
                    <div class="col-sm-6"><img class="logo" src="<?php echo get_template_directory_uri();  ?>/assets/images/logo.png" />
                    
                        <form id="subscribe_form">
                            <label>
                                GET LATEST NEWS AND OFFERS
                            </label>
                            <input type="email" placeholder="YOUR EMAIL" />
                            <button type="submit">Subscribe</button>
                            <div id="address">
                                1298 Cuernavaca Circulo<br>
94040 Mountain View, California, USA
                            </div>
                            <div class="copyright">© 2016 SOUNDBOKS, Inc.  </div>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        
                        
                    </div>
                    
                </div>
	</footer><!-- #colophon -->
        
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
