<?php namespace Angres\Bundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

abstract class BaseController extends FOSRestController {

    protected $facade;

    public function cgetAction(){
        $data = $this->get($this->facade)->query();
        $view = $this->view($data);
        return $this->handleView($view);
    }

    public function getAction(){
        $id = $this->container->get('request')->attributes->get('id');
        $data = $this->get($this->facade)->get($id);
        $view = $this->view($data);
        return $this->handleView($view);
    }

    public function postAction(){
        $body = $this->container->get('request')->request->all();

        $data = $this->get($this->facade)->post($body);
        $view = $this->view($data);
        return $this->handleView($view);
    }

    public function patchAction(){
        $id = $this->container->get('request')->attributes->get('id');
        $body = $this->container->get('request')->request->all();

        $data = $this->get($this->facade)->patch($id,$body);
        $view = $this->view($data);
        return $this->handleView($view);

    }

    public function deleteAction(){
        $id = $this->container->get('request')->attributes->get('id');

        $data = $this->get($this->facade)->delete($id);
        $view = $this->view($data);
        return $this->handleView($view);
    }

}
