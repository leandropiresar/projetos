<?php
/**
 * @package WordPress
 * @subpackage Lawywers
 */
?>

<?php $mt_footer_radio = ot_get_option( 'mt_footer_radio');

	switch ($mt_footer_radio) {
    case 'footer_contact':
        get_template_part('include/assets/section', 'footer1');
        break;
    case 'footer_widgets':
        get_template_part('include/assets/section', 'footer2');
        break;
}

?>

<?php

$mt_scroll_top = ot_get_option( 'mt_scroll_top', 'on');

if($mt_scroll_top == 'on'):

?>

<div class="scrollup">
<a class="scrolltop" href="#">
<i class="fa fa-chevron-up"></i>
</a>
</div>

<?php
endif;
?>


<?php wp_footer(); ?>

</body>
</html>