<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 */

echo '<li><div><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></div></li>';
