import ReactOnRails from 'react-on-rails';
import mainApp from './AppClient';
import configureStore from '../store/UsuariStore';

var usuariStore = configureStore;

ReactOnRails.registerStore({usuariStore})
ReactOnRails.register({ mainApp });
