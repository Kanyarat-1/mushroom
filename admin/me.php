<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark  " > <!--ใส่สี-->
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="home1.php">Mushroom</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
        <?php 
        if(isset($_SESSION["username"])){
        ?>
                <li class="nav-item">
                    <b class="nav-link">ยินดีตอนรับคุณ: <?=$_SESSION['firstname']?> <?=$_SESSION['lastname']?></b>
                </li>
        <?php 
        }
        ?>
            
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../login/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark"  id="sidenavAccordion"> <!--ใส่สี-->
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <div class="sb-sidenav-menu-heading">การจัดการ</div>
                            <a class="nav-link" href="mush1.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ข้อมูลเห็ด
                            </a>

                            <a class="nav-link" href="../news/shownews.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ข้อมูลข่าวสาร
                            </a>
                            

                            <div class="sb-sidenav-menu-heading">แก้ไข</div>
                            <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                ลักษณะเห็ด
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                                
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="stalk_show.php">ก้าน</a>
                                    <a class="nav-link" href="gill_show.php">ครีบ</a>
                                    <a class="nav-link" href="cap_show.php">หมวดเห็ด</a>
                                    <a class="nav-link" href="capcap_show.php">ผิวของหมวดเห็ด</a>
                                    <a class="nav-link" href="family_show.php">วงศ์</a>
                                    <a class="nav-link" href="phylum_show.php">ไฟลัม</a>
                                        
                                       
                                    
                                </nav>

                                

                            </div>

                            
                            
                            
                    
                    
                </nav>
            </div>