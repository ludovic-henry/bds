<?php

/**
 * BasespParticipant
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $sport_id
 * @property integer $cotisant_id
 * @property enum $statut
 * @property boolean $is_admin
 * @property coCotisant $coCotisant
 * @property spSport $sport
 * 
 * @method integer       getSportId()     Returns the current record's "sport_id" value
 * @method integer       getCotisantId()  Returns the current record's "cotisant_id" value
 * @method enum          getStatut()      Returns the current record's "statut" value
 * @method boolean       getIsAdmin()     Returns the current record's "is_admin" value
 * @method coCotisant    getCoCotisant()  Returns the current record's "coCotisant" value
 * @method spSport       getSport()       Returns the current record's "sport" value
 * @method spParticipant setSportId()     Sets the current record's "sport_id" value
 * @method spParticipant setCotisantId()  Sets the current record's "cotisant_id" value
 * @method spParticipant setStatut()      Sets the current record's "statut" value
 * @method spParticipant setIsAdmin()     Sets the current record's "is_admin" value
 * @method spParticipant setCoCotisant()  Sets the current record's "coCotisant" value
 * @method spParticipant setSport()       Sets the current record's "sport" value
 * 
 * @package    BDS
 * @subpackage model
 * @author     Ludovic Henry
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasespParticipant extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sp_participants');
        $this->hasColumn('sport_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('cotisant_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('statut', 'enum', null, array(
             'type' => 'enum',
             'notnull' => true,
             'default' => 'Participant',
             'values' => 
             array(
              0 => 'Participant',
              1 => 'Responsable',
             ),
             ));
        $this->hasColumn('is_admin', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('coCotisant', array(
             'local' => 'cotisant_id',
             'foreign' => 'id',
             'onDelete' => 'cascade',
             'onUpdate' => 'cascade'));

        $this->hasOne('spSport as sport', array(
             'local' => 'sport_id',
             'foreign' => 'id',
             'onDelete' => 'cascade',
             'onUpdate' => 'cascade'));
    }
}