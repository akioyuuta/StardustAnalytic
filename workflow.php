<?php include "header.php"; ?>

  <?php include "nav.php"; ?>
<script type="text/javascript">
  $(document).ready(function(){

    // Input Module Mechanism
    $("#add-input-module").click(function(){
      var module = $("#module").val();
      var tag = $("#tag").val();
      if(tag != ''){
        if(module == 'csv'){
          $("#csv-modal").modal();
        }else if(module == 'db-mysql'){
          $("#mysql-modal").modal();
        }else{
          $.notify({
          	message: '<i class="fa fa-warning"></i> Please Pick a Module'
          },{
          	type: 'danger',
            timer: 1000
          });
        }
      }else{
        $.notify({
        	message: '<i class="fa fa-warning"></i> Please Insert Tag Name'
        },{
        	type: 'danger',
          timer: 1000
        });
      }
    });

    // CSV Input Mechanism
    $("#input-csv").click(function(){
      var file = $("#csv-file-input").val();
      if(file != ''){
        var form = $("form#csv-form")[0];
        var formData = new FormData(form);

        $.ajax({
            url: 'ajax/input_modules/input-csv.php',
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {
              $.notify({
                message: '<i class="fa fa-check"></i> CSV Uploaded'
              },{
                type: 'success',
                timer: 1000,
                z_index: 5031
              });
              $("#tag").val("");
              $("form#csv-form")[0].reset();
              $('#csv-modal').modal('hide');
            },
            cache: false,
            contentType: false,
            processData: false
        });
      }else{
        $.notify({
        	message: '<i class="fa fa-warning"></i> Please Input a File'
        },{
        	type: 'danger',
          timer: 1000,
          z_index: 5031
        });
      }
    });
  });
</script>
<div class="container">
  <div class="row">
      <div class="col-sm-12">
        <div class="page-header">
          <h1><i class="fa fa-gears"></i>  Workflow</h1>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">Input Modules</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-5">
              <div class="form-group">
                <label for="module">Pick a Module : </label>
                <br>
                <div class="ui search selection dropdown" style="width: 100%;">
                  <input type="hidden" name="module" id="module">
                  <i class="dropdown icon"></i>
                  <div class="default text">Modules</div>
                  <div class="menu">
                    <div class="item" data-value="csv" data-text="CSV">CSV</div>
                    <div class="item" data-value="db-mysql" data-text="Database MySQL">Database (MySQL)</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="tag">Tag Name : </label>
                <input type="text" name="tag" id="tag" value="" placeholder="Tag Name (* Required)" class="form-control" style="height: 40px;">
              </div>
            </div>
            <div class="col-sm-2">
              <label for="action">Action : </label>
              <button type="button" id="add-input-module" name="add-input-module" class="btn btn-warning" style="height: 40px;">
                <i class="fa fa-plus"></i> Add Module
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Inputing Modules Modals  -->
  <div class="row">
    <div class="col-sm-12">
      <!-- CSV Input Module Modal -->
      <div class="modal fade" id="csv-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Input CSV Module</h4>
            </div>
            <form id="csv-form" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="csv">CSV : </label>
                    <input type="file" class="filestyle" id="csv-file-input" name="csv-file-input" data-buttonName="btn-primary">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" id="input-csv"><i class="fa fa-paper-plane-o"></i> Send CSV</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- MySQL Input Module Modal -->
      <div class="modal fade" id="mysql-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Input MySQL Module</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="host">Hostname : </label>
                <input type="text" name="host" value="" placeholder="Hostname" class="form-control">
              </div>
              <div class="form-group">
                <label for="host">Username : </label>
                <input type="text" name="username" value="" placeholder="Username" class="form-control">
              </div>
              <div class="form-group">
                <label for="host">Password : </label>
                <input type="text" name="password" value="" placeholder="Password" class="form-control">
              </div>
              <div class="form-group">
                <label for="host">Database : </label>
                <input type="text" name="database" value="" placeholder="Database" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-warning"><i class="fa fa-paper-plane-o"></i> Set Database</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
  $('.ui.dropdown').dropdown();
  $(":file").filestyle({buttonName: "btn-primary"});
</script>
<?php include "footer.php"; ?>
