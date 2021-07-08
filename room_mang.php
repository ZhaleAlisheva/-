<?php $conn = new mysqli("localhost", "root", "", "bungalow"); ?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="dist/jquery.tabledit.js"></script>
<script type="text/javascript" src="custom_table_edit.js"></script>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Data</li>
        </ol>
    </div>
    <!--/.row-->

    <br>

    <div class="row">
        <div class="col-lg-12">
            <div id="success">Data</div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Вид легла

                    <button class="btn btn-secondary pull-right" style="border-radius:0%" data-toggle="modal" data-target="#addRoom">Добави легло</button>
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error on Delete !
                            </div>";
                    }
                    if (isset($_GET['success'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully Delete !
                            </div>";
                    }
                    ?>
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%" id="rooms">
                        <thead>
                            <tr>
                                <th>Бунгало</th>
                                <th>Стаи</th>
                                <th>Брой лица в бунгало</th>
                                <th>Приведен брой легла</th>
                                <th>Санитарен възел</th>
                                <th>Хладилник</th>
                                <th>Нает</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                              <?php
                            $connection = mysqli_connect("localhost","root","","bungalow");


$sql = "SELECT * FROM bungalow_type";
$result = mysqli_query($connection,$sql);
  while($row = $result-> fetch_assoc()) {
 ?>
    </tr>
    <td><?php echo $row['bungalow_type_id'] ?></td>
                                    <td><?php echo $row['bungalow_type'] ?></td>
                                    <td><?php echo $row['max_person'] ?></td>
                                    <td><?php echo $row['max_beds'] ?></td>
                                    <td><?php echo $row['sanitary_node'] ?></td>
                                    <td><?php echo $row['fridge'] ?></td>
                                    <td>
                                        <?php if ($bungalow['status']) {
                                            echo 'Да';
                                        } else {
                                            echo 'Не';
                                        }

                                        ?>
                                    </td>
  
    <?php
  } 
?>
                          
                                    </td>
            

                                </tr>
                         
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Add Room Modal -->
    <div id="addRoom" class="modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal fade">&times;</button>
                    <h4 class="modal-title">Добави Бунгало</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="addRoom" data-toggle="validator" role="form" method="post">
                                <div class="response"></div>
                                <div class="form-group">
                                    <label>Избери бунгало</label>
                                    <select class="form-control" name="bungalow" required data-error="Select Room Type">
                                        <option selected disabled>Вид бунгало</option>
                                        <?php
                                        $query = "SELECT * FROM bungalow_type";
                                        $result = mysqli_query($conn, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($bungalow_type = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . $bungalow_type['bungalow_type_id'] . '">' . $bungalow_type['bungalow_type'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                    <?php
                                    if (isset($_POST['submit'])) {
                                        if (!empty($_POST['bungalow'])) {
                                            $bungalow_type = $_POST['bungalow'];
                                            $bungalow_id = rand(1, 1000);
                                            $sql = "INSERT INTO bungalow (bungalow_id, bungalow_type_id, `status`)VALUES ($bungalow_id, $bungalow_type, 0)";
                                            mysqli_query($conn, $sql);
                                        }
                                    }
                                    ?>
                                    <!-- <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Добави</button>
                                </div> -->
                            </form>
                            <a href="" class="btn btn-success pull-right" id="addButton">Добави</a>
                            <script>
                                var bungalow;
                                $(document).ready(function() {
                                    $("select.form-control").change(function() {
                                        bungalow = $(this).children("option:selected").val();
                                        var link = "add_query.php?id=" + bungalow;
                                            $("#addButton").attr("href", link);
                                    });
                                });
                            </script>
                            <script>
                          
                            </script>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--/.main-->