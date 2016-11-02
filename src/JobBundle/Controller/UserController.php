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
        
        // warning: don't use that!
        /*
        $entities = array();
        $em = $this->getDoctrine()->getManager();
        $meta = $em->getMetadataFactory()->getAllMetadata();
        foreach ($meta as $m) {
            $entities[] = $m->getName();
        }
        echo '<pre>';
        print_r($entities);
        */
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
        /*if($this->get('request')->request->all()){
            print_r($this->get('request')->request->all());exit;
        }*/
        //var_dump($request);
        //echo $id;
        $em = $this->get('doctrine.orm.entity_manager');
                  
        $userManager = $this->get('fos_user.user_manager');
        
        $result = $userManager->findUserBy(array('id'=>$id));
        //var_dump($result);
        $role_list = $this->getParameter('security.role_hierarchy.roles');; //$this->role_list;
        
        
        return $this->render('default/userrole_edit.html.twig',array(
                    'user'=>$result       ,'role_list'=>$role_list          
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