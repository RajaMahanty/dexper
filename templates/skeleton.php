<?php
include_once "../init.php";

$pic = $getFromU->Photofetch($_SESSION['UserId']);
$pic = '"' . $pic . '"';
$username = $getFromU->fetchUsername($_SESSION['UserId']);

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../static/images/expenseic.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <link rel="stylesheet" href="../static/css/skeleton.css">
    <link rel="stylesheet" href="../static/css/11-changepass.css">
    <link rel="stylesheet" href="../static/css/7-Datewise.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../static/css/yearpicker.css">
    <link rel="stylesheet" href="../static/css/6-Manage-Expenses.css">
    <script src="../static/js/yearpicker.js" async></script>
    <script src="../static/js/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/@simondmc/popup-js@1.4.3/popup.min.js"></script>

    <title>DEXPER</title>

</head>

<body class="overlay-scrollbar sidebar-expand">
    <!-- Navbar -->
    <div class="navbar">
        <!-- nav-left -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class='nav-link'>
                    <i class="fas fa-bars" onclick="collapseSidebar()"></i>
                </a>
            </li>
            <li class="nav-item">
                <img src="../static/images/expenseic.png" alt="" class="logo">
            </li>
        </ul>

        <!-- end nav left  -->
        <h1 class="navbar-text">DEXPER</h1>
        <!-- nav right  -->
        <ul class="navbar-nav nav-right">
            <!-- Username Display -->
            <li class="nav-item">
                <span class="nav-link"><?php echo htmlspecialchars($username); ?></span>
            </li>
            <!-- Calculator Start -->
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="toggleCalculator()">
                    <i class="fa-solid fa-calculator" style="transition: transform 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'"></i>
                </a>
            </li>
            <div id="calculator" style="display:none; position: absolute; right:0; top:0; width:350px; height:450px; background: var(--main-bg-color); box-shadow: -2px 0 5px rgba(0,0,0,0.5); padding:25px; z-index:1000; transform: translateX(100%); transition: transform 0.3s ease-in-out; border-radius: 10px;">
                <h3 style="text-align: center; color: var(--main-color); margin-bottom: 25px; font-size: 1.2em;">Calculator</h3>
                <button onclick="toggleCalculator()" style="position:absolute; top:15px; right:15px; background-color: var(--danger-color); color: var(--light-color); border: none; border-radius: 50%; width: 35px; height: 35px; display: flex; align-items: center; justify-content: center; font-size: 1.2em;">X</button>
                <input disabled type="text" id="calc-display" style="width:100%; height:60px; text-align:right; padding:12px; font-size:1.7em; margin-bottom: 25px; border: 2px solid #ccc; border-radius: 5px; background-color: var(--main-bg-color); color: var(--main-color);">
                <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:12px; margin-top:12px;">
                    <button onclick="appendNumber('1')" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">1</button>
                    <button onclick="appendNumber('2')" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">2</button>
                    <button onclick="appendNumber('3')" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">3</button>
                    <button onclick="appendOperator('+')" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">+</button>
                    <button onclick="appendNumber('4')" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">4</button>
                    <button onclick="appendNumber('5')" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">5</button>
                    <button onclick="appendNumber('6')" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">6</button>
                    <button onclick="appendOperator('-')" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">-</button>
                    <button onclick="appendNumber('7')" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">7</button>
                    <button onclick="appendNumber('8')" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">8</button>
                    <button onclick="appendNumber('9')" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">9</button>
                    <button onclick="appendOperator('*')" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">*</button>
                    <button onclick="appendNumber('0')" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">0</button>
                    <button onclick="clearDisplay()" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">C</button>
                    <button onclick="calculateResult()" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">=</button>
                    <button onclick="appendOperator('/')" style="padding:12px; font-size:1.4em; background-color: #f0f0f0; border-radius: 5px;">/</button>
                </div>
            </div>
            <div id="dim-background" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:999;" onclick="toggleCalculator()"></div>
            <script>
                function toggleCalculator() {
                    const calculator = document.getElementById('calculator');
                    const dimBackground = document.getElementById('dim-background');
                    const isCalculatorVisible = calculator.style.transform === 'translateX(0%)';
                    calculator.style.display = 'block';
                    calculator.style.transform = isCalculatorVisible ? 'translateX(100%)' : 'translateX(0%)';
                    dimBackground.style.display = isCalculatorVisible ? 'none' : 'block';
                    document.querySelectorAll('.nav-item a').forEach(link => {
                        if (!link.onclick || link.onclick.toString().includes('toggleCalculator')) return;
                        link.style.pointerEvents = isCalculatorVisible ? 'auto' : 'none';
                    });
                }

                let display = document.getElementById('calc-display');
                let currentInput = '';

                function appendNumber(number) {
                    currentInput += number;
                    display.value = currentInput;
                }

                function appendOperator(operator) {
                    currentInput += ' ' + operator + ' ';
                    display.value = currentInput;
                }

                function clearDisplay() {
                    currentInput = '';
                    display.value = '';
                }

                function calculateResult() {
                    try {
                        currentInput = eval(currentInput).toString();
                        display.value = currentInput;
                    } catch (e) {
                        display.value = 'Error';
                    }
                }
            </script>
            <!-- Calculator End -->
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="switchTheme()">
                    <i class="fas fa-moon dark-icon icon-hover" style="transition: transform 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'"></i>
                    <i class="fas fa-sun light-icon icon-hover" style="transition: transform 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'"></i>
                </a>
            </li>
            <li class="nav-item">
                <div class="avt dropdown">
                    <img src=<?php echo $pic ?> alt="" class="dropdown-toggle" data-toggle="user-menu"  style="transition: transform 0.3s ease; cursor: pointer;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'">
                    <ul id="user-menu" class="dropdown-menu">
                        <li class="dropdown-menu-item">
                            <a href="10-Profile.php" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="logout.php" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-sign-out-alt"></i>
                                </div>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <!-- end navbar -->
    <!-- sidebar -->
    <div class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="sidebar-nav-item">
                <a href="3-Dashboard.php" class="sidebar-nav-link">
                    <div>
                    <span class="icon-sidebar">📊</span>
                    </div>
                    <span>
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="4-Set-Budget.php" class="sidebar-nav-link">
                    <div>
                        <span class="icon-sidebar">💰</span>
                    </div>
                    <span>
                        Set Budget
                    </span>
                </a>
            </li>
            <li class="sidebar-nav-item" id="Expense" onclick="open1()">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <span class="icon-sidebar">➕</span>
                    </div>
                    <span>
                        Expenses
                    </span>
                </a>
            </li>
            <li class="sidebar-nav-item" style="display: none;">
                <a href="5-Add-Expenses.php" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </div>
                    <span>
                        Add Expenses
                    </span>
                </a>
            </li>
            <li class="sidebar-nav-item" style="display: none">
                <a href="6-Manage-Expense.php" class="sidebar-nav-link" style="display: none">
                    <div>
                        <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </div>
                    <span>
                        Manage Expenses
                    </span>
                </a>
            </li>
            <li class="sidebar-nav-item" id="ER" onclick="open2()">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <span class="icon-sidebar">📅</span>
                    </div>
                    <span>
                        Expense Report
                    </span>
                </a>
            </li>
            <li class="sidebar-nav-item" style="display:none;">
                <a href="7-Datewise.php" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <span>
                        Datewise Report
                    </span>
                </a>
            </li>
            <li class="sidebar-nav-item" style="display: none;">
                <a href="8-Monthly.php" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-calendar-week"></i>
                    </div>
                    <span>
                        Monthly Report
                    </span>
                </a>
            </li>
            <li class="sidebar-nav-item" style="display:none;">
                <a href="9-Yearly.php" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-calendar"></i>
                    </div>
                    <span>
                        Yearly Report
                    </span>
                </a>
            </li>
            <li class="sidebar-nav-item" id="Category" onclick="open3()">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <span class="icon-sidebar">📁</span>
                    </div>
                    <span>
                        Category
                    </span>
                </a>
            </li>
            <li class="sidebar-nav-item" style="display: none;">
                <a href="12-Add-Category.php" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-folder-plus"></i>
                    </div>
                    <span>
                        Add Category
                    </span>
                </a>
            </li>
            <li class="sidebar-nav-item" style="display: none;">
                <a href="13-Remove-Category.php" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-folder-minus"></i>
                    </div>
                    <span>
                        Remove Category
                    </span>
                </a>
            </li>
            <style>
            .icon-sidebar {
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 1.5em;
                margin-top: 10px;
            }
            </style>
            <script>
            function open3() {
                let val = document.getElementById('Category');
                let sib1 = val.nextElementSibling;
                let sib2 = sib1.nextElementSibling;
                if(val.classList.length === 1)
                {
                    val.classList.add("open");
                    console.log(val.classList);
                    sib1.outerHTML = `<li class="sidebar-nav-item">
                                        <a href="12-Add-Category.php" class="sidebar-nav-link">
                                            <div>
                                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                            </div>
                                            <span>
                                                Add Category
                                            </span>
                                        </a>
                                    </li>`
                    sib2.outerHTML = `<li class="sidebar-nav-item">
                                        <a href="13-Remove-Category.php" class="sidebar-nav-link">
                                            <div>
                                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                            </div>
                                            <span>
                                                Remove Category
                                            </span>
                                        </a>
                                    </li>`
                }
                else
                {
                    val.classList.remove("open");
                    sib1.outerHTML = `<li class="sidebar-nav-item" style="display: none">
                                        <a href="12-Add-Category.php" class="sidebar-nav-link">
                                            <div>
                                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                            </div>
                                            <span>
                                                Add Category
                                            </span>
                                        </a>
                                    </li>`
                    sib2.outerHTML = `<li class="sidebar-nav-item">
                                        <a href="13-Remove-Category.php" class="sidebar-nav-link" style="display: none">
                                            <div>
                                            <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                            </div>
                                            <span>
                                                Remove Category
                                            </span>
                                        </a>
                                    </li>`
                }
            }
            </script>
        </ul>
    </div>
    <!-- end sidebar-->
    <!-- Main Content -->
    <!-- end main content -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="../static/js/skeleton.js"></script>
</body>