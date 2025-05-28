function isLocalStorageSupported(){
  if (typeof Storage !== "undefined")

    return true;
  else{

    return false;
  }
}

function doesVariableExist(x){
  if (localStorage[x]) {
    return true;
  }else{
    return false;
  }
}

function createStorageVariable(x, value){
  localStorage[x] = value
  return localStorage[x]
}

if (isLocalStorageSupported){
  if(doesVariableExist('test')){
    localStorage.test = Number(localStorage.test) + 1
  }else{
    localStorage.test = 1
  }
  console.log(localStorage.test)
}

if (typeof Storage !== "undefined") {

  if (localStorage.visitcount) {

    document.getElementById("result").innerHTML =
      "Byłeś na tej strone " +
      localStorage.visitcount +
      " razy.";
    localStorage.visitcount = Number(localStorage.visitcount) + 1;
  } else {

    localStorage.visitcount = 1;
    document.getElementById("result").innerHTML =
      "Weszłeś na te stronę po raz pierwszy. ";
  }
} else {
  alert(
    "Lokalne przechowywanie danych nie jest obsługiwane przez twoją przeglądarke."
  );
  document.getElementById("result").innerHTML =
    "Przechowywanie danych nie jest obsługiwane przez twoją przeglądarke.";
}