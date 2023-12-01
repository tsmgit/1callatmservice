<?php
$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$url = $_SERVER['REQUEST_URI'];
$my_url = explode('wp-content' , $url); 
$path = $_SERVER['DOCUMENT_ROOT']."/".$my_url[0];
include_once $path . '/wp-config.php';
include_once $path . '/wp-includes/pluggable.php';

$obj=new stdClass();

//Blog
$posts = array();
$args = array('post_type' => 'post',
			    'post_status' => 'publish',
				'posts_per_page' => 8,
				'order_by'  => 'date',
				'order' => 'DESC',
			);
						
$loope = new WP_Query( $args );
while ( $loope->have_posts() ) : $loope->the_post(); 
    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
    
    $posts[] = [
        "title"     => get_the_title(),
        "excerpt"   => get_the_excerpt(),
        "image"     => $image_url,
        "link"      => get_permalink()
    ];
endwhile;  
		

$final_arr=array('status'=>array('error_code'=>0,'message'=>'Success'), 'posts' => $posts);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type'); 
header('Content-Type: application/json');
echo json_encode($final_arr);

?>