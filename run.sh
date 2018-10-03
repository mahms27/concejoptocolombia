
#!/bin/bash 

DOCKER_COMPOSE=$(whereis docker-compose | awk '{print $NF}')
ACTION="$1"
ARGS="$2"

if [ -z "$1" ]; then
  ACTION="up -d"
  export ACTION
fi

export COMPOSE_PROJECT_NAME="concejo"

$DOCKER_COMPOSE $ACTION $ARGS


