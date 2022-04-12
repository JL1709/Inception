# Builds, (re)creates, starts, and attaches to containers for a service.
all:
	sudo docker-compose -f ./srcs/docker-compose.yml up

# stops containers
clean:
	sudo docker-compose -f ./srcs/docker-compose.yml down

# -v, --volumes		Remove named volumes declared in the `volumes`
#					section of the Compose file and anonymous volumes
#					attached to containers.
# --rmi type		Remove images. Type must be one of:
#                   	'all': Remove all images used by any service.
#                   	'local': Remove only images that don't have a
#                   	custom tag set by the `image` field.
fclean:
	sudo docker-compose -f ./srcs/docker-compose.yml down --volumes --rmi all
	sudo rm -rf /home/jludt/data/wordpress/*
	sudo rm -rf /home/jludt/data/mariadb/*

re: fclean all