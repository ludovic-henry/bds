<?php

/**
 * BaseelVote
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $liste_id
 * @property integer $cotisant_id
 * @property coCotisant $coCotisant
 * @property elListe $liste
 * 
 * @method integer    getListeId()     Returns the current record's "liste_id" value
 * @method integer    getCotisantId()  Returns the current record's "cotisant_id" value
 * @method coCotisant getCoCotisant()  Returns the current record's "coCotisant" value
 * @method elListe    getListe()       Returns the current record's "liste" value
 * @method elVote     setListeId()     Sets the current record's "liste_id" value
 * @method elVote     setCotisantId()  Sets the current record's "cotisant_id" value
 * @method elVote     setCoCotisant()  Sets the current record's "coCotisant" value
 * @method elVote     setListe()       Sets the current record's "liste" value
 * 
 * @package    BDS
 * @subpackage model
 * @author     Ludovic Henry
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseelVote extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('el_votes');
        $this->hasColumn('liste_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('cotisant_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
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

        $this->hasOne('elListe as liste', array(
             'local' => 'liste_id',
             'foreign' => 'id',
             'onDelete' => 'cascade',
             'onUpdate' => 'cascade'));
    }
}