TangoMan Front Bundle
=====================

**TangoMan Front Bundle** provides an easy way to add front elements to your pages.
**TangoMan Front Bundle** makes building back-office for your app a brease.

Features
========

 - Navigation bar
     - Dropdown
 - Menus
 - Tabs
 - Buttons
 - Search forms with
     - Inputs
     - Selects
         - Options
         - Optgroups
     - Checkboxes
     - Radio buttons
     - Reset button
     - Submit button
 - Pagination

Elements can

 - Own icon
 - Show tooltips
 - Be disabled
 - Be displayed on specific pages
 - Be firewalled
 - Toggle popovers
 - Toggle modals
 - Toggle dropdowns
 - Toggle accordion
 - Submit form onchange

Every label or name attibute is automatically translated.

You can easilly create your own template as well.

Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require tangoman/front-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    // ...

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new TangoMan\FrontBundle\TangoManFrontBundle(),
        );

        // ...
    }
}
```

Usage
=====

### Navbar component

If you're using default navbar template, 
name your routes like the following:

 - 'app_login'
 - 'app_check'
 - 'app_logout'
 - 'app_user_profile'
 - 'app_user_edit'
 - 'app_admin_index'
 - 'homepage'

### Search / filter form component

### Ordered list component

Place use statement in the controller
-------------------------------------

```php
use TangoMan\FrontBundle\Model\Button;
use TangoMan\FrontBundle\Model\ButtonGroup;
use TangoMan\FrontBundle\Model\Item;
use TangoMan\FrontBundle\Model\Menu;
use TangoMan\FrontBundle\Model\Modal;
use TangoMan\FrontBundle\Model\SearchForm;
use TangoMan\FrontBundle\Model\SearchInput;
use TangoMan\FrontBundle\Model\SearchOption;
use TangoMan\FrontBundle\Model\Th;
use TangoMan\FrontBundle\Model\Thead;
```

Build object in the controller
------------------------------

```php
<?php
// AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

// ...

class DefaultController extends Controller
{
    /**
     * @Route("/user/index")
     */
    public function indexAction()
    {
        // ...

        $form = new SearchForm();

        // Number
        $input = new SearchInput();
        $input->setLabel('Id')
            ->setName('e-id')
            ->setType('number');
        $form->addInput($input);

        // Text
        $input = new SearchInput();
        $input->setLabel('User')
            ->setName('user-username');
        $form->addInput($input);

        // Text
        $input = new SearchInput();
        $input->setLabel('Email')
            ->setName('user-email');
        $form->addInput($input);

        // Select
        $input = new SearchInput();
        $input->setLabel('Role')
            ->setName('roles-type');

        // Options
        $option = new SearchOption();
        $option->setName('All');
        $input->addOption($option);

        $option = new SearchOption();
        $option->setName('Administrator')
            ->setValue('ROLE_ADMIN');
        $input->addOption($option);

        $option = new SearchOption();
        $option->setName('User')
            ->setValue('ROLE_USER');
        $input->addOption($option);
        $form->addInput($input);

        // Submit
        $input = new SearchInput();
        $input->setLabel('Filter')
            ->setType('submit')
            ->setIcon('glyphicon glyphicon-search');
        $form->addInput($input);

        // Optionally use json format
        $thead = '{
            "tds": [
                {
                    "name": "username",
                    "label": "User",
                    "route": "app_user_index"
                },
                {
                    "name": "email",
                    "label": "Email",
                    "route": "app_user_index"
                },
                {
                    "label": "Actions",
                    "roles": ["ROLE_ADMIN","ROLE_MANAGER"],
                    "colspan": 2
                }
            ]
        }';

        return $this->render(
            'user/index.html.twig',
            [
                'form' => $form,
                'thead' => $thead,
                'users' => $users,
            ]
        );
    }
}
```

Integrate in Twig
-----------------

```twig
<div id="search-form" class="jumbotron">
    {{ searchForm(form) }}
</div>
```

```twig
<table class="table table-striped">
    {{ thead(thead) }}
    <tbody>
    {% for user in users %}
        <tr>
            <td>
            ...
