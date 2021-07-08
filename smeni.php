<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Data</li>
        </ol>
    </div><!--/.row-->

    <br>

    <div class="row">
        <div class="col-lg-12">
            <div id="success"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Смени
                    
                </div>
                <div class="panel-body">
                  
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%"
                           id="rooms">
                        <thead>
                        <tr>
                            <th>Смени</th>
                            <th>От дата</th>
                            <th>До дата</th>
                            
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                       $connection = mysqli_connect("localhost","root","","bungalow");


$sql = "SELECT * FROM shift";
$result = mysqli_query($connection,$sql);
  while($row = $result-> fetch_assoc()) {
 ?>
    </tr>
    <td><?php echo $row["shift"] ?> </td>
    <td><?php echo $row["from_date"] ?> </td>
    <td><?php echo $row["to_date"] ?> </td>
  
    <?php
  } 
?>