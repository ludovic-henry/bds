<?php

/**
 * mlWeekmail
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    BDS
 * @subpackage model
 * @author     Ludovic Henry
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class mlWeekmail extends BasemlWeekmail {

    protected function getBody() {
        return strtr(file_get_contents(sfConfig::get('sf_data_dir') . '/mailer/weekmail/layout.html'), array('%contenu%' => $this->getContenu()));
    }

    protected function getFrom() {
        return 'bds@utbm.fr';
    }

    protected function addAttachements($message) {
        foreach ($this->getAttachments() as $attachment)
            $message->attach(Swift_Attachment::fromPath(sfConfig::get('sf_upload_dir') . '/attachments/' . $attachment->getFilename())->setFilename($attachment->getNom()));
    }

    protected function getContentType() {
        return 'text/html';
    }

    public function isSent() {
        return $this->getSentAt() === null && $this->getCotisantId() === null;
    }

}