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
             <? echo nav_bar_item('dashboard', 'dashboard'); ?>
             <? echo nav_bar_item('contacts', 'briefcase'); ?>
             <? echo nav_bar_item('orders', 'gbp'); ?>
            </ul>

            <ul class="nav navbar-nav navbar-right">
             <? echo nav_bar_item('search', 'search'); ?>
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs "></i> Settings<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <? echo nav_bar_item('log_out', 'off', 'Log Out'); ?>
                  <? echo nav_bar_item('profile', 'pencil', 'Edit your Profile'); ?>
                  <? echo nav_bar_item('products', 'shopping-cart', 'Edit Products'); ?>
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

  