```

Examples
========

Inputs
------

```json
"inputs": [
    {
        "type": "text",
        "icon": "glyphicon glyphicon-user",
        "name": "user-username",
        "label": "User"
    },
    {
        "type": "email",
        "icon": "glyphicon glyphicon-envelope",
        "name": "user-email",
        "label": "Email"
    }
]
```

Selects
-------

```json
"inputs": [
    {
        "type": "select",
        "name": "roles-type",
        "label": "Role",
        "icon": "glyphicon glyphicon-king",
        "placeholder": "All roles",
        "options": [
            {
                "name": "Super Admin",
                "value": "ROLE_SUPER_ADMIN"
            },
            {
                "name": "Admin",
                "value": "ROLE_ADMIN"
            },
            {
                "name": "Super User",
                "value": "ROLE_SUPER_USER"
            },
            {
                "name": "User",
                "value": "ROLE_USER"
            }
        ]
    }
]
```

Optgroups
---------

```json
"inputs": [
    {
        "type": "select",
        "name": "foo",
        "label": "Test",
        "icon": "fa fa-facebook",
        "placeholder": "Test",
        "optgroups": [
            {
                "label": "FooGroup",
                "options": [
                    {
                        "name": "Foo 1",
                        "value": "foo1"
                    },
                    {
                        "name": "Foo 2",
                        "value": "foo2"
                    }
                ]
            },
            {
                "label": "BarGroup",
                "disabled": true,
                "options": [
                    {
                        "name": "Bar 1",
                        "value": "bar1"
                    },
                    {
                        "name": "Bar 2",
                        "value": "bar2"
                    }
                ]
            }
        ]
    }
]
```

Buttons
-------

```json
"buttons": [
   {
       "icon": "glyphicon glyphicon-edit",
       "label": "Edit",
       "class": "btn btn-warning btn-sm",
       "route": "app_admin_user_edit",
       "tooltip": "Edit '~user~' profile",
       "parameters": {
           "id": '~user.id~'
       },
       "roles": ["ROLE_ADMIN","ROLE_SUPER_ADMIN"]
   },
   {
       "icon": "glyphicon glyphicon-trash",
       "label": "Delete",
       "class": "btn btn-danger btn-sm",
       "route": "app_admin_user_delete",
       "parameters": {
           "id": '~user.id~'
       },
       "tooltip": "Delete '~user~' profile",
       "modal": ".my-modal",
       "roles": ["ROLE_ADMIN","ROLE_SUPER_ADMIN"]
   }
]
```

Button Groups
-------------

```json
"inputs": [
    {
        "type": "buttonGroup",
        "class": "pull-right",
        "buttons": [
            {
                "type": "submit",
                "label": "Filter",
                "badge": '~users|length~',
                "icon": "glyphicon glyphicon-search"
            },
            {
                "type": "reset",
                "label": "Reset",
                "icon": "glyphicon glyphicon-remove",
                "class": "btn btn-warning"
            }
        ]
    }]
```

Common errors
-------------

If you get to see this :
![twig error][twig-error]
your json is probably invalid.

Bootstrap 3 toggles
===================

| Title             | Toggle                   | Parameters                                       | Attributes      | Link                                                                  |
| :---------------- | :----------------------- | :----------------------------------------------- | :-------------- | :-------------------------------------------------------------------- |
| Button            | data-toggle="button"     |                                                  |                 | https://getbootstrap.com/docs/3.3/javascript/#buttons-single-toggle   |
| Buttons           | data-toggle="buttons"    |                                                  |                 | https://getbootstrap.com/docs/3.3/javascript/#buttons                 |
| Collapse          | data-toggle="collapse"   | data-target data-parent href                     |                 | https://getbootstrap.com/docs/3.3/javascript/#collapse                |
| Dropdowns         | data-toggle="dropdown"   |                                                  |                 | https://getbootstrap.com/docs/3.3/javascript/#dropdowns               |
| Modals            | data-toggle="modal"      | data-target="..."                                | rel="modal"     | https://getbootstrap.com/docs/3.3/javascript/#modals                  |
| Popovers          | data-toggle="popover"    | data-placement data-trigger data-content title   | rel="popover"   | https://getbootstrap.com/docs/3.3/javascript/#popovers                |
| Togglable pills   | data-toggle="pill"       |                                                  |                 | https://getbootstrap.com/docs/3.3/javascript/#pills                   |
| Togglable tabs    | data-toggle="tab"        |                                                  |                 | https://getbootstrap.com/docs/3.3/javascript/#tabs                    |
| Tooltips          | data-toggle="tooltip"    | data-original-title data-placement title         |                 | https://getbootstrap.com/docs/3.3/javascript/#tooltips                |

TODO
====

```json
"popover": {
    "title": "blablaba",
    "content": "Blablabla"
}
```

```json
"modal": {
    "title": "blablaba",
    "header": "blablaba",
    "body": "Blablabla",
    "footer": "blabla"
}
```

Note
====

If you find any bug please report here : [Issues](https://github.com/TangoMan75/FrontBundle/issues/new)

License
=======

Copyrights (c) 2017 Matthias Morin

[![License][license-MIT]][license-url]
Distributed under the MIT license.

If you like **TangoMan Front Bundle** please star!
And follow me on GitHub: [TangoMan75](https://github.com/TangoMan75)
... And check my other cool projects.

[Matthias Morin | LinkedIn](https://www.linkedin.com/in/morinmatthias)

[license-GPL]: https://img.shields.io/badge/Licence-GPLv3.0-green.svg
[license-MIT]: https://img.shields.io/badge/Licence-MIT-green.svg
[license-url]: LICENSE
[twig-error]: Resources/doc/error-invalid-json.jpg
