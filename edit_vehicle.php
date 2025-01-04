<?php

$currentPage = ["Vehicle", "Add New Vehicle"]; // Replace with a dynamic value based on the URL or user action.
include 'components/menu_data.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle | SafeDrive Vehicle Insurance System</title>
    <link href="./src/output.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/2.0.0/modern-normalize.min.css">

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
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 1024 1024"
                    class="dark:fill-dark-accent fill-light-accent dark:text-dark-accent text-light-accent ">
                    <path fill="currentcolor"
                        d="M959 413.4L935.3 372a8 8 0 0 0-10.9-2.9l-50.7 29.6l-78.3-216.2a63.9 63.9 0 0 0-60.9-44.4H301.2c-34.7 0-65.5 22.4-76.2 55.5l-74.6 205.2l-50.8-29.6a8 8 0 0 0-10.9 2.9L65 413.4c-2.2 3.8-.9 8.6 2.9 10.8l60.4 35.2l-14.5 40c-1.2 3.2-1.8 6.6-1.8 10v348.2c0 15.7 11.8 28.4 26.3 28.4h67.6c12.3 0 23-9.3 25.6-22.3l7.7-37.7h545.6l7.7 37.7c2.7 13 13.3 22.3 25.6 22.3h67.6c14.5 0 26.3-12.7 26.3-28.4V509.4c0-3.4-.6-6.8-1.8-10l-14.5-40l60.3-35.2a8 8 0 0 0 3-10.8M264 621c-22.1 0-40-17.9-40-40s17.9-40 40-40s40 17.9 40 40s-17.9 40-40 40m388 75c0 4.4-3.6 8-8 8H380c-4.4 0-8-3.6-8-8v-84c0-4.4 3.6-8 8-8h40c4.4 0 8 3.6 8 8v36h168v-36c0-4.4 3.6-8 8-8h40c4.4 0 8 3.6 8 8zm108-75c-22.1 0-40-17.9-40-40s17.9-40 40-40s40 17.9 40 40s-17.9 40-40 40M220 418l72.7-199.9l.5-1.3l.4-1.3c1.1-3.3 4.1-5.5 7.6-5.5h427.6l75.4 208z" />
                </svg>
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
                        <h1 class="md:text-4xl text-3xl font-bold mb-3">Edit Vehicle </h1>
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



            <section>
                <div flex items-center items-center justify-between>
                    <h1 class="text-4xl text-center font-bold"> Search Policies, Policy Holder, Reg Number </h1>
                    <div class="flex justify-center items-center">
                        <input type="text"
                            class="w-9/12 h-14 mt-10 px-10 py-4 border dark:placeholder-dark-cardText dark:bg-dark-cardBg dark:border-dark-cardStroke bg-light-sidebar shadow-xl  border-gray-300 rounded-tl-lg rounded-bl-lg rounded-tr-none rounded-br-none"
                            placeholder="Search by Policy Holder Name, ID, or Email">
                        <button
                            class="w-fit-content h-14 mt-10 px-10 py-4 border  dark:bg-dark-cardBg dark:border-dark-cardStroke bg-light-sidebar shadow-xl  border-gray-300 rounded-tr-lg rounded-br-lg rounded-tl-none rounded-bl-none r">Search</button>
                    </div>
            </section>
            <section>
                <div class=" dark:bg-dark-background dark:text-dark-text bg-light-background text-light-text">
                    <div class="max-w-4xl mx-auto p-6">

                        <!-- Tabs -->
                        <div class="mb-6">
                            <div class="grid grid-cols-3 gap-4 mb-6">
                                <button
                                    class="tab-btn active bg-light-sidebar border-light-border dark:bg-dark-cardBg border dark:border-dark-cardStroke text-dark-cardText p-3 rounded-lg hover:bg-dark-accent transition-all duration-200 data-[state=active]:bg-dark-accent data-[state=active]:text-white"
                                    data-tab="policy">Policy Details</button>
                                <button
                                    class=" tab-btn bg-light-sidebar border-light-border dark:bg-dark-cardBg border dark:border-dark-cardStroke text-dark-cardText p-3 rounded-lg hover:bg-dark-accent transition-all duration-200 data-[state=active]:bg-dark-accent data-[state=active]:text-white"
                                    data-tab="coverage">Coverage</button>
                                <button
                                    class=" tab-btn bg-light-sidebar border-light-border dark:bg-dark-cardBg border dark:border-dark-cardStroke text-dark-cardText p-3 rounded-lg hover:bg-dark-accent transition-all duration-200 data-[state=active]:bg-dark-accent data-[state=active]:text-white"
                                    data-tab="vehicle">Vehicle Information</button>
                            </div>

                            <!-- Policy Details -->
                            <div id="policy"
                                class="tab-content dark:bg-dark-cardBg border dark:border-dark-cardStroke bg-light-sidebar shadow-xl rounded-lg p-6">
                                <div class="flex justify-between items-center mb-6">
                                    <div>
                                        <h2 class="text-xl font-bold">Policy Information</h2>
                                        <p class="text-dark-textMuted">View your current policy details</p>
                                    </div>
                                    <span
                                        class=" dark:bg- text-dark-cardText px-3 py-1 rounded-full text-sm">Active</span>
                                </div>

                                <div class="grid md:grid-cols-2 gap-8">
                                    <div class="space-y-6">
                                        <div>
                                            <label class="block text-dark-textMuted text-sm mb-1">Policy ID</label>
                                            <p class="text-dark-cardText">POL-2025-001</p>
                                        </div>
                                        <div>
                                            <label class="block text-dark-textMuted text-sm mb-1">Policy
                                                Type</label>
                                            <p class="text-dark-cardText">Comprehensive Auto Insurance</p>
                                        </div>
                                        <div>
                                            <label class="block text-dark-textMuted text-sm mb-1">Premium
                                                Amount</label>
                                            <p class="text-dark-accent font-medium">$1,200/year</p>
                                        </div>
                                    </div>

                                    <div class="space-y-6">
                                        <div>
                                            <label class="block text-dark-textMuted text-sm mb-1">Policy
                                                Start Date</label>
                                            <p class="text-dark-cardText">2025-01-03 </p>
                                        </div>
                                        <div>
                                            <label class="block text-dark-textMuted text-sm mb-1">Policy
                                                End Date</label>
                                            <p class="text-dark-cardText">2026-01-02</p>
                                        </div>
                                        <div>
                                            <label class="block text-dark-textMuted text-sm mb-1">Purpose</label>
                                            <p class="text-dark-cardText">Accidents and Personal Injury</p>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Coverage -->
                            <div id="coverage"
                                class="tab-content hidden dark:bg-dark-cardBg border dark:border-dark-cardStroke bg-light-sidebar shadow-xl rounded-lg p-6">
                                <div class="flex justify-between items-center mb-6">
                                    <div>
                                        <h2 class="text-xl font-bold">Coverage Details</h2>
                                        <p class="text-dark-textMuted">Manage your insurance coverage options</p>
                                    </div>
                                    <span class="bg-dark-tableBlue text-dark-cardText px-3 py-1 rounded-full text-sm">6
                                        Options</span>
                                </div>

                                <div class="space-y-4">
                                    <div class="bg-dark-tableBlue rounded-lg p-4">
                                        <div class="flex items-start gap-4">
                                            <input type="checkbox" checked
                                                class="mt-1 rounded border-dark-cardStroke bg-dark-background">
                                            <div class="flex-1">
                                                <div class="flex justify-between items-center mb-1">
                                                    <label class="text-dark-cardText font-medium">Liability
                                                        Coverage</label>
                                                    <span
                                                        class="bg-dark-cardBg text-dark-cardText px-2 py-1 rounded text-sm">$300,000</span>
                                                </div>
                                                <p class="text-dark-textMuted text-sm">Covers damage or injury to
                                                    others</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- More coverage items -->
                                </div>
                            </div>

                            <!-- Vehicle Form -->
                            <div id="vehicle"
                                class="tab-content hidden dark:bg-dark-cardBg border dark:border-dark-cardStroke bg-light-sidebar shadow-xl rounded-lg p-6">

                                <div class="flex justify-between items-center mb-6">
                                    <div>
                                        <h2 class="text-xl font-bold">Policy Holder Information</h2>
                                        <p class="text-dark-textMuted">View your current policy details</p>
                                    </div>
                                    <span
                                        class=" dark:bg- text-dark-cardText px-3 py-1 rounded-full text-sm">Active</span>
                                </div>

                                <div class="grid md:grid-cols-2 gap-8">
                                    <div class="space-y-6">
                                        <div>
                                            <label class="block text-dark-textMuted text-sm mb-1">Policy Holder
                                                ID</label>
                                            <p class="text-dark-cardText">PH001</p>
                                        </div>

                                        <div>
                                            <label class="block text-dark-textMuted text-sm mb-1">Emails</label>
                                            <p class="text-dark-accent font-medium">JohnDoe@gmail.com</p>
                                        </div>
                                        <div>
                                            <label class="block text-dark-textMuted text-sm mb-1">Date of Birth</label>
                                            <p class="text-dark-cardText">1992-10-01</p>
                                        </div>
                                    </div>

                                    <div class="space-y-6">
                                        <div>
                                            <label class="block text-dark-textMuted text-sm mb-1">Policy Holder
                                                name</label>
                                            <p class="text-dark-cardText">John Doe</p>
                                        </div>
                                        <div>
                                            <label class="block text-dark-textMuted text-sm mb-1">Driving
                                                License</label>
                                            <p class="text-dark-cardText">DL-123456789</p>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const tabs = document.querySelectorAll('.tab-btn');
                        const contents = document.querySelectorAll('.tab-content');

                        tabs.forEach(tab => {
                            tab.addEventListener('click', () => {
                                tabs.forEach(t => {
                                    t.classList.remove('active');
                                    t.setAttribute('data-state', '');
                                });
                                contents.forEach(c => c.classList.add('hidden'));
                                tab.classList.add('active');
                                tab.setAttribute('data-state', 'active');
                                document.getElementById(tab.dataset.tab).classList.remove(
                                    'hidden');
                            });
                        });
                    });
                    </script>
                </div>
            </section>
            <section class="mt-10 justify-center items-center">
                <div class="container mx-auto px-4 py-8 max-w-6xl">
                    <form class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Policy Holder ID -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">Policy

                                    ID</label>
                                <input type="text" placeholder="#10012" readonly
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border" />
                            </div>

                            <!-- Policy Holder Name -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">Policy
                                    Holder
                                    ID </label>
                                <input type="text" placeholder="PH0001" readonly
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border" />
                            </div>

                            <!-- Policy Holder Name -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">Policy
                                    Holder
                                    Name</label>
                                <input type="text" placeholder="John Doe" readonly
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border" />
                            </div>


                            <!--Reg Number-->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">
                                    Vehicle Registration Number</label>
                                <input type="text" placeholder="Enter Vehicle Registration Number"
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border" />

                            </div>

                            <!-- Policy Type -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">Vehicle Type
                                </label>
                                <select id="VehicleType"
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border">

                                    <option value="Car">Car</option>
                                    <option value="Motorcycle">Motorcycle</option>
                                    <option value="Truck">Truck</option>
                                    <option value="Bus">Bus</option>
                                    <option value="Van">Van</option>
                                    <option value="SUV">SUV</option>

                                </select>
                            </div>



                            <!--Description-->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">
                                    Other Description</label>
                                <input type="text" placeholder="Enter Description"
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border" />

                            </div>

                            <!--Brnad Number-->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">
                                    Brand</label>
                                <input type="text" placeholder="Enter Vehicle Brand"
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border" />

                            </div>


                            <!--Reg Number-->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">
                                    Model</label>
                                <input type="text" placeholder="Enter Vehicle Model"
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border" />

                            </div>




                            <!--Reg Number-->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">
                                    Vehicle Value</label>
                                <input type="text" placeholder="Enter Vehicle Value"
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border" />

                            </div>


                            <!--Reg Number-->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">
                                    Engine Capacity</label>
                                <input type="text" placeholder="Enter Vehicle Engine Capacity"
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border" />

                            </div>



                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit" class="px-6 py-2 dark:bg-dark-accent dark:text-dark-text rounded-lg hover:bg-dark-accent dark:hover:bg-dark-accent  bg-light-accent text-white 
                           transition-colors duration-200 focus:outline-none focus:ring-2 
                           focus:ring-light-accent focus:ring-offset-2 dark:focus:ring-offset-dark-accent">
                                    Add Policy
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </main>


        <script src="./src/script.js"></script>

</body>

</html>