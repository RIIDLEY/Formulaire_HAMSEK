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
    $nbLogin = $m->getNbLogin();//get le nombre d'utilisateur
    $listLogin = $m->getLogin();//get le login de tout les utilisateurs

    for($i=0;$i<$nbLogin[0];$i++){
      if($_POST['login']===$listLogin[$i]){//verifie si le login est dans la BDD
        $mdp_hash = $m->getMdp($listLogin[$i]);
        if(password_verify($_POST['mdp'], $mdp_hash[0])){//verifie si le mot de passe est correct
          echo '<script type="text/javascript"> alert("Ok"); </script>';//message de confirmation de bonne connection
          $this->render('home');//renvoie sur la page de connexion
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
