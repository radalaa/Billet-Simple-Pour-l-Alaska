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

class PostsFormBuilder extends FormBuilder
{
    public function build()
    {
        $this->form->add(new StringField([
                'label' => 'Titre du Menu de navigation',
                'id'    => 'titre',
                'name' => 'menu',
                'type' => 'text',
                'maxLength' => 100,
                'validators' => [
                    new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
                    new NotNullValidator('Merci de spécifier le titre de la news'),
                ],
            ]))


             ->add(new StringField([
                'label' => 'Premier titre(H1) de la bannière ',
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
                'label' => 'Second titre(H2) de la bannière ',
                'id'    => 'secondtitle',
                'name' => 'secondtitle',
                'type' => 'text',
                'maxLength' => 50,
                'validators' => [
                    new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
                    new NotNullValidator('Merci de spécifier le titre Second titre'),
                ],
            ]))

            ->add(new StringField([
                'label' => 'Troisième titre(H3) de la bannière ',
                'id'    => 'thirdtitle',
                'name' => 'thirdtitle',
                'type' => 'text',
                'maxLength' => 50,
                'validators' => [
                    new MaxLengthValidator('Le titre spécifié est trop long (100 caractères maximum)', 100),
                    new NotNullValidator('Merci de spécifier le Troisième titre'),
                ],
            ]))

             ->add(new StringField([
                'label' => 'Nom de l\'image',
                'id'    => 'image',
                'name' => 'image',
                'type' => 'file',
                'maxLength' => 50,
                'validators' => [
                    new MaxLengthValidator('Le nom spécifié est trop long (100 caractères maximum)', 100),
                    new NotNullValidator('Merci de spécifier le nom de l\'image'),
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