<?php 
    $theID = get_the_ID();
    
    $page_title = get_post_meta( $theID, 'project_project_title',TRUE) . " | ";
    $theTitle = get_post_meta( $theID, 'project_project_title',TRUE);
    
    $fileCover_id = get_post_meta( $theID, 'project_header_image_top',TRUE); 
    $fileCover = wp_get_attachment_url( $fileCover_id);

    $fileCover_id_lef = get_post_meta( $theID, 'project_header_image_left',TRUE); 
    $fileCover_left = wp_get_attachment_url( $fileCover_id_lef);

    $fileCover_id_right = get_post_meta( $theID, 'project_header_image_Right',TRUE); 
    $fileCover_right = wp_get_attachment_url( $fileCover_id_right);

    $fileImageNextToText_id = get_post_meta( $theID, 'project_image_next_to_text',TRUE); 
    $fileImageNextToText = wp_get_attachment_url( $fileImageNextToText_id);

    $desc = get_post_meta( $theID, 'project_Description',TRUE);
    $project_year = get_post_meta( $theID, 'project_project_year',TRUE);
    
    $seeLive_label = get_post_meta($theID, 'project_see_live_label')[0];
    $seeLive = get_post_meta($theID, 'project_see_live_link')[0];

    $afterSlide_id = rwmb_meta( 'project_image_1');
    $afterSlide = $afterSlide_id["full_url"];

    $gallery = $campaigns = rwmb_meta('campaign_gallery');
    
    $project_terms = get_the_terms($theID, 'project-category');
    $theTerms = array();
    $theTerms_name = '';
    
    if( !empty($project_terms) ) {
        $project_terms_size = count($project_terms);
        foreach ($project_terms as $index=>$term) {
            $theTerms[] = 'term-' . $term->slug;
            if($index != ($project_terms_size - 1)){
                $theTerms_name .=  $term->name.'<br>';
            }
            else{
                $theTerms_name .=  $term->name;
            }
        }							
    }


    $args_findNext = array(
        'post_type'=> 'project',
        'orderby'    => 'date',
        'post_status' => 'publish',
        'order'    => 'DESC',
        'posts_per_page' => -1 
    );

    $query_next = new WP_Query( $args_findNext );

    $next_idTemp = array();
    foreach ($query_next->posts as $q){
        array_push($next_idTemp, $q->ID);
        
        
    }
    $current_idPosition = array_search( $theID,$next_idTemp);
    if ( $current_idPosition + 1 < sizeof( $next_idTemp ) ) {
        $nextID = $next_idTemp[$current_idPosition + 1];
    }

    if ( ! isset( $nextID ) ) {
        $nextID = $next_idTemp[0];
    }
    
    $nextfileCover_id = get_post_meta( $nextID, 'project_header_image_top',TRUE); 
    $nextfileCover = wp_get_attachment_url( $nextfileCover_id); 
    $next_link = get_permalink($nextID);
    $next_title = get_post_meta( $nextID, 'project_project_title',TRUE);
    


    include 'header.php';
?>



<div class="w-full">

    <div 
        class="
            min-h-[70vh]
            p-10
            bg-[url('<?=$fileCover?>')]
            bg-cover bg-center bg-no-repeat bg-fixed
            flex justify-center items-center
            text-white text-8xl
        " 
    >
        <?=$theTitle;?>
    </div>

    <div class="
            w-full
            grid grid-cols-2
        "
    >
        <div class="
                h-[50vh]
                bg-[url('<?=$fileCover_left?>')]
                bg-cover bg-center bg-no-repeat
            "
        >
        </div>
        <div class="
                h-[50vh]
                bg-[url('<?=$fileCover_right?>')]
                bg-cover bg-center bg-no-repeat
            "
        >
        </div>
    </div>

    <div
        class="
            min-h-[100vh]
            flex justify-between items-center
            bg-[#f0f1f1] 
            p-20
        "
    >
        <img
            class="
                w-[50%]
                h-fit
            "
            src="<?=$fileImageNextToText?>"
        >

        <div
            class="
                w-[50%]
                px-24
                min-h-[50vh]
            "
        >
            <h2
                class="
                    text-6xl
                "
            >
                <?=$theTitle?> 
            </h2>

            <p
                class="
                    text-[#a8a5a5]
                    my-10
                "
            >
                <?=$theTerms_name?>
            </p>

            <p><?=$desc;?></p>
            
            <a
                class="
                    mt-8
                    cursor-pointer
                    text-[#fb5c30]
                    outline-0 float-right
                "
                href="<?=$seeLive?>"
            >
                <span class="text-xl" seeLive>
                    <?=$seeLive_label?>

                    
                    <div 
                        class="
                            w-4 h-fit  ml-4
                            overflow-hidden inline-block 
                            transform translate-y-[60%]
                            transition duration-500
                        "
                        seeLiveTriangle
                        >
                        <div class=" h-8 bg-[#fb5c30] -rotate-45 transform origin-top-left"></div>
                    </div>
                    
                </span>
            </a>

        </div>

    </div>


    <div
        style="position:relative"
    >
        <div 
            id="gallery"
            style="cursor: grab"
            class="
                flex justify-center
            "
        >
            <?php
                foreach($gallery as $x => $x_value) {
                    $img_atts = wp_get_attachment_image_src( $x, 'full' );
                    $img_src = $img_atts[0];
                    echo '	<div
                                style="outline:0"
                            >
                                <img src="'.$img_src.'" class="h-[50vh] outline-0">
                            </div>';
                }
            ?>
        </div>

        <!-- <img src="<?=get_template_directory_uri()?>/images/slick-left.png"
            id="slick-left"  
            class="
                w-15 cursor-pointer
                absolute left-10 top-[50%]
            " 
        >
        <img src="<?=get_template_directory_uri()?>/images/slick-right.png"
            id="slick-right"  
            class="
                w-15 cursor-pointer
                absolute right-10 top-[50%]
            "
        > -->
    </div>

    <div class="
            h-[50vh] w-full
            bg-[url('<?=$afterSlide?>')]
            bg-cover bg-center bg-no-repeat bg-fixed
        "
    >
    </div>
    
    <div
        class="
            min-h-[100vh] w-full
            flex flex-col zjustify-center items-center 
            bg-[#f0f1f1] 
            p-20
        "
    >
        <text class="w-fit text-[#fb5c30] mb-8">NEXT PROJECT</text>
        <a href="<?=$next_link?>"  
            class="
                w-fit w-1/2 relative
                text-[#fb5c30]
            "
        >
            <img src="<?=$nextfileCover?>"
                class="
                    w-auto max-h-[60vh]
                "
            >
            <text
                class="
                    absolute
                    bottom-[-10%] left-[-10%]
                    text-8xl
                "
            >
                <?=$next_title;?>
            </text>
        </a>
                
    </div>

</div>

<script>
    
    $('#gallery').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        centerMode: true,
        variableWidth: true,
        prevArrow: $('#slick-left'),
        nextArrow: $('#slick-right'),
    });

    $("[seeLive]")
    .mouseenter(function() {
        $("[seeLiveTriangle]").addClass("rotate-45")
    })
    .mouseleave(function() {
        $("[seeLiveTriangle]").removeClass("rotate-45")
    });
      
</script>

<?php 
    include 'footer.php';
?>