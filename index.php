<?php

$currentPage = ["Dashboard", "Overview"]; // Replace with a dynamic value based on the URL or user action.
include 'components/menu_data.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | SafeDrive Vehicle Insurance System</title>
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
                        <h1 class="md:text-4xl text-3xl font-bold mb-3">Welcome Admin!</h1>
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
            <section class="cards text-left">
                <div class="grid grid-cols-1  md:grid-cols-4 gap-6 my-6">
                    <!-- Card 1 -->
                    <div <div
                        class="bg-light-cardBg dark:bg-dark-cardBg border text-light-cardText dark:border-dark-cardStroke rounded-lg p-6 shadow-md flex flex-col justify-between">
                        <div class="flex justify-between items-center mb-4">
                            <span
                                class="flex items-center justify-center mr-6 font-semibold text-light-cardText text-sm dark:text-dark-cardText">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    class="mr-2">
                                    <path
                                        class="dark:fill-dark-cardText   mr-6 justify-center items-center fill-light-cardText"
                                        fill="currentColor" fill-rule="evenodd"
                                        d="M3.6 2.25A1.35 1.35 0 0 0 2.25 3.6v16.8c0 .746.604 1.35 1.35 1.35h16.8a1.35 1.35 0 0 0 1.35-1.35V3.6a1.35 1.35 0 0 0-1.35-1.35zM16.75 8a.75.75 0 0 0-1.5 0v8a.75.75 0 0 0 1.5 0zM12 10.25a.75.75 0 0 1 .75.75v5a.75.75 0 0 1-1.5 0v-5a.75.75 0 0 1 .75-.75M8.75 13a.75.75 0 0 0-1.5 0v3a.75.75 0 0 0 1.5 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Total Premium
                                Value</span>
                            <button class="text-dark-text dark:text-dark-text hover:text-dark-accent">
                                ...
                            </button>
                        </div>
                        <div class="flex">
                            <div class="text-3xl mr-6 font-bold text-light-cardText dark:text-dark-text">1,324,842</div>
                            <div
                                class="flex  items-center text-center bg-[#05C168] bg-opacity-20 py-1 mx-auto border-[#05C168] rounded-md  px-2  text-green-500 mt-2">
                                <span class="text-sm font-semibold">12%</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    viewBox="0 0 16 16">
                                    <path d="M8 12l-4-4h8l-4 4z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class=" dark:bg-dark-cardBg border text-light-cardText bg-light-cardBg fill-light-cardText dark:border-dark-cardStroke rounded-lg p-6 shadow-md flex flex-col justify-between">
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    class="mr-0">
                                    <path class="dark:fill-dark-cardText  fill-light-cardText " fill="currentColor"
                                        fill-rule="evenodd"
                                        d="M8 4a4 4 0 1 0 0 8a4 4 0 0 0 0-8m-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4zm7.25-2.095c.478-.86.75-1.85.75-2.905a6 6 0 0 0-.75-2.906a4 4 0 1 1 0 5.811M15.466 20c.34-.588.535-1.271.535-2v-1a5.98 5.98 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="  dark:text-dark-cardText  font-semibold">
                                    Total Policy
                                    Holder</span>
                            </div>
                            <button class=" dark:text-dark-text hover:text-dark-accent">
                                ...
                            </button>
                        </div>
                        <div class="text-3xl font-bold dark:text-dark-text">134,231</div>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="bg-light-cardBg text-light-cardText dark:bg-dark-cardBg border  dark:border-dark-cardStroke rounded-lg p-6 shadow-md flex flex-col justify-between">
                        <div class="flex justify-between items-center mb-4">
                            <span class=" dark:text-dark-cardText   text-light-cardText font-semibold">📄
                                Active
                                Policies</span>
                            <button class=" dark:text-dark-text hover:text-dark-accent">
                                ...
                            </button>
                        </div>
                        <div class="text-3xl font-bold  dark:text-dark-text">23,648</div>
                    </div>

                    <!-- Card 4 -->
                    <div
                        class="bg-light-cardBg text-light-cardText dark:bg-dark-cardBg border dark:border-dark-cardStroke rounded-lg p-6 shadow-md flex flex-col justify-between">
                        <div class="flex justify-between items-center mb-4">
                            <span class=" dark:text-dark-cardText  text-light-cardText font-semibold">🚗
                                Registered
                                Vehicles</span>
                            <button class=" dark:text-dark-text hover:text-dark-accent">
                                ...
                            </button>
                        </div>
                        <div class="text-3xl font-bold  dark:text-dark-text">8,992</div>
                    </div>
                </div>

            </section>
            <section>
                <?php include 'components/chart.php'; ?>
            </section>
            <section>
                <div class="mt-7">
                    <h2 class="text-4xl font-bold  mb-6 text-light-text dark:text-dark-text">Quick Actions</h2>

                    <div class="grid w-225 gap-10 grid-cols-1 p-6 sm:grid-cols-2 lg:grid-cols-4">
                        <!-- Policy Holder -->
                        <div
                            class="bg-light-cardBg w-225 shadow-lg dark:bg-dark-cardBg hover:scale-105  hover:shadow-lg border border-light-border dark:border-dark-cardStroke  rounded-lg p-6 flex flex-col items-center hover:bg-light-accent/10 dark:hover:bg-dark-sidebarHoverBg transition-all duration-300 cursor-pointer">
                            <div class="p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="99" height="99" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-width="1.5">
                                        <circle cx="12" cy="6" r="4" />
                                        <path
                                            d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5Z" />
                                    </g>
                                </svg>
                            </div>
                            <h3 class="text-light-text dark:text-dark-text text-2xl text-center mt-2">Add New<br>Policy
                                Holder</h3>
                        </div>

                        <!-- Policy -->
                        <div
                            class="bg-light-cardBg w-225 shadow-lg dark:bg-dark-cardBg hover:scale-105  hover:shadow-lg border border-light-border dark:border-dark-cardStroke  rounded-lg p-6 flex flex-col items-center hover:bg-light-accent/10 dark:hover:bg-dark-sidebarHoverBg transition-all duration-300 cursor-pointer">
                            <div class="p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="99" height="99" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path
                                            d="M3 10c0-3.771 0-5.657 1.172-6.828S7.229 2 11 2h2c3.771 0 5.657 0 6.828 1.172S21 6.229 21 10v4c0 3.771 0 5.657-1.172 6.828S16.771 22 13 22h-2c-3.771 0-5.657 0-6.828-1.172S3 17.771 3 14z" />
                                        <path stroke-linecap="round" d="M8 10h8m-8 4h5" />
                                    </g>
                                </svg>
                            </div>
                            <h3 class="text-light-text text-2xl dark:text-dark-text text-center mt-2">Add
                                New<br>Policy</h3>
                        </div>

                        <!-- Vehicle -->
                        <div
                            class="bg-light-cardBg w-225 shadow-lg dark:bg-dark-cardBg hover:scale-105  hover:shadow-lg border border-light-border dark:border-dark-cardStroke rounded-lg p-6 flex flex-col items-center hover:bg-light-accent/10 dark:hover:bg-dark-sidebarHoverBg transition-all duration-300 cursor-pointer">
                            <div class="p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="99" height="99" viewBox="0 0 24 24">
                                    <g fill="none">
                                        <path
                                            d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                        <path fill="currentColor"
                                            d="M15.764 4a3 3 0 0 1 2.683 1.658l1.383 2.765c.244-.1.487-.201.723-.318a1 1 0 0 1 .894 1.79c-.494.246-.72.322-.72.322l.956 1.913c.209.417.317.876.317 1.342V16a3 3 0 0 1-1 2.236V19.5a1.5 1.5 0 0 1-3 0V19H6v.5a1.5 1.5 0 0 1-3 0v-1.264c-.614-.55-1-1.348-1-2.236v-2.528a3 3 0 0 1 .317-1.341l.956-1.914a14 14 0 0 1-.718-.321a1 1 0 0 1-.45-1.343a1.01 1.01 0 0 1 1.347-.445q.354.17.718.315l1.383-2.765A3 3 0 0 1 8.236 4Zm3.07 6.904C17.134 11.441 14.715 12 12 12s-5.134-.56-6.834-1.096l-1.06 2.12a1 1 0 0 0-.106.448V16a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-2.528a1 1 0 0 0-.106-.447l-1.06-2.12ZM7.5 13a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m9 0a1.5 1.5 0 1 1 0 3a1.5 1.5 0 0 1 0-3m-.736-7H8.236a1 1 0 0 0-.894.553L6.072 9.09C7.62 9.555 9.706 10 12 10s4.38-.445 5.927-.91l-1.269-2.537A1 1 0 0 0 15.764 6" />
                                    </g>
                                </svg>
                            </div>
                            <h3
                                class="text-light-text hover:dark:bg-dark-sidebarStroke dark:text-dark-text text-2xl text-center mt-2">
                                Add New<br>Vehicle
                            </h3>
                        </div>

                        <!-- Report -->
                        <div
                            class="bg-light-cardBg w-225 shadow-lg dark:bg-dark-cardBg hover:scale-105  hover:shadow-lg border border-light-border dark:border-dark-cardStroke rounded-lg p-6 flex flex-col items-center hover:bg-light-accent/10 dark:hover:bg-dark-sidebarHoverBg transition-all duration-300 cursor-pointer">
                            <div class="p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="99" height="99" viewBox="0 0 48 48">
                                    <g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4">
                                        <path
                                            d="M5 7a3 3 0 0 1 3-3h24a3 3 0 0 1 3 3v37H8a3 3 0 0 1-3-3zm30 17a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v17a3 3 0 0 1-3 3h-5z" />
                                        <path stroke-linecap="round" d="M11 12h8m-8 7h12" />
                                    </g>
                                </svg>
                            </div>
                            <h3 class="text-light-text w-225 dark:text-dark-text text-2xl text-center mt-2">
                                Generate<br>Report
                            </h3>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <?php include 'components/recent_cust_table.php'; ?>
            </section>



        </main>
    </div>

    <script src="./src/script.js"></script>


</body>

</html>