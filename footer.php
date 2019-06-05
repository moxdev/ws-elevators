<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Warfield and Sanford
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer metal" role="contentinfo">
        <?php warfield_sanford_footer_menu() ?>
        <div class="company-info">
            <?php
                $streetAdd      = get_option( 'streetAdd' );
                $city           = get_option( 'city' );
                $state          = get_option( 'state' );
                $zip            = get_option( 'zip' );
                $phoneNumber    = get_option( 'phoneNumber' );
                $faxNumber      = get_option( 'faxNumber' );
                $facebookURL    = get_option( 'facebookURL' );
                $linkedinURL    = get_option( 'linkedinURL' );
            ?>
            <span> <?php echo get_bloginfo(); ?></span>
            <?php
            if ($streetAdd){?>
                <span id="street-add"><?php echo $streetAdd ?></span>
            <?php }

            if ($city){?>
                <span id="city-state-zip"><span id="city"><?php echo $city ?></span>
            <?php }

            if ($state){?>
                <span id="state"><?php echo $state ?></span>
            <?php }

            if ($zip){?>
                <span id="zip"><?php echo $zip ?></span></span>
            <?php } 

            if ($phoneNumber){?>
                <span id="phone-number"><a href="tel:<?php echo $phoneNumber ?>"><?php echo $phoneNumber ?></a></span>
            <?php }

            if ($faxNumber){?>
                <span id="fax-number"><?php echo $faxNumber ?></span>
            <?php }
            ?>

        </div><!-- .site-info -->
       
        <a href="/employee-news/"> 
            <span class="btn btn-blue">
                <span>Employee Login ></span>
            </span>
        </a>
		<a href="/update-your-account/"> 
            <span class="btn btn-blue">
                <span>Update Your Account ></span>
            </span>
        </a>
        <div id="social-icons">
            <a href="<?php echo $facebookURL ?>" target="_blank" id="icon-facebook" class="social"></a>
            <a href="<?php echo $linkedinURL ?>" target="_blank" id="icon-linkedin" class="social"></a>
        </div>
        <div id="mm4">
             <a href="http://www.mm4solutions.com" target="_blank">Site by:<img src="<?php echo get_template_directory_uri() . '/imgs/logo-mm4.svg';?>" alt="Millennium Marketing Solutions"></a>      
        </div><!-- #mm4 -->
        
    </footer><!-- #colophon -->
    </div> <!-- .site-canvas -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
