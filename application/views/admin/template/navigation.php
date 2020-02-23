<body>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Admin </div>
      <div class="list-group list-group-flush">
        <a href="<?php echo base_url()?>admin/admin/dashboard/" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="<?php echo base_url()?>admin/admin/notification" class="list-group-item list-group-item-action bg-light">Notification</a>
        <a href="<?php echo base_url()?>admin/admin/sample_data" class="list-group-item list-group-item-action bg-light">Sample Data</a>
        <a href="<?php echo base_url()?>admin/admin/sample_data1" class="list-group-item list-group-item-action bg-light">Sample Data1</a>
        <a href="<?php echo base_url()?>admin/admin/drag_drop" class="list-group-item list-group-item-action bg-light">Drag and Drop</a>

      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url()?>site/logout">Logout</a>
            </li>
          </ul>
        </div>
      </nav>		