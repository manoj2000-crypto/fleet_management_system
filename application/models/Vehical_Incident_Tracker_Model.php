<!--
    Name : Manoj Madhavrao Kale
    Employee ID : PNA2525
    File : Model
-->

<?php

/*
    This class extends default CI_model class to get the properties of the CI_model class.
    This class now behaves like a Model for our project.
    Model is responsible for doing all the operation with database.
*/
class Vehical_Incident_Tracker_Model extends CI_model
{
    /*
        This add(data) method takes data from controller and store it into
        Database : "vit" , Table : "incidenttracker" 
    */
    public function add($data)
    {
        $this->db->insert("incidenttracker", $data);
    }

    /*
        This method will fetch the data from "incidenttracker" table , 
        if and only if there "Status"(Column name) is 1(Value).
        If the number of rows are greater than zero then it will return the rows,
        If data is not found then this method will return the empty array.
    */
    public function get_data()
    {
        $this->db->where('Status', 1); // This condition is to fetch only active records
        $query = $this->db->get("incidenttracker");

        // Check if there is data or not.
        return $query->num_rows() > 0 ? $query->result_array() : array();
    }

    /*
        This method will recive the id from controller and update the "Status" as 0, 
        So that will read only that data whose value is 1.
        Because, We are not actually deleting data from database physically, deleting data logically.
    */
    public function delete($id)
    {
        // Update the 'Status' column to 0 for the specific incident using $id
        $this->db->where('id', $id);
        $this->db->update('incidenttracker', array('Status' => 0));
    }

    /*
        This method will get the id from controller to fetch the corresponding data from "incidenttracker" 
        table by using ID.
    */
    public function get_incident_by_id($id)
    {
        // Retrieve data for the specific incident using $id
        $query = $this->db->get_where('incidenttracker', array('id' => $id));
        return $query->num_rows() > 0 ? $query->row_array() : array();
    }

    /*
        By using this method we will get the id by using the data that is passed by controller.
        Then we will unset the the 'action' from data array, because we dont have action as column to store,
        we took action to know the user is doing 'update' or 'add'.
        If the data is found then we will return the id or else return null.
    */
    public function get_incident_id_by_data($data)
    {
        // Implement logic to retrieve the incident ID based on the provided data
        unset($data['action']);
        $query = $this->db->get_where('incidenttracker', $data);

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id;
        }

        return null; // Return null if incident ID couldn't be determined
    }

    /* 
        This method will get the data and id from controller, 
        and update the data where id is matching in the database. 
    */
    public function update($data, $id)
    {
        // Update data for the specific incident using $id
        $this->db->where('id', $id);
        $this->db->update('incidenttracker', $data);
    }
}
?>