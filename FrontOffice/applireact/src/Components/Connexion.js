import React from 'react';

export default class Connexion extends React.Component {

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

}

render() {

return (

<div className="connexionBox" onSubmit={e=> this.goAcceuil(e)}>
<form className="connexion">
<input type ="text" placeholder ="Pseudo" required ref={input =>{this.pseudoInput= input}}/>
<input type ="text" placeholder ="Password" required ref={input =>{this.passwordInput= input}}/>
<button type ="submit"> Se connecter </button>
</form>
</div>


	)

	}

}

