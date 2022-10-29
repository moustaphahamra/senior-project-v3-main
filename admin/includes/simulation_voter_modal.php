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
<?php
@$main_district = $_GET['main_district'];
?>
<!-- Add -->
<div class="modal fade" id="addnew">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Add New Simulation Voter</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="form-group">
            <label for="sim_voters_name" class="col-sm-3 control-label">First Name</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="sim_voters_name" name="sim_voters_name" required>
            </div>
          </div>

          <div class="form-group">
            <label for="sim_voters_lastname" class="col-sm-3 control-label">Last Name</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="sim_voters_lastname" name="sim_voters_lastname" required>
            </div>
          </div>

          <div class="form-group">
            <label for="sim_voters_ethnicity" class="col-sm-3 control-label">Ethnicity</label>

            <div class="col-sm-9">
              <select name="sim_voters_ethnicity" id="sim_voters_ethnicity" class="form-control" required>
                <option value="Sunni">Sunni</option>
                <option value="Shiia">Shiia</option>
                <option value="Durze">Durze</option>
                <option value="Allawi">Allawi</option>
                <option value="Maronite">Maronite</option>
                <option value="Roman Orthodox">Roman Orthodox</option>
                <option value="Roman Catholic">Roman Catholic</option>
                <option value="Angellic">Angellic</option>
                <option value="Arminian Catholic">Arminian Catholic</option>
                <option value="Arminian Orthodox">Arminian Orthodox</option>
                <option value="Minorities">Minorities</option>

              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="sim_voters_age" class="col-sm-3 control-label">Voter Age</label>

            <div class="col-sm-9">
              <input type="number" class="form-control" id="sim_voters_age" name="sim_voters_age" required min="21">
            </div>
          </div>

          <div class="form-group">
            <label for="gender" class="col-sm-3 control-label">Gender</label>

            <div class="col-sm-9">
              <select name="gender" id="gender" class="form-control" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="sim_voters_small_district" class="col-sm-3 control-label">Voter Small District</label>
            <div class="col-sm-9">
              <?php
              $sql = "SELECT `small_district_id`,`small_district_name` FROM `small_district` ";
              $query = $conn->query($sql);
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
            <label for="sim_voters_main_district" class="col-sm-3 control-label">Voter Main District</label>
            <div class="col-sm-9">
              <input type="hidden" name="sim_voters_main_district" id="sim_voters_main_district_id">
              <label id="test" for="sim_voters_main_district" class=" control-label"></label>
            </div>
          </div>
          <!-- working -->
          <div class="form-group">
            <label for="sim_voters_list" class="col-sm-3 control-label">List</label>
            <div class="col-sm-9">
              <?php
              $sql = "SELECT * FROM `lists`";
              $query = $conn->query($sql);
              ?>
              <select name="list_id" id="sim_voters_list" class="form-control">
                <?php
                foreach ($query as $key => $value) {
                ?>
                    <option value="<?php echo $value['list_id']; ?>"><?php echo $value['list_name']; ?>
                    </option>
                <?php 
                } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="sim_cand_list" class="col-sm-3 control-label">List Candidate</label>
            <div class="col-sm-9">
            <?php
              $sql = "SELECT * FROM `lists`";
              $query = $conn->query($sql);
              ?>
              <select name="sim_can_id"  id="sim_cand_list" class="form-control">
              <?php
                foreach ($query as $key => $value) {
                ?>
                    <option value="<?php echo $value['list_id']; ?>"><?php echo $value['list_candidate']; ?>
                    </option>
                <?php 
                } ?>
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="button" id="addVote" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit -->
<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Edit Voter</b></h4>
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
          <div class="form-group">
            <label for="edit_number_of_votes" class="col-sm-3 control-label">Number Of Votes</label>

            <div class="col-sm-9">
              <input type="number" class="form-control" id="edit_number_of_votes" name="edit_number_of_votes  " required>
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

<!-- Delete -->
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


<script>
  $(document).ready(function() {


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
          $('#sim_voters_main_district_id').val(response.main_district_id)
          $('#test').html(response.main_district_name)
        }
      });


    });



    $('#addVote').click(function() {
      var sim_voters_name = $('#sim_voters_name').val();
      var sim_voters_lastname = $('#sim_voters_lastname').val();
      var sim_voters_ethnicity = $('#sim_voters_ethnicity').val();
      var sim_voters_age = $('#sim_voters_age').val();
      var gender = $('#gender').val();
      var sim_voters_small_district = $('#sim_can_small_district11').val();
      var sim_voters_main_district = $('#sim_voters_main_district_id').val();
      var list_id = $('#sim_voters_list').val();
      var sim_can_id = $('#sim_cand_list').val();

      $.ajax({
        type: 'post',
        url: 'simulation_voter_add.php',
        data: {
          sim_voters_name: sim_voters_name,
          sim_voters_lastname: sim_voters_lastname,
          sim_voters_age: sim_voters_age,
          gender: gender,
          sim_voters_ethnicity: sim_voters_ethnicity,
          sim_voters_main_district: sim_voters_main_district,
          sim_voters_small_district: sim_voters_small_district,
          list_id: list_id,
          sim_can_id: sim_can_id,

        },
        dataType: 'json',
        success: function(response) {
      console.log(response);
        }
      });



    });

  });
</script>