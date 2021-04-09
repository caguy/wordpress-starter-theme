<?php
$templates = array('archive.twig', 'index.twig');

$context = Timber::context();

switch (true) {
    case is_category():
        $title = sprintf(__("Catégorie : %s"), single_tag_title('', false));
        array_unshift($context, "archive-" . get_query_var('cat') . ".twig");
        break;
    case is_tag():
        $title = sprintf(__("Étiquette : %s"), single_tag_title('', false));
        array_unshift($context, "archive-" . get_query_var('tag') . ".twig");
        break;
    case is_author():
        $title = sprintf(__("Auteur : %s"), get_the_author_meta('display_name'));
        array_unshift($context, "archive-" . get_the_author_meta("nicename") . ".twig");
        break;
    case is_day():
        $title = ucfirst(get_the_date(_x('d F Y', "Format a date to display day in full letter", "CustomThemeName")));
        break;
    case is_month():
        $title = ucfirst(get_the_date(_x('F Y', "Format a date to display month in full letter", "CustomThemeName")));
        break;
    case is_year():
        $title = get_query_var('year');
        break;
    case is_post_type_archive():
        $title = get_query_var('year');
        array_unshift($context, "archive-" . get_post_type() . ".twig");
        break;
    default:
        $title = get_the_archive_title();
}

$context['title'] = $title;
$context['posts'] = new Timber\PostQuery();

Timber::render($templates, $context);
