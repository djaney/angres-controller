<?php namespace Angres\Bundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

abstract class BaseController extends FOSRestController {

    protected $facade;

    public function cgetAction(){
        $data = $this->get($this->facade)->query();
        $view = $this->view($data);
        return $this->handleView($view);
    }

    public function getAction($id){
        $data = $this->get($this->facade)->get($id);
        $view = $this->view($data);
        return $this->handleView($view);
    }

    public function postAction( Request $req){
        $data = $this->get($this->facade)->post($this->container->get('request')->request->all());
        $view = $this->view($data);
        return $this->handleView($view);
    }

    public function patchAction($id){
        $data = $this->get($this->facade)->patch($id,$this->container->get('request')->request->all());
        $view = $this->view($data);
        return $this->handleView($view);

    }


    public function deleteAction($id){
        $data = $this->get($this->facade)->delete($id);
        $view = $this->view($data);
        return $this->handleView($view);
    }

}
