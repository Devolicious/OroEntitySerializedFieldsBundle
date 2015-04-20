<?php

namespace Oro\Bundle\EntitySerializedFieldsBundle\Migrations\Schema\v1_1;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\EntityConfigBundle\Migration\UpdateEntityConfigFieldValueQuery;
use Oro\Bundle\EntityConfigBundle\Migration\UpdateEntityConfigIndexFieldValueQuery;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

class UpdateSerializedDataFieldLabels implements Migration
{
    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        $fields = [
            [
                'entityName' => 'OroCRM\Bundle\AccountBundle\Entity\Account',
                'field' => 'serialized_data',
                'value' => 'oro.entity_serialized_fields.data.label'
            ],
            [
                'entityName' => 'OroCRM\Bundle\ContactBundle\Entity\Contact',
                'field' => 'serialized_data',
                'value' => 'oro.entity_serialized_fields.data.label'
            ],
            [
                'entityName' => 'OroCRM\Bundle\SalesBundle\Entity\Lead',
                'field' => 'serialized_data',
                'value' => 'oro.entity_serialized_fields.data.label'
            ],
            [
                'entityName' => 'OroCRM\Bundle\SalesBundle\Entity\Opportunity',
                'field' => 'serialized_data',
                'value' => 'oro.entity_serialized_fields.data.label'
            ],
            [
                'entityName' => 'OroCRM\Bundle\TaskBundle\Entity\Task',
                'field' => 'serialized_data',
                'value' => 'oro.entity_serialized_fields.data.label'
            ],
            [
                'entityName' => 'Oro\Bundle\UserBundle\Entity\User',
                'field' => 'serialized_data',
                'value' => 'oro.entity_serialized_fields.data.label'
            ]
        ];

        foreach ($fields as $field) {
            $queries->addQuery(
                new UpdateEntityConfigFieldValueQuery(
                    $field['entityName'],
                    $field['field'],
                    'entity',
                    'label',
                    $field['value']
                )
            );
            $queries->addQuery(
                new UpdateEntityConfigIndexFieldValueQuery(
                    $field['entityName'],
                    $field['field'],
                    'entity',
                    'label',
                    $field['value']
                )
            );
        }
    }
}
