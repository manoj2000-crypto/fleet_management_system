<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>./resources/css/edit_view_css.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="<?= base_url() ?>./resources/javascript/view_js.js"></script>

    <title> Update </title>
</head>

<body>
    <div class="divHeader">
        <h2> Update </h2>
    </div>
    <hr>
    <div class="container">
        <form action="<?= base_url() ?>Vehical_Incident_Tracker/update_vit" method="post"
            onsubmit="return validateForm()" id="formId">
            <input type="hidden" name="id" value="<?= isset($incident['id']) ? $incident['id'] : '' ?>">
            <label for="IncidentType"> Incident Type </label><input type="text" name="IncidentType" id="IncidentType"
                class="form-control" oninput="validateTextFieldOnInput('IncidentType')"
                value="<?= isset($incident['IncidentType']) ? $incident['IncidentType'] : '' ?>" required> <br>

            <label for="IncidentLocation"> Incident Location </label> <input type="text" name="IncidentLocation"
                id="IncidentLocation" class="form-control" oninput="validateTextFieldOnInput('IncidentLocation')"
                value="<?= isset($incident['IncidentLocation']) ? $incident['IncidentLocation'] : '' ?>" required> <br>

            <label for="incidenttime"> Incident Time </label> <input type="datetime-local" name="incidenttime"
                id="incidenttime" class="form-control"
                value="<?= isset($incident['incidenttime']) ? $incident['incidenttime'] : '' ?>" required> <br>

            <label for="AffectedPart"> Affected Part </label> <input type="text" name="AffectedPart" id="AffectedPart"
                class="form-control" oninput="validateTextFieldOnInput('AffectedPart')"
                value="<?= isset($incident['AffectedPart']) ? $incident['AffectedPart'] : '' ?>" required> <br>

            <label for="Vehicleno"> Vehicle No </label> <input type="text" name="Vehicleno" id="Vehicleno"
                class="form-control" onblur="validateVehicleNumberOnBlur()"
                value="<?= isset($incident['Vehicleno']) ? $incident['Vehicleno'] : '' ?>" required> <br>

            <label for="DriverName"> Driver Name </label> <input type="text" name="DriverName" id="DriverName"
                class="form-control" oninput="validateTextFieldOnInput('DriverName')"
                value="<?= isset($incident['DriverName']) ? $incident['DriverName'] : '' ?>" required> <br>

            <label for="Assignedperson"> Assigned Person </label> <input type="text" name="Assignedperson"
                id="Assignedperson" class="form-control" oninput="validateTextFieldOnInput('Assignedperson')"
                value="<?= isset($incident['Assignedperson']) ? $incident['Assignedperson'] : '' ?>" required> <br>

            <label for="CosttoIncident"> Cost To Incident </label> <input type="text" name="CosttoIncident"
                id="CosttoIncident" class="form-control" onblur="validateNumberInputOnBlur('CosttoIncident')"
                value="<?= isset($incident['CosttoIncident']) ? $incident['CosttoIncident'] : '' ?>" required> <br>

            <label for="Correctiveaction"> Corrective Action </label> <input type="text" name="Correctiveaction"
                id="Correctiveaction" class="form-control" oninput="validateTextFieldOnInput('Correctiveaction')"
                value="<?= isset($incident['Correctiveaction']) ? $incident['Correctiveaction'] : '' ?>" required> <br>

            <label for="WorkCompletedateandtime"> Work Complete Date And Time </label> <input type="datetime-local"
                name="WorkCompletedateandtime" id="WorkCompletedateandtime" class="form-control"
                value="<?= isset($incident['WorkCompletedateandtime']) ? $incident['WorkCompletedateandtime'] : '' ?>"
                required> <br>

            <label for="Remarkindetails"> Remark in Details </label> <input type="text" name="Remarkindetails"
                id="Remarkindetails" class="form-control" oninput="validateTextFieldOnInput('Remarkindetails')"
                value="<?= isset($incident['Remarkindetails']) ? $incident['Remarkindetails'] : '' ?>" required> <br>

            <button type="submit" class="btn btn-primary me-2 mb-2"> Update </button> 
            <button type="reset" name="reset" value="reset" id="reset-btn" class="btn btn-secondary me-2 mb-2"> Reset </button> 
            <br>

        </form>
    </div>
</body>

</html>