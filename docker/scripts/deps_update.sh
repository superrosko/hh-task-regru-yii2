DIR=$(cd "$(dirname "$0")" && pwd)
# shellcheck source=./conf/.configuration
. "$DIR/conf/.configuration"

echo "Update composer: "

docker-compose exec "$APP_NAME"-app composer update
