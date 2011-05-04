<?php

/**
 * BasespPhoto
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $sport_id
 * @property integer $photo_id
 * @property spSport $sport
 * @property phPhoto $phPhoto
 * 
 * @method integer getSportId()  Returns the current record's "sport_id" value
 * @method integer getPhotoId()  Returns the current record's "photo_id" value
 * @method spSport getSport()    Returns the current record's "sport" value
 * @method phPhoto getPhPhoto()  Returns the current record's "phPhoto" value
 * @method spPhoto setSportId()  Sets the current record's "sport_id" value
 * @method spPhoto setPhotoId()  Sets the current record's "photo_id" value
 * @method spPhoto setSport()    Sets the current record's "sport" value
 * @method spPhoto setPhPhoto()  Sets the current record's "phPhoto" value
 * 
 * @package    BDS
 * @subpackage model
 * @author     Ludovic Henry
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasespPhoto extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sp_photos');
        $this->hasColumn('sport_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('photo_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('spSport as sport', array(
             'local' => 'sport_id',
             'foreign' => 'id',
             'onDelete' => 'cascade',
             'onUpdate' => 'cascade'));

        $this->hasOne('phPhoto', array(
             'local' => 'photo_id',
             'foreign' => 'id',
             'onDelete' => 'cascade',
             'onUpdate' => 'cascade'));
    }
}