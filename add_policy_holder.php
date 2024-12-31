<?php

$currentPage = ["Policy Holders", "Add New Policy Holder"]; // Replace with a dynamic value based on the URL or user action.
include 'components/menu_data.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Policy Holders | SafeDrive Vehicle Insurance System</title>
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
                        <h1 class="md:text-4xl text-3xl font-bold mb-3">Add Policy Holders</h1>
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
                </div>
            </section>
            <!-- DO NOT REMOVE THIS CHART SECTION I DO NOT KNOW WHY IT WORKS BUT IT DOES -->
            <section class="hidden">
                <?php include 'components/chart.php'; ?>
            </section>

            <section class="py-6 my-6">
                <div class="mx-6">
                    <h1 class="text-2xl mb-9">Policy Holder Personal Information</h1>
                    <hr>
                </div>
                <div class="mt-20 mx-6 flex justify-center">
                    <div class="">

                        <form class="flex flex-wrap gap-9 items-end text-2xl">
                            <div class="flex flex-wrap grow shrink gap-5 items-start w-[928px] max-md:max-w-full">
                                <div
                                    class="flex flex-wrap gap-5 items-start font-bold  dark:text-dark-cardText text-light-text min-w-[240px] max-md:max-w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height=30" viewBox="0 0 24 24"
                                        class="dark:fill-dark-cardText fill-light-text">
                                        <circle cx="12" cy="6" r="4" fill="dark:fill-dark-cardText fill-light-text" />
                                        <path fill="dark:fill-dark-cardText fill-light-text"
                                            d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5" />
                                    </svg>
                                    <label for="FullName" class="w-[481px] max-md:max-w-full">Full Name</label>
                                </div>
                                <input type="email" id="contactDetails" value=""
                                    class="grow shrink gap-3 dark:border-dark-cardStroke border-light-border dark:bg-dark-cardBg bg-light-sidebar dark:text-dark-text text-light-text self-stretch px-3.5 py-5 whitespace-nowrap rounded-lg border min-h-[67px] w-[917px] max-md:max-w-full"
                                    aria-label="Contact Details" />
                            </div>
                            <form class="flex flex-col gap-9 text-2xl w-full">
                                <!-- Main form content wrapper -->
                                <div class="flex flex-wrap gap-9 items-end">
                                    <div
                                        class="flex flex-wrap grow shrink gap-5 items-start w-[928px] max-md:max-w-full">
                                        <div
                                            class="flex flex-wrap gap-5 items-start font-bold dark:text-dark-cardText text-light-text min-w-[240px] max-md:max-w-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                class="dark:fill-dark-cardText fill-light-text" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="m20 8l-8 5l-8-5V6l8 5l8-5m0-2H4c-1.11 0-2 .89-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2" />
                                            </svg>
                                            <label for="contactDetails" class="w-[481px] max-md:max-w-full">Contact
                                                Details</label>
                                        </div>
                                        <input type="email" id="contactDetails" value=""
                                            class="grow shrink gap-3 dark:border-dark-cardStroke border-light-border dark:bg-dark-cardBg bg-light-sidebar dark:text-dark-text text-light-text self-stretch px-3.5 py-5 whitespace-nowrap rounded-lg border min-h-[67px] w-[917px] max-md:max-w-full"
                                            aria-label="Contact Details" />
                                    </div>

                                    <div class="flex flex-wrap gap-8 w-full">
                                        <div
                                            class="flex flex-col grow shrink min-w-[240px] w-[387px] max-md:max-w-full">
                                            <div
                                                class="flex flex-wrap gap-5 items-center w-full font-bold dark:text-dark-cardText text-light-text max-md:max-w-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    viewBox="0 0 24 24" class="dark:fill-dark-cardText fill-light-text">
                                                    <g fill="currentcolor">
                                                        <path
                                                            d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                        <path fill="currentColor"
                                                            d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7zm-5-9a1 1 0 0 1 1 1v1h2a2 2 0 0 1 2 2v3H3V7a2 2 0 0 1 2-2h2V4a1 1 0 0 1 2 0v1h6V4a1 1 0 0 1 1-1" />
                                                    </g>
                                                </svg>
                                                <label for="dateOfBirth" class="self-stretch my-auto w-[379px]">Date Of
                                                    Birth</label>
                                            </div>
                                            <div
                                                class="flex flex-col justify-center mt-5 w-full whitespace-nowrap rounded-lg border max-md:max-w-full border dark:text-dark-text text-light-text dark:bg-dark-cardBg bg-light-sidebar dark:border-dark-cardStroke border-light-border">
                                                <div
                                                    class="flex gap-10 justify-between items-center w-full max-md:max-w-full">
                                                    <input type="date" id="dateOfBirth" value="1992-02-19"
                                                        class="self-stretch my-auto bg-transparent md:w-[600px] px-3.5 py-5"
                                                        aria-label="Date Of Birth" />
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="flex flex-col grow shrink min-w-[240px] w-[387px] max-md:max-w-full">
                                            <div
                                                class="flex flex-wrap gap-5 items-center w-full font-bold dark:text-dark-cardText text-light-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                                    viewBox="0 0 15 15" class="dark:text-dark-cardText text-light-text">
                                                    <path fill="currentColor" fill-rule="evenodd"
                                                        d="M0 3.5A1.5 1.5 0 0 1 1.5 2h12A1.5 1.5 0 0 1 15 3.5v8a1.5 1.5 0 0 1-1.5 1.5h-12A1.5 1.5 0 0 1 0 11.5zM3 6a2 2 0 1 1 4 0a2 2 0 0 1-4 0m9 0H9V5h3zm0 3H9V8h3zM5 9a2.93 2.93 0 0 0-2.618 1.618l-.33.658A.5.5 0 0 0 2.5 12h5a.5.5 0 0 0 .447-.724l-.329-.658A2.93 2.93 0 0 0 5 9"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <label for="licenseNumber"
                                                    class="self-stretch my-auto w-[379px]">Driving License No.</label>
                                            </div>
                                            <input type="text" id="licenseNumber" value="010203145678"
                                                class="flex flex-col justify-center px-3.5 py-5 mt-5 w-full whitespace-nowrap rounded-lg border dark:text-dark-text text-light-text dark:bg-dark-cardBg bg-light-sidebar dark:border-dark-cardStroke border-light-border max-md:max-w-full"
                                                aria-label="Driving License Number" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit button container -->
                                <div class="w-full flex justify-end mt-8">
                                    <button type="submit"
                                        class="dark:bg-dark-accent bg-light-accent text-light-text dark:text-dark-text text-2xl font-bold py-3 px-6 rounded-lg">
                                        Add Policy Holder
                                    </button>
                                </div>
                            </form>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src=" ./src/script.js">
    </script>


</body>

</html>