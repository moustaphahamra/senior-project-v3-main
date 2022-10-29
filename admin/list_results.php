<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <div class="content-wrapper">

      <section class="content-header">
        <h1>
          Tool
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Lists Results</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
          unset($_SESSION['success']);
        }
        ?>
        <div class="row">


          <?php
          $array_index = 1;

          $list_name_array = array("");

          $sql2 = "SELECT DISTINCT list_name FROM `lists`";
          $query2 = $conn->query($sql2);
          while ($row2 = $query2->fetch_assoc()) {
            array_push($list_name_array, $row2['list_name']);
          }


          $can_name_array = array();
          $sql6 = "SELECT DISTINCT list_candidate FROM `lists`";

          $query6 = $conn->query($sql6);

          while ($row6 = $query6->fetch_assoc()) {
            array_push($can_name_array, $row6['list_candidate']);
          }

          $indexx = 0;


          $sql = "SELECT  `list_candidate`, `list_number_of_votes`, `list_name` FROM `lists`"; //list_name

          // select * from lists group by list_name
          $query = $conn->query($sql);
          while ($row = $query->fetch_assoc()) {
            if($list_name_array[$array_index] == $row['list_name']) {
          ?>


              <div class="col-xs-4">
                <div class="box">
                  <div class="box-body">

                    <div class="panel panel-default">
                      <!-- Default panel contents -->
                      <div class="panel-heading">

                        <table class="table">
                          <td spacing="90">
                            <?php echo $row["list_name"] ?>
                          </td>
                          <td spacing="10">
                            <?php echo $row["list_number_of_votes"] ?>

                          </td>
                        </table>
                      </div>
                      <!-- Table -->
                      <table class="table">

                        <?php

                      
                       

                    
                        $sql1 = "SELECT * FROM `lists` inner JOIN simulation_candidate on list_candidate = sim_can_id";
                        $query1 = $conn->query($sql1);
                        $row1 = $query1->fetch_assoc();
                        // for($indexx;$indexx<=count($can_name_array);$indexx++){
                      
                        ?>
                            <tr>


                              <th>
                                <?php echo  $row['list_candidate'] ?>
                              </th>
                              <th>
                                <?php echo $row1["number_of_votes"] ?>
                              </th>


                            </tr>


                      </table>


                    </div>

                  </div>
                </div>
              </div>
          <?php }
            $array_index++;
          } ?>


        </div>
      </section>
    </div>
    <?php include 'includes/scripts.php'; ?>
    <?php include 'includes/footer.php'; ?>

  </div>

</body>

</html>