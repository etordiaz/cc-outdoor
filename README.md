# cc-outdoor
Symfony3.1 + ReactBundle + SQLServer Boilerplate


How to run it
=============

Requeriments: node > `v5.5.0`, composer i webpack (instal·lació via `npm install -g webpack webpack-dev-server`.

    git clone https://github.com/etordiaz/cc-outdoor.git
    cd cc-outdor
    composer install
    npm install
    npm install -g webpack webpack-dev-server


* En un terminal, engegar el webpack-dev-server per a desenvolupar a temps real. 

    webpack-dev-server --progress --colors --config webpack.config.js

* Alhora, la primera vegada serà menester executar webpack per a moure tots els assets.
    
    webpack

* A més, si no tens un XAMPP/WAMPP, engegar el Symfony server:

    bin/console server:start


Ara sí, el teu codi està disponible a [http://127.0.0.1:8000](http://127.0.0.1:8000).




