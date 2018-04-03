import React from 'react';
import AppBar from 'material-ui/AppBar';
import DropDownMenu from 'material-ui/DropDownMenu';
import MenuItem from 'material-ui/MenuItem';

export default class Formulaire extends React.Component {
	constructor(props) {
		super(props);
		this.state = {value: 1, data: [],categorieId:'1'};
		this.handleInputChange = this.handleInputChange.bind(this);
		
		
	  }

	
	  componentDidMount() {
		
			this.getData();
		
			 
		  }
		  
		  handleInputChange(e) {
			
					const value = e.target.value;
					const categorieId = e.target.categorieId;
					this.setState({
						categorieId: e.target.value
					});
					

					alert(e.target.value)
				}
	  getData () {
		
		 return fetch('http://127.0.0.1/Project/BackEnd/web-madagascar/web/app_dev.php/webmada/readCategorie')
			.then(response => response.json())
			.then(responseJson => {
			 this.setState({data:responseJson})
			
	})
			.catch(error => {
			  console.error(error);
			});
		
		} 
	  renderSelect() {
		  
        return this.state.data.map((item, index) => (
            

			<option value={item.id} > {item.libelle_categorie}</option>
            
			
        ));
	}
	

render() {

return (
<div>
<AppBar
    title="Welcome WebMadagascar"
    iconClassNameRight="muidocs-icon-navigation-expand-more"
  />
 
 <select onChange={this.handleInputChange } value={this.state.categorieId} >
  {this.renderSelect()}
</select> 
  </div>



	)

	}

}

