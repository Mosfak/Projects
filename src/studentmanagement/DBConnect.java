/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package studentmanagement;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author Mosfak Motin Rimon
 */
public class DBConnect {
    
    
    
    public static Connection getConnection() throws SQLException, ClassNotFoundException{
        String driver = "com.mysql.cj.jdbc.Driver";
        String url = "jdbc:mysql://127.0.0.1:3306/StudentDatabase";
        String username = "root";
        String password = "";
        Connection con;
        con = DriverManager.getConnection(url,username,password);
        Class.forName(driver);
        
        return con;
    }
    public static void main(String[] args) {
        
    }
    
}
