<?php

/**
 * header template
 * @package zuhoor
 */
?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo("charset") ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"/> -->
    <script src="https://cdn.tailwindcss.com"></script>
    

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        'poppins': ['Poppins'],
                    },
                }
            }
        }
    </script>
    <!-- we use the title in the zuhor-theme class so that wordpress itself manage the document title. -->
    <!-- <title>Zuhoor Theme</title> -->
    <?php wp_head(); ?>
</head>
<?php 
    global $front_class;
    if(is_front_page()) {
        $front_class = 'bg-gradient-to-r from-indigo-100 via-indigo-200 to-blue-300';
    }
?>
<body <?php body_class($front_class) ?> >
    <?php
    if (function_exists("wp_body_open")) {
        wp_body_open();
    }
    ?>
    <section id="content">
        
    <header class="sticky top-0 " id="myNav" style="z-index:30">
        
        <?php get_template_part("template-parts/header/nav") ?>
        
    </header>
    