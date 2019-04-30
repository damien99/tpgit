function afficher(elt){ //elt = élément sur lequel s'est produit le click
    if (elt.name=="moins"){
         elt.src="images/plus.jpg"; // on change l'image
         elt.name="plus"; // on change son attribut name
         nextUl=getNextUl(elt); // on récupère la liste ul rattachée à elt
         nextUl.className="cache"; // masque la liste
    } else {
          elt.src="images/moins.jpg"; // on change l'image
          elt.name="moins"; // on change son attribut name
          nextUl=getNextUl(elt); // on récupère la liste ul rattachée à elt
          nextUl.className="montre"; // masque la liste
     }
}
//  Fonction qui permet de récupérer le ul qui suit l'élément passé en paramètre
function getNextUl(element) {
    while (element = element.nextSibling){
    /* la propriété nextSibling désigne l'élément qui suit l'élément courant dans le même noeud ( ici la DIV) */
          if (element.nodeName == 'UL') {
              return element;
         }
     }
    return false; // la fonction retourne false si aucun élément ul n'a été trouvé
}
