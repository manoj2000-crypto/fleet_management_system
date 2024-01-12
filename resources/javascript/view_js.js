function checkReset()
{
	document.getElementById("IncidentType").value = '';
    document.getElementById("IncidentLocation").value = '';
    document.getElementById("incidenttime").value = '';
    document.getElementById("AffectedPart").value = '';
    document.getElementById("Vehicleno").value = '';
    document.getElementById("DriverName").value = '';
    document.getElementById("Assignedperson").value = '';
    document.getElementById("CosttoIncident").value = '';
    document.getElementById("Correctiveaction").value = '';
    document.getElementById("WorkCompletedateandtime").value = '';
    document.getElementById("Remarkindetails").value = '';
    toastr.clear();
}

function isValidNumberInput(inputField) {
	// Allow only numbers
	var regex = /^[0-9]+$/;

	return regex.test(inputField.value);
}

function validateNumberInputOnBlur(inputFieldId) {
	var inputField = document.getElementById(inputFieldId);

	if (!isValidNumberInput(inputField)) {
		toastr.error("Invalid input. Only numbers are allowed.");
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
		toastr.error(
			"Invalid input. Only letters, spaces, and underscores are allowed."
		);
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
	var vehicleNumber = document.getElementById("Vehicleno").value;

	if (!validateVehicleNumber(vehicleNumber)) {
		toastr.error("Invalid Vehicle Number");
	} else {
		toastr.clear(); // Clear any existing toastr messages
	}
}

function validateForm() {
    const form = document.getElementById("formId");

    if (form.reset) {
        toastr.clear();
        return true;
    }

	var incidentTypeValid = isValidInput("IncidentType");
	var incidentLocationValid = isValidInput("IncidentLocation");
	var affectedPartValid = isValidInput("AffectedPart");

	var vehicleNumber = document.getElementById("Vehicleno").value;
	var vehicleNumberValid = validateVehicleNumber(vehicleNumber);

	var driverNameValid = isValidInput("DriverName");
	var assignedPersonValid = isValidInput("Assignedperson");
	var costtoIncidentValid = isValidInput("CosttoIncident");
	var correctiveActionValid = isValidInput("Correctiveaction");
	var RemarkindetailsValid = isValidInput("Remarkindetails");

	var formValid =
		incidentTypeValid &&
		incidentLocationValid &&
		affectedPartValid &&
		vehicleNumberValid &&
		driverNameValid &&
		assignedPersonValid &&
		costtoIncidentValid &&
		correctiveActionValid &&
		RemarkindetailsValid;

	if (!formValid) {
		toastr.error("Please correct the invalid fields.");
		return false; // Prevent form submission
	}

	if (!validateVehicleNumber(vehicleNumber)) {
		toastr.error("Invalid Vehicle Number");
		return false; // Prevent form submission
	}

	if (!isValidNumberInput(costtoIncidentValid)) {
		toastr.error("Invalid Cost To Incident. Only numbers are allowed.");
		return false; // Prevent form submission
	}

	toastr.clear(); // Clear any existing toastr messages
	return true; // Allow form submission
}
