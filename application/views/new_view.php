<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>./resources/css/new_view_css.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="<?= base_url() ?>./resources/javascript/view_js.js"></script>

    <title> Add </title>

</head>

<body>
    <div class="divHeader">
        <h2> Add </h2>
    </div>
    <hr>
    <div class="container">
        <form action="<?= base_url() ?>Vehical_Incident_Tracker/add_vit" method="post" onsubmit="return validateForm()">

            <label for="IncidentType"> Incident Type </label><input type="text" name="IncidentType" id="IncidentType"
                class="form-control" oninput="validateTextFieldOnInput('IncidentType')" required> <br>

            <label for="IncidentLocation"> Incident Location </label> <input type="text" name="IncidentLocation"
                id="IncidentLocation" class="form-control" oninput="validateTextFieldOnInput('IncidentLocation')"
                required> <br>

            <label for="incidenttime"> Incident Time </label> <input type="datetime-local" name="incidenttime"
                id="incidenttime" class="form-control" required> <br>

            <label for="AffectedPart"> Affected Part </label> <input type="text" name="AffectedPart" id="AffectedPart"
                class="form-control" oninput="validateTextFieldOnInput('AffectedPart')" required> <br>

            <label for="Vehicleno"> Vehicle No </label> <input type="text" name="Vehicleno" id="Vehicleno"
                class="form-control" onblur="validateVehicleNumberOnBlur()" required> <br>

            <label for="DriverName"> Driver Name </label> <input type="text" name="DriverName" id="DriverName"
                class="form-control" oninput="validateTextFieldOnInput('DriverName')" required> <br>

            <label for="Assignedperson"> Assigned Person </label> <input type="text" name="Assignedperson"
                id="Assignedperson" class="form-control" oninput="validateTextFieldOnInput('Assignedperson')" required>
            <br>

            <label for="CosttoIncident"> Cost To Incident </label> <input type="number" name="CosttoIncident"
                id="CosttoIncident" class="form-control" onblur="validateNumberInputOnBlur('CosttoIncident')" required>
            <br>

            <label for="Correctiveaction"> Corrective Action </label> <input type="text" name="Correctiveaction"
                id="Correctiveaction" class="form-control" oninput="validateTextFieldOnInput('Correctiveaction')"
                required> <br>

            <label for="WorkCompletedateandtime"> Work Complete Date And Time </label> <input type="datetime-local"
                name="WorkCompletedateandtime" id="WorkCompletedateandtime" class="form-control" required> <br>

            <label for="Remarkindetails"> Remark in Details </label> <input type="text" name="Remarkindetails"
                id="Remarkindetails" class="form-control" oninput="validateTextFieldOnInput('Remarkindetails')"
                required> <br>

            <button type="submit" class="btn btn-primary me-2 mb-2"> Add </button> 
            <button type="reset" class="btn btn-secondary me-2 mb-2"> Reset </button> 
            <br>

        </form>
    </div>
</body>

</html>