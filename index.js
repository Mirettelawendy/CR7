Cookies.set('habak','false', {expires: 10})

var mycookie = Cookies.get('habak')
var title = document.querySelector('h1')

if(mycookie !== null){

if(mycookie){
    title.classList.add('logins')
}
else if (mycookie == false){
  title.classList.remove('logins')
}
}