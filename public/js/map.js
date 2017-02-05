
 
//Set up some of our variables.
var map; //Will contain map object.
var marker = false; ////Has the user plotted their location marker? 
        
//Function called to initialize / create the map.
//This is called when the page has loaded.
function initMap() {
 
    //The center location of our map.
    var centerOfMap = new google.maps.LatLng(0,0);
 
    //Map options.
    var options = {
      center: centerOfMap, //Set center.
      zoom: 7 //The zoom value.
    };
 
    //Create the map object.
    map = new google.maps.Map(document.getElementById('map'), options);
 
    //Listen for any clicks on the map.
    google.maps.event.addListener(map, 'click', function(event) {

        getusersbylocationCoords(event.latLng.lat(),event.latLng.lng());               
        //Get the location that the user clicked.
        var clickedLocation = event.latLng;
        //If the marker hasn't been added.
        if(marker === false){
            //Create the marker.
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(marker, 'dragend', function(event){
                markerLocation();
            });
        } else{
            //Marker has already been added, so just change its location.
            marker.setPosition(clickedLocation);
        }
        //Get the marker's location.
        markerLocation();
    });
}
        
//This function will get the marker's current location and then add the lat/long
//values to our textfields so that we can save the location.

function getUsers(latLng)
{
    var lat = latLng.lat(); 
    var lng = latLng.lng();

    var base_url = $("#base_url").val();
    var targetURL = base_url+'getusersbylocationcoords';
    $.ajax({
        url: targetURL,
        method: "POST",
        data: { lat: lat, lng : lng }, 
        success: function(result)
        {
            $(".users_content").fadeOut('slow');
            $(".users_content").html(result);
            $(".users_content").fadeIn('slow');
        }
      });

}

function setMapPosition(name)
{
    var base_url = $("#base_url").val();
    var targetURL = base_url+'setmappos';
    $.ajax({
        url: targetURL,
        method: "POST",
        data: { q: q}, 
        success: function(result)
        {
           
        }
      });
}

function getUserByLocationName()
{
    var q = $("#q").val();
    if(q == "")
    {
        alert('Please Enter A Location');
        return;
    }

    

    var base_url = $("#base_url").val();
    var targetURL = base_url+'getusersbylocation';
    $.ajax({
        url: targetURL,
        method: "POST",
        data: { q: q},
        async:true, 
        success: function(result)
        {
            $(".users_content").fadeOut('slow');
            $(".users_content").html(result);
            $(".users_content").fadeIn('slow');
            setMapPosition(q);
        }
      });

}




function getusersbylocationCoords(lat,lng)
{
    // lat = position.coords.latitude;
    // lng = position.coords.longitude;

   
    var base_url = $("#base_url").val();
    var targetURL = base_url+'getusersbylocationcoords';
    $.ajax({
        url: targetURL,
        method: "POST",
        data: { lat: lat, lng : lng}, 
        success: function(result)
        {
            $(".users_content").fadeOut('slow');
            $(".users_content").html(result);
            $(".users_content").fadeIn('slow');

        }
      });
}

function markerLocation(){
    //Get location.
    var currentLocation = marker.getPosition();

    var lat = currentLocation.lat();
    var lng = currentLocation.lng();
   
}
        


//Load the map when the page has finished loading.
google.maps.event.addDomListener(window, 'load', initMap);


function getLocation() {
    
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {

    getusersbylocationCoords(position.coords.latitude,position.coords.longitude);

    map.setCenter(new google.maps.LatLng( position.coords.latitude, position.coords.longitude ) );
   
}