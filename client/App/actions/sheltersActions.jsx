import Constants from '../constants/Constants';

const Actions = {
    fetchShelters: (city) => {
        return dispatch => {
            dispatch({ type: Constants.SHELTERS_FETCHING });

            $.get('/api/shelters/'+city, (data) => {
                dispatch({
                    type: Constants.SHELTERS_RECEIVED,
                    shelters: data
                });
            });
        };
    },
    fetchShelter: (slug) => {
        return dispatch => {
            dispatch({ type: Constants.SHELTER_FETCHING });

            $.get('/api/shelter/'+slug, (data) => {
                dispatch({
                    type: Constants.SHELTER_RECEIVED,
                    shelter: data
                });
            });
        };
    }
}

export default Actions;
