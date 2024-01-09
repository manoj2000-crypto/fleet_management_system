<?php
class Vehical_Incident_Tracker_Model extends CI_model
{
    public function add($data)
    {
        $this->db->insert("incidenttracker", $data);
    }

    public function get_data()
    {
        $this->db->where('Status', 1); // Add this condition to fetch only active records
        $query = $this->db->get("incidenttracker");

        // Check if there is data
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array(); // Return an empty array if there is no data
        }
    }

    public function delete($id)
    {
        // Update the 'Status' column to 0 for the specific incident using $id
        $this->db->where('id', $id);
        $this->db->update('incidenttracker', array('Status' => 0));
    }

    public function get_incident_by_id($id)
    {
        // Retrieve data for the specific incident using $id
        $query = $this->db->get_where('incidenttracker', array('id' => $id));

        // Check if there is data
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array(); // Return an empty array if there is no data
        }
    }

    public function get_incident_id_by_data($data)
    {
        // Implement logic to retrieve the incident ID based on the provided data
        // Example: Check uniqueness of some fields to identify the incident
        unset($data['action']);
        $query = $this->db->get_where('incidenttracker', $data);

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id;
        }

        return null; // Return null if incident ID couldn't be determined
    }

    public function update($data, $id)
    {
        // Update data for the specific incident using $id
        $this->db->where('id', $id);
        $this->db->update('incidenttracker', $data);
    }

}
?>