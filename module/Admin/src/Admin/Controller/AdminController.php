<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Entity\User;

class AdminController extends AbstractActionController
{
    protected $_objectManager;

    public function ListusersAction()
    {
        $users = $this->getObjectManager()->getRepository('\Admin\Entity\User')->findAll();

        return new ViewModel(array('user' => $users));
    }
    

    protected function getObjectManager()
    {
        if (!$this->_objectManager) {
            $this->_objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        }

        return $this->_objectManager;
    }
}