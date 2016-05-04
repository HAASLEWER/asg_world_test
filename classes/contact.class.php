<?php
/*
Class contact
Provides the necessary methods to create, edit, delete and search contacts for the Contact Manager App
*/

// Include the database interface class
require_once "db.class.php";

Class contact {

	public $db;

    public function __construct() {
		// Instantiate database object
		$this->db = new db();
		// Use the connect method of the db class to connect to the mysql instance
		$this->db->connect();
    }

	// Add a new contact to the database
	// Accepts parameter payload which is a key value array where the key represents column names and values the data to insert
	public function addContact($payload) {
		$this->db->insert($payload, "contacts");
	}

	// Modify an existing contact
	// Accepts parameter payload which is a key value array where the key represents column names and values the data to update
	// Accepts parameter id which is the id of the contact
	public function editContact($payload, $id) {
		$this->db->update($payload, "contacts", "id = $id");
	}

	// Gets all contacts from the database
	public function getAllContacts() {
		return $this->db->select("contacts", 1);
	}	

	// Delete an existing contact
	// Accepts parameter id which is the contact id to delete
	public function deleteContact($id) {
		$this->db->delete("contacts", "id = $id");
	}

	// Search for contacts
	public function search($payload) {

	}
}

?>