<?php

/**
 * fiFifichier filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasefiFifichierFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'dossier_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('dossier'), 'add_empty' => true)),
      'filename'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content_type' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nom'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'dossier_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('dossier'), 'column' => 'id')),
      'filename'     => new sfValidatorPass(array('required' => false)),
      'content_type' => new sfValidatorPass(array('required' => false)),
      'nom'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fi_fifichier_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'fiFifichier';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'dossier_id'   => 'ForeignKey',
      'filename'     => 'Text',
      'content_type' => 'Text',
      'nom'          => 'Text',
    );
  }
}
