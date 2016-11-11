import usuariReducer from './usuariReducer';
import { initialState as usuariState } from './usuariReducer';
import { combineReducers }  from 'redux';

// Combine all reducers you may have here
export default combineReducers({
    usuari: usuariReducer,

});

export const initialStates = {
    usuariState,
};
