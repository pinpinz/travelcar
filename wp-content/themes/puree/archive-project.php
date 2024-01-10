<?php
    $page_title = 'Projects | ';
?>
<?php 
    include 'header.php';
?>

<?php
    $taxonomies = get_taxonomies(['object_type' => ['project']]);
    $taxonomyTerms = [];
    // loop over your taxonomies
    foreach ($taxonomies as $taxonomy)
    {
        // retrieve all available terms, including those not yet used
        $terms    = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);

        // make sure $terms is an array, as it can be an int (count) or a WP_Error
        $hasTerms = is_array($terms) && $terms;

        if($hasTerms)
        {
            $taxonomyTerms[$taxonomy] = $terms;        
        }
    }
    $theTaxonomy = $taxonomyTerms['project-category'];


    $args = array(
        'post_type'=> 'project',
        'orderby'    => 'date',
        'post_status' => 'publish',
        'order'    => 'DESC',
        'posts_per_page' => -1 // this will retrive all the post that is published 
    );
    $WP_QUERY_RESULT = new WP_Query( $args );
    $WP_QUERY_RESULT_POSTS = $WP_QUERY_RESULT->posts;
    $projects = [];

    foreach($WP_QUERY_RESULT_POSTS as $thePost){
        $project_terms = get_the_terms($thePost->ID, 'project-category');
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

        $fileCover_id = get_post_meta( $thePost->ID, 'project_header_image_top',TRUE); 
        $fileCover = wp_get_attachment_url( $fileCover_id); 

        $newPost = [
            "ID"=> $thePost->ID,
            "permalink"=> get_permalink($thePost->ID),
            "title"=> get_post_meta( $thePost->ID, 'project_project_title',TRUE),
            "terms"=> $theTerms,
            "terms_name"=> $theTerms_name,
            "cover"=> $fileCover
        ];

        array_push($projects,$newPost);
    }
    
?>

<div class="w-full">
    <div
        class="
            left-[50%] translate-x-[-50%] 
            fixed z-[10] mt-7
            flex m-[auto]  w-fit h-fit
            place-content-center
        "
    >
        <button
            slug="term-all"
            class="
                outline outline-0
                bg-[#fb5c30] border-[#fb5c30]
                transition-all ease-in-out duration-300
                px-4 py-1 mx-2 rounded-3xl
                text-white 
                border-solid border-[1px] 
                '.$activeClass_hover.'
            "
            btn="term_top"
        >
            All
        </button>
    
        <?php
            foreach($theTaxonomy as $index=>$taxo){
                echo '
                    <button
                        slug="term-'.$taxo->slug.'"
                        class="
                            outline outline-0
                            border-white
                            transition-all ease-in-out duration-300
                            px-4 py-1 mx-2 rounded-3xl
                            text-white 
                            border-solid border-[1px] 
                            hover:opacity-[0.5]
                        "
                        btn="term_top"
                    >
                        '.$taxo->name.'
                    </button>
                ';
            }
        ?>
    </div>

    <div 
        class="
            min-h-[70vh]
            p-10
            bg-[url('<?=get_template_directory_uri()?>/images/archive-project-header.jpeg')]
            bg-cover bg-center bg-no-repeat bg-fixed
        " 
    >
    </div>

    <div
        id="project_list"
        class="
            grid grid-cols-2
        "
    >
        <?php
            foreach($projects as $theProject){
                echo '
                    <div
                        class="
                            project_item
                            '.implode(' ', $theProject["terms"]) .'
                            font-[Arimo] text-white
                            min-h-[400px] w-full w-[50%]
                            bg-[url('.$theProject["cover"].')]
                            bg-cover bg-center bg-no-repeat
                        "
                        project="project_item"
                        data-terms="'.implode(' ', $theProject["terms"]) .'"
                    >
                        <a 
                            class="
                                outline outline-0
                                transition-all ease-in-out duration-500
                                opacity-0 hover:opacity-100 
                                p-10
                                bg-black bg-opacity-70
                                min-h-[400px] w-[100%]
                                flex justify-between items-end
                            "
                            href="'.$theProject["permalink"].'"
                        >
                                <div
                                    class="text-5xl"
                                >'.
                                    $theProject["title"]
                                .'
                                </div>

                                <div
                                    class="text-right italic"
                                >'.
                                    $theProject["terms_name"]
                                .'
                            </div>
                        </a>
                    </div>
                ';
            }
        ?>
    </div>
</div>

<!-- <script>
    $('[btn="term_top"]').click(function(){
        var theSlug = $(this).attr("slug")

        var notActiveClass_hover = 'hover:opacity-[0.5]';
        var activeClass = 'bg-[#fb5c30] border-[#fb5c30]';
        var notActiveClass = 'border-white';

        $('[btn="term_top"]').removeClass(notActiveClass_hover)
        $('[btn="term_top"]').removeClass(activeClass)
        $('[btn="term_top"]').removeClass(notActiveClass)

        $(this).addClass(activeClass)

        $('[btn="term_top"]:not([slug="'+theSlug+'"])').addClass(notActiveClass);
        $('[btn="term_top"]:not([slug="'+theSlug+'"])').addClass(notActiveClass_hover);
        
        if(theSlug != 'term-all'){
            $('[project="project_item"]').removeClass("hidden");
            $(':not(.'+theSlug+')[project="project_item"]').addClass("scale-70").siblings().addClass("hidden");
        }
        else{
            $('[project="project_item"]').removeClass("hidden");
        }
    });
</script> -->

<script>
    var theSlug
    // init Isotope
    var $grid = $('#project_list').isotope({
    itemSelector: '.project_item',
    layoutMode: 'masonry',
    filter: function() {
        let contains = ($(this).attr("data-terms")).indexOf(theSlug);
        return contains >= 0 ? false : true;
    }
    });

    // use value of search field to filter
    var $quicksearch = $('[btn="term_top"]').click( debounce( function() {
        theSlug = $(this).attr("slug");
        $grid.isotope();
        var notActiveClass_hover = 'hover:opacity-[0.5]';
        var activeClass = 'bg-[#fb5c30] border-[#fb5c30]';
        var notActiveClass = 'border-white';

        $('[btn="term_top"]').removeClass(notActiveClass_hover)
        $('[btn="term_top"]').removeClass(activeClass)
        $('[btn="term_top"]').removeClass(notActiveClass)

        $(this).addClass(activeClass)

        $('[btn="term_top"]:not([slug="'+theSlug+'"])').addClass(notActiveClass);
        $('[btn="term_top"]:not([slug="'+theSlug+'"])').addClass(notActiveClass_hover);
    }, 200 ) );

    // debounce so filtering doesn't happen every millisecond
    function debounce( fn, threshold ) {
    var timeout;
    threshold = threshold || 100;
    return function debounced() {
        clearTimeout( timeout );
        var args = arguments;
        var _this = this;
        function delayed() {
        fn.apply( _this, args );
        }
        timeout = setTimeout( delayed, threshold );
    };
    }

</script>

<?php 
    include 'footer.php';
?>