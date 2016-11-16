import { IndexRoute, Route } from 'react-router';
import React from 'react';
import Shelters from '../containers/shelters';
import Shelter from '../containers/shelter';

export default function configureRoutes(store) {
    const { baseUrl } = store.getState().shelters;
    return (
    <div>
    <Route path={baseUrl} component={Shelters}></Route>
    <Route path={baseUrl+"shelter/:slug"} component={Shelter}/>
    </div>);
};
