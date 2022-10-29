<!-- Description -->
<div class="modal fade" id="platform">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
      </div>
      <div class="modal-body">
        <p id="desc"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Add -->
<div class="modal fade" id="addnew2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Add New List</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="list_add.php" enctype="multipart/form-data">
          <div class="form-group">
            <label for="list_name" id="listname" class="col-sm-3 control-label">List Name</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="list_name" name="list_name" required>
            </div>
          </div>

          <div class="form-group">
            <!-- working -->
            <label for="list_candidate" class="col-sm-3 control-label">List Candidate</label>
            <div class="col-sm-9">
              <!-- <input type="text" class="form-control" id="list_candidate" name="list_candidate" required> -->

              <?php

              $sql1 = "SELECT * FROM `simulation_candidate`";
              $query1 = $conn->query($sql1);
              // echo "<h3>".$query->num_rows."</h3>";
              ?>


              <select name="" id="simulation_candidate" class="form-control">
                <?php foreach ($query1 as $key1 => $value1) { ?>
                  <option value="<?php echo $value1['sim_can_id']; ?>"><?php echo $value1['sim_can_name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="list_small_district" class="col-sm-3 control-label">List Small District</label>

            <div class="col-sm-9">
              <?php

              $sql = "SELECT `small_district_id`,`small_district_name` FROM `small_district` ";
              $query = $conn->query($sql);
              // echo "<h3>".$query->num_rows."</h3>";
              ?>
              <select name="sim_can_small_district112" id="sim_can_small_district11" class="form-control sim_can_small_district112">
                <option value="-1">Choose a Small District</option>
                <?php foreach ($query as $key => $value) { ?>
                  <option value="<?php echo $value['small_district_id']; ?>"><?php echo $value['small_district_name']; ?>
                  </option>

                <?php } ?>


              </select>

            </div>

          </div>
          <div class="form-group">
            <label for="list_main_district" class="col-sm-3 control-label">List Main District</label>

            <div class="col-sm-9">


              <label id="test" for="sim_can_main_district" class=" control-label"></label>


            </div>


          </div>
          <input type="hidden" id="idMainDis">

          <div class="form-group">
            <!-- <label for="list_number_of_votes" class="col-sm-3 control-label">Number Of Predicted Votes</label> -->

            <div class="col-sm-9">
              <input type="hidden" class="form-control" value="0" id="list_number_of_votes" name="list_number_of_votes">
            </div>
          </div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" id="saveList" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {



    $('#saveList').click(function() {

      var list_name = $("#list_name").val();
      var list_candidate = $("#list_candidate").val();
      var conceptName = $('.sim_can_small_district112').find(":selected").text();
      var smallDistrictID = $('.sim_can_small_district112').val();
      var simulationCandidate = $('#simulation_candidate').val();
      var idMainDis = $("#idMainDis").val()
      var list_number_of_votes = $("#list_number_of_votes").val()

      $.ajax({
        type: 'post',
        url: 'positions_row.php',
        data: {
          list_name: list_name,
          list_candidate: list_candidate,
          conceptName: conceptName,
          smallDistrictID: smallDistrictID,
          idMainDis: idMainDis,
          list_number_of_votes: list_number_of_votes,
          simulationCandidate: simulationCandidate,
        },
        dataType: 'json',
        success: function(response) {
          $("#idMainDis").val(response.main_district_id)
          $('#test').html(response.main_district_name)
        }
      });


    });

    $('.sim_can_small_district112').change(function() {
      var conceptName = $('.sim_can_small_district112').find(":selected").text();

      $.ajax({
        type: 'post',
        url: 'positions_row.php',
        data: {
          selectSmall: conceptName
        },
        dataType: 'json',
        success: function(response) {
          console.log(response);
          $("#idMainDisID").val(response.id)
          $("#idMainDis").val(response.main_district_id)
          $('#test').html(response.main_district_name)
        }
      });

    });

  });
</script>

<!-- Edit --

<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit list</b></h4>
            </div>
            
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="simulation_candidate_edit.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="edit_sim_can_name" class="col-sm-3 control-label">name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_sim_can_name" name="sim_can_name" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="edit_sim_can_ethnicity" class="col-sm-3 control-label">Candidate Ethnicity</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_sim_can_ethnicity" name="sim_can_ethnicity" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_sim_can_age" class="col-sm-3 control-label">Candidate Age</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="edit_sim_can_age" name="sim_can_age" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sim_can_small_district" class="col-sm-3 control-label">Candidate Small District</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="sim_can_small_district" name="sim_can_small_district" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_sim_can_main_district" class="col-sm-3 control-label">Candidate Main District</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_sim_can_main_district" name="sim_can_main_district" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_sim_cand_list" class="col-sm-3 control-label">Candidate List</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_sim_cand_list" name="sim_cand_list" required>
                    </div>
                </div>
                
                
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>
-->
<!-- Delete -->
<!--
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="candidates_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>DELETE CANDIDATE</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>
-->
<!-- Update Photo -->
<!--
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="candidates_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

-->