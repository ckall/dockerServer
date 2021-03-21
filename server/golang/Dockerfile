FROM golang:1.15-alpine

MAINTAINER ckall

ENV TZ=Asia/Shanghai

WORKDIR /var/www

COPY ./ /var/www

RUN echo "http://mirrors.aliyun.com/alpine/v3.4/main/" > /etc/apk/repositories \
  && apk --no-cache add tzdata zeromq \
  && ln -snf /usr/share/zoneinfo/$TZ /etc/localtime \
  && echo '$TZ' > /etc/timezone \
  && echo "export GO111MODULE=on" >> ~/.profile \
  && echo "export GOPROXY=https://goproxy.cn" >> ~/.profile \
  && source ~/.profile \
  && apk update \
  && apk upgrade \
  && apk add --no-cache bash git openssh \
  && go build -o ./main ./main.go

EXPOSE 8088
#调试
#CMD ["./main"]