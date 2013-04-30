Flask WordPress Theme Framework
================================

A SASS + Bourbon based starter theme for WordPress created by <a href="http://kylelarkin.com/">Kyle Larkin</a> and <a href="http://astockwell.com/">Alex Stockwell</a>. Based on the KL[AS] Framework.

## Installation
1. Copy the repository to your /wp-content/themes folder
2. Move .htaccess and wp-config.php files out of the theme folder and into the wordpress root directory
3. Rename the theme folder, and update paths in the following locations: sass/ie.scss
4. Update your wp-config.php file as usual (add db credentials, salts, etc)
5. Refresh your permalinks

**Note for Shared Hosting:** The line `Options All -Indexes` in .htaccess may cause 4xx/5xx errors site-wide on some shared servers. Please remove this line if necessary.

## Usage
1. The `wp-config.php` file is intended for use with the following 3 project lifecycle environments, with the following naming conventions:
  - Development: [optional.]example.dev. Regex will detect this for you automagically.
  - Staging: any URL structure you'd like, e.g. preview.example.com. **You must define this in the `wp-config.php` file on line 23**.
  - Production: any URL, e.g. example.com. This is the default and the file will fallback to these credentials if the Development/Staging conditions aren't met.

## Taking inspiration from:
- [KL[AS]](https://github.com/kylelarkin/klas)
- [HTML5 Boilerplate](http://html5boilerplate.com/)
- [Starkers](http://viewportindustries.com/products/starkers/)
- [Roots](http://www.rootstheme.com/)
- [_s](https://github.com/Automattic/_s)
