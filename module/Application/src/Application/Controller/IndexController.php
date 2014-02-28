<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Projet;

class IndexController extends AbstractActionController
{
    protected $_objectManager;

    public function indexAction()
    {
        $projets = $this->getObjectManager()->getRepository('\Application\Entity\User')->findAll();

        return new ViewModel(array('projets' => $projets));
    }
    public function voirProjetAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $projet = $this->getObjectManager()->find('\Application\Entity\Projet', $id);
        return new ViewModel(array('projet' => $projet));
    }

    public function addAction()
    {
        if ($this->request->isPost()) {
            $projet = new User();
            $projet->setFullName($this->getRequest()->getPost('fullname'));

            $this->getObjectManager()->persist($projet);
            $this->getObjectManager()->flush();
            $newId = $projet->getId();

            return $this->redirect()->toRoute('home');
        }
        return new ViewModel();
    }

    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $projet = $this->getObjectManager()->find('\Application\Entity\User', $id);

        if ($this->request->isPost()) {
            $projet->setFullName($this->getRequest()->getPost('fullname'));

            $this->getObjectManager()->persist($projet);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('home');
        }

        return new ViewModel(array('projet' => $projet));
    }

    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        $projet = $this->getObjectManager()->find('\Application\Entity\User', $id);

        if ($this->request->isPost()) {
            $this->getObjectManager()->remove($projet);
            $this->getObjectManager()->flush();

            return $this->redirect()->toRoute('home');
        }

        return new ViewModel(array('projet' => $projet));
    }

    protected function getObjectManager()
    {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }
}