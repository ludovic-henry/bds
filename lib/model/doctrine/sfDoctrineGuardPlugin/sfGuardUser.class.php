<?php

/**
 * sfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    BDS
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class sfGuardUser extends PluginsfGuardUser {

    public function setUniqueUsername($prenom, $nom) {
        $baseUsername = strtolower(Doctrine_Inflector::urlize($prenom) . '.' . Doctrine_Inflector::urlize($nom));

        $q = Doctrine_Query::create()
                        ->from('sfGuardUser u')
                        ->where('u.username LIKE ?', $baseUsername);

        if ( !$this->isNew() )
            $q->andWhere('u.id != ?', $this->getId());

        $count = $q->count();

        if ( $count > 0 ) {
            $count2 = Doctrine_Query::create()
                            ->from('sfGuardUser u')
                            ->where('u.username LIKE ?', $baseUsername . '%')
                            ->count();

            $username = strtolower($count2 === 0 ? $baseUsername : $baseUsername . $count2);
        } else
            $username = $baseUsername;

        $this->setUsername($username);
    }

    public function getEmailAddress() {
        return $this->_get('email');
    }

    public function __toString() {
        return $this->getUsername();
    }
}