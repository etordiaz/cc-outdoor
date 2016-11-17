import React, { PropTypes } from 'react';

export default class ShelterDetail extends React.Component {

    render() {
        var imgsrc = '/assets/build/img/'+this.props.shelter.image;
        return (
            <div>
                <div className="thumbnail">
                    <div className="row">
                        <div className="col-md-3">
                            <img src={imgsrc} className="img-responsive"/>
                        </div>
                        <div className="col-md-9">
                        <h3>{this.props.shelter.name}</h3>
                        <p className="shelter-body">{this.props.shelter.text}</p>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
