<?php

add_image_size( 'blog', '1200px', '400px', true );

/* Modify the read more link on the_excerpt() */

function et_excerpt_length($length) {
    return 55;
}
add_filter('excerpt_length', 'et_excerpt_length');

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_hco_style' );

/**
 * Register stylesheets.
 */
function register_hco_style() {
    wp_register_style( 'main', get_stylesheet_directory_uri().'/css/main.css' );
    wp_enqueue_style( 'main' );
}

/**
 * Register scripts.
 */
add_action( 'wp_enqueue_scripts', 'register_hco_scripts' );
function register_hco_scripts() {
    if(is_page('equipes')){
        wp_enqueue_script('mixitup', get_stylesheet_directory_uri() . '/js/filter/jquery.mixitup.min.js', array( 'jquery' ));
    }
}



add_image_size( 'logo', 150, 150, true );



// Add Shortcode
function hco_display_map() {

    // Code
return "<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBoNX-nMMD9XhgzePkoJM8uF_vdTQQfgCs&sensor=false&extension=.js'></script>

<script>
    google.maps.event.addDomListener(window, 'load', init);
    var map;
    function init() {
        var mapOptions = {
            center: new google.maps.LatLng(-20.997263,55.282351),
            zoom: 16,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.DEFAULT,
            },
            disableDoubleClickZoom: true,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            },
            scaleControl: false,
            scrollwheel: false,
            panControl: true,
            streetViewControl: true,
            draggable : true,
            overviewMapControl: true,
            overviewMapControlOptions: {
                opened: false,
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        }
        var mapElement = document.getElementById('map_hco');
        var map = new google.maps.Map(mapElement, mapOptions);
        var locations = [
                            ['Gymnase de Saint-Paul',
                            'Hello World',
                            '0262229612',
                            'arf@arf.com',
                            'http://mathieuriviere.com',
                            -20.9982668,
                            55.28018529999997,
                            'http://localhost/websites/hockeyclubouest/wp-content/uploads/hockey_marker.png'
                            ],
                            ['Siège du club',
                             'Description',
                             'Tél. : 02 62 XX XX XX',
                             'E-mail : hello@world.fr',
                             'http://hockeyclubouest.fr',
                             -20.9967352,
                             55.28449869999997,
                             'http://localhost/websites/hockeyclubouest/wp-content/uploads/marker_hco.png'
                            ]
                        ];
        for (i = 0; i < locations.length; i++) {
            if (locations[i][1] =='undefined'){ description ='';} else { description = locations[i][1];}
            if (locations[i][2] =='undefined'){ telephone ='';} else { telephone = locations[i][2];}
            if (locations[i][3] =='undefined'){ email ='';} else { email = locations[i][3];}
           if (locations[i][4] =='undefined'){ web ='';} else { web = locations[i][4];}
           if (locations[i][7] =='undefined'){ markericon ='';} else { markericon = locations[i][7];}
            marker = new google.maps.Marker({
                icon: markericon,
                position: new google.maps.LatLng(locations[i][5],locations[i][6]),
                map: map,
                title: locations[i][0],
                desc: description,
                tel: telephone,
                email: email,
                web: web
            });
            if (web.substring(0, 7) != 'http://') {
                link = 'http://' + web;
            } else {
                link = web;
            }
            bindInfoWindow(marker, map, locations[i][0], description, telephone, email, web, link);
        }
    function bindInfoWindow(marker, map, title, desc, telephone, email, web, link) {
    var infoWindowVisible = (function () {
          var currentlyVisible = false;
          return function (visible) {
              if (visible !== undefined) {
                  currentlyVisible = visible;
              }
              return currentlyVisible;
           };
    }());
    iw = new google.maps.InfoWindow();
    google.maps.event.addListener(marker, 'click', function() {
        if (infoWindowVisible()) {
           iw.close();
           infoWindowVisible(false);
        } else {
           var html= '<div style=\"color:#000;background-color:#fff;padding:5px;width:150px;\"><h4>'+title+'</h4><p>'+desc+'<p><p>'+telephone+'<p><a href=\"mailto:'+email+'\" >'+email+'<a><a href=\"'+link+'\" >'+web+'<a></div>';
           iw = new google.maps.InfoWindow({content:html});
           iw.open(map,marker);
           infoWindowVisible(true);
        }
    });

    google.maps.event.addListener(iw, 'closeclick', function () {
        infoWindowVisible(false);
    });
}

}
</script>
<style>
    #map_hco {
        height:400px;
        width:100%;
    }
    .gm-style-iw * {
        display: block;
        width: 100%;
    }
    .gm-style-iw h4, .gm-style-iw p {
        margin: 0;
        padding: 0;
    }
    .gm-style-iw a {
        color: #4272db;
    }
