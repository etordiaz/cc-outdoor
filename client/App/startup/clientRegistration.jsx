import ReactOnRails from 'react-on-rails';
import mainApp from './AppClient';
import configureStore from '../store/appStore';

var appStore = configureStore;

ReactOnRails.registerStore({appStore})
ReactOnRails.register({ mainApp });
