import Constants from '../constants/Constants';

export const initialState = {
    usuari: null,
    fetching: false,
    baseUrl: '/',
    location: '/',
};

export default function usuariReducer(state = initialState, action) {
    switch (action.type) {
        case Constants.CARREGANT_USUARI:
            return { ...state, fetching: true};

        case Constants.USUARI_REBUT:
        console.log(action);
            return { ...state, usuari:action.usuari, fetching: false };

        default:
            return state;
    }
}
