function isValidNumberInput(inputField) {
    // Allow only numbers
    var regex = /^[0-9]+$/;

    return regex.test(inputField.value);
}

function validateNumberInputOnBlur(inputFieldId) {
    var inputField = document.getElementById(inputFieldId);

    if (!isValidNumberInput(inputField)) {
        toastr.error('Invalid input. Only numbers are allowed.');
    } else {
        toastr.clear(); // Clear any existing toastr messages
    }
}

function isValidInput(inputField) {
    // Allow only letters, spaces, and underscores
    var regex = /^[A-Za-z\s_]+$/;
    return regex.test(inputField.value);
}

function validateTextFieldOnInput(inputFieldId) {
    var inputField = document.getElementById(inputFieldId);

    if (!isValidInput(inputField)) {
        toastr.error('Invalid input. Only letters, spaces, and underscores are allowed.');
    } else {
        toastr.clear(); // Clear any existing toastr messages
    }
}

function validateVehicleNumber(vehicleNumber) {
    // Regular expression for Indian vehicle number plate
    var regex = /^[A-Z]{2}[ -][0-9]{1,2}(?: [A-Z])?(?: [A-Z]*)? [0-9]{4}$/;

    return regex.test(vehicleNumber);
}

function validateVehicleNumberOnBlur() {
    var vehicleNumber = document.getElementById('Vehicleno').value;

    if (!validateVehicleNumber(vehicleNumber)) {
        toastr.error('Invalid Vehicle Number');
    } else {
        toastr.clear(); // Clear any existing toastr messages
    }
}

function validateForm() {
    var incidentTypeValid = validateTextField('IncidentType');
    var incidentLocationValid = validateTextField('IncidentLocation');
    var affectedPartValid = validateTextField('AffectedPart');
    
    var vehicleNumber = document.getElementById('Vehicleno').value;
    var vehicleNumberValid = validateVehicleNumber(vehicleNumber);

    var driverNameValid = validateTextField('DriverName');
    var assignedPersonValid = validateTextField('Assignedperson');
    var costtoIncidentValid = validateTextField('CosttoIncident');
    var correctiveActionValid = validateTextField('Correctiveaction');
    var RemarkindetailsValid = validateTextField('Remarkindetails');

    if (incidentTypeValid && incidentLocationValid && affectedPartValid && vehicleNumberValid && driverNameValid && assignedPersonValid && costtoIncidentValid && correctiveActionValid && RemarkindetailsValid) {
        toastr.clear(); 
        return true; // Allow form submission
    }
    else {
        return false; // Prevent form submission
    }

    if (!validateVehicleNumber(vehicleNumber)) {
        toastr.error('Invalid Vehicle Number');
        return false; // Prevent form submission
    } else {
        toastr.clear(); // Clear any existing toastr messages
        return true; // Allow form submission
    }

    if (!isValidNumberInput(costtoIncidentValid)) {
        toastr.error('Invalid Cost To Incident. Only numbers are allowed.');
        return false; // Prevent form submission
    } else {
        toastr.clear(); // Clear any existing toastr messages
        return true; // Allow form submission
    }
}