</style>
<div class='gdlr-shortcode-wrapper'>
    <div class='gdlr-item-title-wrapper gdlr-item pos-left '>
        <div class='gdlr-item-title-head container'>
            <h3 class='gdlr-item-title gdlr-skin-title gdlr-skin-border'>Nous situer sur la carte</h3>
            <div class='clear'></div>
        </div>
    </div>
</div>
<div id='map_hco'></div>";
}
add_shortcode( 'display-map', 'hco_display_map' );


/**
 * Partenaires
 */

if ( ! function_exists('hco_partenaire') ) {

// Register Custom Post Type
function hco_partenaire() {

    $labels = array(
        'name'                => _x( 'Partenaires', 'Post Type General Name', 'hco' ),
        'singular_name'       => _x( 'Partenaire', 'Post Type Singular Name', 'hco' ),
        'menu_name'           => __( 'Partenaires', 'hco' ),
        'parent_item_colon'   => __( 'Parent', 'hco' ),
        'all_items'           => __( 'Tous', 'hco' ),
        'view_item'           => __( 'Voir le partenaire', 'hco' ),
        'add_new_item'        => __( 'Ajouter un nouveau partenaire', 'hco' ),
        'add_new'             => __( 'Ajouter', 'hco' ),
        'edit_item'           => __( 'Modifier', 'hco' ),
        'update_item'         => __( 'Mettre à jour', 'hco' ),
        'search_items'        => __( 'Recherche un partenaire', 'hco' ),
        'not_found'           => __( 'Aucun résultat', 'hco' ),
        'not_found_in_trash'  => __( 'Aucun résultat dans la corbeille', 'hco' ),
    );
    $args = array(
        'label'               => __( 'partenaire', 'hco' ),
        'description'         => __( 'Partenaires du club', 'hco' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-businessman',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'partenaire', $args );

}

// Hook into the 'init' action
add_action( 'init', 'hco_partenaire', 0 );

}


/**
 * Agenda
 */

if ( ! function_exists('add_event_cpt') ) {

// Register Custom Post Type
function add_event_cpt() {

    $labels = array(
        'name'                => _x( 'Évènements', 'Post Type General Name', 'hco' ),
        'singular_name'       => _x( 'Évènement', 'Post Type Singular Name', 'hco' ),
        'menu_name'           => __( 'Agenda', 'hco' ),
        'parent_item_colon'   => __( 'Parent :', 'hco' ),
        'all_items'           => __( 'Tous les évènements', 'hco' ),
        'view_item'           => __( 'Voir la fiche', 'hco' ),
        'add_new_item'        => __( 'Ajouter un évènement', 'hco' ),
        'add_new'             => __( 'Ajouter', 'hco' ),
        'edit_item'           => __( 'Modifier', 'hco' ),
        'update_item'         => __( 'Mettre à jour', 'hco' ),
        'search_items'        => __( 'Rechercher', 'hco' ),
        'not_found'           => __( 'Aucun résultat', 'hco' ),
        'not_found_in_trash'  => __( 'Aucun résultat dans la corbeille', 'hco' ),
    );
    $args = array(
        'label'               => __( 'evenement', 'hco' ),
        'description'         => __( 'Matchs, Soirées, etc', 'hco' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'          => array( 'cat_evenement' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-calendar-alt',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'evenement', $args );

}

// Hook into the 'init' action
add_action( 'init', 'add_event_cpt', 0 );

}

/**
 *
 */

if ( ! function_exists('register_hco_players') ) {

// Register Custom Post Type
function register_hco_players() {

    $labels = array(
        'name'                => _x( 'Joueurs', 'Post Type General Name', 'hco' ),
        'singular_name'       => _x( 'Joueur', 'Post Type Singular Name', 'hco' ),
        'menu_name'           => __( 'Joueurs', 'hco' ),
        'parent_item_colon'   => __( 'Parent : ', 'hco' ),
        'all_items'           => __( 'Tous', 'hco' ),
        'view_item'           => __( 'Voir la fiche', 'hco' ),
        'add_new_item'        => __( 'Ajouter un joueur', 'hco' ),
        'add_new'             => __( 'Ajouter', 'hco' ),
        'edit_item'           => __( 'Modifier', 'hco' ),
        'update_item'         => __( 'Mettre à jour', 'hco' ),
        'search_items'        => __( 'Rechercher', 'hco' ),
        'not_found'           => __( 'Aucun résultat', 'hco' ),
        'not_found_in_trash'  => __( 'Aucun résultat dans la corbeill', 'hco' ),
    );
    $args = array(
        'label'               => __( 'joueurs', 'hco' ),
        'description'         => __( 'Joueurs du club HCO', 'hco' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', ),
        'taxonomies'          => array( 'cat_joueur' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-groups',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'joueurs', $args );

}

// Hook into the 'init' action
add_action( 'init', 'register_hco_players', 0 );

}

if ( ! function_exists( 'register_joueurs_cat' ) ) {

// Register Custom Taxonomy
function register_joueurs_cat() {

    $labels = array(
        'name'                       => _x( 'Catégories', 'Taxonomy General Name', 'hco' ),
        'singular_name'              => _x( 'Catégorie', 'Taxonomy Singular Name', 'hco' ),
        'menu_name'                  => __( 'Catégories', 'hco' ),
        'all_items'                  => __( 'Toutes les catégories', 'hco' ),
        'parent_item'                => __( 'Parent :', 'hco' ),
        'parent_item_colon'          => __( 'Parent Item:', 'hco' ),
        'new_item_name'              => __( 'Nouveau', 'hco' ),
        'add_new_item'               => __( 'Nouvelle catégorie', 'hco' ),
        'edit_item'                  => __( 'Modifier', 'hco' ),
        'update_item'                => __( 'Mise à jour', 'hco' ),
        'separate_items_with_commas' => __( 'Séparer avec des virgules', 'hco' ),
        'search_items'               => __( 'Rechercher', 'hco' ),
        'add_or_remove_items'        => __( 'Ajouter ou Retirer', 'hco' ),
        'choose_from_most_used'      => __( 'Choisir dans les plus utilisés', 'hco' ),
        'not_found'                  => __( 'Aucun résultat', 'hco' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'cat_joueur', array( 'joueurs' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'register_joueurs_cat', 0 );

}


/**
 * Shortcode Partenaire Accueil
 *
 */
function loop_partenaires(){
    $args = array (
        'post_type'              => 'partenaire',
        'order'                  => 'ASC'
    );
    $p_query = new WP_Query( $args );

    if($p_query->have_posts()) : ?>
    <h3>Nos partenaires</h3>
    <div class="gdlr-color-wrapper  gdlr-show-all no-skin" style="background-color: #f3f3f3; padding-bottom: 20px; ">
            <div class="container">
                <div class="gdlr-banner-item-wrapper">
                    <div class="gdlr-banner-images gdlr-item">
                        <div class="flexslider" data-pausetime="7000" data-slidespeed="600" data-effect="fade" data-columns="5" data-type="carousel" data-nav-container="gdlr-banner-images">
                            <div class="flex-viewport" style="overflow: hidden; position: relative;">
                                <ul class="slides" style="width: 1400%; margin-left: -456px;">

                                <?php while($p_query->have_posts()) : $p_query->the_post();
                                    $url_site = get_field('site_web'); ?>
                                    <li style="width: 198px; float: left; display: block;">
                                        <a href="<?php echo $url_site; ?>">
                                        <?php if(has_post_thumbnail()){ the_post_thumbnail('thumbnail'); } ?>
                                        </a>
                                    </li>
                                <?php endwhile; else : echo 'Nothing'; endif; ?>

                                </ul>
                            </div>
                            <ul class="flex-direction-nav">
                                <li>
                                    <a class="flex-prev" href="#">
                                        <i class="icon-angle-left"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="flex-next" href="#">
                                        <i class="icon-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="clear"></div>
            </div>
        </div>
<?php
}

function display_partenaires(){
    loop_partenaires();
}
add_shortcode( 'display-partenaires', 'display_partenaires' );


//Custom excerpt
function my_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    echo $excerpt;
}

function my_content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    } 
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);
    echo $content;
}

 ?>