import Constants from '../constants/Constants';

export const initialState = {
    shelters: null,
    shelter: null,
    fetching: false,
    baseUrl: '/',
    location: '/',
};

export default function sheltersReducer(state = initialState, action) {
    switch (action.type) {
        case Constants.SHELTERS_FETCHING:
            return { ...state, fetching: true};

        case Constants.SHELTERS_RECEIVED:
            return { ...state, shelter: null, shelters: action.shelters, fetching: false };

        case Constants.SHELTER_FETCHING:
            return { ...state, fetching: true };

        case Constants.SHELTER_RECEIVED:
            return { ...state, shelters: null, shelter: action.shelter, fetching: false };

        default:
            return state;
    }
}
