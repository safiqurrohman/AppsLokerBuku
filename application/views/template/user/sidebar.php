
<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-secret"></i>
            <!-- <i class="fa-solid fa-user-secret"></i> -->
        </div>
        <?php
            $status = $this->session->userdata('role_id');

            if($status == 1){
                $username = 'ADMIN';
            }else{
                $username = 'USER';
            }
        ?>
        <div class="sidebar-brand-text mx-3"><?= $username;?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!--query menu-->
    <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_access_menu`
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC";
        $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOPPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading mt-3">
            <?= $m['menu']; ?>
        </div> 

        <!-- siapkan sub menu sesuai menu -->
        <?php
        $menuId = $m['id'];
            $querySubMenu = "SELECT *
                            FROM `sub_menu` JOIN `user_menu`
                            ON `sub_menu`.`menu_id` =  `user_menu`.`id`
                            WHERE `sub_menu`.`menu_id` = $menuId
                            AND `sub_menu`.`is_active` = 1
                            ";

            $subMenu = $this->db->query($querySubMenu)->result_array();

        ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block mb-0 ">
            <?php foreach($subMenu as $sm): ?>
                <!-- Nav Item - Dashboard -->
                    <?php if ($title == $sm['title']) : ?>
                        <li class="nav-item active">
                    <?php else : ?>
                        <li class="nav-item ">
                    <?php endif; ?>

                    <?php if ($sm['title'] == 'Myprofile') : ?>
                            <a class="nav-link pb-1 pt-1" href="<?= base_url($sm['url']);?> " data-toggle="modal" data-target="#profile">                             
                        <?php else: ?>
                            <a class="nav-link pb-1 pt-1" href="<?= base_url($sm['url']);?>">             
                    <?php endif; ?>
                        
                    <i class="<?= $sm['icon'];?>"></i>
                    <span><?= $sm['title'];?></span></a>
                </li>
            <?php endforeach; ?>
      
    <?php endforeach ;?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block mt-3">
    <!-- Nav Item - logout -->
    <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#logout">
    <!-- <i class="fa-solid fa-user-tie"></i> -->
        <i class="fas fa-fw fa-user-tie"></i>
        <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->