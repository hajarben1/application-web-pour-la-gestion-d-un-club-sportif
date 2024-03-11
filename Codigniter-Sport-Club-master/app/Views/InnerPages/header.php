<header class="bg-white border-b border-gray-300">
    <script src="<?= !empty($node_modules) ? base_url($node_modules . '/flowbite/dist/flowbite.min.js') : "node_modules/flowbite/dist/flowbite.min.js" ?>"></script>


    <div class="container mx-auto p-4 flex items-center justify-between">
        <a href="<?= base_url('/') ?>">
            <img src="<?= !empty($public) ? base_url($public . '/img/svg/logo.svg') : "public/img/svg/logo.svg" ?>" class=" block md:h-10 h-6 lg:mr-4 md:mr-2" alt="" />
        </a>


        <button class="lg:hidden bg-transparent  text-orange-500 font-semibold  py-2 px-4 border border-orange-500 rounded" id="dropdownDefaultButtontoggle" data-dropdown-toggle="toggle">
            &#9776;
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="<?= base_url('/reclame') ?>" class="block px-4 py-2 ">Add Reclamation</a>
                </li>
                <li>
                    <a href="<?= base_url('/list-reclame') ?>" class="block px-4 py-2  ">List of Reclamation</a>
                </li>
            </ul>
        </div>
        <?php
        if (session()->has('PseudoNom') && !empty(session('PseudoNom'))) {
            echo ' <ul  class="hidden lg:flex space-x-4">
           <button class="menu-item py-2 px-4 text-gray-800  " id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button">Hello ' . session()->get('PseudoNom') . '</button>
            <li class="menu-item border-2 border-orange-500 hover:bg-orange-500 rounded-md py-2 px-4 text-gray-800  "><a href="' . base_url('logout') . '" class="">logout</a></li>
        </ul>';
        } else {

            echo ' <ul  class="hidden lg:flex space-x-4 ">
            <li class="menu-item border-2 border-orange-500 hover:bg-orange-500 rounded-md py-2 px-4 text-gray-800 hover:text-white "><a href="' . base_url('sign-in') . '" class="">Sign In</a></li>
            <li class="menu-item border-2 border-orange-500 hover:bg-orange-500 rounded-md py-2 px-4 text-gray-800  hover:text-white"><a href="' . base_url('sign-up') . '" class="">Sign Up</a></li>
        </ul>';
        } ?>
    </div>
    <!-- Mobile phone -->
    <div id="toggle" class="z-4 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32 dark:bg-gray-700 text-center">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButtontoggle">
            <?php
            if (session()->has('PseudoNom') && !empty(session('PseudoNom'))) {
                echo '
            <button class="menu-item py-2 px-4 text-gray-800  " id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button">Hello ' . session()->get('PseudoNom') . '</button>
                <li class="menu-item  py-2 px-4 text-gray-800  "><a href="' . base_url('logout') . '" class="">logout</a></li>';
            } else {
                echo '
                <li class="menu-item  py-2 px-4 text-gray-800  "><a href="' . base_url('sign-in') . '" class="">Sign In</a></li>
                <li class="menu-item  py-2 px-4 text-gray-800  "><a href="' . base_url('sign-up') . '" class="">Sign Up</a></li>';
            } ?>


        </ul>
    </div>

</header>