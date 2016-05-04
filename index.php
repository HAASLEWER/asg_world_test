<?php
require_once "classes/contact.class.php";

$contact = new contact();

// Create contact
//$new_contact = array("name" => "'Jannie'", "surname" => "'Moolman'", "email" => "'jannie@test.co.za'");
//$contact->addContact($new_contact);

// Edit contact
//$edit_contact = array("name" => "'Jannieeeee'", "surname" => "'Moolmannnnn'", "email" => "'jannieeeee@test.co.za'");
//$contact->editContact($edit_contact, 1);

// Get all contacts
//$contacts = $contact->getAllContacts();
//var_dump($contacts);

// Delete a contact by id
$contact->deleteContact(2);

?>