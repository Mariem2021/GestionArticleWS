package service;

import java.util.ArrayList;

import javax.jws.WebParam;
import javax.jws.WebService;

import java.sql.*;
import java.util.*;

import domaine.Utilisateur;

@WebService
public class GestionUtilisateur
{
	 String dbURL = "jdbc:mysql://192.168.1.3:3306/mglsi_news1";
     String username = "victorine";
     String motDePasse = "passer";
     
     String sql;

	private static ArrayList<Utilisateur> utilisateurs = new ArrayList<Utilisateur>();
	
	// methode qui permet d'ajouter un utilisateur
	public Boolean ajouter(@WebParam(name="nom")String nom,
			@WebParam(name="prenom") String prenom, 
			@WebParam(name="login") String login,
			@WebParam(name="password") String password)
	{
		
		 try { 
		Connection conn = DriverManager.getConnection(dbURL, username, motDePasse);
		PreparedStatement statement;
		
		// Ajouter utilisateur
        sql = "INSERT INTO Utilisateurs (nom, prenom, login, password) VALUES (?, ?, ?, ?)";

        statement = conn.prepareStatement(sql);
        statement.setString(1, nom);
        statement.setString(2, prenom);
        statement.setString(3, login);
        statement.setString(4, password);
        
        int rowsInserted = statement.executeUpdate();
        if (rowsInserted > 0) {
            System.out.println("Ajout reussi!");
        }

        conn.close();
        return true;
		 } 
	        catch (SQLException e) {
	            e.printStackTrace();
	            return false;
	        }
		 
	}
	
	// methode qui permet de modifier un utilisateur
	public Boolean modifier(@WebParam(name="id")int id, @WebParam(name="nom") String nom,
			@WebParam(name="prenom") String prenom, 
			@WebParam(name="login") String login,
			@WebParam(name="password") String password)
	{
		try { 
			Connection conn = DriverManager.getConnection(dbURL, username, motDePasse);
			PreparedStatement statement;
		 sql = "UPDATE Utilisateurs SET nom=?, prenom=?, login=?, password=?  WHERE id=?";
         
         statement = conn.prepareStatement(sql);
         statement.setString(1, nom);
         statement.setString(2, prenom);
         statement.setString(3, login);
         statement.setString(4, password);
         statement.setInt(5, id);
         
         int rowsUpdated = statement.executeUpdate();
         if (rowsUpdated > 0) {
             System.out.println("Modification reussie");
         }
         conn.close();
         return true;
		 } 
	        catch (SQLException e) {
	            e.printStackTrace();
	            return false;
	        }
	}
	
	// methode qui permet de supprimer un Utilisateur
	
	public Boolean supprimer(@WebParam(name="id")int id)
	{
		try { 
			Connection conn = DriverManager.getConnection(dbURL, username, motDePasse);
			PreparedStatement statement;
			
		sql = "DELETE FROM Utilisateurs WHERE id=?";
        
        statement = conn.prepareStatement(sql);
        													
        statement.setInt(1, 1);

        int rowsDeleted = statement.executeUpdate();
        if (rowsDeleted > 0) {
            System.out.println("Suppression reussie");
        }
        conn.close();
        return true;
		 } 
	        catch (SQLException e) {
	            e.printStackTrace();
	            return false;
	        }
	}
	
	// methode qui permet de lister des utilisateurs
	public List<Utilisateur> lister()
	{
		List<Utilisateur> liste= new ArrayList<>();
		try { 
			Connection conn = DriverManager.getConnection(dbURL, username, motDePasse);
			PreparedStatement statement;
		//Afficher la liste des utilisateurs
        sql = "SELECT * FROM Utilisateurs";

        Statement creation = conn.createStatement();
        ResultSet result = creation.executeQuery(sql);
        
        int count = 0;
        
        while (result.next()){
            
            liste.add(new Utilisateur(result.getString("nom"),result.getString("prenom"), result.getString("login"), result.getString("password")));
            
        }
        conn.close();
	 } 
       catch (SQLException e) {
           e.printStackTrace();
       }
	 return liste;
		
	}
	
	
}
