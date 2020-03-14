# DockerEnvBase(DBN)

### <font face="黑体">介绍</font>
Development of integrated environment based on docker development, such as PHP, Java and go  基于docker 开发的相关环境 如PHP 和 Java 和 GO的综合环境开发

### 安装
```shell
#安装docker
curl -sSL https://get.docker.com/ | sh
     
#国外安装docker-compose
curl -L https://github.com/docker/compose/releases/download/1.23.2/docker-compose-`uname -s`-`uname -m` > /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose

#国内访问安装docker-compose
sudo curl -L "https://get.daocloud.io/docker/compose/releases/download/1.23.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
chmod +x /usr/local/bin/docker-compose  
       
# 设置开机自启
sudo systemctl enable docker.service
 
sudo service docker start|restart|stop     
```

####镜像源切换到国内


阿里云会自动给你分一个专属的加速地址

https://dev.aliyun.com



###启动容器
很常用的环境


```shell
包含：redis,nginx,mongodb,mysql,rabbitmq,metabase
cd DockerBaseEnv
chomd -R 777 ./server/redis/data
chomd 777 ./server/redis/redis.conf
composer up --bliud -d
```

安装elk
```shell
包含:elasticsearch,kibana,logstash,es-head
cd DockerBaseEnv/elk
composer up --bliud -d
```
## Usage
####如何在centos服务器本身运行docker对应的容器命令？
```
vim ~/.bash_profile
加入你需要的容器container
alias dnginx='docker exec -it {container} /bin/sh'
source ~/.bash_profile
例子：
echo "alias dnginx='docker exec -it nginx /bin/sh'" >> ~/.bash_profile
source ~/.bash_profile
```