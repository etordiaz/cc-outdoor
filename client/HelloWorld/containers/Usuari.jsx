import React, { PropTypes } from 'react';
import Actions from '../actions/Actions';
import { connect } from 'react-redux';
import { Link } from 'react-router';

class Usuari extends React.Component {
    componentDidMount() {
        if ( !this.props.usuari || this.props.usuari.slug != this.props.params.slug) {
            const { dispatch } = this.props;
            dispatch(Actions.carregaUsuaris(this.props.params.slug));
        }
    }

    getUsuari() {
        // if we know that we are loading that user  or we do not have a usuari
        if (this.props.fetching || !this.props.usuari) {
            return (
                <div>
                Carregant...
                </div>
            );
        } else {
            return (
                <div>
                </div>);
        }
    }

    render() {
        const { store } = this.props;
         var imgsrc = '/assets/build/img/'+this.props.usuari.thumbnail;
        return (
            <div>
                <h3>{this.props.usuari.nom}</h3>
                <div className="thumbnail">
                    <div className="row">
                        <div className="col-md-3">
                            <img src={imgsrc} className="img-responsive"/>
                        </div>
                        <div className="col-md-9">
                            <p className="recipe-body">{this.props.usuari.descripcio}</p>
                        </div>
                    </div>
                </div>
                <div><button type="button" onClick={this.props.carregaUsuaris} className="btn btn-default">Refrescar</button></div>
            </div>

        );
    }
}

Usuari.PropTypes = {
    dispatch: PropTypes.func,
    carregaUsuaris: PropTypes.func,
};

const mapStateToProps = (state) => {
    return state.usuari;
};

const mapDispatchToProps = (dispatch) => {
    return {
        dispatch,
        carregaUsuaris: () => {
            dispatch(Actions.carregaUsuaris());
        }
    };
};

export default connect(mapStateToProps, mapDispatchToProps)(Usuari);
