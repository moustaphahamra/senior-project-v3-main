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
          <li class="active">Lists</li>
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
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <a href="#addnew2" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
              </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th class="hidden"></th>
                    <th>List Name</th>
                    <th>List Candidate</th>
                    <th>List's Small District</th>
                    <th>List's Main District</th>
                    <th>Number of predicted votes</th>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM lists";
                    $query = $conn->query($sql);
                    while ($row = $query->fetch_assoc()) {

                      echo "
                        <tr>
                          <td>" . $row['list_name'] . "</td>
                          <td>" . $row['list_candidate'] . "</td>
                          <td>" . $row['list_small_district'] . "</td>
                          <td>" . $row['list_main_district'] . "</td>
                          <td>" . $row['list_number_of_votes'] . "</td>
                          
                        </tr>
                      ";
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
    <?php include 'includes/list_modal.php'; ?>

    
  </div>

</body>

</html>