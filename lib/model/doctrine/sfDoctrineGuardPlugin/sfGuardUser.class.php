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

    public function postInsert($event) {
        $this->sendIdentifiant();
    }

    public function setUniqueUsername($prenom, $nom) {
        $baseUsername = strtolower(Doctrine_Inflector::urlize($prenom) . '.' . Doctrine_Inflector::urlize($nom));

        $q = Doctrine_Query::create()
                        ->from('sfGuardUser u')
                        ->where('u.username LIKE ?', $baseUsername);

        if (!$this->isNew())
            $q->andWhere('u.id != ?', $this->getId());

        $count = $q->count();

        if ($count > 0) {
            $count2 = Doctrine_Query::create()
                            ->from('sfGuardUser u')
                            ->where('u.username LIKE ?', $baseUsername . '%')
                            ->count();

            $username = strtolower($count2 === 0 ? $baseUsername : $baseUsername . $count2);
        } else
            $username = $baseUsername;

        $this->setUsername($username);
    }

    public function sendIdentifiant() {
        sfProjectConfiguration::getActive()->loadHelpers(array('Text'));

        $password = generate_string(6);
        $salt = generate_string(20);

        $this->setPassword($password);
        $this->setSalt($salt);
        $this->save();

        $body = <<<BODY
Bienvenue au BDS.

Vos identifiants sur le site BDS sont :
nom d'utilisateur : {$this->getUsername()}
mot de passe : $password

Vous pouvez vous connecter à l'adresse suivante : http://bds.utbm.fr/connexion
BODY;

        $message = sfContext::getInstance()->getMailer()->compose()
                        ->setFrom('bds@utbm.fr')
                        ->setTo($this->getEmail())
                        ->setSubject('Mot de passe BDS')
                        ->setBody($body);

        sfContext::getInstance()->getMailer()->send($message);
    }

    public function getEmailAddress() {
        return $this->_get('email');
    }

    public function __toString() {
        return $this->getUsername();
    }

}
