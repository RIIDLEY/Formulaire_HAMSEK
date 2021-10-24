<?php

class Controller_set extends Controller{

  public function form_add(){
        $m = Model::getModel();
        $this->render("add");
  }

  public function action_add(){
    $m = Model::getModel();
    if(isset($_POST['login']) and preg_match("#^\S*$#",$_POST['login']) and isset($_POST['mdp']) and preg_match("#^\S*$#",$_POST['mdp']) and isset($_POST['mdpconf']) and preg_match("#^\S*$#",$_POST['mdpconf'])){
     
      $nbLogin = $m->getNbLogin();
      $listLogin = $m->getLogin();
      for($i=0;$i<$nbLogin[0];$i++){
        if($_POST['login']===$listLogin[$i]){
          echo '<script type="text/javascript"> alert("Login déjà utilisé"); </script>';
          $this->render("add");
        }
      }
    
      if($_POST['mdp']===$_POST['mdpconf']){
      $info = ['login'=>$_POST['login'],'mdp'=>password_hash($_POST['mdp'],PASSWORD_DEFAULT)];
      $m->addLogin($info);
      echo '<script type="text/javascript"> alert("Compte enregistré"); </script>';
       $this->render("home");

     }
     else{
      echo '<script type="text/javascript"> alert("Mot de passe non identique"); </script>';
      $this->render("add");
     }

    }else{
      echo '<script type="text/javascript"> alert("Champs manquant"); </script>';
      $this->render("add");
    }
  }

  public function action_default(){
    $this->form_add();
  }

}

?>
