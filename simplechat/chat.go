package main

import (
    "html/template"
    "io/ioutil"
    "log"
    "net/http"
    "os"

    "code.google.com/p/go.net/websocket"
)

type message struct {
    User string     `json:"u"`
    Content string  `json:"m"`
}

var (
    listenAddress = "localhost:4000"
    page *template.Template
    list broadcastList
)

func main() {
    file, err := os.Open("chat.html")
    if err != nil {
        log.Fatalln(err)
    }
    rawBytes, err := ioutil.ReadAll(file)
    if err != nil {
        log.Fatalln(err)
    }
    file.Close()

    page = template.Must(template.New("root").Parse(string(rawBytes)))

    http.HandleFunc("/", serve)
    http.Handle("/socket", websocket.Handler(chat))
    err = http.ListenAndServe(listenAddress, nil)
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
