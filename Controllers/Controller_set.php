<?php

class Controller_set extends Controller{

  public function form_add(){
        $m = Model::getModel();
        $this->render("add");
  }

  public function action_add(){
    $m = Model::getModel();
    //vérifie si les données sont présentes et si c'est bien des caractères
    if(isset($_POST['login']) and preg_match("#^\S*$#",$_POST['login']) and isset($_POST['mdp']) and preg_match("#^\S*$#",$_POST['mdp']) and isset($_POST['mdpconf']) and preg_match("#^\S*$#",$_POST['mdpconf'])){
     
      $nbLogin = $m->getNbLogin();//get le nombre d'utilisateur
      $listLogin = $m->getLogin();//get le login de tout les utilisateurs

      for($i=0;$i<$nbLogin[0];$i++){//verifie si le login est disponible
        if($_POST['login']===$listLogin[$i]){
          echo '<script type="text/javascript"> alert("Login déjà utilisé"); </script>';
          $this->render("add");
        }
      }
    
      if($_POST['mdp']===$_POST['mdpconf']){//verifie si les 2 mots de passe sont identique
      $info = ['login'=>$_POST['login'],'mdp'=>password_hash($_POST['mdp'],PASSWORD_DEFAULT)];
      $m->addLogin($info);//ajoute dans la BDD
      echo '<script type="text/javascript"> alert("Compte enregistré"); </script>';
       $this->render("home");//renvoie sur la page de connexion
     }
     else{//si les mots de passe ne sont pas identique
      echo '<script type="text/javascript"> alert("Mot de passe non identique"); </script>';
      $this->render("add");//renvoie sur la page de création de compte
     }

    }else{//s'il manque des champs
      echo '<script type="text/javascript"> alert("Champs manquant"); </script>';
      $this->render("add");
    }
  }

  public function action_default(){
    $this->form_add();
  }

}

?>
