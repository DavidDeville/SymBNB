<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;

class ApplicationType extends AbstractType {

    /**
     * Sets a configuration for each field of the form
     *
     * @param string $label
     * @param string $placeholder
     * @return array
     */
    protected function getConfiguration($label, $placeholder, $options = [])
    {

        return array_merge([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
        ], $options);
    }
}