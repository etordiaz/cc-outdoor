import sheltersReducer from './sheltersReducer';
import { initialState as sheltersState } from './sheltersReducer';
import { combineReducers }  from 'redux';

// Combine all reducers you may have here
export default combineReducers({
    shelters: sheltersReducer,

});

export const initialStates = {
    sheltersState,
};
