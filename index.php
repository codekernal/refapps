

<html>
<body>
<div id="fb-root"></div>
<script type="text/javascript" src="js/config.js"></script>
<script type="text/javascript" src="js/jquery-1.10.js"></script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : applicationId, // Set YOUR APP ID
      //channelUrl : 'http://hayageek.com/examples/oauth/facebook/oauth-javascript/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });
 
     
    };
 
    function Login()
    {
 
        FB.login(function(response) {
           if (response.authResponse)
           {
           	var access_token = FB.getAuthResponse()['accessToken'];
           	var userId = response.authResponse.userID;
           	console.log(userId);
		  if(userId > 0)
			$.get("https://graph.facebook.com/me?access_token="+access_token, function(data)
			{	
				$.ajax({
			type: "POST",
			url: "friends.php",
			data: { 'accesstoken': access_token , 'user_id': userId  }
			})
								
			}, "json");
                
            } else
            {
             console.log('User cancelled login or did not fully authorize.');
            }
         },{scope: 'read_friendlists'});
 
    }
 
 
    function getPhoto()
    {
      FB.api('/me/picture?type=normal', function(response) {
 
          var str="<br/><b>Pic</b> : <img src='"+response.data.url+"'/>";
          document.getElementById("status").innerHTML+=str;
 
    });
 
    }
    function Logout()
    {
        FB.logout(function(){document.location.reload();});
    }
 
  // Load the SDK asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
 
</script>
<div align="center">
<h2>Facebook OAuth Javascript Demo</h2>
 
<div id="status">

<input type="button" value="login" onclick="Login()"/>
</div>
 
<br/><br/><br/><br/><br/>
 
<div id="message">
</div>
 
</div>
</body>
</html>
