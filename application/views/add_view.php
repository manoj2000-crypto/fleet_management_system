<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .divButton {
            text-align: center;
            margin-top: 20px;
        }

        .divButton a {
            color: black;
            /* Set the color of the links */
            text-decoration: none;
        }

        .divTable {
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: #ffffff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #0056b3;
        }

        button {
            margin: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #bd2130;
        }
    </style>
    <script>

        function downloadExcel() {
            // Select the table excluding the Edit and Delete columns
            var table = document.getElementById("incidentTable");
            var rows = table.querySelectorAll("tr");

            var headerData = Array.from(table.querySelectorAll("th")).slice(0, -2).map(th => th.innerText.trim());
            var jsonData = [headerData];

            // Iterate through rows and cells to build the JSON data
            for (var i = 1; i < rows.length; i++) {
                var cells = rows[i].querySelectorAll("td");
                var rowData = [];

                // Exclude columns with indices 12 (Edit) and 13 (Delete)
                for (var j = 0; j < cells.length; j++) {
                    if (j !== 12 && j !== 13) {
                        rowData.push(cells[j].innerText.trim());
                    }
                }

                jsonData.push(rowData);
            }

            // Create a workbook with a worksheet from the JSON data
            var wb = XLSX.utils.book_new();
            var ws = XLSX.utils.json_to_sheet(jsonData, { skipHeader: true });

            // Add the worksheet to the workbook
            XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

            // Save the workbook as an Excel file
            XLSX.writeFile(wb, 'incident_data.xlsx');
        }

        function confirmDelete(id) {
            var confirmDelete = confirm("Are you sure you want to delete?");
            if (confirmDelete) {
                window.location.href = "<?= base_url() ?>Vehical_Incident_Tracker/delete/" + id;
            }
        }
        function openEditView(action) {
            if (action === 'add') {
                // Redirect to edit_view.php with the 'add' action
                window.location.href = "<?= base_url() ?>Vehical_Incident_Tracker/new_view";
            } else {
                window.location.href = "<?= base_url() ?>Vehical_Incident_Tracker/edit/" + action;
            }
        }
    </script>
    <title>Add Vehical Incident</title>
</head>

<body>
    <div class="container">
        <div class="divButton">
            <button type="button" class="btn btn-primary" onclick="openEditView('add')"> Add </button>
            <button type="button" class="btn btn-success" onclick="downloadExcel()"> Download Excel Report </button>
        </div>
        <hr>
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
                <?php
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
                        <td> <a href="#" onclick="openEditView(<?= $row['id'] ?>)" class="btn btn-info"> Edit
                            </a> </td>
                        <td> <a href="#" onclick="confirmDelete(<?= $row['id'] ?>)" class="btn btn-delete"> Delete </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>