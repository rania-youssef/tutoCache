<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class TestController extends AbstractController
{
    /**
    * @Route("/")
    */
    public function index(Request $request){
    
      return $this->render("new.html.twig");
      
    }

    /**
    * @Route("/test/{id<\d+>?0}",name="test",methods={"GET","POST"},schemes={"https","http"})
    */
    public function test(Request $request,$id)
    {

     // $request=Request::createFromGlobals();
      //dd($request->request->get("email"));
        
        dd($request->query->get('age'));
        //return new Response("Vous avez $age ans");
    }
  

    /**
    * @Route("/token")
    */
    public function token(Request $request){
       
        $submittedToken = $request->request->get('token');
        var_dump($submittedToken);
        // 'delete-item' is the same value used in the template to generate the token
        $bool=$this->isCsrfTokenValid('delete-item', $submittedToken);
        var_dump($bool);
           // return("token is valid $submittedToken");
        
       dd($request);
      }
}