# What is Panel?

Panel organizes CSS work on web apps by enforcing
conventions and a specific workflow. It is an ideology,
not a tool.

Panel uses the following technologies and concepts:

* [SMACSS](http://www.smacss.com/)
* [Sass](http://www.sass-lang.com)
* [Compass](http://compass-style.org/)


Panel comes with documented conventions to keep you away from configuration, and simple commands that deal with repetitive
tasks so that you can focus more on work.

# The Workflow


```
/
    scss/            - SMACSS compliant SCSS
        base/ 
        layout/
        module/
        theme/
        state/
        screen.scss
        ie.scss
        print.scss
    css/
        <output css>
    README.md        - Project readme
    config.rb        - Config file for Compass
```

# Usage

To make a new partial, run `panel touch FILE` without
specifying an extention. The file will be generated
with an underscore and the `.scss` extension, and `@import`
statements will be automatically added to files that
need to pull in new styles.

Example: If you run `panel touch calander-widget` in `/scss/module/`,
`/scss/module/_calander-widget.scss` will be generated and
`@import "calander-widget";` will be added to `/scss/module/_index.scss`.

# Deployment

Run `compass compile` in the root to compile the source,
or `compass watch` to compile in real time.

# Directory Structure and Loading Conventions

The SCSS files in the sass directory without underscores
will be referred to as "aggregator files." All these
files do is import partials named `_index.scss`
from top level SMACSS directories (henceforth TLDs).
Files of this name will simply be called "index files."

```
/scss
    screen.scss
    print.scss
    ie.scss
    layout/
        _index.scss
    module/
        _index.scss
    state/
        _index.scss
    theme/
        _index.scss
    base/
        _index.scss
```

Each index file imports all styles inside the directory it
resides in, as well as all aggregator files in IMMEDIATE
subdirectories.

No index file should include any specific stylesheets in subdirectories outside of the index file.
Index files must only import specific styles
from the directory it immediately resides in.

No index file is to import any sheet more than two directories
deep from it's current location.

Example:

```
/<theme root>
    style.scss <- imports 'module/index'
    module/
        _a.scss
        _b.scss
        _index.scss <- imports 'a', 'b', 's/index' and 't/index'
        s/
            _x.scss
            _y.scss
            _index.scss <- imports 'x', 'y' and 'deeper/index'
            deeper/
                _index.scss <- imports 'u' and 'v'
                _u.scss
                _v.scss
        t/
            _index.scss <- imports 'g' and 'h'
            _g.scss
            _h.scss
```

For reasons why underscores prefix file names, see Conventions.

# Conventions

* Do not change or add to the TLD structure.
  Subdirectories of TLDs are permissible, but must
  be justified.

* Variable names are descriptive, and are in camelCase.

* Variables that represent common properties
  must have those properties as the first words.

        $widthSidebar;
        $widthImage;
        $widthSpan;

        $heightFooter;
        $heightNavbar;

        $fontSizeLarge;
        $fontSizeMid;

* Tabs are 4 spaces

* Allman indentation

* Comply with SMACSS

* Use the SCSS syntax

* Deploy with compass

* Make a new file in the appropriate location when a new set
  of styles pertaining to a particular module or concept is
  needed. So, if you are making a new module, make a new file
  just for it in `module/`. Grouped collections of modules may
  need a subdirectory.

* Start all file names with an underscore and give it the .scss extension.
  Only aggregator scss files (print, screen, ie, etc) may omit underscores.
  This configuration prevents excess CSS files from being output
  in compilation. See ["Partials" in Sass reference](http://is.gd/BbFPaZ)
  for more information.

* `@import` all files in any directory inside the `_index.scss` file
  in that same directory. Order the imports according to CSS declarations.
  But if you are really good with CSS, order should not matter.
  Always `@import "<subdir>/_index.scss"` in a  parent directory's
  `_index.scss`
