<!DOCTYPE html>
<html lang="en">
      <meta charset=utf-8 />


  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thinkmons-login/signup</title>

  <!-- Material Design Theming -->
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.orange-indigo.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>

  <link rel="stylesheet" href="main.css">

  <!-- Import and configure the Firebase SDK -->
  <!-- These scripts are made available when the app is served or deployed on Firebase Hosting -->
  <!-- If you do not serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup -->
  <script src="https://www.gstatic.com/firebase/4.0.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebase/4.0.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebase/init.js"></script>

  <script type="text/javascript">
    /**
     * Handles the sign in button press.
     */
    function toggleSignIn() {
      if (firebase.auth().currentUser) {
        // [START signout]
        firebase.auth().signOut();
        // [END signout]
      } else {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        if (email.length < 4) {
          alert('Please enter an email address.');
          return;
        }
        if (password.length < 4) {
          alert('Please enter a password.');
          return;
        }
        // Sign in with email and pass.
        // [START authwithemail]
        firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
          // Handle Errors here.
          var errorCode = error.code;
          var errorMessage = error.message;
          // [START_EXCLUDE]
          if (errorCode === 'auth/wrong-password') {
            alert('Wrong password.');
          } else {
            alert(errorMessage);
          }
          console.log(error);
          document.getElementById('quickstart-sign-in').disabled = false;
          // [END_EXCLUDE]
        });
        // [END authwithemail]
      }
      document.getElementById('quickstart-sign-in').disabled = true;
    }
    /**
     * Handles the sign up button press.
     */
    function handleSignUp() {
      var email = document.getElementById('email').value;
      var password = document.getElementById('password').value;
      if (email.length < 4) {
        alert('Please enter an email address.');
        return;
      }
      if (password.length < 4) {
        alert('Please enter a password.');
        return;
      }
      // Sign in with email and pass.
      // [START createwithemail]
      firebase.auth().createUserWithEmailAndPassword(email, password).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // [START_EXCLUDE]
        if (errorCode == 'auth/weak-password') {
          alert('The password is too weak.');
        } else {
          alert(errorMessage);
        }
        console.log(error);
        // [END_EXCLUDE]
      });
      // [END createwithemail]
    }
    /**
     * Sends an email verification to the user.
     */
    function sendEmailVerification() {
      // [START sendemailverification]
      firebase.auth().currentUser.sendEmailVerification().then(function() {
        // Email Verification sent!
        // [START_EXCLUDE]
        alert('Email Verification Sent!');
        // [END_EXCLUDE]
      });
      // [END sendemailverification]
    }
    function sendPasswordReset() {
      var email = document.getElementById('email').value;
      // [START sendpasswordemail]
      firebase.auth().sendPasswordResetEmail(email).then(function() {
        // Password Reset Email Sent!
        // [START_EXCLUDE]
        alert('Password Reset Email Sent!');
        // [END_EXCLUDE]
      }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // [START_EXCLUDE]
        if (errorCode == 'auth/invalid-email') {
          alert(errorMessage);
        } else if (errorCode == 'auth/user-not-found') {
          alert(errorMessage);
        }
        console.log(error);
        // [END_EXCLUDE]
      });
      // [END sendpasswordemail];
    }
    /**
     * initApp handles setting up UI event listeners and registering Firebase auth listeners:
     *  - firebase.auth().onAuthStateChanged: This listener is called when the user is signed in or
     *    out, and that is where we update the UI.
     */
    function initApp() {
      // Listening for auth state changes.
      // [START authstatelistener]
      firebase.auth().onAuthStateChanged(function(user) {
        // [START_EXCLUDE silent]
        document.getElementById('quickstart-verify-email').disabled = true;
        // [END_EXCLUDE]
        if (user) {
          // User is signed in.
          var displayName = user.displayName;
          var email = user.email;
          var emailVerified = user.emailVerified;
          var photoURL = user.photoURL;
          var isAnonymous = user.isAnonymous;
          var uid = user.uid;
          var providerData = user.providerData;
          // [START_EXCLUDE]
          document.getElementById('quickstart-sign-in-status').textContent = 'Signed in';
          document.getElementById('quickstart-sign-in').textContent = 'Sign out';
        //  document.getElementById('quickstart-account-details').textContent = JSON.stringify(user, null, '  ');
          if (!emailVerified) {
            document.getElementById('quickstart-verify-email').disabled = false;
          }
          // [END_EXCLUDE]
        } else {
          // User is signed out.
          // [START_EXCLUDE]
          document.getElementById('quickstart-sign-in-status').textContent = 'Signed out';
          document.getElementById('quickstart-sign-in').textContent = 'Sign in';
          document.getElementById('quickstart-account-details').textContent = 'null';
          // [END_EXCLUDE]
        }
        // [START_EXCLUDE silent]
        document.getElementById('quickstart-sign-in').disabled = false;
        // [END_EXCLUDE]
      });
      // [END authstatelistener]
      document.getElementById('quickstart-sign-in').addEventListener('click', toggleSignIn, false);
      document.getElementById('quickstart-sign-up').addEventListener('click', handleSignUp, false);
      document.getElementById('quickstart-verify-email').addEventListener('click', sendEmailVerification, false);
      document.getElementById('quickstart-password-reset').addEventListener('click', sendPasswordReset, false);
    }
    window.onload = function() {
      initApp();
    };
  </script>
  


    
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- Material Design Theming -->
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.orange-indigo.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>

  <link rel="stylesheet" href="main.css">

  <!-- Import and configure the Firebase SDK -->
  <!-- These scripts are made available when the app is served or deployed on Firebase Hosting -->
  <!-- If you do not serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup -->
  <script src="https://www.gstatic.com/firebase/4.0.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebase/4.0.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebase/init.js"></script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <!--[endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">


    <script src="https://www.gstatic.com/firebasejs/4.1.2/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDbik6ZsaF34Rpf1WqfKBfPgTozdXQ4r_s",
    authDomain: "thinkmons-ae5ed.firebaseapp.com",
    databaseURL: "https://thinkmons-ae5ed.firebaseio.com",
    projectId: "thinkmons-ae5ed",
    storageBucket: "thinkmons-ae5ed.appspot.com",
    messagingSenderId: "329454814635"
  };
  firebase.initializeApp(config);

      initApp = function() {
        firebase.auth().onAuthStateChanged(function(user) {
          if (user) {
            // User is signed in.
            var displayName = user.displayName;
            var email = user.email;
            var emailVerified = user.emailVerified;
            var photoURL = user.photoURL;
            var uid = user.uid;
            var phoneNumber = user.phoneNumber;
            var providerData = user.providerData;
            user.getToken().then(function(accessToken) {
              document.getElementById('sign-in-status').textContent = 'Signed in';
              document.getElementById('sign-in').textContent = 'Sign out';
       //       document.getElementById('account-details').textContent = JSON.stringify({
        //        displayName: displayName,
        //        email: email,
       //         emailVerified: emailVerified,
       //         phoneNumber: phoneNumber,
       //         photoURL: photoURL,
       //         uid: uid,
       //         accessToken: accessToken,
       //         providerData: providerData
       //       }, null, '  ');
            });
          } else {
            // User is signed out.
            document.getElementById('sign-in-status').textContent = 'Signed out';
            document.getElementById('sign-in').textContent = 'Sign in';
            document.getElementById('account-details').textContent = 'null';
          }
        }, function(error) {
          console.log(error);
        });
      };

      window.addEventListener('load', function() {
        initApp()
      });
