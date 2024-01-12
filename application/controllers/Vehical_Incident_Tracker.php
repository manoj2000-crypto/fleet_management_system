<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>

</html>

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vehical_Incident_Tracker extends CI_Controller
{
    public function view()
    {
        $data['lists'] = $this->Vehical_Incident_Tracker_Model->get_data();
        $this->load->view('add_view', $data);
    }

    public function new_view()
    {
        $this->load->view('new_view');
    }

    public function index()
    {
        $data['lists'] = $this->Vehical_Incident_Tracker_Model->get_data();
        $this->load->view('add_view', $data);
    }

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

    public function edit($id = null)
    {
        $data['action'] = 'update';
        $data['incident'] = $this->Vehical_Incident_Tracker_Model->get_incident_by_id($id);

        $this->load->view('edit_view', $data);
    }

    public function delete($id)
    {
        // Update the status to 0 for the specific incident using $id
        $this->Vehical_Incident_Tracker_Model->delete($id);

        redirect('Vehical_Incident_Tracker/index'); // Redirect to the list view after deleting
    }

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

        redirect('Vehical_Incident_Tracker/view');
    }

    public function resetButton()
    {
        $data['action'] = 'update';
        $data['incident'] = array(
            'IncidentType' => "",
            'IncidentLocation' => "",
            'incidenttime' => "",
            'AffectedPart' => "",
            'Vehicleno' => "",
            'DriverName' => "",
            'Assignedperson' => "",
            'CosttoIncident' => "",
            'Correctiveaction' => "",
            'WorkCompletedateandtime' => "",
            'Remarkindetails' => "",
        );
        $this->load->view('edit_view', $data);
        print_r($data);
        exit();
    }

}
?>