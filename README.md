# serviceworker-itp-demo

## Setup
* with MacOS

```sh
cd serviceworker-itp-demo
$ sudo -i
# echo '127.0.0.1       loopback.example.net' >> /etc/hosts
# exit

$ openssl req -new -x509 -sha256 -newkey rsa:2048 -days 365 -nodes -out ./proxy/cert/cert.crt -keyout ./proxy/cert/key.key
$ openssl req -new -x509 -sha256 -newkey rsa:2048 -days 365 -nodes -out ./first/cert/cert.crt -keyout ./first/cert/key.key
```

## Start
```sh
$ sudo docker-compose up -d
$ open https://loopback.example.net:4434/
```
