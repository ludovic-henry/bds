<?php

class elElectionComponents extends sfComponents {

    public function executeMenu() {
        $count = Doctrine_Query::create()
                        ->from('elElection')
                        ->where('date_debut < ?', date('r'))
                        ->andWhere('date_fin > ?', date('r'))
                        ->count();

        if ($count == 0) {
            return sfView::NONE;
        }

        $this->elections = Doctrine_Query::create()
                        ->from('elElection')
                        ->where('date_debut < ?', date('r'))
                        ->andWhere('date_fin > ?', date('r'))
                        ->execute();
    }

}