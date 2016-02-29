# WSUWP Plugin Skeleton

A framework for building a WordPress plugin at WSU.

## Initial setup

### Setup the plugin repository

1. Create a [new repository](https://github.com/organizations/washingtonstateuniversity/repositories/new) under the Washington State University organization. This should have a name like "WSUWP Plugin New Feature".
1. Clone this [WSUWP Plugin Skeleton](https://github.com/washingtonstateuniversity/WSUWP-Plugin-Skeleton/) repository to a directory on your computer named for the new plugin.
1. Change into that new directory.
1. Remove the `.git` directory that provides the history for the WSUWP Plugin Skeleton project.
1. Initialize a new git repository in the directory.
1. Add the new repository you created in step 1 as the `origin` remote.

#### In terminal

```
git clone https://github.com/washingtonstateuniversity/WSUWP-Plugin-Skeleton.git wsuwp-new-feature
cd wsuwp-new-feature
rm -fr .git
git init
git remote add origin https://github.com/washingtonstateuniversity/WSUWP-Plugin-New-Feature.git
git status
```

### Alter the plugin to be its own project

There are several places throughout the WSUWP Plugin Skeleton code that should be changed to match the new plugin. A quick option is to search and replace the terms "WSUWP Plugin Skeleton", "WSUWP_Plugin_Skeleton", and "wsuwp-plugin-skeleton" with the new plugin's name, though you'll want to go through all files and double-check the work.

1. The main plugin file, `wsuwp-plugin-skeleton.php`, should be renamed to `wsuwp-new-feature.php`.
1. The main class file, `includes/class-wsuwp-plugin-skeleton.php`, should be renamed to `includes/class-wsuwp-new-feature.php`.
1. The main tests file, `tests/test-wsuwp-plugin-skeleton.php`, should be renamed to `tests/test-wsuwp-new-feature.php`.
1. In all files, update uses of the class `WSUWP_Plugin_Skeleton` to be `WSUWP_New_Feature`.
1. In `wsuwp-plugin-skeleton.php` and `tests/bootstrap.php`, be sure included files are named properly.
1. Update the plugin headers in `wsuwp-new-feature.php` to provide the project name, description, authors, etc...
1. Update the project name in `composer.json`.
1. Update the project name and URL in `package.json`.
1. Update the ruleset name and description in `phpcs.ruleset.xml`.

### Testing the initial plugin structure

1. Install the NPM dependencies.
1. Install the Composer dependencies.
1. Ensure code standards are sniffed properly.
1. Ensure unit tests are running properly.

#### In terminal

```
npm install
composer install
grunt phpcs
phpunit
```

If you have not previously setup unit tests for WordPress projects, `phpunit` will not run properly. Use the test install script in the `bin` directory to setup a base for testing locally.

```
sh bin/install-wp-tests.sh wordpress_tests root ''
```

### Add the updated plugin files to the repository

The plugin should now be in its initial state, with all pieces renamed to fit the new project. An initial commit can be added with all of these files.

1. Check `git status` to be sure only the intended files are being added.
1. Add all files to staging.
1. Add an initial commit.
1. Push the initial commit to the master branch on the origin remote.

#### In terminal

```
git status
git add -A
git commit -m "Initial commit"
git push origin master
```

### Adding the project to Travis CI for continuous integration testing

The repository provides a `.travis.yml` configuration file for use with [Travis CI](https://https://travis-ci.org). As a member of the WSU organization, you should be able to enable your new repository for continuous integration under the [WSU Profile](https://travis-ci.org/profile/washingtonstateuniversity).

Look at the [general settings](https://travis-ci.org/washingtonstateuniversity/WSUWP-Plugin-Skeleton/settings) for this project to view how new projects should be configured.
