package Practice_Code;

public class SignUp
{
   private String username;
   private String email;
   private String password;
   private String confirmPassword;

   public SignUp()
	{

	}

	public SignUp( String _username, String _email, String _password, String
		_confirmPassword )
	{
		 username = _username;
		 email = _email;
		 password = _password;
		 confirmPassword = _confirmPassword;
	}

	public String getUsername()
	{
		 return username;
	}

	 public String getPassword()
	 {
	 	 return password;
	 }

	 public String getUserInfo()
	{
		 return "Username: " + username + "\nEmail: " + email + "\nPassword " +
		 password + "\nConfirmed Password: " + confirmPassword;
	}
}
