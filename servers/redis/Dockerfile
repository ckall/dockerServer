FROM redis:latest
MAINTAINER "ckallcloud@foxmail.com"
#解决日志权限不够
RUN  mkdir /usr/local/redis \
     &&touch /usr/local/redis/redis.log \
     && chmod -R 777 /usr/local/redis/redis.log
CMD [ "redis-server", "/usr/local/etc/redis.conf" ]
