<?php

/**
 * BaseacActualite
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $cotisant_id
 * @property string $titre
 * @property string $contenu
 * @property boolean $is_visible
 * @property Doctrine_Collection $tags
 * @property coCotisant $coCotisant
 * @property Doctrine_Collection $commentaires
 * @property Doctrine_Collection $actualiteTags
 * 
 * @method integer             getId()            Returns the current record's "id" value
 * @method integer             getCotisantId()    Returns the current record's "cotisant_id" value
 * @method string              getTitre()         Returns the current record's "titre" value
 * @method string              getContenu()       Returns the current record's "contenu" value
 * @method boolean             getIsVisible()     Returns the current record's "is_visible" value
 * @method Doctrine_Collection getTags()          Returns the current record's "tags" collection
 * @method coCotisant          getCoCotisant()    Returns the current record's "coCotisant" value
 * @method Doctrine_Collection getCommentaires()  Returns the current record's "commentaires" collection
 * @method Doctrine_Collection getActualiteTags() Returns the current record's "actualiteTags" collection
 * @method acActualite         setId()            Sets the current record's "id" value
 * @method acActualite         setCotisantId()    Sets the current record's "cotisant_id" value
 * @method acActualite         setTitre()         Sets the current record's "titre" value
 * @method acActualite         setContenu()       Sets the current record's "contenu" value
 * @method acActualite         setIsVisible()     Sets the current record's "is_visible" value
 * @method acActualite         setTags()          Sets the current record's "tags" collection
 * @method acActualite         setCoCotisant()    Sets the current record's "coCotisant" value
 * @method acActualite         setCommentaires()  Sets the current record's "commentaires" collection
 * @method acActualite         setActualiteTags() Sets the current record's "actualiteTags" collection
 * 
 * @package    BDS
 * @subpackage model
 * @author     Ludovic Henry
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseacActualite extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ac_actualites');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('cotisant_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('titre', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('contenu', 'string', null, array(
             'type' => 'string',
             'notnull' => true,
             ));
        $this->hasColumn('is_visible', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('acTag as tags', array(
             'refClass' => 'acActualiteTag',
             'local' => 'actualite_id',
             'foreign' => 'tag_id'));

        $this->hasOne('coCotisant', array(
             'local' => 'cotisant_id',
             'foreign' => 'id',
             'onDelete' => 'set null',
             'onUpdate' => 'cascade'));

        $this->hasMany('acCommentaire as commentaires', array(
             'local' => 'id',
             'foreign' => 'actualite_id'));

        $this->hasMany('acActualiteTag as actualiteTags', array(
             'local' => 'id',
             'foreign' => 'actualite_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'name' => 'slug',
             'fields' => 
             array(
              0 => 'titre',
             ),
             'unique' => true,
             'canUpdate' => true,
             ));
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}