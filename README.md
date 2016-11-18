# cc-outdoor
Symfony3.1 + ReactBundle + SQLServer Boilerplate


## Instal·lar l'entorn

Requeriments: node > `v5.5.0` i composer (alguna versió no molt antiga)

    git clone https://github.com/etordiaz/cc-outdoor.git
    cd cc-outdor
    composer install
    npm install

Si no es disposa del webpack-dev-server 

    `npm install -g webpack webpack-dev-server`

La primera vegada, serà menester executar webpack per a moure tots els assets.
    
    `webpack`


## Per a desenvolupar

* per al hot realoading per la banda client, en un terminal, engegar el webpack-dev-server . 

    `webpack-dev-server --progress --colors --config webpack.config.js`

* Paral·lelament, si (també) estàs renderitzant per servidor i vols tenir hotReloading del server-bundle.js, en un terminal nou:

    `webpack --config webpack.config.serverside.js --watch`

* A més, si no tens el symfony corrent per un servidor local (IIS, XAMPP), pots executar el Symfony server a través d'un altre terminal:

    `php bin/console server:start`

Ara sí, el teu codi està disponible a [http://127.0.0.1:8000](http://127.0.0.1:8000)




