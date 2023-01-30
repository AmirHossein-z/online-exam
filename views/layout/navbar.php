<div class="text-blueGray-700 antialiased">
  <noscript>برای اینکه این سایت درست کار کند،شما نیاز به فعال سازی جاوا اسکریپت دارید.</noscript>
  <div id="root">
    <nav
      class="md:right-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
      <div
        class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button
          class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
          type="button" onclick="toggleNavbar('example-collapse-sidebar')">
          <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-right md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm font-bold p-4 px-0"
          href='<?php echo URL . 'dashboard/index' ?>'>
          <?php echo $data['name'] ?>
        </a>
        
        <div
          class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
          id="example-collapse-sidebar">
          <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200">
            <div class="flex flex-wrap">
              <div class="w-6/12 flex justify-end">
                <button type="button"
                  class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                  onclick="toggleNavbar('example-collapse-sidebar')">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </div>
          <!-- Divider -->
          <hr class="my-4 md:min-w-full" />
          <!-- Heading -->
          <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">تاریخ و ساعت سامانه
          </h6>

          <!-- Date time of system -->
          <span><?php echo date('l jS \of F Y h:i:s A', time());?></span>

          <!-- Divider -->
          <hr class="my-4 md:min-w-full" />
          <!-- Heading -->
          <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">آزمون
          </h6>
          <!-- Navigation -->
          <ul class="md:flex-col md:min-w-full flex flex-col justify-between list-none">
            <?php if ($data['type'] === MASTER) { ?>
              <li class="items-center">
                <a href="<?php echo URL . 'dashboard/exam/index' ?>"
                  class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500 flex items-center">
                  <i class="fa-solid fa-clipboard-list text-sm ml-2 opacity-75"></i>
                  لیست آزمون ها
                </a>
              </li>
              <li class="items-center">
                <a href="<?php echo URL . 'dashboard/exam/create' ?>"
                  class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block flex items-center">
                  <i class="fa-solid fa-square-plus text-sm ml-2 opacity-75"></i>
                  افزودن آزمون
                </a>
              </li>
              <li class="items-center">
                <a href="<?php echo URL . 'dashboard/participate/index' ?>"
                  class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block flex items-center">
                  <i class="fa-solid fa-square-plus text-sm ml-2 opacity-75"></i>
                  لیست شرکت کنندگان
                </a>
              </li>
            <?php } else if ($data['type'] === STUDENT) { ?>
                <li class="items-center">
                  <a href="<?php echo URL . 'dashboard/list_exams' ?>"
                    class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                    <i class="fa-solid fa-clipboard-list text-sm ml-2 opacity-75"></i>
                    لیست آزمون ها
                  </a>
                </li>
            <?php } ?>
          </ul>

          <?php if ($data['type'] === MASTER) { ?>
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs font-bold block pt-1 pb-4 no-underline">سوال</h6>

            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
              <li class="items-center">
                <a href="<?php echo URL . 'dashboard/add_question' ?>"
                  class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                  <i class="fa-solid fa-plus ml-2 text-sm opacity-75"></i>
                  افزودن سوال
                </a>
              </li>
              <li class="items-center">
                <a href="<?php echo URL . 'dashboard/questions' ?>"
                  class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                  <i class="fa-solid fa-list-ul ml-2 text-sm opacity-75"></i>
                  لیست سوالات
                </a>
              </li>
            </ul>
          <?php } ?>

          <!-- Divider -->
          <hr class="my-4 md:min-w-full" />
          <!-- Heading -->
          <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
            <?php if ($data['type'] === MASTER) { ?>دانشجو
            <?php } else if ($data['type'] === STUDENT) { ?>استاد<?php } ?>
          </h6>
          <!-- Navigation -->

          <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
            <?php if ($data['type'] === MASTER) { ?>
              <li class="items-center">
                <a href="<?php echo URL . 'dashboard/list_students'; ?>"
                  class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                  <i class="fa-solid fa-users ml-2 text-sm opacity-75"></i>
                  لیست دانشجویان
                </a>
              </li>
            <?php } else if ($data['type'] === STUDENT) { ?>
                <li class="items-center">
                  <a href="<?php echo URL . 'dashboard/list_masters'; ?>"
                    class="text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500">
                    <i class="fa-solid fa-users ml-2 text-sm opacity-75"></i>
                    لیست استادان
                  </a>
                </li>
            <?php } ?>
            <li>
                <a href="<?php echo URL . 'auth/logout' ?>"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-red-500">خروج</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="relative md:ml-64 bg-blueGray-50">
      <nav
        class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4">
        <div class="w-full mx-auto items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
          <a class="text-white text-sm hidden lg:inline-block font-semibold text-red-500"
            href="./index.html">داشبورد</a>

            <!-- 

        <ul class="md:hidden items-center flex flex-wrap list-none">
          <li class="inline-block relative">
            <a class="text-blueGray-500 block py-1 px-3" href="#pablo"
              onclick="openDropdown(event,'notification-dropdown')"><i class="fas fa-bell"></i></a>
            <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
              id="notification-dropdown">
              <a href="#pablo"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Action</a><a
                href="#pablo"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Another
                action</a><a href="#pablo"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Something
                else here</a>
              <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
              <a href="#pablo"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-red-500">some</a>
            </div>
          </li>
          <li class="inline-block relative">
            <a class="text-blueGray-500 block" href="#pablo" onclick="openDropdown(event,'user-responsive-dropdown')">
              <div class="items-center flex">
                <span
                  class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full">
              </span>
              </div>
            </a>
            <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
              id="user-responsive-dropdown">
              <a href="#pablo"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Action</a><a
                href="#pablo"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Another
                action</a><a href="#pablo"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Something
                else here</a>
              <div class="h-0 my-2 border border-solid border-blueGray-100"></div>
              <a href="<?php echo URL . 'auth/logout' ?>"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-red-500">خروج</a>
            </div>
          </li>
        </ul>
        
             -->
          </div>
      </nav>
      <!-- Header -->
    </div>
  </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script type="text/javascript">
  /* Make dynamic date appear */
  (function () {
    if (document.getElementById("get-current-year")) {
      document.getElementById("get-current-year").innerHTML =
        new Date().getFullYear();
    }
  })();
  /* Sidebar - Side navigation menu on mobile/responsive mode */
  function toggleNavbar(collapseID) {
    document.getElementById(collapseID).classList.toggle("hidden");
    document.getElementById(collapseID).classList.toggle("bg-white");
    document.getElementById(collapseID).classList.toggle("m-2");
    document.getElementById(collapseID).classList.toggle("py-3");
    document.getElementById(collapseID).classList.toggle("px-6");
  }
  /* Function for dropdowns */
  function openDropdown(event, dropdownID) {
    let element = event.target;
    while (element.nodeName !== "A") {
      element = element.parentNode;
    }
    Popper.createPopper(element, document.getElementById(dropdownID), {
      placement: "bottom-start"
    });
    document.getElementById(dropdownID).classList.toggle("hidden");
    document.getElementById(dropdownID).classList.toggle("block");
  }

  (function () {
    /* Chart initialisations */
    /* Line Chart */
    var config = {
      type: "line",
      data: {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July"
        ],
        datasets: [
          {
            label: new Date().getFullYear(),
            backgroundColor: "#4c51bf",
            borderColor: "#4c51bf",
            data: [65, 78, 66, 44, 56, 67, 75],
            fill: false
          },
          {
            label: new Date().getFullYear() - 1,
            fill: false,
            backgroundColor: "#fff",
            borderColor: "#fff",
            data: [40, 68, 86, 74, 56, 60, 87]
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        responsive: true,
        title: {
          display: false,
          text: "Sales Charts",
          fontColor: "white"
        },
        legend: {
          labels: {
            fontColor: "white"
          },
          align: "end",
          position: "bottom"
        },
        tooltips: {
          mode: "index",
          intersect: false
        },
        hover: {
          mode: "nearest",
          intersect: true
        },
        scales: {
          xAxes: [
            {
              ticks: {
                fontColor: "rgba(255,255,255,.7)"
              },
              display: true,
              scaleLabel: {
                display: false,
                labelString: "Month",
                fontColor: "white"
              },
              gridLines: {
                display: false,
                borderDash: [2],
                borderDashOffset: [2],
                color: "rgba(33, 37, 41, 0.3)",
                zeroLineColor: "rgba(0, 0, 0, 0)",
                zeroLineBorderDash: [2],
                zeroLineBorderDashOffset: [2]
              }
            }
          ],
          yAxes: [
            {
              ticks: {
                fontColor: "rgba(255,255,255,.7)"
              },
              display: true,
              scaleLabel: {
                display: false,
                labelString: "Value",
                fontColor: "white"
              },
              gridLines: {
                borderDash: [3],
                borderDashOffset: [3],
                drawBorder: false,
                color: "rgba(255, 255, 255, 0.15)",
                zeroLineColor: "rgba(33, 37, 41, 0)",
                zeroLineBorderDash: [2],
                zeroLineBorderDashOffset: [2]
              }
            }
          ]
        }
      }
    };
    var ctx = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(ctx, config);

    /* Bar Chart */
    config = {
      type: "bar",
      data: {
        labels: [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July"
        ],
        datasets: [
          {
            label: new Date().getFullYear(),
            backgroundColor: "#ed64a6",
            borderColor: "#ed64a6",
            data: [30, 78, 56, 34, 100, 45, 13],
            fill: false,
            barThickness: 8
          },
          {
            label: new Date().getFullYear() - 1,
            fill: false,
            backgroundColor: "#4c51bf",
            borderColor: "#4c51bf",
            data: [27, 68, 86, 74, 10, 4, 87],
            barThickness: 8
          }
        ]
      },
      options: {
        maintainAspectRatio: false,
        responsive: true,
        title: {
          display: false,
          text: "Orders Chart"
        },
        tooltips: {
          mode: "index",
          intersect: false
        },
        hover: {
          mode: "nearest",
          intersect: true
        },
        legend: {
          labels: {
            fontColor: "rgba(0,0,0,.4)"
          },
          align: "end",
          position: "bottom"
        },
        scales: {
          xAxes: [
            {
              display: false,
              scaleLabel: {
                display: true,
                labelString: "Month"
              },
              gridLines: {
                borderDash: [2],
                borderDashOffset: [2],
                color: "rgba(33, 37, 41, 0.3)",
                zeroLineColor: "rgba(33, 37, 41, 0.3)",
                zeroLineBorderDash: [2],
                zeroLineBorderDashOffset: [2]
              }
            }
          ],
          yAxes: [
            {
              display: true,
              scaleLabel: {
                display: false,
                labelString: "Value"
              },
              gridLines: {
                borderDash: [2],
                drawBorder: false,
                borderDashOffset: [2],
                color: "rgba(33, 37, 41, 0.2)",
                zeroLineColor: "rgba(33, 37, 41, 0.15)",
                zeroLineBorderDash: [2],
                zeroLineBorderDashOffset: [2]
              }
            }
          ]
        }
      }
    };
    ctx = document.getElementById("bar-chart").getContext("2d");
    window.myBar = new Chart(ctx, config);
  })();
</script>