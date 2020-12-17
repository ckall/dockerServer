FROM rabbitmq:3.6.15-management

ENTRYPOINT rabbitmqctl stop_app && rabbitmqctl reset && rabbitmqctl join_cluster --ram rabbit@rabbit1 && rabbitmqctl start_app