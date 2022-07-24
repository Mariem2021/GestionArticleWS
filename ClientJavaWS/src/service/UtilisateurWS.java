package service;

import java.util.List;
import java.util.Scanner;

public class UtilisateurWS {

public static void main(String[] args) {
		
		GestionUtilisateur stub = new GestionUtilisateurService().getGestionUtilisateurPort();
		
		String nom;
		String prenom;
		String login;
		String password;
		
		
		System.out.println("Bienvenue !!!!!!!");
        System.out.println("Voici le menu");

        Scanner sc = new Scanner(System.in);
        System.out.println("1 : Ajouter un utilisateur");
        System.out.println("2 : Afficher la liste des utilisateurs");
        System.out.println("3 : Modifier un utilisateur");
        System.out.println("4 : Supprimer un utilisateur");
        System.out.println("Votre choix : ");
        int choix = sc.nextInt();
        sc.nextLine();

        
        switch(choix){
            case 1 : 
                System.out.println("Veuillez entrer le nom de l'utilisateur");
                nom = sc.nextLine();
                System.out.println("Veuillez entrer le prenom de l'utilisateur");
                prenom = sc.nextLine();
                System.out.println("Veuillez entrer le login de l'utilisateur");
                login = sc.nextLine();
                System.out.println("Veuillez entrer le mot de passe de l'utilisateur");
                password = sc.nextLine();

                // Ajouter utilisateur
                
                stub.ajouter(nom, prenom, login, password);
                
                break;
            case 2 :

                //Afficher la liste des utilisateurs
            	List <Utilisateur> ut1= stub.lister();
            	
    			for(Utilisateur ut : ut1) {
    				System.out.println(ut.getPrenom() + " " + ut.getNom());
            	stub.lister();
    			}
                 
                break;
            case 3 :
                    // Modifier utilisateur
                    
                    System.out.println("Veuillez entrer l'ID de l'utilisateur");
                    int id = sc.nextInt();
                    sc.nextLine();
                    System.out.println("Entrer le nouveau nom de l'utilisateur");
                    nom = sc.nextLine();
                    System.out.println("Entrer le nouveau prenom de l'utilisateur");
                    prenom = sc.nextLine();
                    
                    System.out.println("Entrer le nouveau login de l'utilisateur");
                    login = sc.nextLine(); 
                    System.out.println("Entrer le nouveau mot de passe de l'utilisateur");
                    password = sc.nextLine();
                    
                    stub.modifier(id, nom, prenom, login, password);
                     
                break;
            case 4 : 
                    // Supprimer utilisateur
            	System.out.println("Veuillez entrer l'ID de l'utilisateur");
            	id = sc.nextInt();
            	stub.supprimer(id);
                  
                   
                break;
            default: 
                break;
        }
		
         
	}

}
