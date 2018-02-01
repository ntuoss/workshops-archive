# TGIFHacks #11 - Getting Started with Mozilla Developer Network
###Workshop conducted by [Mr. Ordinaire](https://github.com/mrordinaire)###

These are slides I used in TGIFHacks #11. They are made with
[misaki](http://liquidz.github.io/misaki/), brought to us by the wonderful
[Masashi Iizuka](http://liquidz.github.io/).

# How to view
1. Clone this repo

    ```bash
    git clone https://github.com/ntuoss/open-source-contribution.git
    ```

2. Run a HTTP static file server
  * With [misaki](http://liquidz.github.io/misaki/)

        ```bash
        cd path/to/misaki/
        lein run path/to/open-source-contribution/
        ```
  * With [node.js](http://nodejs.org/)

        ```bash
        npm install http-server -g
        cd open-source-contribution/
        http-server
        ```
  * With [php](http://php.net)

        ```bash
        cd open-source-contribution/
        php -S localhost:8080
        ```
3. Launch your favourite web browser (we recommend [Mozilla
Firefox](http://firefox.com)), visit [http://localhost:8080](http://localhost:8080).
