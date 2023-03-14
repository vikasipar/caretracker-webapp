function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else {
    alert("Geolocation is not supported by this browser.");
  }
}

var latitude;
var longitude;

function showPosition(position) {
  latitude = position.coords.latitude;
  longitude = position.coords.longitude;
  const url = "https://www.google.com/maps?q=" + latitude + "," + longitude;

  console.log("Your current location is:");
  console.log(url);

  // Store the URL in a variable accessible to the sendEmail() function
  window.locationUrl = url;
}

function showError(error) {
  switch (error.code) {
    case error.PERMISSION_DENIED:
      console.log("User denied the request for Geolocation.");
      setTimeout(getLocation, 1000); // Wait for 1 second and then try again
      break;
    case error.POSITION_UNAVAILABLE:
      console.log("Location information is unavailable.");
      break;
    case error.TIMEOUT:
      console.log("The request to get user location timed out.");
      break;
    case error.UNKNOWN_ERROR:
      console.log("An unknown error occurred.");
      break;
  }
}
