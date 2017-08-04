#Pas de répit pour les Prolosaures !!

Utilisation:
  La classe Test (fichier tests.php) sert à tester la fonction main du fichier prolo.php.
  Elle a 3 méthodes:
    - execute qui prend en paramêtre une string de test, un entier qui représente la valeur de retour voulue et une string de description (optionnel)
    - execute_from_file, pareil qu'au dessus, à la différence qu'ici on teste depuis un fichier et non une string (pratique pour faire un test sur une grosse string)
    - execute_full, c'est juste un premier scénario de test.
    
  Il faut noter que dans la méthode execute, des information sur chaque test est affiché, comme si le test est réussi, et si c'est le cas, la durée d'éxécution et la mémoire utilisée.
  
  Le fichier prolo possède deux fonctions:
    - main, c'est le script de rendu, il prend une string en entrée et, si le format d'entrée est valide, renvoie le nombre d'espace valide (selon les specification de l'énoncé).
    - check_param, c'est la fonction appelée dans main qui vérifie le format de la string d'entrée
    
    
    
Regex pour le format voulu pour la faire marcher la fonction main:
  [1-9][0-9]*(\n)((\ )[0-9]+)+

En gros, c'est un entier n strictement positif (>0) suivi d'un retour à la ligne, suivi de n entier positif (>=0) séparés par des espaces
  Dans l'énonce, le premier entier représente le nombre de montagnes et la suite de nombre représente la taille de chaque montagne.
