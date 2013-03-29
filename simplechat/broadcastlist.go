package main

import (
    "log"
    "sync"

    "code.google.com/p/go.net/websocket"
)

type broadcastList struct {
    sync.Mutex
    Connections []*websocket.Conn
}

func (l *broadcastList) Append(c *websocket.Conn) {
    l.Lock()
    defer l.Unlock()

    l.Connections = append(l.Connections, c)
}

func (l *broadcastList) Broadcast(m *message) {
    l.Lock()
    defer l.Unlock()

    for _, c := range l.Connections {
        err := websocket.JSON.Send(c, *m)
        if err != nil {
            log.Println(err)
        }
    }
}
