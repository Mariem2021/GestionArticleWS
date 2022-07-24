package domaine;

import javax.xml.bind.annotation.XmlRootElement;

@XmlRootElement
public class Utilisateur
{
	private int id;
	private static int lastId = 0;
	private String nom, prenom, login, password;
	 
	public Utilisateur()
	{
		this.id = ++lastId;
	}
	
	public Utilisateur(String nom, String prenom, String login, String password)
	{
		this.id = ++lastId;
		this.nom = nom;
		this.prenom = prenom;
		this.login = login;
		this.password = password;
	}

	public int getId() {
		return id;
	}
	
	public String getNom() {
		return nom;
	}
	public void setNom(String nom) {
		this.nom = nom;
	}
	public String getPrenom() {
		return prenom;
	}
	public void setPrenom(String prenom) {
		this.prenom = prenom;
	}
	public String getLogin() {
		return login;
	}
	public void setLogin(String login) {
		this.login = login;
	}
	public String getPassword() {
		return password;
	}
	public void setPassword(String password) {
		this.password = password;
	}
	
	
}
