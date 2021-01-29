
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li id="dashboardMainMenu">
          <a href="<?php echo URLROOT;?>/dashboard/home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        
          
            <li class="treeview" id="mainUserNav">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              
              <li id="createUserNav"><a href="<?php echo URLROOT;?>/users/create"><i class="fa fa-circle-o"></i> Add User</a></li>
              <li id="manageUserNav"><a href="<?php echo URLROOT;?>/users/index"><i class="fa fa-circle-o"></i> Manage Users</a></li>
           
            </ul>
          </li>
         

         
            <li class="treeview" id="mainGroupNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Groups</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                  <li id="addGroupNav"><a href="<?php echo URLROOT;?>/groups/create"><i class="fa fa-circle-o"></i> Add Group</a></li>
               
                
                <li id="manageGroupNav"><a href="<?php echo URLROOT;?>/groups"><i class="fa fa-circle-o"></i> Manage Groups</a></li>
               
              </ul>
            </li>
         


          
            <li id="brandNav">
              <a href="<?php echo URLROOT;?>/brands">
                <i class="glyphicon glyphicon-tags"></i> <span>Brands</span>
              </a>
            </li>
         
            <li id="brandNav">
              <a href="<?php echo URLROOT;?>/ProductMdl">
                <i class="glyphicon glyphicon-tags"></i> <span>Models</span>
              </a>
            </li>
         
            <li id="categoryNav">
              <a href="<?php echo URLROOT;?>/categories">
              <i class="fa fa-list-ul" aria-hidden="true"></i> <span>Category</span>
              </a>
            </li>
         

         
            <li id="storeNav">
              <a href="<?php echo URLROOT;?>/stores">
              <i class="fa fa-university" aria-hidden="true"></i>
 <span>Stores</span>
              </a>
            </li>
         
          
            <li class="treeview" id="mainProductNav">
              <a href="#">
                <i class="fa fa-cube"></i>
                <span>Products</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                  <li id="addProductNav"><a href="<?php echo URLROOT;?>/products/create"><i class="fa fa-circle-o"></i> Add Product</a></li>
                
                
                <li id="manageProductNav"><a href="<?php echo URLROOT;?>/products"><i class="fa fa-circle-o"></i> Manage Products</a></li>
              
              </ul>
            </li>
     


          
            <li class="treeview" id="mainOrdersNav">
              <a href="#">
                <i class="fa fa-dollar"></i>
                <span>Orders</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                
                  <li id="addOrderNav"><a href="<?php echo URLROOT;?>/orders/create"><i class="fa fa-circle-o"></i> Add Order</a></li>
               
                <li id="manageOrdersNav"><a href="<?php echo URLROOT;?>/orders/index"><i class="fa fa-circle-o"></i> Manage Orders</a></li>
                
              </ul>
            </li>
          

          
            <li id="reportNav">
              <a href="#">
                <i class="glyphicon glyphicon-stats"></i> <span>Reports</span>
              </a>
            </li>
        
        <!-- <li class="header">Settings</li> -->

      
          <li><a href="#"><i class="fa fa-user-o"></i> <span>Profile</span></a></li>
      
          <li><a href="#"><i class="fa fa-wrench"></i> <span>Setting</span></a></li>
      
        <!-- user permission info -->
        <li><a href="#"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>