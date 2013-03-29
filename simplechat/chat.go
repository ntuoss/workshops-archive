package main

import (
    "html/template"
    "log"
    "net/http"

    "code.google.com/p/go.net/websocket"
)

type message struct {
    User string     `json:"u"`
    Content string  `json:"m"`
}

var (
    page = template.Must(template.New("root").Parse(`
<!doctype html>
<html>
    <head>
        <title>Simple chat</title>
        <style>
            #frame {
                text-align: center;
            }

            #logo {
                text-transform: uppercase;
                margin: auto;
            }
        </style>
    </head>
    <body>
        <div id="frame">
            <div id="logo">Simple chat</div>
            <div id="lines"></div>
            <input id="name" name="line" type="textarea" />
            <input id="line" name="line" type="textarea" />
            <input id="send" value="Send" type="submit" />
        </div>
        <script>
            var socket = new WebSocket("ws://{{.}}/socket")
            socket.onmessage = function(m) {
                var message = JSON.parse(m.data)
                var lines = document.getElementById("lines")
                var line = document.createElement("div")
                var user = document.createElement("span")
                var content = document.createElement("span")
                var br = document.createElement("br")

                user.class = "user"
                if (message.u) {
                    user.textContent = message.u + ":"
                } else {
                    user.textContent = "anonymous:"
                }

                content.class = "content"
                content.textContent = message.m

                line.appendChild(user)
                line.appendChild(content)
                line.appendChild(br)

                lines.appendChild(line)
            }

            var button = document.getElementById("send")
            button.onclick = function () {
                var line = document.getElementById("line")
                var name = document.getElementById("name")
                if (line.value) {
                    socket.send(JSON.stringify({
                        u: name.value,
                        m: line.value
                    }))
                    line.value = ""
                }
            }

            var text = document.getElementById("line")
            text.onkeyup = function(e) {
                if ((e.keyCode || e.which) == 13) {
                    button.onclick()
                    return false
                }
            }
        </script>
    </body>
</html>
    `))

    listenAddress = "localhost:4000"

    list broadcastList
)

func main() {
    http.HandleFunc("/", serve)
    http.Handle("/socket", websocket.Handler(chat))
    err := http.ListenAndServe(listenAddress, nil)
    if err != nil {
        log.Fatalln(err)
    }
}

func serve(w http.ResponseWriter, r *http.Request) {
    page.Execute(w, listenAddress)
}

func chat(c *websocket.Conn) {
    m := &message{Content: "Hello, welcome to SimpleChat"}
    websocket.JSON.Send(c, *m)

    list.Append(c)

    for {
        err := websocket.JSON.Receive(c, m)
        if err != nil {
            log.Println(err)
        }

        list.Broadcast(m)
    }
}
