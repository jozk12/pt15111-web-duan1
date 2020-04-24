  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= BASE_URL?>" class="brand-link">
      <img src="<?= LOGIN_THEME_ASSET_URL ?>images/avatar-01.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"> GRANDIUM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= BASE_URL.$_SESSION[AUTH]['avatar']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION[AUTH]['name']?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?= ADMIN_URL. 'dashboard' ?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- user -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Quản lý tài khoản
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= ADMIN_URL.'users'?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= ADMIN_URL.'users/add-form.php'?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Thêm tài khoản</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- contact -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon far fa-id-card"></i>
              <p>
                Liên hệ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= ADMIN_URL.'contacts'?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- feedback -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon far fa-comment-alt"></i>
              <p>
                Phản hồi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= ADMIN_URL.'customer_feedback'?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= ADMIN_URL.'customer_feedback/add-form/php'?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Thêm ảnh phản hồi</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- slide -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tv"></i>
              <p>
                Slides
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= ADMIN_URL.'slides'?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= ADMIN_URL.'slides/add-form.php'?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Thêm slide</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- room_gallery -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-image"></i>
              <p>
                Bộ ảnh phòng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= ADMIN_URL.'room_galleries'?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= ADMIN_URL.'room_galleries/add-form.php'?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Thêm ảnh phòng</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- gallery -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-images"></i>
              <p>
                Bộ ảnh khách sạn
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= ADMIN_URL.'galleries'?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= ADMIN_URL.'galleries/add-form.php'?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Thêm ảnh khách sạn</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- service -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-spa"></i>
              <p>
                Dịch vụ khách sạn
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= ADMIN_URL.'services'?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= ADMIN_URL.'services/add-form.php'?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Thêm dịch vụ</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- room -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-hotel"></i>
              <p>
                Loại phòng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= ADMIN_URL.'room_types'?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= ADMIN_URL.'room_types/add-form.php'?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Thêm loại phòng</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- room_service -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-concierge-bell"></i>
              <p>
                Dịch vụ phòng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= ADMIN_URL.'room_services'?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= ADMIN_URL.'room_services/add-form.php'?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Thêm dịch vụ phòng</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- booking -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fab fa-first-order-alt"></i>
              <p>
                Đặt phòng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= ADMIN_URL.'booking'?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- blog -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fab fa-blogger"></i>
              <p>
                Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= ADMIN_URL.'blog'?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= ADMIN_URL.'blog/add-form.php'?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Thêm blog</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- blog_cate -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon far fa-list-alt"></i>
              <p>
                Thể loại blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= ADMIN_URL.'blog_categories'?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= ADMIN_URL.'blog_categories/add-form.php'?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Thêm thể loại</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- web_settings -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
              <p>
                Quản trị trang chủ
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= ADMIN_URL.'web_settings'?>" class="nav-link">
                  <i class="fa fa-list-ol nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= ADMIN_URL.'web_settings/add-form.php'?>" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Thêm cài đặt</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- space -->
          <li class="nav-header"></li>
          <!-- log_out -->
          <li class="nav-item">
            <a href="<?= BASE_URL .'logout.php'?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Đăng xuất</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>