# Piranha Bytes Italia template

Template Wordpress per il fansite italiano [Piranha Bytes Italia](http://www.piranhabytesitalia.it).

## Istruzioni

### 1. Installare Node.js

Su Windows è possibile scaricare ed installare [Node.js per Windows](https://nodejs.org).
Su Windows 10 Creators Update è anche possibile attivare il sottosistema *Linux on Windows* ed installare quindi [Node.js come pacchetto Ubuntu](https://blogs.windows.com/buildingapps/2016/03/30/run-bash-on-ubuntu-on-windows/).

### 2. Installare Grunt

Una volta che Node.js è installato (verificare lanciando `npm -version` da riga di comando), installare Grunt con il comando

```
npm install -g grunt-cli
```

### 3. Installare le dipendenze di Bootstrap

Accedere alla cartella `/bootstrap` e lanciare

```
npm install
```

per scaricare le dipendenze di Bootstrap.

### 4. Compilare il tutto

I seguenti comandi possono essere utilizzati per compilare le risorse (CSS e JS) del tema:

* `grunt dist-css`: compila solo il CSS,
* `grunt dist-js`: compila solo il Javascript,
* `grunt dist`: compila tutto.

I file risultanti vengono copiati automaticamente in `/template/resources`, dove possono essere inclusi ed utilizzati dal template HTML/PHP per Wordpress.
