<!-- !! RECUPERER PLACE DANS LE TOUR -->

<?php

require_once("Joueur.php");
require_once("Coeur.php");
require_once("Partie3.php");

class Coeur extends Joueur {

public function historique($coupsJoues,$nbDesParJoueur){
    
}

public function evaluer($qte, $val, $palifico, $nbDes) {

    // $nosDes = [];
    // for ($i=0; $i < 5; $i++) {
    //     $de = rand(1,6);
    //     // echo "<p> $de </p>";
    //     array_push($nosDes, $de);
    // };
    // for ($j = 0; $j < 5; $j++) {
    //     echo $nosDes[$j];
    // };
      
    var_dump($this->mesDes);
    $nosDes = $this->mesDes;
    $nbTable = $nbDes;
    

    // NB 1
    $nb1 = 0;
    $nb2 = 0;
    $nb3 = 0;
    $nb4 = 0;
    $nb5 = 0;
    $nb6 = 0;

    // Compteur 
    for ($k = 0; $k < 5; $k++) {
        if($nosDes[$k] === 1) {
            $nb1 += 1;
        } elseif ($nosDes[$k] === 2) {
            $nb2 += 1;
        } elseif ($nosDes[$k] === 3) {
            $nb3 += 1;
        } elseif ($nosDes[$k] === 4) {
            $nb4 += 1;
        } elseif ($nosDes[$k] === 5) {
            $nb5 += 1;
        } elseif ($nosDes[$k] === 6) {
            $nb6 += 1;
        };
    };

    
    // echo "<p> $nb1 $nb2 $nb3 $nb4 $nb5 $nb6 </p> ";
    // $nbTable = rand(1, 20);

    echo "<p> Il y a $nbTable dés sur la table </p>";

    $numero = 6;

    $place = rand(1,4);

    $reponseJoueur = [];

    // $qte = rand(1,15);
    // $val = rand(1,6);

    


// ------ QUAND IL Y A ENTRE 20 et 17 DES SUR LA TABLE -----------

if ($nbTable > 16) {
    
    // Cas 1 jouer en premier -------------
    if ($place === 1) {
        $qte = rand(5,7);
        for ($nb = 0; $nb < 6; $nb ++) {
            if (in_array($numero, $nosDes)) {
                $numero -= 1;
            };
        };
        $val = $numero;
        $reponseJoueur = [$qte,$val];
        // if ($reponseJoueur[1] === 1) {
        //     $reponseJoueur[1] = "Paco";
        // };
    echo "<p> Je suis premier et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
 
} 
    // Cas 2 jouer en deuxième -------------
    
    
    elseif ($place === 2) {
        echo "<p> Je suis le premier joueur (donc un ennemi) et je pense qu'il y a au moins $qte $val</p>";
        // $qte = $qtej1;
        // $numero = $valj1;
        switch ($numero) {
        case $numero < 6:
            $qte = $qte;
            $numero += 1;
            break;
        case $numero === 6 :
            $qte += 1;
            $numero = $numero;
            break;
        case $numero === 1:
            if ($qte < 6) {
                $qte = $qte + 1;
                $numero = $numero; 
                break; 
            }        
        }

        if ($qte > 9) {
            echo "<p> je suis deuxième et tu es un menteur mon reuf</p>";
        } else {
            $val = $numero;
        $reponseJoueur = [$qte,$val];
        // if ($reponseJoueur[1] === 1) {
        //     $reponseJoueur[1] = "Paco";
        // }
    echo "<p> Je suis deuxième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
        }
        
        

} 
    // Cas 3 jouer en troisième -------------

elseif ($place === 3) {
    echo "<p> Proposition du j2 : $qte $val</p>";
    // $qte = $qtej2;
    // $numero = $valj2;
   switch ($qte) {
       case $qte > 9 :
        echo "<p> je suis troisième et tu es un menteur mon reuf</p>";
           break;
       
       case $qte === 8|| $qte === 9:
           $qte = $qte / 2;
           $numero = 1; 
           if(is_int($qte)) {
               $qte = $qte;
           } else {
               $qte = $qte + 0.5;
           }
           
           $val = $numero;
            $reponseJoueur = [$qte,$val];
            if ($reponseJoueur[1] === 1) {
                $reponseJoueur[1] = "Paco";
            };
           echo "<p> Je suis troisième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
           break;

        case $qte < 8 :
            $qte = $qte + 1;
            $numero = $numero;

            $val = $numero;
    $reponseJoueur = [$qte,$val];
    echo "<p> Je suis troisième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
            break;
            
   }
    
} 


    // Cas 4 jouer en quatrième -------------

elseif ($place === 4) {
    echo "<p> Proposition du j3 : $qte $val</p>";
    // $qte = $qtej3;
    // $numero = $valj3;
   switch ($qte) {
       case $qte > 9 :
        echo "<p> je suis quatrième et you're a fucking liar mon reuf</p>";
           break;
       
       case $qte === 8|| $qte === 9:
           $qte = $qte / 2;
           if(is_int($qte)) {
               $qte = $qte;
           } else {
               $qte = $qte + 0.5;
           }
           $numero = 1;    
           $val = $numero;
            $reponseJoueur = [$qte,$val];
            // if ($reponseJoueur[1] === 1) {
            //     $reponseJoueur[1] = "Paco";
            // };
           echo "<p> Je suis quatrième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1] </p>";
           break;

        case $qte < 8 :
            $qte = $qte + 1;
            $numero = $numero;

            $val = $numero;
    $reponseJoueur = [$qte,$val];
    echo "<p> Je suis quatrième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
            break;
            
   }
    
}
}
 



// ------ QUAND IL Y A ENTRE 16 et 14 DES SUR LA TABLE -----------

if ($nbTable > 13 && $nbTable < 17) {


//Cas 1 jouer en premier -------------
if ($place === 1) {
    $qte = rand(4,6);
    for ($nb = 0; $nb < 6; $nb ++) {
        if (in_array($numero, $nosDes)) {
            $numero -= 1;
        };
    };
    $val = $numero;
    $reponseJoueur = [$qte,$val];
    // if ($reponseJoueur[1] === 1) {
    //     $reponseJoueur[1] = "Paco";
    // };
echo "<p> Je suis premier et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";

} 


//  Cas 2 jouer en deuxième -------------


elseif ($place === 2) {
    echo "<p> Je suis le premier joueur (donc un ennemi) et je pense qu'il y a au moins $qte $val</p>";
    // $qte = $qtej1;
    // $numero = $valj1;
    switch ($numero) {
    case $numero < 6:
        $qte = $qte;
        $numero += 1;
        break;
    case $numero === 6 :
        $qte += 1;
        $numero = $numero;
        break;
    case $numero === 1:
        if ($qte < 4) {
            $qte = $qte + 1;
            $numero = $numero; 
            break; 
        }        
    }

    if ($qte > 7) {
        echo "<p> je suis deuxième et tu es un menteur mon reuf</p>";
    } else {
        $val = $numero;
    $reponseJoueur = [$qte,$val];
    if ($reponseJoueur[1] === 1) {
        $reponseJoueur[1] = "Paco";
    };
echo "<p> Je suis deuxième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
    }
    
    

} 
// Cas 3 jouer en troisième -------------

elseif ($place === 3) {
echo "<p> Proposition du j2 : $qte $val</p>";
// $qte = $qtej2;
// $numero = $valj2;
switch ($qte) {
   case $qte > 7 :
    echo "<p> je suis troisième et tu es un menteur mon reuf</p>";
       break;
   
   case $qte === 7|| $qte === 8:
       $qte = $qte / 2;
       if(is_int($qte)) {
           $qte = $qte;
       } else {
           $qte = $qte + 0.5;
       }
       $numero === 1; 
       $val = $numero;   
       $reponseJoueur = [$qte,$val];
            // if ($reponseJoueur[1] === 1) {
            //     $reponseJoueur[1] = "Paco";
            // };
           echo "<p> Je suis troisième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
           break;

    case $qte < 6 :
        $qte = $qte + 1;
        $numero = $numero;

        $val = $numero;
$reponseJoueur = [$qte,$val];
echo "<p> Je suis troisième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
        break;
        
}

} 


 //Cas 4 jouer en quatrième -------------

elseif ($place === 4) {
echo "<p> Proposition du j3 : $qte $val</p>";
// $qte = $qtej3;
// $numero = $valj3;
switch ($qte) {
   case $qte > 8 :
    echo "<p> je suis quatrième et you're a fucking liar mon reuf</p>";
       break;
   
   case $qte === 7| $qte === 8:
       $qte = $qte / 2;
       if(is_int($qte)) {
           $qte = $qte;
       } else {
           $qte = $qte + 0.5;
       }
       $numero === 1;    
       $val = $numero;
            $reponseJoueur = [$qte,$val];
            if ($reponseJoueur[1] === 1) {
                $reponseJoueur[1] = "Paco";
            };
           echo "<p> Je suis quatrième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1] </p>";
           break;

    case $qte < 6 :
        $qte = $qte + 1;
        $numero = $numero;

        $val = $numero;
$reponseJoueur = [$qte,$val];
echo "<p> Je suis quatrième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
        break;
        
}

}
}
// ------ QUAND IL Y A ENTRE 13 et 11 DES SUR LA TABLE -----------

if ($nbTable > 10 && $nbTable < 13) {
    
    
    //Cas 1 jouer en premier -------------
    if ($place === 1) {
        $qte = rand(3,5);
        for ($nb = 0; $nb < 6; $nb ++) {
            if (in_array($numero, $nosDes)) {
                $numero -= 1;
            };
        };
        $val = $numero;
        $reponseJoueur = [$qte,$val];
        if ($reponseJoueur[1] === 1) {
            $reponseJoueur[1] = "Paco";
        };
    echo "<p> Je suis premier et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
    
    } 
    //  Cas 2 jouer en deuxième -------------
    
    
    elseif ($place === 2) {
        echo "<p> Je suis le premier joueur (donc un ennemi) et je pense qu'il y a au moins $qte $val</p>";
        // $qte = $qtej1;
        // $numero = $valj1;
        switch ($numero) {
        case $numero < 6:
            $qte = $qte;
            $numero += 1;
            break;
        case $numero === 6 :
            $qte += 1;
            $numero = $numero;
            break;
        case $numero === 1:
            if ($qte < 4) {
                $qte = $qte + 1;
                $numero = $numero; 
                break; 
            }        
        }
    
        if ($qte > 5) {
            echo "<p> je suis deuxième et tu es un menteur mon reuf</p>";
        } else {
            $val = $numero;
        $reponseJoueur = [$qte,$val];
        if ($reponseJoueur[1] === 1) {
            $reponseJoueur[1] = "Paco";
        };
    echo "<p> Je suis deuxième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
        }   
    } 
    // Cas 3 jouer en troisième -------------
    
    elseif ($place === 3) {
    echo "<p> Proposition du j2 : $qte $val</p>";
    // $qte = $qtej2;
    // $numero = $valj2;
    switch ($qte) {
       case $qte > 7 :
        echo "<p> je suis troisième et tu es un menteur mon reuf</p>";
           break;
       
       case $qte === 6|| $qte === 7:
           $qte = $qte / 2;
           if(is_int($qte)) {
               $qte = $qte;
           } else {
               $qte = $qte + 0.5;
           }
           $numero === 1; 
           $val = $numero;   
           $reponseJoueur = [$qte,$val];
            if ($reponseJoueur[1] === 1) {
                $reponseJoueur[1] = "Paco";
            };
           echo "<p> Je suis troisième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
           break;
    
        case $qte < 6 :
            $qte = $qte + 1;
            $numero = $numero;
    
            $val = $numero;
    $reponseJoueur = [$qte,$val];
    echo "<p> Je suis troisième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
            break;
            
    }
    
    }     
     //Cas 4 jouer en quatrième -------------
    
    elseif ($place === 4) {
    echo "<p> Proposition du j3 : $qte $val</p>";
    // $qte = $qtej3;
    // $numero = $valj3;
    switch ($qte) {
       case $qte > 7 :
        echo "<p> je suis quatrième et you're a fucking liar mon reuf</p>";
           break;
       
       case $qte === 6|| $qte === 7:
           $qte = $qte / 2;
           if(is_int($qte)) {
               $qte = $qte;
           } else {
               $qte = $qte + 0.5;
           }
           $numero === 1;    
           $val = $numero;
            $reponseJoueur = [$qte,$val];
            if ($reponseJoueur[1] === 1) {
                $reponseJoueur[1] = "Paco";
            };
           echo "<p> Je suis quatrième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1] </p>";
           break;
    
        case $qte < 5 :
            $qte = $qte + 1;
            $numero = $numero;
    
            $val = $numero;
    $reponseJoueur = [$qte,$val];
    echo "<p> Je suis quatrième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
            break;
            
    }
    
    }
    }
 
    // ------ QUAND IL Y A ENTRE 10 et 8 DES SUR LA TABLE -----------

if ($nbTable > 7 && $nbTable < 11) {
      
    //Cas 1 jouer en premier -------------
    if ($place === 1) {
        $qte = rand(2,4);
        for ($nb = 0; $nb < 6; $nb ++) {
            if (in_array($numero, $nosDes)) {
                $numero -= 1;
            };
        };
        $val = $numero;
        $reponseJoueur = [$qte,$val];
        if ($reponseJoueur[1] === 1) {
            $reponseJoueur[1] = "Paco";
        };
    echo "<p> Je suis premier et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
    
    } 
    //  Cas 2 jouer en deuxième -------------
    
    elseif ($place === 2) {
        echo "<p> Je suis le premier joueur (donc un ennemi) et je pense qu'il y a au moins $qte $val</p>";
        // $qte = $qtej1;
        // $numero = $valj1;
        switch ($numero) {
        case $numero < 6:
            $qte = $qte;
            $numero += 1;
            break;
        case $numero === 6 :
            $qte += 1;
            $numero = $numero;
            break;
        case $numero === 1:
            if ($qte < 3) {
                $qte = $qte + 1;
                $numero = $numero; 
                break; 
            }        
        }
    
        if ($qte > 5) {
            echo "<p> je suis deuxième et tu es un menteur mon reuf</p>";
        } else {
            $val = $numero;
        $reponseJoueur = [$qte,$val];
        if ($reponseJoueur[1] === 1) {
            $reponseJoueur[1] = "Paco";
        };
    echo "<p> Je suis deuxième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
        }
        
    } 
    // Cas 3 jouer en troisième -------------
    
    elseif ($place === 3) {
    echo "<p> Proposition du j2 : $qte $val</p>";
    // $qte = $qtej2;
    // $numero = $valj2;
    switch ($qte) {
       case $qte > 5 :
        echo "<p> je suis troisième et tu es un menteur mon reuf</p>";
           break;
       
       case $qte === 5|| $qte === 6:
           $qte = $qte / 2;
           if(is_int($qte)) {
               $qte = $qte;
           } else {
               $qte = $qte + 0.5;
           }
           $numero === 1;  
           $val = $numero;  
           $reponseJoueur = [$qte,$val];
            if ($reponseJoueur[1] === 1) {
                $reponseJoueur[1] = "Paco";
            };
           echo "<p> Je suis troisième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
           break;
    
        case $qte < 6 :
            $qte = $qte + 1;
            $numero = $numero;
    
            $val = $numero;
    $reponseJoueur = [$qte,$val];
    echo "<p> Je suis troisième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
            break;
            
    }
    
    } 
     //Cas 4 jouer en quatrième -------------
    
    elseif ($place === 4) {
    echo "<p> Proposition du j3 : $qte $val</p>";
    // $qte = $qtej3;
    // $numero = $valj3;
    switch ($qte) {
       case $qte > 7 :
        echo "<p> je suis quatrième et you're a fucking liar mon reuf</p>";
           break;
       
       case $qte === 6|| $qte === 7:
           $qte = $qte / 2;
           if(is_int($qte)) {
               $qte = $qte;
           } else {
               $qte = $qte + 0.5;
           }
           $numero === 1;    
           $val = $numero;
            $reponseJoueur = [$qte,$val];
            if ($reponseJoueur[1] === 1) {
                $reponseJoueur[1] = "Paco";
            };
           echo "<p> Je suis quatrième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1] </p>";
           break;
    
        case $qte < 6 :
            $qte = $qte + 1;
            $numero = $numero;
    
            $val = $numero;
    $reponseJoueur = [$qte,$val];
    echo "<p> Je suis quatrième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
            break;
            
    }
    
    }
    }

    // ------ QUAND IL Y A ENTRE 7 et 5 DES SUR LA TABLE -----------

if ($nbTable > 4 && $nbTable < 8) {
    
    
    //Cas 1 jouer en premier -------------
    if ($place === 1) {
        $qte = rand(4,6);
        for ($nb = 0; $nb < 6; $nb ++) {
            if (in_array($numero, $nosDes)) {
                $numero -= 1;
            };
        };
        $val = $numero;
        $reponseJoueur = [$qte,$val];
        if ($reponseJoueur[1] === 1) {
            $reponseJoueur[1] = "Paco";
        };
    echo "<p> Je suis premier et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
    
    } 
    //  Cas 2 jouer en deuxième -------------
    
    
    elseif ($place === 2) {
        echo "<p> Je suis le premier joueur (donc un ennemi) et je pense qu'il y a au moins $qte $val</p>";
        // $qte = $qtej1;
        // $numero = $valj1;
        switch ($numero) {
        case $numero < 6:
            $qte = $qte;
            $numero += 1;
            break;
        case $numero === 6 :
            $qte += 1;
            $numero = $numero;
            break;
        case $numero === 1:
            if ($qte < 4) {
                $qte = $qte + 1;
                $numero = $numero; 
                break; 
            }        
        }
    
        if ($qte > 7) {
            echo "<p> je suis deuxième et tu es un menteur mon reuf</p>";
        } else {
            $val = $numero;
        $reponseJoueur = [$qte,$val];
        if ($reponseJoueur[1] === 1) {
            $reponseJoueur[1] = "Paco";
        }
    echo "<p> Je suis deuxième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
        }
    } 
    // Cas 3 jouer en troisième -------------
    
    elseif ($place === 3) {
    echo "<p> Proposition du j2 : $qte $val</p>";
    // $qte = $qtej2;
    // $numero = $valj2;
    switch ($qte) {
       case $qte > 7 :
        echo "<p> je suis troisième et tu es un menteur mon reuf</p>";
           break;
       
       case $qte === 6|| $qte === 7:
           $qte = $qte / 2;
           if(is_int($qte)) {
               $qte = $qte;
           } else {
               $qte = $qte + 0.5;
           }
           $numero === 1; 
           $val = $numero;   
           $reponseJoueur = [$qte,$val];
            if ($reponseJoueur[1] === 1) {
                $reponseJoueur[1] = "Paco";
            }
           echo "<p> Je suis troisième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
           break;
    
        case $qte < 6 :
            $qte = $qte + 1;
            $numero = $numero;
    
            $val = $numero;
    $reponseJoueur = [$qte,$val];
    echo "<p> Je suis troisième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
            break;
            
    }
    
    } 
    
    
     //Cas 4 jouer en quatrième -------------
    
    elseif ($place === 4) {
    echo "<p> Proposition du j3 : $qte $val</p>";
    // $qte = $qtej3;
    // $numero = $valj3;
    switch ($qte) {
       case $qte > 7 :
        echo "<p> je suis quatrième et you're a fucking liar mon reuf</p>";
           break;
       
       case $qte === 6|| $qte === 7:
           $qte = $qte / 2;
           if(is_int($qte)) {
               $qte = $qte;
           } else {
               $qte = $qte + 0.5;
           }
           $numero === 1;    
           $val = $numero;
            $reponseJoueur = [$qte,$val];
            if ($reponseJoueur[1] === 1) {
                $reponseJoueur[1] = "Paco";
            }
           echo "<p> Je suis quatrième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1] </p>";
           break;
    
        case $qte < 6 :
            $qte = $qte + 1;
            $numero = $numero;
    
            $val = $numero;
    $reponseJoueur = [$qte,$val];
    echo "<p> Je suis quatrième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
            break;
            
    }
    
    }
    }
    // ------ QUAND IL Y A ENTRE 4 et 1 DES SUR LA TABLE -----------

if ($nbTable > 0 && $nbTable < 5) {
    
    
    //Cas 1 jouer en premier -------------
    if ($place === 1) {
        $qte = rand(1,3);
        for ($nb = 0; $nb < 6; $nb ++) {
            if (in_array($numero, $nosDes)) {
                $numero -= 1;
            };
        };
        $val = $numero;
        $reponseJoueur = [$qte,$val];
        if ($reponseJoueur[1] === 1) {
            $reponseJoueur[1] = "Paco";
        };
    echo "<p> Je suis premier et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
    
    } 
    //  Cas 2 jouer en deuxième -------------
    
    
    elseif ($place === 2) {
        echo "<p> Je suis le premier joueur (donc un ennemi) et je pense qu'il y a au moins $qte $val</p>";
        // $qte = $qtej1;
        // $numero = $valj1;
        switch ($numero) {
        case $numero < 6:
            $qte = $qte;
            $numero += 1;
            break;
        case $numero === 6 :
            $qte += 1;
            $numero = $numero;
            break;
        case $numero === 1:
            if ($qte < 4) {
                $qte = $qte + 1;
                $numero = $numero; 
                break; 
            }        
        }
    
        if ($qte > 7) {
            echo "<p> je suis deuxième et tu es un menteur mon reuf</p>";
        } else {
            $val = $numero;
        $reponseJoueur = [$qte,$val];
        if ($reponseJoueur[1] === 1) {
            $reponseJoueur[1] = "Paco";
        }
    echo "<p> Je suis deuxième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
        }
        
        
    
    } 
    // Cas 3 jouer en troisième -------------
    
    elseif ($place === 3) {
    echo "<p> Proposition du j2 : $qte $val</p>";
    // $qte = $qtej2;
    // $numero = $valj2;
    switch ($qte) {
       case $qte > 7 :
        echo "<p> je suis troisième et tu es un menteur mon reuf</p>";
           break;
       
       case $qte === 6|| $qte === 7:
           $qte = $qte / 2;
           if(is_int($qte)) {
               $qte = $qte;
           } else {
               $qte = $qte + 0.5;
           }
           $numero === 1; 
           $val = $numero;
           $reponseJoueur3 = [$qte,$val];
            if ($reponseJoueur3[1] === 1) {
                $reponseJoueur3[1] = "Paco";
            }
           echo "<p> Je suis troisième et je pense qu'il y a au moins $reponseJoueur3[0] $reponseJoueur3[1]</p>";
           break;
    
        case $qte < 6 :
            $qte = $qte + 1;
            $numero = $numero;
    
            $val = $numero;
    $reponseJoueur3 = [$qte,$val];
    echo "<p> Je suis troisième et je pense qu'il y a au moins $reponseJoueur3[0] $reponseJoueur3[1]</p>";
            break;
            
    }
    
    } 
    
    
     //Cas 4 jouer en quatrième -------------
    
    elseif ($place === 4) {
    echo "<p> Proposition du j3 : $qte $val</p>";
    // $qte = $qtej3;
    // $numero = $valj3;
    switch ($qte) {
       case $qte > 7 :
        echo "<p> je suis quatrième et you're a fucking liar mon reuf</p>";
           break;
       
       case $qte === 6|| $qte === 7:
           $qte = $qte / 2;
           if(is_int($qte)) {
               $qte = $qte;
           } else {
               $qte = $qte + 0.5;
           }
           $numero === 1;    
           $val = $numero;
            $reponseJoueur = [$qte,$val];
            if ($reponseJoueur[1] === 1) {
                $reponseJoueur[1] = "Paco";
            }
           echo "<p> Je suis quatrième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1] </p>";
           break;
    
        case $qte < 6 :
            $qte = $qte + 1;
            $numero = $numero;
    
            $val = $numero;
            $reponseJoueur = [$qte,$val];
            echo "<p> Je suis quatrième et je pense qu'il y a au moins $reponseJoueur[0] $reponseJoueur[1]</p>";
            break;
            
    }
    
    }
    }

    //fonctions exactement

      if ($nosDes === 2) {
          
      }  
}

}
// APPEL DES FONCTIONS -------------

// lanceDes();
// evaluer(0,0,0,0);
?>