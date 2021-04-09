# wordpress-starter-theme
A starter theme to build extra light custom WordPress theme with modern stack

## Features
Using this starter includes :
- Modular **Object-Oriented** boilerplate
- PHP dependency management with **Composer**
- Static assets dependency management with **Webpack**
- Templating with **Twig/Timber** engine
- CSS preprocessing with **SASS**
- Modern Javascript development with **Babel**

It comes with a very basic starter boilerplate which includes :
- A bunch of elemental templates with two menu locations and dynamic asset loading
- A i18n-ready configuration
- A CSS normalization, the bootstrap grid and SR-only utility classes
- The main WordPress core functionnalities enabled (thumbnails, menus, RSS feeds, widgets)

## How to use
### Prerequisites
- Composer installed locally
- NPM installed locally
- A local WordPress installation running on a dev server like [Local](https://localwp.com/).

### Get started
1. **Install the starter**

Create a new folder into the theme folder of the local WordPress installation and clone the repo in it :
```
cd your/path/to/wordpress/wp-content/themes
git clone https://github.com/caguy/wordpress-starter-theme.git
```

2. **Give it the desired theme name**
  - Rename the folder with the desired theme name. 
  - Then make a global replace in all the files within the folder for "CustomThemeName" and change it to the desired theme name.
  - Then edit the style.css, package.json and composer.json files to fit the theme name, description and metadata.

3. **Install dependencies**

In the theme root folder :
```
composer install
npm i
```

4. **Launch dev server**

Webpack will watch for changes and build static assets dynamically. They are served right away by the WordPress pages.

```
npm run watch
```

✨ You're all set!

### Usage
- Develop plug-and-play modules in their own classes in /inc and load them in functions.php. They must implement HooksInterface with a hook() method to plug to WordPress. HooksAdminInterface is for admin-only modules. HooksFrontInterface is for front-end only modules.
- Develop templates using the regular php files in the root folder as controllers and twig templates as views. Add globals using the Templates class.
- Develop assets in a component-oriented style in assets/src and add them to index.scss and index.js to load them in the bundle
- Build a bundle optimised for production before going live :
```
npm run build
```

## Ressources
- [Timber starter theme](https://github.com/timber/starter-theme)
- [Timber documentation](https://timber.github.io/docs/)
- [Webpack documentation](https://webpack.js.org/concepts/)
