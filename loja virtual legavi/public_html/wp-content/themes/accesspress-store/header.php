<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package AccessPress Store
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Loja virtual Legavi, Nós temos os melhores produtos para salão de beleza, temos nossa loja física em Niterói Rj, vendemos todos tipos de produtos para cabelos, shampoo, creme, condicionador, tratamento, máscara, coloração, finalizador, kit. Temos as marcas, Wella Professionals, Wella SP, Enrich, Brilliance, Elements, Sebastian Professional." />
        <meta name="keywords" content="Produtos de beleza,loja produtos beleza,produto beleza preço,produto beleza barato,produto de beleza preço,produto de beleza barato,produto para cabelo,produto para cabelo barato, produto cabelo barato,cuidar do cabelo barato,cuidar do cabelo,salão de beleza,salão de beleza barato, salão beleza barato, salão de beleza preço,salão de beleza niterói,shampoo,comprar shampoo,comprar shampoo barato, comprar shampoo preço,comprar shampoo loja virtual, shampoo preço, shampoo para cabelo, shampoo salão de beleza, shampoo para salão de beleza, onde comprar shampoo barato, venda shampoo, melhor shampoo, shampoo cabelo seco, shampoo cabelos secos, shampoo para cabelos secos, shampoo para cabelo seco,shampoo para cabelo liso, shampoo cabelo liso, shampoo para cabelos lisos, shampoo cabelos lisos, shampoo cabelos quebradiços, shampoo para cabelos quebradiços,creme,comprar creme,comprar creme barato, comprar creme preço,comprar creme loja virtual, creme preço, creme para cabelo, creme salão de beleza, creme para salão de beleza, onde comprar creme barato, venda creme, melhor creme, creme cabelo seco, creme cabelos secos, creme para cabelos secos, creme para cabelo seco,creme para cabelo liso, creme cabelo liso, creme para cabelos lisos, creme cabelos lisos, creme cabelos quebradiços, creme para cabelos quebradiços,condicionador,comprar condicionador,comprar condicionador barato, comprar condicionador preço,comprar condicionador loja virtual, condicionador preço, condicionador para cabelo, condicionador salão de beleza, condicionador para salão de beleza, onde comprar condicionador barato, venda condicionador, melhor condicionador, condicionador cabelo seco, condicionador cabelos secos, condicionador para cabelos secos, condicionador para cabelo seco,condicionador para cabelo liso, condicionador cabelo liso, condicionador para cabelos lisos, condicionador cabelos lisos, condicionador cabelos quebradiços, condicionador para cabelos quebradiços,tratamento,comprar tratamento,comprar tratamento barato, comprar tratamento preço,comprar tratamento loja virtual, tratamento preço, tratamento para cabelo, tratamento salão de beleza, tratamento para salão de beleza, onde comprar tratamento barato, venda tratamento, melhor tratamento, tratamento cabelo seco, tratamento cabelos secos, tratamento para cabelos secos, tratamento para cabelo seco, tratamento para cabelo liso, tratamento cabelo liso, tratamento para cabelos lisos, tratamento cabelos lisos, tratamento cabelos quebradiços, tratamento para cabelos quebradiços,máscara,comprar máscara,comprar máscara barato, comprar máscara preço,comprar máscara loja virtual, máscara preço, máscara para cabelo, máscara salão de beleza, máscara para salão de beleza, onde comprar máscara barato, venda máscara, melhor máscara, máscara cabelo seco, máscara cabelos secos, máscara para cabelos secos, máscara para cabelo seco, máscara para cabelo liso, máscara cabelo liso, máscara para cabelos lisos, máscara cabelos lisos, máscara cabelos quebradiços, máscara para cabelos quebradiços,coloração,comprar coloração,comprar coloração barato, comprar coloração preço,comprar coloração loja virtual, coloração preço, coloração para cabelo, coloração salão de beleza, coloração para salão de beleza, onde comprar coloração barato, venda coloração, melhor coloração, coloração cabelo seco, coloração cabelos secos, coloração para cabelos secos, coloração para cabelo seco, coloração para cabelo liso, coloração cabelo liso, coloração para cabelos lisos, coloração cabelos lisos, coloração cabelos quebradiços, coloração para cabelos quebradiços,finalizador,comprar finalizador,comprar finalizador barato, comprar finalizador preço,comprar finalizador loja virtual, finalizador preço, finalizador para cabelo, finalizador salão de beleza, finalizador para salão de beleza, onde comprar finalizador barato, venda finalizador, melhor finalizador, finalizador cabelo seco, finalizador cabelos secos, finalizador para cabelos secos, finalizador para cabelo seco, finalizador para cabelo liso, finalizador cabelo liso, finalizador para cabelos lisos, finalizador cabelos lisos, finalizador cabelos quebradiços, finalizador para cabelos quebradiços,kit,comprar kit,comprar kit barato, comprar kit preço,comprar kit loja virtual, kit preço, kit para cabelo, kit salão de beleza, kit para salão de beleza, onde comprar kit barato, venda kit, melhor kit, kit cabelo seco, kit cabelos secos, kit para cabelos secos, kit para cabelo seco,kit para cabelo liso, kit cabelo liso, kit para cabelos lisos, kit cabelos lisos, kit cabelos quebradiços, kit para cabelos quebradiços,enrich,brilliance,elements,sebastian professional,wella professional, wella sp">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

<?php

    $header_layout = esc_attr( get_theme_mod( 'accesspress_header_layout_type', 'headerone' ) );
    if( $header_layout == 'headerone' ){
        get_template_part('header/header', 'one');
    }else{
        get_template_part('header/header', 'two');
    }

?>

<div id="content" class="site-content">