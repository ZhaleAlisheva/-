<?php $conn = new mysqli("localhost", "root", "", "bungalow"); ?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


<?php
if (isset($_GET['bungalow'])) {
    $get_bungalow_id = $_GET['bungalow_id'];
    $get_bungalow_sql = "SELECT * FROM bungalow NATURAL JOIN bungalow_type WHERE bungalow_id = '$get_bungalow_id'";
    $get_bungalow_result = mysqli_query($conn, $get_bungalow_sql);
    $get_bungalow = mysqli_fetch_assoc($get_bungalow_result);

    $get_bungalow_type_id = $get_bungalow['bungalow_type_id'];
    $get_bungalow_type = $get_bungalow['bungalow_type'];
    $get_bungalow_no = $get_bungalow['bungalow_no'];
    $get_price = $get_bungalow['price'];
}

?>



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Резервации</li>
        </ol>
    </div>
    <!--/.row-->

    <!-- <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Reservation</h1>
        </div>
    </div>/.row -->



    <div class="row">
        <div class="col-lg-12">
            <form role="form" id="booking" data-toggle="validator">
                <div class="response"></div>
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">Информация за бунгало:
                            <a class="btn btn-secondary pull-right" style="border-radius:0%" href="index.php?reservation">Replan Booking</a>
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label>Смяна</label>
                                <select class="form-control" id="bungalow_form" name="shift" required data-error="Select Bungalow Type">
                                    <option selected disabled>Избери смяна</option>
                                    <?php
                                    $query = "SELECT * FROM shift WHERE `status` = 0";
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($shift_id = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $shift['shift_id'] . '">' . $shift['shift_id'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                             <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label>Бунгало</label>
                                <select class="form-control" id="bungalow_form" name="bungalow_type" required data-error="Select Bungalow Type">
                                    <option selected disabled>Избери бунгало</option>
                                    <?php
                                    $query = "SELECT * FROM bungalow WHERE `status` = 0";
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($bungalow_type = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $bungalow_type['bungalow_type'] . '">' . $bungalow_type['bungalow_type'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                             <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label>Дни</label>
                                <select class="form-control" id="bungalow_form" name="bungalow_type" required data-error="Select Bungalow Type">
                                    <option selected disabled>Брой дни</option>
                                    <?php
                                    
                                        
                                    
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                             <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label>Категория</label>
                                <select class="form-control" id="bungalow_form" name="staff_type" required data-error="Select Bungalow Type">
                                    <option selected disabled>Избери категория</option>
                                    <?php
                                    $query = "SELECT * FROM bungalow NATURAL JOIN staff_type ";
                                    $result = mysqli_query($conn, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($staff_type = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $staff_type['category'] .'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>От дата</label>
                                <input type="date" id="start_date" name="booking-start" value="" min="2021-01-01" max="2022-12-31" data-error="Select Check In Date" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>До дата</label>
                                <input type="date" id="end_date" name="booking-end" value="" min="2021-06-22" max="2022-12-31" data-error="Select Check Out Date" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="col-lg-12">
                                <h4 style="font-weight: bold">Общо дни : <span id="staying_day"></span></h4>
                                <h4 style="font-weight: bold">Цена: <span id="price">0</span> /-</h4>
                                <h4 style="font-weight: bold">Общо : <span id="total_price">0</span> /-</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <script>
                let startDate;
                let endDate;
                var days;

                $('#start_date').on('change', function() {
                    startDate = $(this).val();

                    let startDay = new Date(startDate);
                    let endDay = new Date(endDate);
                    let millisecondsPerDay = 1000 * 60 * 60 * 24;

                    let millisBetween = endDay.getTime() - startDay.getTime();
                    days = millisBetween / millisecondsPerDay;

                    // Round down.
                    Math.floor(days);
                    $("#staying_day").text(days);

                    $('#end_date').prop('min', function() {
                        return startDate;
                    })
                });


                $('#end_date').on('change', function() {
                    endDate = $(this).val();
                    let startDay = new Date(startDate);
                    let endDay = new Date(endDate);
                    let millisecondsPerDay = 1000 * 60 * 60 * 24;

                    let millisBetween = endDay.getTime() - startDay.getTime();
                    days = millisBetween / millisecondsPerDay;

                    // Round down.
                    Math.floor(days);
                    $("#staying_day").text(days);
                    $('#start_date').prop('max', function() {
                        return endDate;
                    })
                });
            </script>
            <script>
                let bungalow;
                $(document).ready(function() {
                    $("select.form-control").change(function() {
                         bungalow = $(this).children("option:selected").val();
                        alert("You have selected the country - " + bungalow);
                    });
                });
            </script>


            <div class="panel panel-default">
                <div class="panel-heading col-lg-6">Детайли за клиент:</div>
                <div class="panel-body">
                    <div class="form-group col-lg-6">
                        <label>Име</label>
                        <input class="form-control" placeholder="First Name" id="first_name" data-error="Enter First Name" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Фамилия</label>
                        <input class="form-control" placeholder="Last Name" id="last_name">
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Номер</label>
                        <input type="number" class="form-control" data-error="Enter Min 10 Digit" data-minlength="10" placeholder="Contact No" id="contact_no" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-lg-6">
                        <label>ID Card Type</label>
                        <select class="form-control" id="id_card_id" data-error="Select ID Card Type" required onchange="validId(this.value);">
                            <option selected disabled>Select ID Card Type</option>
                            <?php
                            $query  = "SELECT * FROM id_card_type";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($id_card_type = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $id_card_type['id_card_type_id'] . '">' . $id_card_type['id_card_type'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Selected ID Card Number</label>
                        <input type="text" class="form-control" placeholder="ID Card Number" id="id_card_no" data-error="Enter Valid ID Card No" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-lg-12">
                        <label>Residential Address</label>
                        <input type="text" class="form-control" placeholder="Full Address" id="address" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-lg btn-success pull-right" style="border-radius:0%">Submit</button>
        </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <p class="back-link">Development by Zhale Alisheva</p>
    </div>
</div>

</div>
<!--/.main-->


<!-- Booking Confirmation-->
<div id="bookingConfirm" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center"><b>Bungalow Booking</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert bg-success alert-dismissable" role="alert"><em class="fa fa-lg fa-check-circle">&nbsp;</em>Bungalow Successfully Booked</div>
                        <table class="table table-striped table-bordered table-responsive">
                            <!-- <thead>
                            <tr>
                                <th>Name</th>
                                <th>Detail</th>
                            </tr>
                            </thead> -->
                            <tbody>
                                <tr>
                                    <td><b>Customer Name</b></td>
                                    <td id="getCustomerName"></td>
                                </tr>
                                <tr>
                                    <td><b>Room Type</b></td>
                                    <td id="getRoomType"></td>
                                </tr>
                                <tr>
                                    <td><b>Room No</b></td>
                                    <td id="getRoomNo"></td>
                                </tr>
                                <tr>
                                    <td><b>Check In</b></td>
                                    <td id="getCheckIn"></td>
                                </tr>
                                <tr>
                                    <td><b>Check Out</b></td>
                                    <td id="getCheckOut"></td>
                                </tr>
                                <tr>
                                    <td><b>Total Amount</b></td>
                                    <td id="getTotalPrice"></td>
                                </tr>
                                <tr>
                                    <td><b>Payment Status</b></td>
                                    <td id="getPaymentStaus"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" style="border-radius:60px;" href="index.php?reservation"><i class="fa fa-check-circle"></i></a>
            </div>
        </div>

    </div>
</div>