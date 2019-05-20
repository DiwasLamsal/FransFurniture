/*
* -------------------------------------------------
* The javascript file that contains ajax code
* -------------------------------------------------
*/

/** Funcion Search
* Displays search result without refreshing the page
* @param value - The search query provided
*/
function search(value){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200)
      document.getElementsByClassName('furniture')[0].innerHTML = this.responseText;
 };
 var path = window.location.pathname;
 var last = path.substring(path.lastIndexOf("/") + 1, path.length);


  if(value.length==0 && last!="UsersFurniture"){
    xhttp.open("GET", "/Assignment/public/UsersFurniture/createNoSearchContent/"+last, true);
    console.log("here");
  }
  else if(value.length==0){
    xhttp.open("GET", "/Assignment/public/UsersFurniture/createNoSearchContent", true);
  }
  else if(last=="UsersFurniture")
    xhttp.open("GET", "/Assignment/public/UsersFurniture/search/"+value, true);
  else
    xhttp.open("GET", "/Assignment/public/UsersFurniture/search/"+last+','+value, true);

  xhttp.send();
}
