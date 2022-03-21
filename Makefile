all:
	docker-compose -f ./srcs/docker-compose.yml up -d
clean:
	docker-compose -f ./srcs/docker-compose.yml down
# fclean: clean
# 		sudo docker rmi $(docker images -a -q)
# 		sudo docker volume rm $(docker volume ls -q)
# 		sudo docker network rm $(docker network ls -q)