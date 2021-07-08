<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        
            <li class="active">Регистър</li>
        </ol>
    </div>
    <!--/.row-->




    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Регистър:
                   <a class="btn btn-secondary pull-right" href="index.php?room_mang">Смяна</a>
                </div>
                <div class="panel-body">
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error on Shift Change !
                            </div>";
                    }
                    if (isset($_GET['success'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Shift Successfully Changed!
                            </div>";
                    }
                    ?>
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="90% height="500px"
                           id="rooms">
                        <thead>
                        <tr>
                            <th>Бунгало</th>
                            <th>Ред. No</th>
                            <th>Смяна</th>
                            <th>Брой дни</th>
                            <th>От дата</th>
                            <th>До дата</th>
                            <th>Име</th>
                            <th>Категория</th>
                            <th>Легло</th>
                            <th>Код на плащане</th>
                            <th>Цена за една смяна/нощувка</th>
                            <th>Цена за всички нощувки</th>
                            <th>Общо такси без ДДС</th>
                            <th>Общо такси с ДДС</th>
                            <th>Платено</th>
                            <th>На дата</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        //$staff_query = "SELECT * FROM staff  JOIN staff_type JOIN shift ON staff.staff_type_id =staff_type.staff_type_id ON shift.";
                        $staff_query = "SELECT * FROM   NATURAL JOIN  NATURAL JOIN ";
                        $staff_result = mysqli_query($conn, $staff_query);

                        if (mysqli_num_rows($staff_result) > 0) {
                            while ($staff = mysqli_fetch_assoc($staff_result)) { ?>
                                <tr>

                                    <td><?php echo $staff['']; ?></td>
                                    <td><?php echo $staff['']; ?></td>
                                    <td><?php echo $staff['']; ?></td>
                                    <td><?php echo $staff[''] . ' - ' . $staff['']; ?></td>
                                    <td><?php echo date('M j, Y', strtotime($staff[''])); ?></td>
                                    
                                    <td>
                                        <button class="btn btn-warning" style="border-radius:0%" data-toggle="modal" data-target="#changeShift"
                                                data-id="<?php echo $staff['emp_id']; ?>" id="change_shift">Change Shift</button>
                                    </td>
                                    <td>

                                        <button data-toggle="modal"
                                                data-target="#empDetail<?php echo $staff['emp_id']; ?>"
                                                data-id="<?php echo $staff['emp_id']; ?>" id="editEmp"
                                                class="btn btn-info" style="border-radius:60px;"><i class="fa fa-pencil"></i></button>
                                        <a href='functionmis.php?empid=<?php echo $staff['emp_id']; ?>'
                                           class="btn btn-danger" onclick="return confirm('Are you Sure?')" style="border-radius:60px;"><i
                                                    class="fa fa-trash"></i></a>
                                        <a href='index.php?emp_history&empid=<?php echo $staff['emp_id']; ?>'
                                           class="btn btn-success" title="Employee Histery" style="border-radius:60px;"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>


                                <?php
                            }
                        }
                        ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
        <p class="back-link">Developed By Zhale Alisheva</p>
        </div>
    </div>

</div>    <!--/.main-->

<?php
//$staff_query = "SELECT * FROM staff  JOIN staff_type JOIN shift ON staff.staff_type_id =staff_type.staff_type_id ON shift.";
$staff_query = "SELECT * FROM staff  NATURAL JOIN staff_type NATURAL JOIN shift";
$staff_result = mysqli_query($conn, $staff_query);

if (mysqli_num_rows($staff_result) > 0) {
    while ($staffGlobal = mysqli_fetch_assoc($staff_result)) {
        $fullname = explode(" ", $staffGlobal['emp_name']);
        ?>

        <!-- Employee Detail-->
        <div id="empDetail<?php echo $staffGlobal['emp_id']; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Employee Detail</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Employee Detail:</div>
                                    <div class="panel-body">
                                        <form data-toggle="validator" role="form" action="functionmis.php"
                                              method="post">
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <label>Staff</label>
                                                    <select class="form-control" id="staff_type" name="staff_type_id"
                                                            required>
                                                        <option selected disabled>Select Staff Type</option>
                                                        <?php
                                                        $query = "SELECT * FROM staff_type";
                                                        $result = mysqli_query($conn, $query);
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($staff = mysqli_fetch_assoc($result)) {
                                                                //  echo '<option value=" ' . $staff['staff_type_id'] . ' "  selected  >' . $staff['staff_type'] . '</option>';
                                                                echo '<option value="' . $staff['staff_type_id'] . '" ' . (($staff['staff_type_id'] == $staffGlobal['staff_type_id']) ? 'selected="selected"' : "") . '>' . $staff['staff_type'] . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <select style="visibility: hidden;" class="form-control" id="shift" name="shift_id" required>
                                                        <option selected disabled>Select Staff Type</option>
                                                        <?php
                                                        $query = "SELECT * FROM shift";
                                                        $result = mysqli_query($conn, $query);
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($shift = mysqli_fetch_assoc($result)) {
                                                                // echo '<option value="' . $shift['shift_id'] . '">' . $shift['shift'] . ' - ' . $shift['shift_timing'] . '</option>';
                                                                echo '<option value="' . $shift['shift_id'] . '" ' . (($shift['shift_id'] == $staffGlobal['shift_id']) ? 'selected="selected"' : "") . '>' . $shift['shift_timing'] . '</option>';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <input type="hidden" value="<?php echo $staffGlobal['emp_id']; ?>"
                                                       id="emp_id" name="emp_id">

                                                <div class="form-group col-lg-6">
                                                    <label>First Name</label>
                                                    <input type="text" value="<?php echo $fullname[0]; ?>"
                                                           class="form-control" placeholder="First Name" id="first_name"
                                                           name="first_name" required>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label>Last Name</label>
                                                    <input type="text" value="<?php echo $fullname[1]; ?>"
                                                           class="form-control" placeholder="Last Name" id="last_name"
                                                           name="last_name" required>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label>ID Card Type</label>
                                                    <select class="form-control" id="id_card_id" name="id_card_type"
                                                            required>
                                                        <option selected disabled>Select ID Card Type</option>
                                                        <?php
                                                        $query = "SELECT * FROM id_card_type";
                                                        $result = mysqli_query($conn, $query);

                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($id_card_type = mysqli_fetch_assoc($result)) {
                                                                //  echo '<option value="' . $id_card_type['id_card_type_id'] . '">' . $id_card_type['id_card_type'] . '</option>';
                                                                echo '<option  value="' . $id_card_type['id_card_type_id'] . '" ' . (($id_card_type['id_card_type_id'] == $staffGlobal['id_card_type']) ? 'selected="selected"' : "") . '>' . $id_card_type['id_card_type'] . '</option>';
                                                            }
                                                        }

                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label>ID Card No</label>
                                                    <input type="text" class="form-control" placeholder="ID Card No"
                                                           id="id_card_no"
                                                           value="<?php echo $staffGlobal['id_card_no']; ?>"
                                                           name="id_card_no" required>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label>Contact Number</label>
                                                    <input type="number" class="form-control"
                                                           placeholder="Contact Number" id="contact_no"
                                                           value="<?php echo $staffGlobal['contact_no']; ?>"
                                                           name="contact_no" required>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" placeholder="address"
                                                           id="address" value="<?php echo $staffGlobal['address']; ?>"
                                                           name="address">
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label>Salary</label>
                                                    <input type="number" class="form-control" placeholder="Salary"
                                                           id="salary" value="<?php echo $staffGlobal['salary']; ?>"
                                                           name="salary" required>
                                                </div>

                                            </div>

                                            <button type="submit" class="btn btn-lg btn-primary" name="submit">Потвърди
                                            </button>
                                            <button type="reset" class="btn btn-lg btn-danger">Нулирай</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Employee Detail-->
        <div id="changeShift" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Change Shift</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form data-toggle="validator" role="form" action="ajax.php" method="post">
                                            <div class="row">
                                            <div class="form-group col-lg-12">
                                                <label>Shift</label>
                                                <select class="form-control" id="shift" name="shift_id" required>
                                                    <option selected disabled>Select Staff Type</option>
                                                    <?php
                                                    $query = "SELECT * FROM shift";
                                                    $result = mysqli_query($conn, $query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($shift = mysqli_fetch_assoc($result)) {
                                                            // echo '<option value="' . $shift['shift_id'] . '">' . $shift['shift'] . ' - ' . $shift['shift_timing'] . '</option>';
                                                            echo '<option value="' . $shift['shift_id'] . '" ' . (($shift['shift_id'] == $staffGlobal['shift_id']) ? 'selected="selected"' : "") . '>' . $shift['shift_timing'] . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            </div>
                                            <input type="hidden" name="emp_id" value="" id="getEmpId">
                                            <button type="submit" class="btn btn-lg btn-primary" name="change_shift">Потвърди</button>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>
        <?php
    }
}