</script>

    <script src="https://cdn.firebase.com/libs/firebaseui/2.0.0/firebaseui.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/2.0.0/firebaseui.css" />

    <script type="text/javascript">
      // FirebaseUI config.
      var uiConfig = {
        signInSuccessUrl: 'log.php',
        signInOptions: [
           {
        provider: firebase.auth.GoogleAuthProvider.PROVIDER_ID,
        scopes: ['https://www.googleapis.com/auth/plus.login',
                'email'
                ]
      },
      {
        provider: firebase.auth.FacebookAuthProvider.PROVIDER_ID,
        scopes :[
          'public_profile',
          'email',
          'user_likes',
          'user_friends'
        ]
      }         
        ],
        // Terms of service url.
        tosUrl: 'www.google.com'
      };

      // Initialize the FirebaseUI Widget using Firebase.
      var ui = new firebaseui.auth.AuthUI(firebase.auth());
      // The start method will wait until the DOM is loaded.
      ui.start('#firebaseui-auth-container', uiConfig);
    </script>
</head><!--/head-->



<body>
    

	<header id="header"><!--header-->
		
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
						</div>
						
							
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		
	</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<div>
							<input type="email" placeholder="Email" id="email" />
							<input type="password" placeholder="Password" id="password" />
							
							 <button disabled class="btn btn-primary" id="quickstart-sign-in" name="signin">Sign In</button>
          &nbsp;&nbsp;&nbsp;
          <button class="btn btn-primary" id="quickstart-sign-up" name="signup">Sign Up</button>
          <br>
          &nbsp;&nbsp;&nbsp;
          <button class="btn btn-primary" id="quickstart-password-reset" name="verify-email">Send Password Reset Email</button>

          <div class="quickstart-user-details-container">
            Firebase sign-in status: <span id="quickstart-sign-in-status">Unknown</span>
          </div>
						</div>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
           <div id="firebaseui-auth-container"></div>
     <div id="sign-in-status"></div>
    <div id="sign-in"></div>
    <div id="account-details"></div>
                	</div>
			</div>
		</div>


	</section><!--/form-->
	
	
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>