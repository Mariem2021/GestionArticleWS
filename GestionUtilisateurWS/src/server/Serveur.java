package server;

import javax.xml.ws.Endpoint;

import service.GestionUtilisateur;

public class Serveur {

	public static void main(String[] args) 
	{
		String nomWs = "GestionUtilisateur";
		String url = "http://192.168.1.3:8789/";
		Endpoint.publish(url, new GestionUtilisateur());
		System.out.printf("%s%s?wsdl", url, nomWs);
	}

}
