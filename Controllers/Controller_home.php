<?php

class Controller_home extends Controller{

  public function action_home(){
    $m = Model::getModel();
    $this->render('home');
  }

  public function action_default(){
    $this->action_home();
  }

  public function action_login(){
    $m = Model::getModel();
    $nbLogin = $m->getNbLogin();
    $listLogin = $m->getLogin();
    for($i=0;$i<$nbLogin[0];$i++){
      if($_POST['login']===$listLogin[$i]){
        $mdp_hash = $m->getMdp($listLogin[$i]);
        if(password_verify($_POST['mdp'], $mdp_hash[0])){
          echo '<script type="text/javascript"> alert("Ok"); </script>';
          $this->render('home');
        }
      }
    }
    echo '<script type="text/javascript"> alert("Login ou mot de passe incorrect"); </script>';
        $this->render("home");
  }

  public function isInDB(){
    $this->action_home();
  }
}

?>
