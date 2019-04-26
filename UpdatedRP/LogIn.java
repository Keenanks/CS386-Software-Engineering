package Practice_Code;

public class LogIn
{
	 private String username;
	 private String password;

	 public LogIn()
	 {

	 }

	 public LogIn(String _username, String _password )
	 {
	 	 username = _username;
	 	 password = _password;
	 }

	 public String getLogInUsername()
	 {
	 	 return username;
	 }

	 public String getLogInPassword()
	 {
		  return password;
	 }
}
