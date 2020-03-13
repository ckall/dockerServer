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



###PHP开发

```shell
转换文件
cat php.yml > docker-compose.yml
自动生成文件
composer up --bliud -d
```
