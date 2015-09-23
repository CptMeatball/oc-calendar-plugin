<?php

return [
    'plugin' => [
        'name' => 'Agenda Manager',
        'description' => 'Plugin to manage and show a list of Agenda items.'
    ],
    'models' => [
        'agenda' => [
            'name' => 'Agenda',
            'name_plural' => 'Agendas',
            'title' => 'Name',
            'date' => 'Date',
            'start_time' => 'Start time',
            'end_time' => 'End time',
            'location' => 'Location',
            'new_agenda' => 'New agenda item',
            'create_agenda' => 'Create agenda item',
            'edit_agenda' => 'Edit agenda item',
            'delete_agenda' => 'Delete agenda item',
            'preview_agenda' => 'Preview agenda item',
            'manage_agendas' => 'Preview agenda item',
            'create_and_close' => 'Create and Close',
            'cancel' => 'Cancel',
            'return_agendas' => 'Return to agenda list',
            'save' => 'Save',
            'save_and_close' => 'Save and Close',

        ],
    ],
    'components' => [
        'overview' => [
            'name' => 'Overview component',
            'description' => 'Displays an overview of all events'
        ]
    ]
];
