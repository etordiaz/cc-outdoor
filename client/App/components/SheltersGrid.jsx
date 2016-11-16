import React , {Proptypes} from 'react';
import Shelter from './Shelter';
import { connect } from 'react-redux';
import { Link } from 'react-router'
require("../../sass/layout.scss");

// Simple example of a React "dumb" component
export default class SheltersGrid extends React.Component {
    filterTextInput = null;

    constructor(props, context) {
        super(props, context);
        this.state = {
            shelters: this.props.shelters,
            usuari: this.props.usuari,
            filterText: ''
        };
    }
    onChangeSearch() {
        this.setState({filterText: this.filterTextInput.value});
    }

    render() {
        var shelterNodes = [];
        this.state.shelters.forEach((shelter, idx)  => {
            if (this.state.filterText != '' && shelter.name.toLowerCase().indexOf(this.state.filterText) === -1) {
                return;
            }
            var link = '/shelter/' + shelter.slug;
            shelterNodes.push(
                <div key={idx}>
                    <Link to={link}>
                        <Shelter key={idx} shelter={shelter} id={idx}/>
                    </Link>
                </div>
            );
        });
        return (
            <div className="container">
               <h2>Inici - Sant Andreu de la Barca</h2>
               <h3>Accés per a Municipis</h3>
                {shelterNodes}
            </div>
           
        );
    }
    // <div id="search-box" className="pull-right">
    //                 <div className="input-group">
    //                     <input type="text" className="form-control" value={this.state.filterText} placeholder="Search for..." ref={(c) => {this.filterTextInput = c;}} onChange={this.onChangeSearch.bind(this)}/>
    //                     <span className="input-group-btn">
    //                         <button className="btn btn-default" type="button">Cerca</button>
    //                     </span>
    //                 </div>
    //             </div>
}
