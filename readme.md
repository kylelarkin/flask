Flask WordPress Theme Framework
================================

## A _slightly_ opinionated SASS + Bourbon based starter theme for WordPress created by [Kyle Larkin](http://kylelarkin.com) and [Alex Stockwell](http://astockwell.com). Based on the KL[AS] Framework.

Under the hood Flask uses Guard, Sprockets and LiveReload to make theme development easy. No external application (Codekit) required.

## Installation
1. Copy the repository to your `/wp-content/themes` folder
2. Move the following files out of the theme folder and into the wordpress root directory:
	- `.bowerrc `
	- `.htaccess `
	- `Gemfile`
	- `Guardfile`
	- `wp-config.php`
3. Rename the theme folder, and update paths in the following locations:
	- `/Guardfile` line 4
	- `/wp-config.php` line 85
	- `/wp-content/themes/your-theme/sass/framework/_flask.scss` line 14
4. Update `/wp-config.php` as usual (add db credentials, salts, and staging tld)
5. Run `bundle install` from your wordpress root directory to install requisite gems
6. Run `bower install` from your wordpress root directory to install requisite packages into `/vendor`
7. Run `bourbon install --path vendor` from your wordpress root directory to install bourbon into `/vendor`
8. Run `cd vendor; neat install; cd ../` from your wordpress root directory to install neat into `/vendor` (neat 2.0 will eliminate this craziness)
9. Run `guard` from your wordpress root directory to begin watching your files

**Note for Shared Hosting:** The line `Options All -Indexes` in .htaccess may cause 4xx/5xx errors site-wide on some shared servers. Please remove this line if necessary.

## Usage
1. The `wp-config.php` file is intended for use with the following 3 project lifecycle environments, with the following naming conventions:
  - Development: [optional.]example.dev. Regex will detect this for you automagically.
  - Staging: any URL structure you'd like, e.g. preview.example.com. **You must define this in the `/wp-config.php` file on line 23**.
  - Production: any URL, e.g. example.com. This is the default and the file will fallback to these credentials if the Development/Staging conditions aren't met.

## Taking inspiration from:
- [KL[AS]](https://github.com/kylelarkin/klas)
- [HTML5 Boilerplate](http://html5boilerplate.com/)
- [Starkers](http://viewportindustries.com/products/starkers/)
- [Roots](http://www.rootstheme.com/)
- [_s](https://github.com/Automattic/_s)
