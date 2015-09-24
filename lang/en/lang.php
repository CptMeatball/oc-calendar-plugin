<?php

return [
    'plugin' => [
        'name' => 'Event Tracker',
        'description' => 'Plugin to manage and show a list of Events.'
    ],
    'models' => [
        'event' => [
            'name' => 'Event',
            'name_plural' => 'Events',
            'title' => 'Name',
            'date' => 'Date',
            'start_time' => 'Start time',
            'end_time' => 'End time',
            'location' => 'Location',
            'new_event' => 'New event',
            'create_event' => 'Create event',
            'edit_event' => 'Edit event',
            'delete_event' => 'Delete event',
            'preview_event' => 'Preview event',
            'manage_events' => 'Manage events',
            'create_and_close' => 'Create and Close',
            'cancel' => 'Cancel',
            'return_events' => 'Return to event list',
            'save' => 'Save',
            'save_and_close' => 'Save and Close',

        ],
    ],
    'components' => [
        'eventlist' => [
            'name' => 'Eventlist component',
            'description' => 'Displays a list of all events'
        ]
    ]
];
