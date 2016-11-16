import React , {Proptypes} from 'react';
import Actions from '../actions/sheltersActions';
import { connect } from 'react-redux';
import ShelterWidget from '../components/Shelter';
import Topbar from '../components/Topbar';
import { Link } from 'react-router';


class Shelter extends React.Component {
    componentDidMount() {
        if ( !this.props.shelter || this.props.shelter.slug != this.props.params.slug) {
            const { dispatch } = this.props;
            dispatch(Actions.fetchShelter(this.props.params.slug));
        }
    }

    getShelter() {
        // if we know that we are loading thata
        if (this.props.fetching ||
        // or we do not have a recipe
        !this.props.shelter ||
        // or the recipe we have is not the one we should have
        this.props.shelter.slug != this.props.params.slug) {
            return (
                <div>
                <Topbar usuari={this.props.usuari} />
                Loading...
                </div>
            );
        } else {
            return (
                <div>
                <Topbar usuari={this.props.usuari} />
                <ol className="breadcrumb">
                <li><Link to='/'>Marquesines</Link></li>
                <li className="active">{this.props.shelter.name}</li>
                </ol>
                <ShelterWidget shelter={this.props.shelter}/>
                </div>);
        }
    }

    render() {
        const { store } = this.props;

        return (
            <div>
            {this.getShelter()}
            </div>
        );
    }
}

const mapStateToProps = (state) => {
    return state.shelters;
};

export default connect(mapStateToProps)(Shelter);
