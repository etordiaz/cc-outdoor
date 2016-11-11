import React from 'react';
import { Provider } from 'react-redux';

import configureStore from '../store/UsuariStore';
import Usuari from '../containers/Usuari';
import configureRoutes from '../routes';
import { Router, browserHistory } from 'react-router'
import { syncHistoryWithStore, routerReducer } from 'react-router-redux';
import ReactOnRails from 'react-on-rails';

// See documentation for https://github.com/reactjs/react-redux.
// This is how you get props from the Rails view into the redux store.
// This code here binds your smart component to the redux store.
var mainNode = (props) => {
    const store = ReactOnRails.getStore('usuariStore');

    const reactComponent = (
        <Provider store={store}>
            <Router history={browserHistory}>
                {configureRoutes(store)}
            </Router>
        </Provider>
    );
    return reactComponent;
};

export default mainNode;
