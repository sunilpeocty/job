<?php

namespace JobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
            if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')){
                echo $this->getUser()->getId();
            }else{
                var_dump($this->getUser()).'<br/>';    
            }            
        }
        
        $em = $this->get('doctrine.orm.entity_manager');
        $result = $em->createQueryBuilder('j')
             ->add('select', 'j.jobTitle, c.companyTitle,j.jobDescription,c.companyAddress')
             ->add('from', 'JobBundle:Job j')
             ->InnerJoin('JobBundle:Company', 'c')
             ->where('j.company = c.id')        
             ->getQuery()
             ->getResult();
       
        // echo $em->createQueryBuilder('j')->add('select', 'j, c')->add('from', 'JobBundle:Job j')->InnerJoin('JobBundle:Company', 'c')->where('j.company = c.id')->getQuery()->getSql();
        //echo '<pre>';print_r($result);
        
        //get all users
        //$userManager = $this->get('fos_user.user_manager');
        //$users = $userManager->findUsers();
        
        //get admin users
        //$query = $this->getDoctrine()->getEntityManager()->createQuery('SELECT u FROM JobBundle:User u WHERE u.roles LIKE :role')->setParameter('role', '%"ROLE_MY_ADMIN"%');
        //$users = $query->getResult();                
        //echo '<pre>';print_r($users);     
        
        //$role = $this->getParameter('security.role_hierarchy.roles');
        //echo '<pre>';print_r($role);     
        
        //update user role            
        //$user = $this->get('fos_user.user_manager')->findUserBy(array('id' => 4));
        //$user->addRole('ROLE_ADMIN');
        //$this->get('fos_user.user_manager')->updateUser($user);
        //var_dump($user);
                
        return $this->render('JobBundle:Default:index.html.twig');
    }
}
 