import { IndexRoute, Route } from 'react-router';
import React from 'react';
import Usuari from '../containers/Usuari';

export default function configureRoutes(store) {
    const { baseUrl } = store.getState().usuari;
    return (
    <div>
    <Route path={baseUrl} component={Usuari}></Route>
    </div>);
};
