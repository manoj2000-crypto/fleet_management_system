<!--
    Name : Manoj Madhavrao Kale
    Employee ID : PNA2525
    File : View
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- Coustom css link for this file-->
    <link rel="stylesheet" href="<?= base_url() ?>./resources/css/add_view_css.css">

    <!-- Javascript link for using the excel laibraries. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script src="<?= base_url() ?>./resources/javascript/add_view_js.js"></script>
    
    <title>Add Vehical Incident</title>
</head>

<body>
    <div class="container">
        <div class="divButton">
            <!--Add button-->
            <button type="button" class="btn btn-primary" onclick="openEditView('add')"> Add <img
                    src="<?php echo base_url('resources/images/pen.png'); ?>" alt="edit_image" class="img-circle">
            </button>

            <!-- Download Excel sheet button -->
            <button type="button" class="btn btn-success" onclick="downloadExcel()"> Download Excel Report <img
                    src="<?php echo base_url('resources/images/excel.png'); ?>" alt="excel_image" class="img-circle">
            </button>
        </div>
        <hr> <!-- Horizontal line -->
        <!-- Container for table. -->
        <div class="divTable table-container"> 
            <table id="incidentTable" class="table table-bordered table-hover">
                <tr class="thead-dark">
                    <th>ID</th>
                    <th>Incident Type</th>
                    <th>Incident Location</th>
                    <th>Incident Time</th>
                    <th>Affected Part</th>
                    <th>Vehicle No</th>
                    <th>Driver Name</th>
                    <th>Assigned Person</th>
                    <th>Cost To Incident</th>
                    <th>Corrective Action</th>
                    <th>Work Complete Date And Time</th>
                    <th>Remark in Details</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php //Using the foreach loop to get the data from the database one by one.
                foreach ($lists as $key => $row) {
                    ?>
                    <tr>
                        <td>
                            <?= $key + 1 ?>
                        </td>
                        <td>
                            <?= $row['IncidentType'] ?>
                        </td>
                        <td>
                            <?= $row['IncidentLocation'] ?>
                        </td>
                        <td>
                            <?= $row['incidenttime'] ?>
                        </td>
                        <td>
                            <?= $row['AffectedPart'] ?>
                        </td>
                        <td>
                            <?= $row['Vehicleno'] ?>
                        </td>
                        <td>
                            <?= $row['DriverName'] ?>
                        </td>
                        <td>
                            <?= $row['Assignedperson'] ?>
                        </td>
                        <td>
                            <?= $row['CosttoIncident'] ?>
                        </td>
                        <td>
                            <?= $row['Correctiveaction'] ?>
                        </td>
                        <td>
                            <?= $row['WorkCompletedateandtime'] ?>
                        </td>
                        <td>
                            <?= $row['Remarkindetails'] ?>
                        </td>

                        <!--Edit button for each row -->
                        <td> <button type="button" class="btn btn-info" onclick="openEditView(<?= $row['id'] ?>)"> Edit <img
                                    src="<?php echo base_url('resources/images/pen.png'); ?>" alt="" class="img-circle">
                            </button> </td>

                        <!--delete button for each row -->
                        <td> <button type="button" class="btn btn-delete" onclick="confirmDelete(<?= $row['id'] ?>)"> Delete
                                <img src="<?php echo base_url('resources/images/bin.png'); ?>" alt="" class="img-circle">
                            </button> </td>
                    </tr>
                    <?php
                }//End of foreach loop here.
                ?>
            </table>
        </div> <!--End of table container-->
    </div> <!--End of Parent container-->
</body>

</html>