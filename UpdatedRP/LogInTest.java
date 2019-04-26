package Practice_Code;

import org.junit.Test;
import static org.junit.Assert.*;

public class LogInTest
{
	 @Test
	 public void verifyLoginTest() throws AssertionError
	 {
	 	 try
		 {
		 	 SignUp signUpObject = new SignUp( "JohnWayne", "johnwayne@gmail.com",
			 "ComputerScience_386", "ComputerScience_386" );

		 	 LogIn loginObject = new LogIn( "JohnWayne", "ComputerScience_386" );

		    assertEquals( signUpObject.getUsername(), loginObject.getLogInUsername
			 () );

		    assertEquals( signUpObject.getPassword(), loginObject
			 .getLogInPassword() );

		    System.out.println( "Logged in successfully" );
		 }
		 catch ( AssertionError a )
	    {
	    	 System.out.println( "Invalid username or password" );
	    }
	 }
}