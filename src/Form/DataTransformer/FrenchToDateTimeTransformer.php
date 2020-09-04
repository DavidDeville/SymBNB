<?php

namespace App\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class FrenchToDateTimeTransformer implements DataTransformerInterface {

    /**
     * Get the original data and transform it to be displayed in the form
     *
     * @param object $date - Data to display in the form
     * @return string $date - Date as a string
     */
    public function transform($date) {
        if($date === null) {
            return '';
        }
        return $date->format('d/m/Y');
    }

    /**
     * Get the form data and transform it into wished format
     *
     * @param [type] $value
     * @return void
     */
    public function reverseTransform($frenchDate) {
        
        if($frenchDate === null) {
            // Exception
            throw new TransformationFailedException("Vous devez fournir une date!");
        }

        $date = \DateTime::createFromFormat('d/m/Y', $frenchDate);

        if($date === false) {
            // Exception
            throw new TransformationFailedException("Le format n'est pas bon");
        }

        return $date;
    }
}