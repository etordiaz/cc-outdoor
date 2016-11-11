import Constants from '../constants/Constants';

const Actions = {
    carregaUsuaris: () => {
        return dispatch => {
            dispatch({ type: Constants.CARREGANT_USUARI });

            $.get('/usuari', (data) => {
                dispatch({
                    type: Constants.USUARI_REBUT,
                    usuari: data
                });
            });
        };
    }
}

export default Actions;
