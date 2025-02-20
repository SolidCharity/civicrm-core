<?php

use CRM_Civiimport_ExtensionUtil as E;

return [
  [
    'name' => 'SavedSearch_My_imports',
    'entity' => 'SavedSearch',
    'cleanup' => 'always',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'My_imports',
        'label' => E::ts('My imports'),
        'form_values' => NULL,
        'mapping_id' => NULL,
        'search_custom_id' => NULL,
        'api_entity' => 'UserJob',
        'api_params' => [
          'version' => 4,
          'select' => [
            'id',
            'created_date',
            'status_id:label',
            'job_type:label',
          ],
          'orderBy' => [],
          'where' => [
            [
              'created_id',
              '=',
              'user_contact_id',
            ],
            [
              'is_template',
              '=',
              FALSE,
            ],
            [
              'is_current',
              '=',
              TRUE,
            ],
          ],
          'groupBy' => [],
          'join' => [],
          'having' => [],
        ],
        'expires_date' => NULL,
        'description' => NULL,
      ],
    ],
  ],
  [
    'name' => 'SavedSearch_Import_Templates',
    'entity' => 'SavedSearch',
    'cleanup' => 'always',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Import_Templates',
        'label' => E::ts('Import Templates'),
        'description' => E::ts('Available import templates'),
        'form_values' => NULL,
        'mapping_id' => NULL,
        'search_custom_id' => NULL,
        'api_entity' => 'UserJob',
        'api_params' => [
          'version' => 4,
          'select' => [
            'id',
            'created_id.display_name',
            'name',
            'created_date',
            'job_type:label',
          ],
          'orderBy' => [],
          'where' => [
            [
              'is_template',
              '=',
              TRUE,
            ],
          ],
          'groupBy' => [],
          'join' => [],
          'having' => [],
        ],
        'expires_date' => NULL,
      ],
    ],
  ],
  [
    'name' => 'SavedSearch_Import_Templates_SearchDisplay_Import_Templates_Table_1',
    'entity' => 'SearchDisplay',
    'cleanup' => 'always',
    'update' => 'unmodified',
    'params' => [
      'version' => 4,
      'values' => [
        'name' => 'Import_Templates',
        'label' => E::ts('Import Templates'),
        'saved_search_id.name' => 'Import_Templates',
        'type' => 'table',
        'settings' => [
          'description' => E::ts('Available import templates'),
          'sort' => [],
          'limit' => 50,
          'pager' => [],
          'placeholder' => 5,
          'columns' => [
            [
              'type' => 'field',
              'key' => 'id',
              'dataType' => 'Integer',
              'label' => E::ts('ID'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'created_id.display_name',
              'dataType' => 'String',
              'label' => E::ts('Created By'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'name',
              'dataType' => 'String',
              'label' => E::ts('Import Name'),
              'sortable' => TRUE,
              'link' => [
                'path' => 'civicrm/import/contribution?reset=1&template_id=[id]',
                'entity' => '',
                'action' => '',
                'join' => '',
                'target' => '',
              ],
            ],
            [
              'type' => 'field',
              'key' => 'created_date',
              'dataType' => 'Timestamp',
              'label' => E::ts('Created Date'),
              'sortable' => TRUE,
            ],
            [
              'type' => 'field',
              'key' => 'job_type:label',
              'dataType' => 'String',
              'label' => E::ts('Type'),
              'sortable' => TRUE,
            ],
          ],
          'actions' => TRUE,
          'classes' => [
            'table',
            'table-striped',
          ],
        ],
        'acl_bypass' => FALSE,
      ],
    ],
  ],
];
