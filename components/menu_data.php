<?php
$menuData = [
    [
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19h3v-5q0-.425.288-.712T10 13h4q.425 0 .713.288T15 14v5h3v-9l-6-4.5L6 10zm-2 0v-9q0-.475.213-.9t.587-.7l6-4.5q.525-.4 1.2-.4t1.2.4l6 4.5q.375.275.588.7T20 10v9q0 .825-.588 1.413T18 21h-4q-.425 0-.712-.288T13 20v-5h-2v5q0 .425-.288.713T10 21H6q-.825 0-1.412-.587T4 19m8-6.75"/></svg>',
        "title" => "Dashboard",
        "subItems" => [
            ["title" => "Overview", "url" => "/index.php"],
            ["title" => "Reports", "url" => "/reports"],
            ["title" => "Export Data", "url" => "/export"],
        ],
    ],
    [
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7a4 4 0 1 0 8 0a4 4 0 1 0-8 0M3 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2m1-17.87a4 4 0 0 1 0 7.75M21 21v-2a4 4 0 0 0-3-3.85"/></svg>',
        "title" => "Policy Holders",
        "subItems" => [
            ["title" => "All Policy Holders", "url" => "/all_policy_holders.php"],
            ["title" => "Add New Policy Holder", "url" => "/add_policy_holder.php"],
        ],
    ],
    [
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor"><path d="M11.47 22c-3.992 0-5.989 0-7.23-1.172C3 19.657 3 17.771 3 14v-4c0-3.771 0-5.657 1.24-6.828C5.481 2 7.478 2 11.47 2h1.06c3.993 0 5.989 0 7.23 1.172C21 4.343 21 6.229 21 10m-9.5 12H13M8 7h8m-8 5h5"/><path d="m17.5 18.59l-.902 3.153a.2.2 0 0 0 .268.235l1.985-.793a.4.4 0 0 1 .298 0l2.004.8a.2.2 0 0 0 .27-.226l-.764-3.268M22 15.995A3 3 0 0 0 19 13c-1.657 0-3 1.341-3 2.995a2.997 2.997 0 0 0 3 2.995c1.657 0 3-1.34 3-2.995"/></g></svg>',
        "title" => "Policies",
        "subItems" => [
            ["title" => "All Policies", "url" => "/all_policies.php"],
            ["title" => "Add New Policy", "url" => "/add_policy.php"],
        ],
    ],
    [
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 2048 2048""><path fill="currentColor" d="M384 1152q27 0 50 10t40 27t28 41t10 50q0 27-10 50t-27 40t-41 28t-50 10q-27 0-50-10t-40-27t-28-41t-10-50q0-27 10-50t27-40t41-28t50-10m1280 0q27 0 50 10t40 27t28 41t10 50q0 27-10 50t-27 40t-41 28t-50 10q-27 0-50-10t-40-27t-28-41t-10-50q0-27 10-50t27-40t41-28t50-10m347-256l-66 65q2 5 10 30t19 59t25 73t24 71t18 54t7 22v650q0 27-10 50t-27 40t-41 28t-50 10h-128q-27 0-50-10t-40-27t-28-41t-10-50H384q0 27-10 50t-27 40t-41 28t-50 10H128q-27 0-50-10t-40-27t-28-41t-10-50v-650l7-21l18-54l24-72q13-39 24-73t20-59t10-30l-66-65H0V768h91l57 58l74-223q16-49 46-89t71-69t87-45t100-16h996q52 0 99 16t88 44t70 69t47 90l74 223l57-58h91v128zM526 512q-63 0-112 36t-70 95l-85 253h1530l-85-253q-20-59-69-95t-113-36zm882 1231l-104-207H744l-104 207v49h768zm512 49v-502l-6-18q-6-18-15-47t-21-61t-21-63t-17-51t-9-26H217q-2 5-9 26t-17 50t-21 63t-20 62t-16 46t-6 19v502h384v-79l152-305h720l152 305v79z"/></svg>',
        "title" => "Vehicle",
        "subItems" => [
            ["title" => "All Vehicles", "url" => "/all_vehicles.php"],
            ["title" => "Add New Vehicle", "url" => "/add_vehicle"],
        ],
    ],
    [
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
  <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" />
    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" />
  </g>
  </svg>',
        "title" => "Linked Tables",
        "subItems" => [
            ["title" => "Policy – Policy Holder", "url" => "/policy_policy-holder"],
            ["title" => "Policy Holder – Vehicle", "url" => "/policy-holder_vehicle"],
            ["title" => "All-in-One Table", "url" => "/all-in-one_table"],
        ],
    ],
    [
        "icon" => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="currentColor"><path d="M12 4a1 1 0 0 0-1 1c0 1.692-2.046 2.54-3.243 1.343a1 1 0 1 0-1.414 1.414C7.54 8.954 6.693 11 5 11a1 1 0 1 0 0 2c1.692 0 2.54 2.046 1.343 3.243a1 1 0 0 0 1.414 1.414C8.954 16.46 11 17.307 11 19a1 1 0 1 0 2 0c0-1.692 2.046-2.54 3.243-1.343a1 1 0 1 0 1.414-1.414C16.46 15.046 17.307 13 19 13a1 1 0 1 0 0-2c-1.692 0-2.54-2.046-1.343-3.243a1 1 0 0 0-1.414-1.414C15.046 7.54 13 6.693 13 5a1 1 0 0 0-1-1m-2.992.777a3 3 0 0 1 5.984 0a3 3 0 0 1 4.23 4.231a3 3 0 0 1 .001 5.984a3 3 0 0 1-4.231 4.23a3 3 0 0 1-5.984 0a3 3 0 0 1-4.231-4.23a3 3 0 0 1 0-5.984a3 3 0 0 1 4.231-4.231"/><path d="M12 10a2 2 0 1 0 0 4a2 2 0 0 0 0-4m-2.828-.828a4 4 0 1 1 5.656 5.656a4 4 0 0 1-5.656-5.656"/></g></svg>',
        "title" => "Settings",
        "subItems" => [
            ["title" => "Data Tables", "url" => "/data_tables"],
            ["title" => "Edit Profile", "url" => "/edit_profile"],
            ["title" => "System Logs", "url" => "/system_logs"],
        ],
    ],
];