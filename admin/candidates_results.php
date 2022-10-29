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
        <li class="active">Candidates Results</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Candidate</th>
                  <th>ethnicity</th>
                  <th>percentage</th>   
                  <th>Winning status</th>
                  
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM simulation_candidate";
                    $wining;
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      if($row['number_of_votes']!=0){
                        $total = 250;
                        $portion=20;
                        $pre = ($row['number_of_votes']/$portion) * 100;
                        if($pre >= 15){
                          $wining = "yes";
                        }
                        else{
                          $wining = "no";
                        }
                      echo "
                        <tr>
                          <td>".$row['sim_can_name']."</td>
                          <td>".$row['sim_can_ethnicity']."</td>
                          <td>". $pre."</td>
                          <td>".$wining."</td>
                          
                          
                        </tr>
                      ";
                      }
                    }
                  ?>
                </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </section> 
    </div>
   <?php include 'includes/scripts.php'; ?>
  <?php include 'includes/footer.php'; ?>
  
</div>

</body>
</html>