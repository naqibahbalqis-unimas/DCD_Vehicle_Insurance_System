<?php

$currentPage = ["Policy Holders", "All Policy Holders"]; // Replace with a dynamic value based on the URL or user action.
include 'components/menu_data.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Policy Holders | SafeDrive Vehicle Insurance System</title>
    <link href="./src/output.css" rel="stylesheet">

</head>

<body class="bg-light-background text-light-text dark:bg-dark-background dark:text-dark-text">



    <!-- Add overlay div -->
    <div id="mobile-menu-overlay" class="mobile-menu-overlay" onclick="toggleSidebar()"></div>

    <div class="flex min-h-screen items-start justify-start">
        <!-- Hamburger button - only visible on mobile -->
        <button onclick="toggleSidebar()"
            class="menu-trigger md:hidden fixed top-4 left-4 bg-light-accent p-2 rounded-full shadow-lg w-10 h-10 text-light-text dark:text-dark-text">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>

        <!-- Sidebar -->
        <aside id="sidebar" style="height: 250vh;" class="sidebar dark:bg-dark-sidebar 
             h-full bg-light-sidebar w-80">
            <!-- Close button - only visible on mobile -->
            <button onclick="toggleSidebar()" class="close-button md:hidden absolute top-4 right-4 mt-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="flex items-center md:justify-end mt-9 mb-8">
                <!-- Back Button -->
                <button onclick="navigateBack()"
                    class="text-gray-400 dark:text-gray-300 hover:text-light-accent dark:hover:text-dark-accent p-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <!-- Forward Button -->
                <button onclick="navigateForward()"
                    class="text-gray-400 dark:text-gray-300 hover:text-light-accent dark:hover:text-dark-accent p-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Brand Section -->
            <div class="flex font-autorich items-center gap-2.5 text-3xl justify-center mb-8">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/488e11eabec12c163b0212b9ecb83666aafb83889e5163bffd345f4c42c68836"
                    class="w-8 h-8" alt="SafeDrive Logo" />
                <span class="dark:text-dark-text text-light-text">
                    <span class="dark:text-dark-accent text-light-accent">S</span>afe<span
                        class="dark:text-dark-accent text-light-accent">D</span>rive
                </span>
            </div>

            <nav class="flex-1 menu mx-8">
                <?php foreach ($menuData as $index => $section): ?>
                <div class="mb-4">
                    <!-- Main Menu Button -->
                    <button id="menu-<?= $index ?>" onclick="toggleMenu(<?= $index ?>)" class="flex items-center justify-between gap-3 w-full text-left text-lg p-3 rounded relative 
        <?= $section['title'] === $currentPage[0] ? 'text-light-accent dark:text-dark-accent' : 'text-light-text dark:text-dark-text' ?> 
        hover:text-light-accent dark:hover:text-dark-accent">
                        <a class="flex items-center gap-3">
                            <div class="w-6 h-6">
                                <?= $section['icon']; ?>
                            </div>
                            <span><?= $section['title']; ?></span>
                        </a>
                        <!-- Chevron -->
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 transform transition-transform duration-200" id="chevron-<?= $index ?>"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>


                    <!-- Purple bar for active state -->
                    <?php if ($section['title'] === $currentPage): ?>
                    <span class="absolute left-0 top-0 bottom-0 w-1">
                    </span>
                    <?php endif; ?>
                    <!-- Submenu -->
                    <ul id="submenu-<?= $index ?>" class="ml-4 overflow-hidden <?= $section['title'] === $currentPage[0] ? 'max-h-screen' : 'max-h-0'; ?> 
            transition-[max-height] duration-300 ease-in-out">
                        <?php foreach ($section['subItems'] as $subItem): ?>
                        <li class="relative group">
                            <a href="<?= $subItem['url']; ?>"
                                class="flex items-center gap-3 px-10 py-2 text-lg relative 
            <?= $subItem['title'] === $currentPage[1] ? 'text-light-accent dark:text-dark-accent bg-light-border dark:bg-dark-sidebarHoverBg' : 'text-light-text dark:text-dark-text'; ?> 
            hover:text-light-accent dark:hover:text-dark-accent hover:bg-light-border dark:hover:bg-dark-sidebarHoverBg rounded">
                                <span class="absolute left-0 top-0 bottom-0 w-1 bg-light-accent dark:bg-dark-accent rounded-l transition-all duration-200
                <?= $subItem['title'] === $currentPage[1] ? 'opacity-100' : 'opacity-0 group-hover:opacity-100'; ?>">
                                </span>
                                <?= $subItem['title']; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endforeach; ?>
            </nav>


        </aside>
        <!-- Main Content -->
        <main class="flex-1  min-h-screen overflow-hidden"
            style="margin-top: 20px; margin-left: 20px;margin-right: 20px;">
            <section class="greeting mb-8 text-left ml-5 ">
                <div class="flex items-center justify-between">
                    <div class=" items-center gap-3">
                        <h1 class="md:text-4xl text-3xl font-bold mb-3">All Policy Holders</h1>
                        <p class="md:text-md text-sm text-opacity-43 text-light-text dark:text-dark-textMuted">
                            SafeDrive Vehicle and Automobile Insurance System
                        </p>
                    </div>
                    <!-- Right Section: Light/Dark Toggle and Log Out -->
                    <div class="flex items-center gap-6">

                        <!-- Light/Dark Mode Toggle -->
                        <button id="mode-toggle" onclick="toggleDarkMode()"
                            class="flex  items-center justify-center w-10 h-10 rounded-full bg-light-sidebar dark:bg-dark-sidebar shadow hover:bg-light-accent dark:hover:bg-dark-accent">
                            <!-- Light Mode Icon -->
                            <svg id="light-mode-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" class="block dark:hidden">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 12a4 4 0 1 0 8 0a4 4 0 1 0-8 0m-5 0h1m8-9v1m8 8h1m-9 8v1M5.6 5.6l.7.7m12.1-.7l-.7.7m0 11.4l.7.7m-12.1-.7l-.7.7" />
                            </svg>
                            <!-- Dark Mode Icon -->
                            <svg id="dark-mode-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" class="hidden dark:block">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M12 3h.393a7.5 7.5 0 0 0 7.92 12.446A9 9 0 1 1 12 2.992z" />
                            </svg>
                        </button>

                        <!-- Log Out Button -->
                        <button
                            class="flex flex-col items-center justify-center gap-1 text-light-text dark:text-dark-text hover:text-light-accent dark:hover:text-dark-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 2048 2048">
                                <path fill="currentColor"
                                    d="M1088 1024H960V0h128zm212-724q138 44 252 128t196 197t127 248t45 279q0 124-32 238t-90 214t-140 181t-181 140t-214 91t-239 32t-238-32t-214-90t-181-140t-140-181t-91-214t-32-239q0-144 45-279t126-248t196-197t253-128l40 121q-119 39-217 111T403 700T295 911t-39 241q0 106 27 204t78 183t120 156t155 120t184 77t204 28t204-27t183-78t156-120t120-155t77-184t28-204q0-125-38-240t-109-212t-168-168t-217-111z" />
                            </svg>
                            <p class="text-sm text-center">Log Out</p>
                        </button>

                    </div>
            </section>
            <!-- DO NOT REMOVE THIS CHART SECTION I DO NOT KNOW WHY IT WORKS BUT IT DOES -->
            <section class="hidden">
                <?php include 'components/chart.php'; ?>
            </section>


            <section>
                <div flex items-center items-center justify-between>
                    <h1 class="text-4xl text-center font-bold"> Search Policy Holders </h1>
                    <div class="flex justify-center items-center">
                        <input type="text"
                            class="w-9/12 h-14 mt-20 px-10 py-4 border dark:placeholder-dark-cardText dark:bg-dark-cardBg dark:border-dark-cardStroke bg-light-sidebar shadow-xl  border-gray-300 rounded-tl-lg rounded-bl-lg rounded-tr-none rounded-br-none"
                            placeholder="Search by Policy Holder Name, ID, or Email">
                        <button
                            class="w-fit-content h-14 mt-20 px-10 py-4 border  dark:bg-dark-cardBg dark:border-dark-cardStroke bg-light-sidebar shadow-xl  border-gray-300 rounded-tr-lg rounded-br-lg rounded-tl-none rounded-bl-none r">Search</button>
                    </div>
            </section>
            <section>
                <?php include 'components/full_cust_table.php'; ?>
            </section>



        </main>
    </div>

    <script src=" ./src/script.js">
    </script>


</body>

</html>