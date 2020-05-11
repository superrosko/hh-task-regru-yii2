DIR=$(cd "$(dirname "$0")" && pwd)
# shellcheck source=./conf/.configuration
. "$DIR/conf/.configuration"

echo "Configure yii2 env: "
docker-compose exec "$APP_NAME"-app ./init --env=Development --overwrite=All