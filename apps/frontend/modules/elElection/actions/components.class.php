<?php

class elElectionComponents extends sfComponents {

    public function executeMenu() {
        $this->elections = Doctrine_Query::create()
                        ->from('elElection')
                        ->where('date_debut < ?', date('r'))
                        ->andWhere('date_fin > ?', date('r'))
                        ->execute();
    }

}