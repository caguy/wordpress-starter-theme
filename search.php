<?php

$templates = array('search.twig', 'archive.twig', 'index.twig');

$context = Timber::context();
$context['title'] = __('Résultats de la recherche pour ', 'CustomThemeName') . get_search_query();
$context['posts'] = new Timber\PostQuery();

Timber::render($templates, $context);
