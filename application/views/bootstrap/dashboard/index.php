  <div class="row">
    <div class="col-lg-8">
      <div class="jumbotron">
        <div class="container"><? //was class='container' ?>
         <h1>Hi Al!</h1>
         <p>While you've been out eating cake and pretending you're a busy person, I've been hard at work.</p>
         <p>
          <a class="btn btn-lg btn-primary pull-right" href="../../components/#navbar">See what I've done &raquo;</a>
        </p>
      </div>
    </div>
    </div>
      <div class="col-lg-4">
        <div class="well">
          <h1>Go get 'em, Tiger...</h1>
          <button class="btn btn-success btn-lg btn-block text-left"><i class="icon-user "></i> Create New Contact</button>
          <button class="btn  btn-lg btn-block"><i class="icon-gbp "></i> Create New Order</button>
          <button class="btn  btn-lg btn-block"><i class="icon-briefcase "></i> Create New Lead</button>
          <button class="btn btn-lg btn-block"><i class="icon-bolt "></i> Do Other Stuff</button>
        </div>

      </div>
  </div>


  <div class="row">
    <div class="col-lg-8">
      <div class="well">

        <!-- Pills for the tables -->
        <div class="tabbable">
          <ul class="nav nav-pills">
            <li class="active"><a href="#contacts" data-toggle="tab">Contacts</a></li>
            <li><a href="#leads" data-toggle="tab">Leads</a></li>
            <li><a href="#orders" data-toggle="tab">Orders</a></li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="contacts">
              <br/><p class="lead">Your Contacts...</p>
              <div class="table-responsive">
              <table class="table DataTable" table-id="dashboard-table" id="dashboard-table" data-source="<?php echo site_url('ajax/contacts/get_table/id/first_name/last_name/owner_id'); ?>" link="contacts/show/" data-link="contacts/show/">
                  <thead>
                      <tr>
                          <th>Id</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Owner Id</th>
                      </tr>
                  </thead>
              </table>
          </div>
            </div>
            <div class="tab-pane" id="leads">
               <br/><p class="lead">Your Leads...</p>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Column heading</th>
                    <th>Column heading</th>
                    <th>Column heading</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <div class="tab-pane" id="orders">
               <br/><p class="lead">Your Orders...</p>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Column heading</th>
                    <th>Column heading</th>
                    <th>Column heading</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>

        </div>
        <!-- END Pills for the tables -->

      </div>
    </div>
    <div class="col-lg-4">
      <div class="well">
        <div class="tabbable">
          <ul class="nav nav-pills">
            <li class="active"><a href="#tasks" data-toggle="tab">Your Tasks</a></li>
            <li><a href="#stats" data-toggle="tab">Your Stats</a></li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="tasks">
              <br/><p class="lead">Your To-Do list...</p>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th><p class="text-center">Task</p></th>
                    <th><p class="text-center"><i class="icon-check"></i></p></th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <div class="tab-pane" id="stats">
               <br/><p class="lead">Your Latest Stats...</p>
              <table class="table">
                <thead>
                  <tr>
                    <th>Statistic:</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Number of new members</td>
                    <td>1,233</td>
                  </tr>
                  <tr>
                    <td>Number of new members</td>
                    <td>1,233</td>
                  </tr>
                  <tr>
                    <td>Number of new members</td>
                    <td>1,233</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>
        <!-- END Pills for the tables -->
      </div>
    </div>

  <?php /*
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Column heading</th>
            <th>Column heading</th>
            <th>Column heading</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      
      <p class="lead">Your Orders...</p>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Column heading</th>
            <th>Column heading</th>
            <th>Column heading</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
  */ ?>
 