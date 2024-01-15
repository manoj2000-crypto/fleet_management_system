<!--
    Name : Manoj Madhavrao Kale
    Employee ID : PNA2525
    File : Controller
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- This below links is used here to use the toastr in the files to show toastr messages-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

</html>

<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Controller class that will handle all the logic.
class Vehical_Incident_Tracker extends CI_Controller
{
    //This method will load the view and this view responsible for adding the vehical incident.
    public function new_view()
    {
        $this->load->view('new_view');
    }

    //This method will get all the data from model and load the default view.
    public function index()
    {
        $this->load->model('Vehical_Incident_Tracker_Model');
        $data['lists'] = $this->Vehical_Incident_Tracker_Model->get_data();
        $this->load->view('add_view', $data);
    }

    /*
        This method will get the data from form and store it into array, 
        then it will call the add method from model to add the stored values into database 
        and redirect to default method or default view. 
    */
    public function add_vit()
    {
        $data = array(
            'IncidentType' => $this->input->post('IncidentType'),
            'IncidentLocation' => $this->input->post('IncidentLocation'),
            'incidenttime' => $this->input->post('incidenttime'),
            'AffectedPart' => $this->input->post('AffectedPart'),
            'Vehicleno' => $this->input->post('Vehicleno'),
            'DriverName' => $this->input->post('DriverName'),
            'Assignedperson' => $this->input->post('Assignedperson'),
            'CosttoIncident' => $this->input->post('CosttoIncident'),
            'Correctiveaction' => $this->input->post('Correctiveaction'),
            'WorkCompletedateandtime' => $this->input->post('WorkCompletedateandtime'),
            'Remarkindetails' => $this->input->post('Remarkindetails'),
            'Status' => 1
        );
        $this->Vehical_Incident_Tracker_Model->add($data);
        redirect('Vehical_Incident_Tracker/index');
    }

    /* 
        This method will call the get_incident_by_id() method from model to get the data from 
        database by using ID.
        Then, it will load the default view. 
    */
    public function edit($id = null)
    {
        $data['action'] = 'update';
        $data['incident'] = $this->Vehical_Incident_Tracker_Model->get_incident_by_id($id);

        $this->load->view('edit_view', $data);
    }

    /* This method will call the delete(id) method from Model. */
    public function delete($id)
    {
        // Update the status to 0 for the specific incident using $id
        $this->Vehical_Incident_Tracker_Model->delete($id);

        redirect('Vehical_Incident_Tracker/index'); // Redirect to the list view after deleting
    }

    /*
        This method will call the update method from model and load the default method from controller.
    */
    public function update_vit()
    {
        $id = $this->input->post('id');

        if (!empty($id)) {
            $data = array(
                'IncidentType' => $this->input->post('IncidentType'),
                'IncidentLocation' => $this->input->post('IncidentLocation'),
                'incidenttime' => $this->input->post('incidenttime'),
                'AffectedPart' => $this->input->post('AffectedPart'),
                'Vehicleno' => $this->input->post('Vehicleno'),
                'DriverName' => $this->input->post('DriverName'),
                'Assignedperson' => $this->input->post('Assignedperson'),
                'CosttoIncident' => $this->input->post('CosttoIncident'),
                'Correctiveaction' => $this->input->post('Correctiveaction'),
                'WorkCompletedateandtime' => $this->input->post('WorkCompletedateandtime'),
                'Remarkindetails' => $this->input->post('Remarkindetails')
            );

            $this->Vehical_Incident_Tracker_Model->update($data, $id);
        }

        redirect('Vehical_Incident_Tracker/index');
    }
}
?>