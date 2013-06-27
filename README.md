# What is Excavator?

Excavator is a [Yii web application](http://www.yiiframework.com/) that uses small modular data miners to report information from public APIs.

# Usage and Application Flow

A user visits Excavator's home page and selects the data they want. This tells Excavator what it needs to talk to, and how communication should take place. Excavator then asks the user what specifically they want from a dataset before rendering a government server's response. A URL is then offered to the user to share the response.
Developers cannot query information using a RESTful API, since this would be redundant functionality. The developers would be better off consulting the Federal APIs themselves, since Excavator only offers improved accessibility to government data for political activists and journalists.

# Back end
## Mines

Excavator mines information using *mines*, which are modules that each contain knowledge about exactly one API. This knowledge consists of query information offered by the user and data returned from government servers. Each mine is a [module](http://www.yiiframework.com/doc/guide/1.1/en/basics.module) dependent on common functionality defined in Excavator.
If you were to remove all mines from Excavator, Excavator would have no knowledge of any federal API. It would be a miner with a pickaxe, but nowhere to dig.

### Directory Structure

"\<mine\>" is a placeholder for a name written in PascalCase.

    <mine>/
        <mine>Module.php
        controllers/
            DefaultController.php
        models/
            FormModel.php
            DataModel.php
        views/
            default/
                FormView.php
                DataView.php
    
- *\<mine\>Module.php*: Module class. Manages module-wide configuration and behaviors.
- *DefaultController.php*: Renders the interface layout, complete with form and dynamic report.
- *FormModel.php*: Stores information related to the information the user requests.
- *DataModel.php*: Stores data user requested.
- *FormView.php*: Form used to populate FormModel.
- *DataView.php*: View of data in DataModel.

# Front End

Excavator uses Sass, Compass, Zen Grids and SMACSS. Consult `themes/underground/README.md` for theme development workflow and conventions.
