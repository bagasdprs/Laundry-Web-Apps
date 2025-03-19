    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-heading">MAIN</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <!-- MASTER DATA -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="?page=customer">
                            <i class="bi bi-circle"></i><span>Customer</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=service">
                            <i class="bi bi-circle"></i><span>Service</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=level">
                            <i class="bi bi-water"></i><span>Level</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=user">
                            <i class="bi bi-person"></i><span>User</span>
                        </a>
                    </li>
                </ul>

            </li><!-- End Components Nav -->

            <!-- TRANSACTION SECTION -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#transaction-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Transaction</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="transaction-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="?page=customer">
                            <i class="bi bi-circle"></i><span>Data Transaction</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=service">
                            <i class="bi bi-circle"></i><span>Pickup Laundry</span>
                        </a>
                    </li>
                    <li>
                        <a href="?page=level">
                            <i class="bi bi-water"></i><span>Report</span>
                        </a>
                    </li>

                </ul>

            </li><!-- End Components Nav -->


            <li class="nav-heading">Pages</li>


            <li class="nav-item">
                <a class="nav-link " href="pages-blank.html">
                    <i class="bi bi-file-earmark"></i>
                    <span>Blank</span>
                </a>
            </li><!-- End Blank Page Nav -->

        </ul>

    </aside>