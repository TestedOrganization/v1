$( document ).ready(function() {
		$('#logoutBtn').hide();
		$('#userDetails').hide();
	});

	function fbAsyncInit() {
		FB.init({
			appId      : '902328696492143',
			status     : true, // check login status
			cookie     : true, // enable cookies to allow the server to access the session
			xfbml      : true  // parse XFBML
		});
	}
	function logIn() {
		
	  	FB.login(
	        function(response) {
				if (response.status== 'connected') {
					FB.api('/me', function (response) {
				    	console.log(response);
				      	console.log('Good to see you, ' + response.name + '.');
				      	$('#userInfo').html(response.name);
				      	$('#loginBtn').hide();
				      	$('#logoutBtn').show();
						$('#userDetails').show();
						//$('#userInfo').html(response.name + '<br>' + response.location.name);
						

				    });

				    FB.api("/me/picture?width=200&redirect=0&type=normal&height=200", function (response) {
				      	if (response && !response.error) {
				        	/* handle the result */
				        	console.log('PIC ::', response);
				        	$('#userPic').attr('src', response.data.url);
				      	}
				    });

				    FB.api({
    					method: 'fql.query',
    					query: 'SELECT uid, name FROM user WHERE uid = 895007193871164'
					}, function (data) {
    						console.log('fql::',data);
    						var res = data[0].name;
    						alert(res);
    					}
					);
				}
			}
		);
	}

	function logOut() {
		FB.logout(function(response) {
			console.log('logout :: ', response);
			//Removing access token form localStorage.
			$('#loginBtn').show();
			$('#logoutBtn').hide();
			$('#userDetails').hide();
		});
	}

	(function(d, s, id) {
  		var js, fjs = d.getElementsByTagName(s)[0];
  			if (d.getElementById(id)) return;
  				js = d.createElement(s); js.id = id;
  				js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=902328696492143";
  				fjs.parentNode.insertBefore(js, fjs);
		}
		(document, 'script', 'facebook-jssdk')
	);


	fbAsyncInit();
	