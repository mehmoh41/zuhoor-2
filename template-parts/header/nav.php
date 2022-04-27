<?php

/**
 * navigation theme
 * @package zuhoor
 */
$menu_class = \ZUHOOR_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('zuhoor-header-menu');
$header_menus = wp_get_nav_menu_items($header_menu_id);



?>

        <nav class="py-2 max-w-screen-xl mx-auto">
        <div class="md:flex justify-between items-center">
        <div class="flex justify-between items-center md:block">
        <a href="<?php echo get_home_url()?>" class="text-4xl font-bold flex items-center md:ml-3">
            <span class="text-6xl bg-clip-text text-transparent bg-gradient-to-r from-indigo-300 via-indigo-500 to-blue-300">Z</span><span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500 text-4xl -ml-1">uhoor</span>
        </a>

        <button type="button" id="menu_bar" class="block md:hidden">
        <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 18H20C20.55 18 21 17.55 21 17C21 16.45 20.55 16 20 16H4C3.45 16 3 16.45 3 17C3 17.55 3.45 18 4 18ZM4 13H20C20.55 13 21 12.55 21 12C21 11.45 20.55 11 20 11H4C3.45 11 3 11.45 3 12C3 12.55 3.45 13 4 13ZM3 7C3 7.55 3.45 8 4 8H20C20.55 8 21 7.55 21 7C21 6.45 20.55 6 20 6H4C3.45 6 3 6.45 3 7Z" fill="black"/>
        </svg>
        </button>
        <button type="button" id="close_bar" class="hidden md:hidden">
            
        <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z" fill="#8898AA"/>
        </svg>

        </button>
        </div>

        <div class="hidden md:block" id="nav_items">
            <?php
            if (!empty($header_menus) && is_array($header_menus)) {
            ?>
<ul class="navbar-nav mr-auto flex flex-col md:flex-row mt-4 md:mt-0">
<?php
  foreach ($header_menus as $menu_item) {
    if (!$menu_item->menu_item_parent) {

        $child_menu_items = $menu_class->get_child_menu_items($header_menus, $menu_item->ID);

        $has_children = !empty($child_menu_items) && is_array($child_menu_items);
        if (!$has_children) {
?>
            <li class=" nav-item">
                <a class="nav-link block pr-2 ml-2 lg:px-2 py-1 text-gray-600 hover:text-black transition duration-150 ease-in-out" href="<?php echo $menu_item->url ?>" data-mdb-ripple="true" data-mdb-ripple-color="light">
                    <?php echo esc_html($menu_item->title) ?></a>
            </li>
        <?php
        } else {
        ?>
            <li class="nav-item relative" id="list_toggle">
                <a class="nav-link block pr-2 py-1 ml-2 lg:px-2 text-gray-600 hover:text-black focus:text-gray-700 transition duration-150 ease-in-out flex items-center whitespace-nowrap" 
                href="
                <?php //echo $menu_item->url ?>
                " 
                type="button"

                >
                    <?php
                    echo esc_html($menu_item->title)
                    ?>
                    <svg id="caret"
                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2 hidden md:block" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                    </svg>
                </a>
                <div class=" rounded-xl md:shadow-lg md:bg-white md:absolute md:hidden w-64" id="dropdown" style="z-index:30">
                    <div class="px-2 md:px-6 lg:px-8 py-3 mb-2">
                        <div class="grid grid-cols-1 gap-2 md:gap-4">
                            <div class="md:bg-white text-gray-600">
                                <p class="hidden md:block px-2 border-b border-gray-200 w-full uppercase font-semibold text-gray-700">
                                    <?php echo esc_html($menu_item->title) ?></p>
                                <?php
                                foreach ($child_menu_items as $child_menu_item) {
                                ?>
                                    <a href="<?php echo esc_url($child_menu_item->url) ?>" aria-current="true" class="block px-2 py-2 border-b border-gray-200 w-full hover:bg-gray-50 hover:text-gray-700 transition duration-150 ease-in-out">
                                        <?php
                                        echo esc_html($menu_item->title)
                                        ?>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php
        }
        ?>


<?php
    }
}
?>

</ul>
<?php
}
?>

        </div>
        <div class="hidden icons flex justify-center md:flex md:justify- items-center mr-2 py-4 mt-5 md:mt-0 md:py-0" id="icons">

            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" class="w-12 md:w-4 mr-8 md:mr-2" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <path style="fill:#385C8E;" d="M134.941,272.691h56.123v231.051c0,4.562,3.696,8.258,8.258,8.258h95.159
        c4.562,0,8.258-3.696,8.258-8.258V273.78h64.519c4.195,0,7.725-3.148,8.204-7.315l9.799-85.061c0.269-2.34-0.472-4.684-2.038-6.44
        c-1.567-1.757-3.81-2.763-6.164-2.763h-74.316V118.88c0-16.073,8.654-24.224,25.726-24.224c2.433,0,48.59,0,48.59,0
        c4.562,0,8.258-3.698,8.258-8.258V8.319c0-4.562-3.696-8.258-8.258-8.258h-66.965C309.622,0.038,308.573,0,307.027,0
        c-11.619,0-52.006,2.281-83.909,31.63c-35.348,32.524-30.434,71.465-29.26,78.217v62.352h-58.918c-4.562,0-8.258,3.696-8.258,8.258
        v83.975C126.683,268.993,130.379,272.691,134.941,272.691z" />
            </svg>


            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="w-12 md:w-4 mr-8 md:mr-2" viewBox="0 0 496 496" style="enable-background:new 0 0 496 496;" xml:space="preserve">
                <g>
                    <g>
                        <rect id="SVGCleanerId_0" x="16" y="168.728" style="fill:#187FB8;" width="96" height="304" />
                    </g>
                    <g>
                        <rect id="SVGCleanerId_0_1_" x="16" y="168.728" style="fill:#187FB8;" width="96" height="304" />
                    </g>
                </g>
                <g>
                    <rect id="SVGCleanerId_0_2_" x="16" y="168.728" style="fill:#1267A0;" width="96" height="304" />
                </g>
                <path style="fill:#187FB8;" d="M16,340.712c24,9.616,56,17.664,96,23.88V168.728H16V340.712z" />
                <path style="fill:#2499CE;" d="M16,207.92c24,9.624,56,17.664,96,23.88v-63.072H16V207.92z" />
                <path style="fill:#187FB8;" d="M374.912,164.944c-55.4,0-94.912,29.976-94.912,51v-47.216H168.208c1.408,24,0,304,0,304H280V308.424
        c0-9.2-2.032-18.416,0.76-25.04c7.472-18.416,21.52-37.512,50.368-37.512c37.712,0,52.872,28.312,52.872,69.8v157.056h112V303.864
        C496,208.984,443.608,164.944,374.912,164.944z" />
                <path style="fill:#1267A0;" d="M374.912,164.944c-55.4,0-94.912,29.976-94.912,51v-47.216H168.208c1.408,24,0,304,0,304H280V308.424
        c0-9.2-2.032-18.416,0.76-25.04c7.472-18.416,21.52-37.512,50.368-37.512c37.712,0,52.872,28.312,52.872,69.8v157.056h112V303.864
        C496,208.984,443.608,164.944,374.912,164.944z" />
                <path style="fill:#187FB8;" d="M374.912,164.944c-55.4,0-94.912,29.976-94.912,51v-47.216H168.208
        c0.832,16,0.672,121.344,0.4,204.592c34.624,3.832,71.392,5.744,111.392,5.824v-70.72c0-9.2,0.208-11.048,0.208-11.048
        c0-28.904,22.064-51.504,50.92-51.504c37.712,0,52.872,28.312,52.872,69.8v57.808c40-4.168,77.976-10.56,112-18.824v-50.8
        C496,208.984,443.608,164.944,374.912,164.944z" />
                <g>
                    <path style="fill:#2499CE;" d="M374.912,164.944c-55.4,0-94.912,29.976-94.912,51v-47.216H168.208
        c0.408,8,0.576,35.344,0.616,72.112c35.224,3.888,72.152,5.76,110.192,5.76c72.096,0,140.904-7.584,201.08-20.776
        C459.008,184.72,420.68,164.944,374.912,164.944z" />
                    <path style="fill:#2499CE;" d="M59.064,23.272C23.352,23.272,0,45.792,0,76.048c0,29.688,22.68,52.68,57.68,52.68h0.704
        c36.336,0,58.96-23.08,58.96-52.752C116.664,45.728,94.728,23.272,59.064,23.272z" />
                </g>
                <path style="fill:#187FB8;" d="M59.064,52.08C23.352,52.08,0,45.792,0,76.048c0,29.688,22.68,52.68,57.68,52.68h0.704
        c36.336,0,58.96-23.08,58.96-52.752C116.664,45.728,94.728,52.08,59.064,52.08z" />
                <path style="fill:#1267A0;" d="M59.064,96.016C23.352,96.016,0,66.624,0,76.048c0,29.688,22.68,52.68,57.68,52.68h0.704
        c36.336,0,58.96-23.08,58.96-52.752C117.136,66.568,94.248,96.016,59.064,96.016z" />

            </svg>


            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class="w-12 md:w-4 mr-8 md:mr-2 mt-1" viewBox="0 0 410.155 410.155" style="enable-background:new 0 0 410.155 410.155;" xml:space="preserve">
                <path style="fill:#76A9EA;" d="M403.632,74.18c-9.113,4.041-18.573,7.229-28.28,9.537c10.696-10.164,18.738-22.877,23.275-37.067
        l0,0c1.295-4.051-3.105-7.554-6.763-5.385l0,0c-13.504,8.01-28.05,14.019-43.235,17.862c-0.881,0.223-1.79,0.336-2.702,0.336
        c-2.766,0-5.455-1.027-7.57-2.891c-16.156-14.239-36.935-22.081-58.508-22.081c-9.335,0-18.76,1.455-28.014,4.325
        c-28.672,8.893-50.795,32.544-57.736,61.724c-2.604,10.945-3.309,21.9-2.097,32.56c0.139,1.225-0.44,2.08-0.797,2.481
        c-0.627,0.703-1.516,1.106-2.439,1.106c-0.103,0-0.209-0.005-0.314-0.015c-62.762-5.831-119.358-36.068-159.363-85.14l0,0
        c-2.04-2.503-5.952-2.196-7.578,0.593l0,0C13.677,65.565,9.537,80.937,9.537,96.579c0,23.972,9.631,46.563,26.36,63.032
        c-7.035-1.668-13.844-4.295-20.169-7.808l0,0c-3.06-1.7-6.825,0.485-6.868,3.985l0,0c-0.438,35.612,20.412,67.3,51.646,81.569
        c-0.629,0.015-1.258,0.022-1.888,0.022c-4.951,0-9.964-0.478-14.898-1.421l0,0c-3.446-0.658-6.341,2.611-5.271,5.952l0,0
        c10.138,31.651,37.39,54.981,70.002,60.278c-27.066,18.169-58.585,27.753-91.39,27.753l-10.227-0.006
        c-3.151,0-5.816,2.054-6.619,5.106c-0.791,3.006,0.666,6.177,3.353,7.74c36.966,21.513,79.131,32.883,121.955,32.883
        c37.485,0,72.549-7.439,104.219-22.109c29.033-13.449,54.689-32.674,76.255-57.141c20.09-22.792,35.8-49.103,46.692-78.201
        c10.383-27.737,15.871-57.333,15.871-85.589v-1.346c-0.001-4.537,2.051-8.806,5.631-11.712c13.585-11.03,25.415-24.014,35.16-38.591
        l0,0C411.924,77.126,407.866,72.302,403.632,74.18L403.632,74.18z" />

            </svg>


            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" class="w-12 md:w-4 mr-8 md:mr-2" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 551.034 551.034" style="enable-background:new 0 0 551.034 551.034;" xml:space="preserve">
                <g id="XMLID_13_">

                    <linearGradient id="XMLID_2_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.5714" x2="275.517" y2="549.7202" gradientTransform="matrix(1 0 0 -1 0 554)">
                        <stop offset="0" style="stop-color:#E09B3D" />
                        <stop offset="0.3" style="stop-color:#C74C4D" />
                        <stop offset="0.6" style="stop-color:#C21975" />
                        <stop offset="1" style="stop-color:#7024C4" />
                    </linearGradient>
                    <path id="XMLID_17_" style="fill:url(#XMLID_2_);" d="M386.878,0H164.156C73.64,0,0,73.64,0,164.156v222.722
        c0,90.516,73.64,164.156,164.156,164.156h222.722c90.516,0,164.156-73.64,164.156-164.156V164.156
        C551.033,73.64,477.393,0,386.878,0z M495.6,386.878c0,60.045-48.677,108.722-108.722,108.722H164.156
        c-60.045,0-108.722-48.677-108.722-108.722V164.156c0-60.046,48.677-108.722,108.722-108.722h222.722
        c60.045,0,108.722,48.676,108.722,108.722L495.6,386.878L495.6,386.878z" />

                    <linearGradient id="XMLID_3_" gradientUnits="userSpaceOnUse" x1="275.517" y1="4.5714" x2="275.517" y2="549.7202" gradientTransform="matrix(1 0 0 -1 0 554)">
                        <stop offset="0" style="stop-color:#E09B3D" />
                        <stop offset="0.3" style="stop-color:#C74C4D" />
                        <stop offset="0.6" style="stop-color:#C21975" />
                        <stop offset="1" style="stop-color:#7024C4" />
                    </linearGradient>
                    <path id="XMLID_81_" style="fill:url(#XMLID_3_);" d="M275.517,133C196.933,133,133,196.933,133,275.516
        s63.933,142.517,142.517,142.517S418.034,354.1,418.034,275.516S354.101,133,275.517,133z M275.517,362.6
        c-48.095,0-87.083-38.988-87.083-87.083s38.989-87.083,87.083-87.083c48.095,0,87.083,38.988,87.083,87.083
        C362.6,323.611,323.611,362.6,275.517,362.6z" />

                    <linearGradient id="XMLID_4_" gradientUnits="userSpaceOnUse" x1="418.306" y1="4.5714" x2="418.306" y2="549.7202" gradientTransform="matrix(1 0 0 -1 0 554)">
                        <stop offset="0" style="stop-color:#E09B3D" />
                        <stop offset="0.3" style="stop-color:#C74C4D" />
                        <stop offset="0.6" style="stop-color:#C21975" />
                        <stop offset="1" style="stop-color:#7024C4" />
                    </linearGradient>
                    <circle id="XMLID_83_" style="fill:url(#XMLID_4_);" cx="418.306" cy="134.072" r="34.149" />
                </g>

            </svg>



        </div>
        </div>

        </nav>

