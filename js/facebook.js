var faceid;
var face_friends;

window.fbAsyncInit = function () {
FB.init({ appId: '484120638294778', status: true, cookie: true, xfbml: true });

/* All the events registered */
FB.Event.subscribe('auth.login', function (response) {
    // Successfully Connected
    testAPI();
    $('#results p').show()
});
FB.Event.subscribe('auth.logout', function (response) {
    // Log Out
    $('#results h3').text('Goodbye');
    $('#results li').remove();
    $('#results p').hide('slow');
});

FB.getLoginStatus(function (response) {
    if (response.authResponse) {
        // logged in and connected user, someone you know
        testAPI();
    }
    else
      //user is not logged in
      $('#results h3').text('Please Log In First');
});

};
(function () {
var e = document.createElement('script');
e.type = 'text/javascript';
e.src = document.location.protocol +
'//connect.facebook.net/en_US/all.js';
e.async = true;
document.getElementById('fb-root').appendChild(e);
} ());

function testAPI() {
console.log('Welcome!  Fetching your information.... ');
FB.api('/me', function(user) {
    $('#results h3').text('Good to see you, ' + user.name + '( ' + user.id +' ) Here are your friends:');
    console.log(user.id);
    faceid = user.id;
});

FB.api('/me/friends', function(response) {
    if(response.data) {
        $('#results p').hide();
        $.each(response.data,function(index,friend) {
            $('#results ul').append('<li>' + friend.name + ' has id:' + friend.id + '</li>');
            //console.log(response);
        });
    } else {
        alert("Error!");
    }
    $.ajax({
      type: "POST",
      url: "index.php/api/storefriends",
      data: { user: faceid, friends: response.data }

    }).done(function( msg ) {
      console.log( "Data Saved: ");
    });
    });
}