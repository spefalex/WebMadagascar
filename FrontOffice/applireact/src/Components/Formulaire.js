import React from 'react';
import AppBar from 'material-ui/AppBar';
import DropDownMenu from 'material-ui/DropDownMenu';
import MenuItem from 'material-ui/MenuItem';

export default class Formulaire extends React.Component {
	constructor(props) {
		super(props);
		this.state = {value: 1};
	  }
	
	  handleChange = (event, index, value) => this.setState({value});
render() {

return (
<div>
<AppBar
    title="Welcome WebMadagascar"
    iconClassNameRight="muidocs-icon-navigation-expand-more"
  />
  <DropDownMenu value={this.state.value} onChange={this.handleChange}>
<MenuItem value={1} primaryText="Never" />
<MenuItem value={2} primaryText="Every Night" />
<MenuItem value={3} primaryText="Weeknights" />
<MenuItem value={4} primaryText="Weekends" />
<MenuItem value={5} primaryText="Weekly" />
</DropDownMenu>
  </div>



	)

	}

}

