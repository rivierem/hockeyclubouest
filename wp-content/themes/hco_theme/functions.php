<?php // Add Shortcode
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
							 'undefined',
							 'undefined',
							 'undefined',
							 -20.9982668,
							 55.28018529999997,
							 'https://mapbuildr.com/assets/img/markers/default.png'],
							['Siège du club',
							 'undefined',
							 'undefined',
							 'undefined',
							 'undefined',
							 -20.9967352,
							 55.28449869999997,
							 'https://mapbuildr.com/assets/img/markers/default.png']
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
link = '';     }

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








 ?>