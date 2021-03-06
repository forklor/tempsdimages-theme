<?php

	$context_base = get_template_directory() . '/context/';

	$context = Timber::get_context();
	$templates = array('index.twig');

	if (is_404()) {
		$templates = array('404.twig');
		return;
	}

	if (is_search()) {
		$context['title'] = __('Rezultate pentru: ', "TDI") . "<em>" . get_search_query() . "</em>";
		$context['posts'] = Timber::get_posts();
		$templates = array('search.twig', 'archive.twig', 'index.twig');
		return;
	}

	if (is_home()) {
		array_unshift($templates, 'home.twig');
	}

	if (is_singular()) {
		include($context_base . 'singular.php');
	} else {
		include($context_base . 'archive.php');
	}

?>