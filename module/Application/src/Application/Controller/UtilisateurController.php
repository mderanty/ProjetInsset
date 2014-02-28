<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use DateTime;
use DateTimeZone;
use Application\Entity\Utilisateur;

class UtilisateurController extends AbstractActionController {

    protected $_objectManager;

    public function ListUserAction() {
        $utilisateurs = $this->getObjectManager()->getRepository('\Application\Entity\Utilisateur')->findAll();

        return new ViewModel(array('utilisateurs' => $utilisateurs));
    }

    public function AddUserAction() {
        
        if ($this->request->isPost()) {
            $utilisateur = new Utilisateur();
            $utilisateur->setNom_utilisateur($this->getRequest()->getPost('nom_utilisateur'));
            $utilisateur->setPrenom_utilisateur($this->getRequest()->getPost('prenom_utilisateur'));
            $utilisateur->setAdresse_utilisateur($this->getRequest()->getPost('adresse_utilisateur'));
            $utilisateur->setDate_inscription($this->getRequest()->getPost('date_inscription'));            
            $utilisateur->setId_rang($this->getRequest()->getPost('id_rang'));

            $this->getObjectManager()->persist($utilisateur);
            $this->getObjectManager()->flush();
            $newId = $utilisateur->getId_utilisateur();

            return $this->redirect()->toRoute('utilisateur');
        }
        return new ViewModel();
    }

    public function editAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $utilisateur = $this->getObjectManager()->find('\Application\Entity\Utilisateur', $id);

        if ($this->request->isPost()) {
            $utilisateur->setFullName($this->getRequest()->getPost('fullname'));

            $this->getObjectManager()->persist($utilisateur);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('home');
        }

        return new ViewModel(array('utilisateur' => $utilisateur));
    }

    public function deleteAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        $utilisateur = $this->getObjectManager()->find('\Application\Entity\Utilisateur', $id);

        if ($this->request->isPost()) {
            $this->getObjectManager()->remove($utilisateur);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('home');
        }

        return new ViewModel(array('utilisateur' => $utilisateur));
    }

    protected function getObjectManager() {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }

}