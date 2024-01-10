<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title> Add </title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .divHeader {
            text-align: center;
            margin-top: 20px;
        }

        .container {
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            padding: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="text"]:focus {
            border-color: #007bff;
        }

        button {
            width: 100%;
            padding: 10px;
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
    </style>
</head>

<body>
    <div class="divHeader">
        <h2> Add </h2>
    </div>
    <hr>
    <div class="container">
        <form action="<?= base_url() ?>Vehical_Incident_Tracker/add_vit" method="post">

            <label for="IncidentType"> Incident Type </label><input type="text" name="IncidentType" id="IncidentType"
                class="form-control" required> <br>

            <label for="IncidentLocation"> Incident Location </label> <input type="text" name="IncidentLocation"
                id="IncidentLocation" class="form-control" required> <br>

            <label for="incidenttime"> Incident Time </label> <input type="datetime-local" name="incidenttime" id="incidenttime"
                class="form-control" required> <br>

            <label for="AffectedPart"> Affected Part </label> <input type="text" name="AffectedPart" id="AffectedPart"
                class="form-control" required> <br>

            <label for="Vehicleno"> Vehicle No </label> <input type="text" name="Vehicleno" id="Vehicleno"
                class="form-control" required> <br>

            <label for="DriverName"> Driver Name </label> <input type="text" name="DriverName" id="DriverName"
                class="form-control" required> <br>

            <label for="Assignedperson"> Assigned Person </label> <input type="text" name="Assignedperson"
                id="Assignedperson" class="form-control" required> <br>

            <label for="CosttoIncident"> Cost To Incident </label> <input type="text" name="CosttoIncident"
                id="CosttoIncident" class="form-control" required> <br>

            <label for="Correctiveaction"> Corrective Action </label> <input type="text" name="Correctiveaction"
                id="Correctiveaction" class="form-control" required> <br>

            <label for="WorkCompletedateandtime"> Work Complete Date And Time </label> <input type="datetime-local"
                name="WorkCompletedateandtime" id="WorkCompletedateandtime" class="form-control" required> <br>

            <label for="Remarkindetails"> Remark in Details </label> <input type="text" name="Remarkindetails"
                id="Remarkindetails" class="form-control" required> <br>

            <button type="submit" class="btn btn-primary"> Add </button> <br>

        </form>
    </div>
</body>

</html>