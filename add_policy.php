<?php

$currentPage = ["Policies", "Add New Policy"]; // Replace with a dynamic value based on the URL or user action.
include 'components/menu_data.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Policy Holders | SafeDrive Vehicle Insurance System</title>
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
                        <h1 class="md:text-4xl text-3xl font-bold mb-3">Add Policy </h1>
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
                    <h1 class="text-4xl text-center font-bold"> Search Policies </h1>
                    <div class="flex justify-center items-center">
                        <input type="text"
                            class="w-9/12 h-14 mt-10 px-10 py-4 border dark:placeholder-dark-cardText dark:bg-dark-cardBg dark:border-dark-cardStroke bg-light-sidebar shadow-xl  border-gray-300 rounded-tl-lg rounded-bl-lg rounded-tr-none rounded-br-none"
                            placeholder="Search by Policy Holder Name, ID, or Email">
                        <button
                            class="w-fit-content h-14 mt-10 px-10 py-4 border  dark:bg-dark-cardBg dark:border-dark-cardStroke bg-light-sidebar shadow-xl  border-gray-300 rounded-tr-lg rounded-br-lg rounded-tl-none rounded-bl-none r">Search</button>
                    </div>
            </section>
            <section
                class="dark:bg-dark-cardBg border p-6 dark:border-dark-cardStroke bg-light-sidebar shadow-xl rounded-lg mx-auto mt-10  w-8/12 justify-center items-center">
                <div class="grid grid-cols-2">
                    <!-- Policy Holder ID -->
                    <div class="p-4">
                        <p class="block text-lg font-bold mb-2">Policy Holder ID</p>
                        <p class="block text-lg">#10922</p>
                    </div>

                    <!-- Policy Holder Name -->
                    <div class="p-4">

                        <p class="block text-lg font-bold mb-2">Policy Holder Name</p>
                        <p class="block text-lg">John Doe</p>
                    </div>

                    <!-- Policy Holder Date Of Birth -->
                    <div class="p-4">
                        <p class="block text-lg font-bold mb-2">Date Of Birth</p>
                        <p class="block text-lg">1991-01-01</p>
                    </div>

                    <!-- Policy Holder Email -->
                    <div class="p-4">
                        <p class="block text-lg font-bold mb-2">Email</p>
                        <p class="block text-lg"> johndoe@gmail.com</p>
                    </div>

                    <!-- Policy Holder Email -->
                    <div class="p-4">
                        <p class="block text-lg font-bold mb-2">Driving License No</p>
                        <p class="block text-lg">123412312312</p>
                    </div>
                </div>
            </section>
            <section class="mt-10 justify-center items-center">
                <div class="container mx-auto px-4 py-8 max-w-6xl">
                    <form class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Policy Holder ID -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">Policy Holder
                                    ID</label>
                                <input type="text" placeholder="#10012" readonly
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border" />
                            </div>

                            <!-- Policy Holder Name -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">Policy Holder
                                    Name</label>
                                <input type="text" placeholder="John Doe" readonly
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border" />
                            </div>

                            <!-- Policy Type -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">Policy
                                    Type</label>
                                <select id="policyType"
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border">
                                    <option value="">Select type</option>
                                    <option value="comprehensive">Comprehensive</option>
                                    <option value="thirdParty">Third Party</option>
                                    <option value="liability">Liability Only</option>
                                </select>
                            </div>

                            <!-- Coverage Dropdown -->
                            <div class="space-y-2">
                                <label
                                    class="block text-sm font-bold text-light-text dark:text-dark-text">Coverage</label>
                                <div class="relative" id="coverageDropdown">
                                    <!-- Dropdown Button -->
                                    <button type="button" id="dropdownButton"
                                        class="w-full flex items-center justify-between px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border">
                                        <span>Select Coverage</span>
                                        <svg class="w-4 h-4 transform transition-transform duration-200"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <!-- Dropdown Menu -->
                                    <div id="dropdownMenu"
                                        class="hidden absolute z-10 w-full mt-1 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border">
                                        <div class="max-h-60 overflow-auto py-1" id="optionsList">
                                            <!-- Options will be populated by JavaScript -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Start Date -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">Start
                                    Date</label>
                                <input type="date"
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border" />
                            </div>

                            <!-- End Date -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">End
                                    Date</label>
                                <input type="date"
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border" />
                            </div>

                            <!-- Purpose -->
                            <div class="space-y-2">
                                <label
                                    class="block text-sm font-bold text-light-text dark:text-dark-text">Purpose</label>
                                <textarea placeholder="Enter Purpose" rows="3"
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border"></textarea>
                            </div>

                            <!-- Premium Amount -->
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-light-text dark:text-dark-text">Premium
                                    Amount</label>
                                <input type="number" placeholder="Enter premium amount"
                                    class="w-full px-4 py-2 rounded-lg dark:bg-dark-cardBg dark:text-dark-text border dark:border-dark-cardStroke bg-light-sidebar text-light-text border-light-border" />
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="px-6 py-2 dark:bg-dark-accent dark:text-dark-text rounded-lg hover:bg-dark-accent dark:hover:bg-dark-accent  bg-light-accent text-white 
                           transition-colors duration-200 focus:outline-none focus:ring-2 
                           focus:ring-light-accent focus:ring-offset-2 dark:focus:ring-offset-dark-accent">
                                Add Policy
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <script>
            const coverageOptions = {
                comprehensive: [
                    'All Accident Damage',
                    'Natural Disaster Damage',
                    'Theft Protection',
                    'Third Party Liability',
                    'Personal Accident Cover'
                ],
                thirdParty: [
                    'Third Party Property Damage',
                    'Third Party Injury/Death',
                    'Basic Fire and Theft'
                ],
                liability: [
                    'Third Party Property Damage',
                    'Third Party Injury/Death'
                ]
            };

            const dropdown = document.getElementById('coverageDropdown');
            const dropdownButton = document.getElementById('dropdownButton');
            const dropdownMenu = document.getElementById('dropdownMenu');
            const optionsList = document.getElementById('optionsList');
            const buttonText = dropdownButton.querySelector('span');
            const arrow = dropdownButton.querySelector('svg');
            let selectedItems = new Set();

            // Toggle dropdown
            dropdownButton.addEventListener('click', (e) => {
                e.preventDefault();
                const isHidden = dropdownMenu.classList.contains('hidden');
                dropdownMenu.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180', isHidden);
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!dropdown.contains(e.target)) {
                    dropdownMenu.classList.add('hidden');
                    arrow.classList.remove('rotate-180');
                }
            });

            // Update options when policy type changes
            document.getElementById('policyType').addEventListener('change', function(e) {
                const policyType = e.target.value;
                selectedItems.clear();
                updateButtonText();

                if (!policyType) {
                    optionsList.innerHTML = '';
                    return;
                }

                optionsList.innerHTML = coverageOptions[policyType].map((option, index) => `
                <label class="flex items-center px-4 py-2  dark:hover:bg-dark-sidebarStroke dark:hover:text-light-text cursor-pointer">
                    <input type="checkbox" value="${option}"
                        class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out rounded border-gray-300 dark:border-gray-600" />
                    <span class="ml-2">${option}</span>
                </label>
            `).join('');

                // Add change event listeners to new checkboxes
                optionsList.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                    checkbox.addEventListener('change', () => {
                        if (checkbox.checked) {
                            selectedItems.add(checkbox.value);
                        } else {
                            selectedItems.delete(checkbox.value);
                        }
                        updateButtonText();
                    });
                });
            });

            function updateButtonText() {
                const count = selectedItems.size;
                buttonText.textContent = count === 0 ?
                    'Select Coverage' :
                    `${count} coverage${count > 1 ? 's' : ''} selected`;
            }

            // Handle form submission
            document.querySelector('form').addEventListener('submit', function(e) {
                e.preventDefault();
                console.log('Selected coverages:', Array.from(selectedItems));
            });
        </script>
        <script src="./src/script.js"></script>


</body>

</html>