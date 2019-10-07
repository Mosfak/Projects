/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package studentmanagement;

/**
 *
 * @author Mosfak Motin Rimon
 */

public class StudentManagement {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws Exception {
        
       DBConnect.getConnection();      
        //System.out.println("Connection Successful");
        Login login=new Login();       
        login.setVisible(true);
        login.pack();
        
        
        
    }

}
