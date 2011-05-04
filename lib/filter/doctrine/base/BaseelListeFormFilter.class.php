<?php

/**
 * elListe filter form base class.
 *
 * @package    BDS
 * @subpackage filter
 * @author     Ludovic Henry
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseelListeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'siege_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('siege'), 'add_empty' => true)),
      'description'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'co_cotisants_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'coCotisant')),
    ));

    $this->setValidators(array(
      'siege_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('siege'), 'column' => 'id')),
      'description'       => new sfValidatorPass(array('required' => false)),
      'co_cotisants_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'coCotisant', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('el_liste_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addCoCotisantsListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.elCandidat elCandidat')
      ->andWhereIn('elCandidat.cotisant_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'elListe';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'siege_id'          => 'ForeignKey',
      'description'       => 'Text',
      'co_cotisants_list' => 'ManyKey',
    );
  }
}
