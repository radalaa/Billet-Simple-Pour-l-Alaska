<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 02/06/2019
 * Time: 17:12
 */

namespace FormBuilder;

use \OCFram\FormBuilder;
use \OCFram\StringField;
use \OCFram\OptionField;
use \OCFram\TextField;
use \OCFram\MaxLengthValidator;
use \OCFram\NotNullValidator;

class ChapitresFormBuilder extends FormBuilder
{
    public function build()
    {
        $this->form->add(new StringField([
                'label' => 'Auteur',
                'id'    => 'auteur',
                'name' => 'auteur',
                'type' => 'text',
                'maxLength' => 100,
                'validators' => [
                    new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
                    new NotNullValidator('Merci de spécifier le titre de la news'),
                ],
            ]))

            ->add(new StringField([
                'label' => 'name',
                'id'    => 'name',
                'name' => 'name',
                'type' => 'text',
                'maxLength' => 100,
                'validators' => [
                    new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
                    new NotNullValidator('Merci de spécifier le titre de la news'),
                ],
            ]))


             ->add(new StringField([
                'label' => 'Premier titre',
                'id'    => 'firsttitle',
                'name' => 'firsttitle',
                'type' => 'text',
                'maxLength' => 50,
                'validators' => [
                    new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
                    new NotNullValidator('Merci de spécifier le titre Premier titre'),
                ],
            ]))

            ->add(new StringField([
                'label' => 'Second titre ',
                'id'    => 'secondtitle',
                'name' => 'secondtitle',
                'type' => 'text',
                'maxLength' => 50,
                'validators' => [
                    new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
                    new NotNullValidator('Merci de spécifier le titre Second titre'),
                ],
            ]))


            ->add(new TextField([
                'label' => 'Content',
                'id'    => 'content',
                'name' => 'content',
                'rows' => 8,
                'cols' => 60,
                'validators' => [
                    new NotNullValidator('Merci de spécifier le contenu de la news'),
                ],
            ]));
    }
}