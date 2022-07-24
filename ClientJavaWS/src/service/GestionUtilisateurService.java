
package service;

import java.net.MalformedURLException;
import java.net.URL;
import javax.xml.namespace.QName;
import javax.xml.ws.Service;
import javax.xml.ws.WebEndpoint;
import javax.xml.ws.WebServiceClient;
import javax.xml.ws.WebServiceException;
import javax.xml.ws.WebServiceFeature;


/**
 * This class was generated by the JAX-WS RI.
 * JAX-WS RI 2.2.9-b130926.1035
 * Generated source version: 2.2
 * 
 */
@WebServiceClient(name = "GestionUtilisateurService", targetNamespace = "http://service/", wsdlLocation = "http://192.168.1.3:8789/GestionUtilisateur?wsdl")
public class GestionUtilisateurService
    extends Service
{

    private final static URL GESTIONUTILISATEURSERVICE_WSDL_LOCATION;
    private final static WebServiceException GESTIONUTILISATEURSERVICE_EXCEPTION;
    private final static QName GESTIONUTILISATEURSERVICE_QNAME = new QName("http://service/", "GestionUtilisateurService");

    static {
        URL url = null;
        WebServiceException e = null;
        try {
            url = new URL("http://192.168.1.3:8789/GestionUtilisateur?wsdl");
        } catch (MalformedURLException ex) {
            e = new WebServiceException(ex);
        }
        GESTIONUTILISATEURSERVICE_WSDL_LOCATION = url;
        GESTIONUTILISATEURSERVICE_EXCEPTION = e;
    }

    public GestionUtilisateurService() {
        super(__getWsdlLocation(), GESTIONUTILISATEURSERVICE_QNAME);
    }

    public GestionUtilisateurService(WebServiceFeature... features) {
        super(__getWsdlLocation(), GESTIONUTILISATEURSERVICE_QNAME, features);
    }

    public GestionUtilisateurService(URL wsdlLocation) {
        super(wsdlLocation, GESTIONUTILISATEURSERVICE_QNAME);
    }

    public GestionUtilisateurService(URL wsdlLocation, WebServiceFeature... features) {
        super(wsdlLocation, GESTIONUTILISATEURSERVICE_QNAME, features);
    }

    public GestionUtilisateurService(URL wsdlLocation, QName serviceName) {
        super(wsdlLocation, serviceName);
    }

    public GestionUtilisateurService(URL wsdlLocation, QName serviceName, WebServiceFeature... features) {
        super(wsdlLocation, serviceName, features);
    }

    /**
     * 
     * @return
     *     returns GestionUtilisateur
     */
    @WebEndpoint(name = "GestionUtilisateurPort")
    public GestionUtilisateur getGestionUtilisateurPort() {
        return super.getPort(new QName("http://service/", "GestionUtilisateurPort"), GestionUtilisateur.class);
    }

    /**
     * 
     * @param features
     *     A list of {@link javax.xml.ws.WebServiceFeature} to configure on the proxy.  Supported features not in the <code>features</code> parameter will have their default values.
     * @return
     *     returns GestionUtilisateur
     */
    @WebEndpoint(name = "GestionUtilisateurPort")
    public GestionUtilisateur getGestionUtilisateurPort(WebServiceFeature... features) {
        return super.getPort(new QName("http://service/", "GestionUtilisateurPort"), GestionUtilisateur.class, features);
    }

    private static URL __getWsdlLocation() {
        if (GESTIONUTILISATEURSERVICE_EXCEPTION!= null) {
            throw GESTIONUTILISATEURSERVICE_EXCEPTION;
        }
        return GESTIONUTILISATEURSERVICE_WSDL_LOCATION;
    }

}
