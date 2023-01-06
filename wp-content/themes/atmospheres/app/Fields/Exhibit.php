<?php

namespace App\Fields;

use Log1x\AcfComposer\Field;
use StoutLogic\AcfBuilder\FieldsBuilder;

class Exhibit extends Field
{
    /**
     * The field group.
     *
     * @return array
     */
    public function fields()
    {
        $exhibit = new FieldsBuilder('exhibit');

        $exhibit
            ->setLocation('post_type', '==', 'ca_exhibit')
                ->setGroupConfig('position', 'side')
                ->setGroupConfig('title', 'Nummerierung');

        $exhibit
            ->addNumber('count', ['min' => 0, 'max' => 30]);

        return $exhibit->build();
    }
}
