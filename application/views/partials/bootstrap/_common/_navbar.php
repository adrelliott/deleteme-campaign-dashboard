      <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= site_url(); ?>">
                <img class="hidden-sm" src="<?= site_url('assets/bootstrap-3/images/cdash_logo150px.png'); ?>" />
                <img class="visible-sm" src="<?= site_url('assets/bootstrap-3/images/cdash_logo75px.png'); ?>" />
            </a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
             <? echo nav_bar_item('dashboard', 'dashboard'); ?>
             <? echo nav_bar_item('contacts', 'user'); ?>
             <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-signal "></i> Sales<b class="caret"></b></a>
                <ul class="dropdown-menu">
                 <? echo nav_bar_item('leads', 'briefcase'); ?>
                 <? echo nav_bar_item('orders', 'gbp'); ?>
                </ul>
              </li>
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bolt "></i> Marketing<b class="caret"></b></a>
                <ul class="dropdown-menu">
                 <? echo nav_bar_item('campaigns', 'comments'); ?>
               <? echo nav_bar_item('reports', 'bar-chart-o'); ?>
                   <li><a href="<?= site_url('templates/index'); ?>">Index</a></li>
                   <li><a href="<?= site_url('templates/show'); ?>">Show</a></li>
                   <li><a href="<?= site_url('templates/layout_index_tabs'); ?>">Index_tabs</a></li>
                   <li><a href="<?= site_url('templates/grid'); ?>">Grid</a></li>
                   <li><a href="<?= site_url('templates/layout_index_tabs'); ?>">Index_tabs</a></li>
                </ul>
              </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
             <? echo nav_bar_item('search', 'search'); ?>
              <li class="dropdown">
                <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs "></i> Settings<b class="caret"></b></a>
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

      <div class="row"><div class="col-xs-12 hidden-sm"><br/><br/></div></div>
  
    <div class="container">
      