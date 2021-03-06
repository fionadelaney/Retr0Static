# Retr0Static

===========================

About
-------------------------------------------------------
Description of the progressive enhancements made to take static HTML site
into an authenticated modern MVC website


Manifest
-------------------------------------------------------

<hr>
Stage01-html

basic flat HTML verson of the website

<hr>
Stage02-php


changed the ```.html``` files to end in ```.php```

<hr>

The following refactoring:

* created folder ```/public``` to contain public files (css,images etc.) 

* and a single 'front controller' ```index.php``` file, which bases its action on the GET parameter 'action'

* individual page content has been moved into directory ```templates```, e.g. ```templates/about.php``` sitemap.php etc.

* use of ```require_once``` is used to build the appropriate HTML text content for the GET action

<hr>

First attempt to move HTML code that is repeated on every page into separate ```.inc.php``` files:

* ```templates/header1.inc.php```
* ```templates/header2.inc.php```
* ```templates/footer.inc.php```


The following refactoring:

* created ```templates/header1.inc.php``` containing the HTML code that appears before the ```<title>``` element
* created ```templates/header2.inc.php``` containing the HTML code that appears after the ```<title>``` element (and before the ```<nav>``` element
* each page template outputs ```header1.inc.php``` file contents via a ```require_once``` statement
* each page template then prints out its page-specific title, e.g. ```print '<title>EVOTE DVD - about page</title>';```
* each page template outputs ```header2.inc.php``` file contents via a ```require_once``` statement
* each page template then declares template text for its page-specific nav
* each page template then declares template text for its page-specific content 
* each page template finally outputs ```footer.inc.php``` file contents via a ```require_once``` statement


<hr>

Combination of ```header1.inc.php``` and ```header2.inc.php``` into a single template, which also has the HTML ```<title>``` elemement. This is achieved by the controller action function defining a PHP variable ```$title```, whose value is output in the HTML title using the PHP short output tags, e.g.:

```
<title>Retr0Static | <?= $pageTitle ?></title>
```

So each page template now does the following:

* outputs ```header.inc.php``` file contents via a ```require_once``` statement
* declares template text for its page-specific nav
* declares template text for its page-specific content 
* each page template finally outputs ```footer.inc.php``` file contents via a ```require_once``` statement

<hr>

navStyle


Improvement to move duplicated navigation code into an includable file ```nav.inc.php``` file.
What is different for each page in the navigation code block is the link to have the CSS style ```current_page```. The refactoring to reduce code duplication is to define 5 PHP variables (one for each navbar link: about / contact / index / list / sitemap).

The code in ```nav.inc.php``` creates a CSS class variable containing an empty string, if no such variable is found. But if the controller action *has* defined a nav link variable (containing ```current_page```), then that value is let unchanged.

Thus out controller functions now define 2 variables, one for the page title and one for the nav link to be highlighted:

```
function aboutAction()
{
    $pageTitle = 'About';
    $aboutLinkStyle = 'current_page';
    require_once __DIR__ . '/../templates/about.php';
}
```

File ```nav.inc.php``` has code to declare empty string CSS style varaibles if they have not been declared by the controller action:

    if (empty($indexLinkStyle)){
        $indexLinkStyle = '';
    }
    
    if (empty($aboutLinkStyle)){
        $aboutLinkStyle = '';
    }
    
    if (empty($screenLinkStyle)){
        $listLinkStyle = '';
    }
    
    if (empty($insightLinkStyle)){
        $contactLinkStyle = '';
    }
     if (empty($newsLinkStyle)){
        $contactLinkStyle = '';
    }
     if (empty($shopLinkStyle)){
        $contactLinkStyle = '';
    }
    if (empty($sitemapLinkStyle)){
        $sitemapLinkStyle = '';
    }

Finally, the navigation HTMl block in ```nav.inc.php``` outputs the navlink style variable values for the CSS ```class``` attribute for each nav link (one of which should be ```current_page```):

    <nav>
        <ul>
            <li>
                <a href="index.php" class="<?= $indexLinkStyle ?>">Home</a>
            </li>
    
            <li>
                <a href="index.php?action=about" class="<?= $aboutLinkStyle ?>">About Us</a>
            </li>

    etc.

<hr>
