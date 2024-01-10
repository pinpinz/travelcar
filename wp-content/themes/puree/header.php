<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="styless.css" rel="stylesheet">

    <!-- <title>
        <?php 
            // if(isset($page_title)){
            //     echo $page_title;
            // }
        ?>
        [PAGE TITILE]
    </title> -->

    <?php wp_head(); ?>

    <style>
        body,h1,h2,p {
        font-family: 'Brandon';
        }
        <?php 
        include 'styless.css';
        ?>
    </style>
    
</head>
    <body class="realtive">

        <?php include 'navbar.php';?>
    

        <div class="site-content relative px-10 " style="max-width: 100vw; overflow-x: hidden">

        