<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

?>
<div class="page-404">
	<div class="container">
		<div class="box">
			<div class="image"></div>
			<h1>Algo deu errado!</h1>
			<p>Infelizmente não encontramos<br> a página que você está procurando.</p>
			<a href="<?= esc_url(home_url('/')) ?>">
				VOLTAR A HOME
			</a>
		</div>
	</div>
</div>