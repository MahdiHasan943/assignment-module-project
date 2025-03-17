<?php

// Contact Management Terminal-Based App

$contacts = [];

// Function to add a contact
function addContact(array &$contacts, string $name, string $email, string $phone): void 
{
    $contacts[] = ['name' => $name, 'email' => $email, 'phone' => $phone];
    echo "$name added to contacts.\n";
}

// Function to display all contacts
function displayContacts(array $contacts): void 
{
    if (empty($contacts)) {
        echo "Error: No contacts available. Please add a contact first.\n";
    } else {
        foreach ($contacts as $contact) {
            echo "Name: {$contact['name']}, Email: {$contact['email']}, Phone: {$contact['phone']}\n";
        }
    }
}

// Terminal-based interface
while (true) {
    echo "\nContact Management Menu:\n";
    echo "1. Add Contact\n";
    echo "2. View Contacts\n";
    echo "3. Exit\n";

    $choice = trim(readline("Choose an option: "));

    if ($choice === '1') {
        $name = trim(readline("Enter name: "));
        $email = trim(readline("Enter email: "));
        $phone = trim(readline("Enter phone number: "));
        addContact($contacts, $name, $email, $phone);
    } elseif ($choice === '2') {
        displayContacts($contacts);
    } elseif ($choice === '3') {
        echo "Exiting...\n";
        break;
    } else {
        echo "Invalid choice. Please try again.\n";
    }
}

?>
