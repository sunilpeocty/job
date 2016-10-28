<?php

namespace JobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/role")
     */
    public function indexAction()
    {
        // add flash message
        $this->addFlash('notice','Your changes were saved!');
        
        $em = $this->get('doctrine.orm.entity_manager');
                  
        $userManager = $this->get('fos_user.user_manager');
        
        $result = $userManager->findUsers();
		
        $role = $this->getParameter('security.role_hierarchy.roles');
        
        return $this->render('default/user.html.twig',
                array(
                    'user'=>$result,
                    'role'=>$role,
                ));
    }
    
    /**
     * @Route("/role/edit/{id}")
     */
    public function editAction($id)
    {
        //echo $id;
        $em = $this->get('doctrine.orm.entity_manager');
                  
        $userManager = $this->get('fos_user.user_manager');
        
        $result = $userManager->findUserBy(array('id'=>$id));
        //var_dump($result);
        
        return $this->render('default/userrole_edit.html.twig',array(
                    'user'=>$result                 
                ));
        /*
        // add flash message
        $this->addFlash('notice','Your changes were saved!');
        
        $em = $this->get('doctrine.orm.entity_manager');
                  
        $userManager = $this->get('fos_user.user_manager');
        
        $result = $userManager->findUsers();
		
        $role = $this->getParameter('security.role_hierarchy.roles');
        
        return $this->render('default/user.html.twig',
                array(
                    'user'=>$result,
                    'role'=>$role,
                ));
        */
    }
}