import React from 'react';

export default class Connexion extends React.Component {
/*
goAcceuil = event => {
 event.preventDefault();
alert(this.pseudoInput.value)
const pseudo = this.pseudoInput.value;
const password = this.passwordInput.value;
 this.props.router.push('/pseudo/');

  this.props.router.push({
          pathname: '/pseudo',
       // query: {pseudo:pseudo}
        })

}*/
connexionLogin = event =>
{
        event.preventDefault();
        const pseudo = this.pseudoInput.value;
        const password = this.passwordInput.value;
 
  fetch('http://127.0.0.1/Project/BackEnd/web-madagascar/web/app_dev.php/webmada/loginUser', {
  method: 'POST',
  headers: { 
           'Accept': 'application/json',
           'Content-Type': 'application/json' 
           },
  body: JSON.stringify({username:pseudo, password: password})
})
.then((response) => response.json()) 
.then((responseData) => {


  if(responseData.message =='OK') {
        this.props.router.push({
                pathname: '/pseudo',
             // query: {pseudo:pseudo}
              })
  } else {

        alert(responseData.message)
}

})
.catch((err) => { console.log(err); });


}

render() {

return (

<div className="connexionBox" onSubmit={e=> this.connexionLogin(e)}>
<form className="connexion">
<input type ="text" placeholder ="Pseudo" required ref={input =>{this.pseudoInput= input}}/>
<input type ="password" placeholder ="Password" required ref={input =>{this.passwordInput= input}}/>
<button type ="submit"> Se connecter </button>
</form>
</div>


	)

	}

}

