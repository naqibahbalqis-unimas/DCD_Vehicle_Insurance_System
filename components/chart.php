<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="text-white bg-light-background dark:bg-dark-background dark:text-gray-200">
    <div class="grid gap-6 bg-light-sidebar dark:bg-dark-background md:grid-cols-1 lg:grid-cols-3">
        <!-- Main Chart -->
        <div
            class="rounded-lg dark:bg-dark-cardBg border bg-light- dark:border-dark-cardStroke border-dark-cardStroke shadow-md p-4 md:col-span-2">
            <!-- Total Revenue Section -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-light-cardText dark:text-dark-text">
                    Total Revenue
                </h2>
                <span class="text-2xl font-bold text-light-accent dark:text-dark-accent">
                    $980,000
                </span>
            </div>
            <div class="dark:bg-dark-cardBg bg-light-sidebar" id="mainChart"></div>
        </div>

        <!-- Small Charts -->
        <div class="flex flex-col gap-6">
            <!-- Profits Chart -->
            <div
                class="rounded-lg dark:bg-dark-cardBg bg-light-sidebar border dark:border-dark-cardStroke border-dark-cardStroke shadow-md p-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-light-cardText dark:text-dark-text">
                        Total Profits
                    </h2>
                    <span class="text-2xl font-bold text-light-accent dark:text-dark-accent">
                        $980,000
                    </span>
                </div>
                <div id="profitsChart"></div>
            </div>

            <!-- Vehicles Chart -->
            <div
                class="rounded-lg dark:bg-dark-cardBg bg-light-sidebar border dark:border-dark-cardStroke border-dark-cardStroke shadow-md p-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-light-cardText dark:text-dark-text">
                        Total Vehicle Registered
                    </h2>
                    <span class="text-2xl font-bold text-light-accent dark:text-dark-accent">
                        $980,000
                    </span>
                </div>
                <div id="vehiclesChart"></div>
            </div>
        </div>
    </div>

    <script>
    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    function getChartTheme() {
        const isDark = document.documentElement.classList.contains("dark");
        const textColor = isDark ? "#FFFFFF" : "#111827";
        const bgColor = isDark ? "#0B1739" : "#FFFFFF";

        return {
            chart: {
                background: bgColor,
                foreColor: textColor,
            },
            grid: {
                borderColor: isDark ? "#343B4F" : "#E5E7EB",
            },
            xaxis: {
                labels: {
                    style: {
                        colors: textColor,
                    },
                },
            },
            yaxis: {
                labels: {
                    style: {
                        colors: textColor,
                    },
                },
            },
            tooltip: {
                theme: isDark ? "dark" : "light",
            },
        };
    };

    // Function to update the chart's theme dynamically
    function updateChartTheme(chart, options) {
        const updatedTheme = getChartTheme();
        chart.updateOptions({
            chart: {
                ...options.chart,
                ...updatedTheme.chart,
            },
            grid: {
                ...options.grid,
                ...updatedTheme.grid,
            },
            xaxis: {
                ...options.xaxis,
                ...updatedTheme.xaxis,
            },
            yaxis: {
                ...options.yaxis,
                ...updatedTheme.yaxis,
            },
            tooltip: {
                ...options.tooltip,
                ...updatedTheme.tooltip,
            },
        });
    };



    // Main Chart - Revenue vs Claims
    const mainChartOptions = {
        ...getChartTheme(),
        series: [{
                name: 'Revenue',
                data: [65000, 59000, 80000, 81000, 56000, 85000, 90000, 78000, 95000, 89000, 92000, 98000]
            },
            {
                name: 'Claims',
                data: [28000, 48000, 40000, 19000, 36000, 27000, 30000, 42000, 35000, 38000, 32000, 40000]
            },
        ],
        chart: {
            type: 'area',
            height: 480,
            toolbar: {
                show: false
            },
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800,
            },
            responsive: [{
                breakpoint: 768,
                options: {
                    height: 250,
                },
            }, ],
        },
        colors: ['#6D28D9', '#CB3CFF'],
        xaxis: {
            categories: months,
        },
        stroke: {
            curve: 'smooth',
            width: 2,
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.4,
                opacityTo: 0.1,
            },
        },
        dataLabels: {
            enabled: false,
        },
    };


    // Profits Chart
    const profitsChartOptions = {
        ...getChartTheme(),
        series: [{
            name: 'Total Profits',
            data: [37000, 11000, 40000, 62000, 20000, 58000, 60000, 36000, 60000, 51000, 60000, 58000]
        }],
        chart: {
            type: 'bar',
            height: 200,
            toolbar: {
                show: false
            },
            responsive: [{
                breakpoint: 768,
                options: {
                    height: 180,
                },
            }],
        },
        plotOptions: {
            bar: {
                borderRadius: 10,
                dataLabels: {
                    position: 'top'
                }
            }
        },
        dataLabels: {
            enabled: false // Disable data labels
        },
        xaxis: {
            categories: months,
            labels: {
                show: true,
                rotate: 0,
                style: {
                    fontSize: '10px'
                }
            }
        },
        yaxis: {
            labels: {
                show: false
            }
        },
        grid: {
            show: false
        },
        colors: ['#6D28D9']
    };

    // Vehicles Chart
    const vehiclesChartOptions = {
        ...getChartTheme(),
        series: [{
            name: 'Vehicles Added',
            data: [45, 29, 50, 61, 26, 75, 80, 67, 85, 79, 83, 89]
        }],
        chart: {
            type: 'area',
            height: 200,
            toolbar: {
                show: false
            },
            responsive: [{
                breakpoint: 768,
                options: {
                    height: 180,
                },
            }],
        },
        colors: ['#CB3CFF'],
        xaxis: {
            categories: months,
        },
        stroke: {
            curve: 'smooth',
            width: 2,
        },
        dataLabels: {
            enabled: false,
        },
    };

    // Initialize Charts
    const mainChart = new ApexCharts(document.querySelector('#mainChart'), mainChartOptions);
    const profitsChart = new ApexCharts(document.querySelector('#profitsChart'), profitsChartOptions);
    const vehiclesChart = new ApexCharts(document.querySelector('#vehiclesChart'), vehiclesChartOptions);

    mainChart.render();
    profitsChart.render();
    vehiclesChart.render();

    // Update charts on theme change
    const observer = new MutationObserver(() => {
        updateChartTheme(mainChart, mainChartOptions);
        updateChartTheme(profitsChart, profitsChartOptions);
        updateChartTheme(vehiclesChart, vehiclesChartOptions);
    });

    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['class']
    });

    // Add resize handler
    window.addEventListener('resize', () => {
        mainChart.render();
        profitsChart.render();
        vehiclesChart.render();
    });
    </script>
</body>

</html>