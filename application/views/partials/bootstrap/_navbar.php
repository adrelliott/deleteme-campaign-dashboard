      <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><i class="icon-bullhorn "></i> Campaign Dashboard</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo site_url('dashboard'); ?>"><i class="icon-dashboard "></i> Dashboard</a></li>
              <li><a href="<?php echo site_url('contacts'); ?>"><i class="icon-user "></i> Contacts</a></li>
              <li><a href="<?php echo site_url('contacts'); ?>"><i class="icon-briefcase "></i> Leads</a></li>
              <li><a href="<?php echo site_url('contacts'); ?>"><i class="icon-gbp "></i> Orders</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><i class="icon-search "></i> Search</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs "></i> Settings<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="icon-off "></i> Log Out</a></li>
                  <li><a href="#"><i class="icon-pencil "></i> Edit your Profile</a></li>
                  <li><a href="#"><i class="icon-shopping-cart "></i> Edit Products</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
<?php
  //Sample code for dropdowns
  /*
  <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Leads<b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li class="divider"></li>
        <li class="dropdown-header">Nav header</li>
        <li><a href="#">Separated link</a></li>
        <li><a href="#">One more separated link</a></li>
      </ul>
    </li>
   */

  