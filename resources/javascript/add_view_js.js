function downloadExcel() {
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
        window.location.href = "http://localhost/fleet_management_system/Vehical_Incident_Tracker/delete/" + id;
    }
}
function openEditView(action) {
    if (action === 'add') {
        // Redirect to edit_view.php with the 'add' action
        window.location.href = "http://localhost/fleet_management_system/Vehical_Incident_Tracker/new_view";
    } else {
        window.location.href = "http://localhost/fleet_management_system/Vehical_Incident_Tracker/edit/" + action;
    }
}