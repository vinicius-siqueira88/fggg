<?php

/**
 * The template for displaying the footer.
 *
 * Contains the body & html closing tags.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_template_part('template-parts/footer');

?>

<?php wp_footer(); ?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-K9J6BGDJ7B"></script>
<script>
	window.dataLayer = window.dataLayer || [];

	function gtag() {
		dataLayer.push(arguments);
	}
	gtag('js', new Date());

	gtag('config', 'G-K9J6BGDJ7B');
</script>
<script data-cfasync="false" type="text/javascript" id="clever-core">
    /* <![CDATA[ */
    (function (document, window) {
        var a, c = document.createElement("script"), f = window.frameElement;

        c.id = "CleverCoreLoader66703";
        c.src = "https://scripts.cleverwebserver.com/00bf014e122c049de5177858a6663b2d.js";

        c.async = !0;
        c.type = "text/javascript";
        c.setAttribute("data-target", window.name || (f && f.getAttribute("id")));
        c.setAttribute("data-callback", "put-your-callback-function-here");
        c.setAttribute("data-callback-url-click", "put-your-click-macro-here");
        c.setAttribute("data-callback-url-view", "put-your-view-macro-here");

        try {
            a = parent.document.getElementsByTagName("script")[0] || document.getElementsByTagName("script")[0];
        } catch (e) {
            a = !1;
        }

        a || (a = document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]);
        a.parentNode.insertBefore(c, a);
    })(document, window);
    /* ]]> */
</script> 
<?php if(is_single()) {  ?>
    <script type="text/javascript" class="teads" async="true" src="//a.teads.tv/page/197810/tag"></script>
<?php }; ?> 
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7925551178358762" crossorigin="anonymous"></script>
</body>

</html>