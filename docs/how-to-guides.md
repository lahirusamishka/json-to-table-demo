# How to Guides

* [How to do developments](#how-to-do-developments)
* [How to use Git version controlling](#how-to-use-git-version-controlling)
* [How to run app on your local dev environment](#how-to-run-app-on-your-local-dev-environment)
* [How to deploy to Shared Hosting](#how-to-deploy-to-shared-hosting)

## How to do developments

1. We use laravel webpack for compile assets by running `npm run dev` & `npm run production`. Please stick to it.
2. Avoid adding assets directly in to `public` directory. Use `resources` directory and compile via webpack.
3. We have setup PHP-CS-Fixer, Prettier and [StandardJS](https://standardjs.com/) for code formatting. Run `./format-code.sh` script to format all PHP, JS, CSS files instantly.

> Please format code in a separate commit.

## How to use Git version controlling

1. This project uses [Git Flow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) as the branching model.
2. This project uses [this commit message pattern](git-commit-msg.md). Please try to stick to it.

## How to run app on your local dev environment.

If you are familier with working with Docker we have setup a highly customizable easy custom docker setup for this project. Otherwise you can start working on this as we normally do by running `php artisan serve`.

1. Installl `Docker` and `Docker Compose` tools in to development PC.
2. Running `make up` command in project root will start all containers.
3. Access app container shell by running `make shell`.
4. You can execute any standard artisan, composer, npm command within the shell. Just run `composer install` to install laravel dependencies.
5. `/docker-configs/` directory will contains the files used by docker to start containers. Currently it only contains `php.ini` file for Apache Container.
6. You will need to set docker database container's service name as `DB_HOST` in Laravel's env file which exists in `src` directory. Set it in .env file as mentioned below.

    ```
    DB_HOST=pro-memo-mariadb
    DB_USERNAME=root
    DB_PASSWORD=root
    ```
7. If you are testing email sending fucntionalities we have already set up a MailHog container to access via [http://localhost:8003](http://localhost:8003). Before using that, you will need to set laravel .env values as mentioned below to use MailHog for mail caching.

    ```
    MAIL_MAILER=smtp
    MAIL_HOST=pro-memo-mailhog
    MAIL_PORT=1025
    ```

8. List of accessible services with docker

    * TriCare Middleware : [http://localhost:8001](http://localhost:8001)
    * PhpMyAdmin : [http://localhost:8002](http://localhost:8002)
    * MailHog : [http://localhost:8003](http://localhost:8003)
    * Documentation : [http://localhost:8004](http://localhost:8004)

## How to deploy to shared hosting

1. Laravel app will be created in the `src` directory in cPanel's home directory.
2. Make a symlink from `public_html` to `/src/public` by executing `rm -R ~/public_html && ln -s ~/src/public ~/public_html`.
3. Access apache error log by executing `tail -n 200 /usr/local/apache/logs/error_log` to find out permission related errors. Fix them by changing permissions.
4. Setup deploy bot to deploy config (.env) file in to `src` directory.
5. Upload `node_modules` and `vendor` folders to `src` if Composer, NodeJS not available in the hosting server.
6. Run `npm run production` to generate assets for online server. Then copy js,css,images folders to `src/public` directory in server (These folders are ignored by git. That's why we manually upload these to server). If server supports `npm`, add this command to deploy pipelines to run.
7. Make sure to track/copy `mix-manifest.json` file after a mix production compile. Otherwise, asset versioning will not work properly.