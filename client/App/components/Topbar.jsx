import React from 'react';
import { connect } from 'react-redux';

export default class Topbar extends React.Component {
   
      render() {
          return (
              <nav className="navbar navbar-inverse navbar-fixed-top">
                <div className="container">
                  <div className="navbar-header">
                    <a className="navbar-brand" href="/"><img width="80%" height="auto" src='/assets/build/img/cco-logo.png'/></a>
                  </div>
                  <div className="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul className="nav navbar-nav pull-right">
                      <li>Hola, <span>{this.props.usuari.nom}</span>!</li>
                    </ul>
                  </div>
                </div>
              </nav>
          );  
      }
}
