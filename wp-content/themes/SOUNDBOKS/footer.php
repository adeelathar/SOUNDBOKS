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
                    <div class='row'>
                        <div class="col-sm-6"><img class="logo" src="<?php echo get_template_directory_uri();  ?>/assets/images/logo.png" />
                    
                        <form id="subscribe_form">
                            <label>
                                GET LATEST NEWS AND OFFERS
                            </label>
                            <input type="email" placeholder="YOUR EMAIL" />
                            <button type="submit">Subscribe</button>
                            
                        </form>
                        
                        <div id="address">
                                1298 Cuernavaca Circulo<br>
94040 Mountain View, California, USA
                            </div>
                           
                    </div>
                    <div class="col-sm-6 right_col">
                        
                        <ul class="links">
                            <li><a href='#'>SHOP</a></li>
                            <li><a href='#'>SUPPORT</a></li>
                            <li><a href='#'>CONTACT</a></li>
                            <li><a href='#'>ABOUT</a></li>
                            <li><a href='#'>PRESS</a></li>
                            <li><a href='#'>CONTACT</a></li>
                           
                        </ul>
                        
                        <div class="social_icons">
                            <div class="icon fa fa-facebook"></div>
                            <div class="icon fa fa-instagram"></div>
                            <div class="icon fa fa-twitter"></div>
                        </div>
                        
                        <img src='<?php echo get_template_directory_uri().'/assets/images/payments-checkouts@2x.png' ?>' width='250' />
                    </div>
                        
                        
                    </div>
                    
                    
                    <div class="row copyright">
                        <div class="col-sm-6 ">
                            © 2016 SOUNDBOKS, Inc. 
                        </div>
                        <div class="col-sm-6 text-right">
                            By continuing to use our website you agree to the use of cookies as described in the <a href='#'>Privacy Policy</a>
                        </div>
                        
                    </div>
                    
                </div>
	</footer><!-- #colophon -->
        
        
        <footer id='subfooter'>
            <div class='container'>
                <div class='row'>
                    <div class='col-sm-12'>
                        MADE WITH LOVE AND LOUD MUSIC IN COPENHAGEN

                        
                        
                    </div>
                </div>
            </div>
        </footer>
        
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
