import React, { PropTypes } from 'react';

export default class ShelterBox extends React.Component {

    render() {
        var imgsrc = '/assets/build/img/'+this.props.shelter.image;
        return (
            <div>
                <div>
                    <img src={imgsrc} className="img-responsive"/>
                </div>
                <div>
                    <h3>{this.props.shelter.name}</h3>
                    <p className="shelter-body">{this.props.shelter.text}</p>
                </div>
            </div>
        );
    }
}
