<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Karma</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/journal/bootstrap.min.css">
        <style>
            #profile,#logout,#feed{
                display:none;
            }
          </style>
    </head>
    <body>
     


      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Karma</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            
          </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <button type="button" onclick="logout();" class="btn btn-danger" id="logout">Logout</button>
                </li>
                <li><fb:login-button 
                    id="fb-btn"
                scope="public_profile,email,user_birthday,user_posts,user_location"
                onlogin="checkLoginState();">   
             </fb:login-button></li>
            </ul>
          
        </div>
      </nav>
    <br><br><br><br>
<div class="container">
    <h2 id="heading">Log in to view your profile</h2>
    
    <div id="profile">kjhfjaksjdkf</div>
   
    <div id="feed">Karhtijkljaskjf</div>
</div>

   
    
    </body>
             
    <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '204852516845021',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.0'
    });
      
    
    FB.getLoginStatus(function(response) {
     statusChangeCallback(response);
    });
       
    function checkLoginState() {
    FB.getLoginStatus(function(response) {
     statusChangeCallback(response);
    });
}
    function logout(){
         FB.logout(function(response){
         setElements(false);
     } );
     }
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
   
     function checkLoginState() {
    FB.getLoginStatus(function(response) {
     statusChangeCallback(response);
    });
}
    function logout(){
         FB.logout(function(response){
         setElements(false);
     } );
     }
   function statusChangeCallback(response){
       if(response.status === 'connected')
           { 
               console.log('Logged in and authenticated');
               
            setElements(true);
            testAPI();
               
           }
           else{
              
            console.log('Not authenticuted');
            setElements(false);
           }
   }
   
    function testAPI(){
         FB.api('/me?fields=name,email,birthday,posts,location',function(response){
             if(response && !response.error)
                 {
                    
                     buildProfile(response);
                 }
                 FB.api('/me/feed',function(response)
             {
                  if(response && !response.error)
                 {
                    
                     buildFeed(response);
                 }
             })
             
         })
     }
    
  
   function buildProfile(user){
         //var kar=document.write(user.name);
        // var kar2=document.write(user.id);
        // var kar3=document.write(user.location.name);
         //var kar4=document.write(user.email);
         //var kar5=document.write(user.birthday);         
         
         
         //var kar8= kar+kar2+kar3+kar4+kar5;
        // document.write(kar8);
         //document.write("\n");
         
               
         
     }
     function buildFeed(feed){
         var kart="";
         for(var i in feed.data){
             if(feed.data[i].message){
                 kart+= feed.data[i].message;
                 //var link="<a href=https://www.facebook.com/" + feed.data[i].id + ">link "+ i + "<br>"+"</a>";
                 document.write(feed.data[i].message + "<br><br><br><br>");
                 //document.write('<a href="https://www.facebook.com/feed.data[i].id">link[i];</a>');
                 kart+='\n';
             }
         }
         //document.write(kart);
     }
      function setElements(isLoggedIn){
         if(isLoggedIn){
             document.getElementById('profile').style.display= 'block';
             document.getElementById('feed').style.display= 'block';
             document.getElementById('logout').style.display= 'block';
             document.getElementById('fb-btn').style.display= 'none';
             document.getElementById('heading').style.display= 'none';
             
         }
         
         else
             {
                 document.getElementById('profile').style.display='none';
                 document.getElementById('feed').style.display= 'none';
                 document.getElementById('logout').style.display='none';
                 document.getElementById('fb-btn').style.display='block';
                 document.getElementById('heading').style.display= 'block';
             
             }
     }
     
    
    
     
     
   
    
</script>

    
</html>
