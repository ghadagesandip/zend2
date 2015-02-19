<?php
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Model\Album;
use Album\Form\AlbumForm;

class AlbumController extends AbstractActionController
{

    protected $albumTable = null;

    public function getAlbumTable()
    {
        if (!$this->albumTable) {
             $sm = $this->getServiceLocator();
             $this->albumTable = $sm->get('Album\Model\AlbumTable');
         }
         return $this->albumTable;
    }

    public function indexAction()
    {
        return new ViewModel(array(
             'albums' => $this->getAlbumTable()->fetchAll(),
         ));
    }

    public function addAction()
    {

         $form = new AlbumForm();
         $form->get('submit')->setValue('Add');

         $request = $this->getRequest();
         if ($request->isPost()) {
             $album = new Album();
             $form->setInputFilter($album->getInputFilter());
             $form->setData($request->getPost());

             if ($form->isValid()) {
                 $album->exchangeArray($form->getData());
                 $this->getAlbumTable()->saveAlbum($album);

                 // Redirect to list of albums
                 $this->flashMessenger()->addMessage('Album record added successfully');
                 return $this->redirect()->toRoute('album');
             }else{
                $this->flashMessenger()->addMessage('Validation error occured!');       
             }
         }
         return array('form' => $form);
    }





    /*
        Edit action
    */    
    public function editAction(){
        $id = (int) $this->params()->fromRoute('id',0);
        if(!$id){
            return $this->redirect()->toRoute('album',array('action'=>'add'));
        }

        try{
            $album = $this->getAlbumTable()->getAlbum($id);

        }catch(Exception $e){
            return $this->redirect()->toRoute('album',array('index'));
        }
        
        $form = new AlbumForm();
        $form->bind($album);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();

        if($request->isPost()){
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if($form->isValid()){
                $this->getAlbumTable()->saveAlbum($album);
                $this->flashMessenger()->addMessage('Album details updated successfully!');
                return $this->redirect()->toRoute('album');
            }
        }
        return array(
                'id'=>$id,
                'form'=>$form
            );

    }



    /**
    delete action
    */

    public function deleteAction(){

        $id = (int) $this->params()->fromRoute('id', 0);
        if(!$id){
            $this->flashMessenger->addMessage('No album to delete');
            return $this->redirect()->toRoote('album');
        }

        $request = $this->getRequest();
        if($request->isPost()){
            $del = $request->getPost('del','No');
             if($del=='Yes'){
                $this->getAlbumTable()->deleteAlbum($id);
                $this->flashMessenger->addMessage('Record deleted successfully');
                return $this->redirect()->toRoute('album');
            }

        }

       
        return array(
           'id'=>$id,
           'album'=>$this->getAlbumTable()->getAlbum($id)
        );
    }
}

