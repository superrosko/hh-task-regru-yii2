compose_restart:
	./docker/scripts/compose_restart.sh
ssl_gen:
	./docker/scripts/ssl_gen.sh
deps_install:
	./docker/scripts/deps_install.sh
deps_update:
	./docker/scripts/deps_update.sh
app_config:
	./docker/scripts/app_config.sh
db_create_user:
	./docker/scripts/db_create_user.sh
db_exec:
	./docker/scripts/db_exec.sh
db_migration:
	./docker/scripts/db_migration.sh
initial:
	./docker/scripts/initial.sh

