<?php
/**
* Page that allows admins to verify or delete new (unverified) users
**/
$pagetype = 'adminpage';
$title = 'Manage Active Users';
require '../login/misc/pagehead.php';
$x = 0;
?>

<script type="text/javascript" src="../login/js/DataTables/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="../login/js/DataTables/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="css/usermanagement.css"/>

</head>
<body>
  <?php require 'login/misc/pullnav.php'; ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <h3>Manage Active Users</h3>

        <table id="userlist" class="table table-sm">
          <thead>
            <th></th>
            <th>Username</th>
            <th>Email</th>
            <th>Role(s)</th>
            <th>Timestamp</th>
          </thead>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="rolesModal" tabindex="-1" role="dialog" aria-labelledby="rolesModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-title" id="rolesModalTitle">Assign Roles to User</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <input type="hidden" id="user_id" />
          <div class="subject-info-box-1">
            <br>
            <h4>Available</h4>
            <select multiple="multiple" id='roles-available' class="form-control">
            </select>
          </div>
          <div class="subject-info-arrows text-center">
            <br>
            <input type="button" id="btnAllRight" value=">>" class="btn btn-default" /><br />
            <input type="button" id="btnRight" value=">" class="btn btn-default" /><br />
            <input type="button" id="btnLeft" value="<" class="btn btn-default" /><br />
            <input type="button" id="btnAllLeft" value="<<" class="btn btn-default" />
          </div>
          <div class="subject-info-box-2">
            <br>
            <h4>Selected</h4>
            <select multiple="multiple" id='roles-selected' class="form-control">
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <br><br>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="saveRoles" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <button id="rolesButton" type="button" class="btn btn-primary" data-toggle="modal" data-target="#rolesModal" style="display:none;">
    Launch modal
  </button>

  <script type="application/javascript" src="js/usermanagement.js"></script>

</body>
</html>
