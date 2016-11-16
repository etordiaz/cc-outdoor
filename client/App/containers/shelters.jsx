import React from 'react';
import Actions from '../actions/sheltersActions';
import { connect } from 'react-redux';
import SheltersGrid from '../components/SheltersGrid';
import Topbar from '../components/Topbar';


class Shelters extends React.Component {
    componentDidMount() {
        if (!this.props.shelters) {
            const { dispatch } = this.props;
            dispatch(Actions.fetchShelters(this.props.usuari.poblacioSlug));
        }
    }
    render() {
        const { store } = this.props;
        if (this.props.fetching || !this.props.shelters) {
            return (
                <div>
                Loading...
                </div>
            );
        } else {
            return (
                <div>
                <Topbar usuari={this.props.usuari} />
                    <SheltersGrid shelters={this.props.shelters}/>
                </div>
            );
        }
    }
}

const mapStateToProps = (state) => {
    return state.shelters;
};

export default connect(mapStateToProps)(Shelters);
