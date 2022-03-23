<div class="sidebar app-aside" id="sidebar">
    <div class="sidebar-container perfect-scrollbar">
        <nav>
            <!-- start: MAIN NAVIGATION MENU -->
            <div class="navbar-title">
                <span>Main Navigation</span>
            </div>
            <ul class="main-navigation-menu">
                <li><?php
                    if (basename($_SERVER['PHP_SELF']) == "dashboard.php") { ?>
                        <a href="#">
                        <?php } else { ?>
                            <a href="../dashboard.php">
                            <?php } ?>
                            <div class="item-content">
                                <div class="item-media">
                                    <i class="ti-home"></i>
                                </div>
                                <div class="item-inner">
                                    <span class="title"> Dashboard </span>
                                </div>
                            </div>
                            </a>
                </li>
                <li>
                    <a href="viewCompletedTests.php">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-list"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Lab Records </span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-list"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Lab Forms </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="laboratory.php">
                                <span class="title"> Add New Form</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages/view_lab_form.php">
                                <span class="title"> View Forms </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="viewPendingTests.php">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-list"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Pending Tests </span>
                            </div>
                        </div>
                    </a>
                </li>

            </ul>
            <!-- end: CORE FEATURES -->
        </nav>
    </div>
</div>