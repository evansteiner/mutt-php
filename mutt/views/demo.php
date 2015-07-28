<div class = "demoPage">
  <h1>Welcome to Mutt-PHP!</h1>
  
  <h2>config.php</h2>
  <p>Basic project-level config options are set in mutt/config.php. A fresh project contains config.sample in the same directory to act as a template.</p>
  <p>
  Config options include: 
    <ul>
      <li>project directory</li>
      <li>error reporting toggle</li>
    </ul>
  </p>
  
  <h2>HTML Headers and Footers</h2>
  <p>Mutt-PHP has a generic HTML scaffold (header and footer) which can be toggled in the config. These include options for Twitter Bootstrap and header/footer loading of jQuery (loaded via public CDN).</p>
  <ul>
    <li>CSS v3.3.5</li>
    <li>JS v3.3.5</li>
    <li>jQuery v1.11.3</li>
  </ul>
  
  <h2>Autoloading</h2>
  <p>Mutt-PHP supports very basic autoloading of core and local classes. To utelize autoloading, use one class per class file, named [className].php.</p>
  
  <h2>Models</h2>
  
  <h3 class="indent-1">Core Classes</h3>
  <p class="indent-1"><?php echo coreClassDemo::validate(); ?></p>
  <p class="indent-1">Core classes are implicit to the Mutt-PHP framework. You can extend core classes, but you should not directly modify them for your project. These classes live in mutt/core/classes.</p>
  
  <h3 class="indent-1">Local Classes</h3>
  <p class="indent-1"><?php echo localClassDemo::validate(); ?></p>
  <p class="indent-1">Local classes are where your project specific live. These classes should go in mutt/local/classes.</p>
  
  <h2>Routing</h2>
  <p>Mutt-PHP bootstraps everything through the index.php file and then uses controllers to build pages. The basic breakdown of the URL to routes is:</p>
  <code>{base_url}/{template}/{paramter_1}/{parameter_2}/etc...</code>
  
  <h2>Controllers</h2>
  <p>Once a URI has been broken down, Mutt-PHP processes them through a controller to determine what page data to load. <i>All pages will require a controller to load properly.</i> Mutt-PHP comes with a <code>GenericController()</code> class which must be extended when adding new pages. To ensure proper autoloading, your custom controllers should always follow the <code>[Pagename]Controller</code> naming convention. Custom controllers should be added to mutt/controllers/local/.</p  >
<p>Since local controllers are all extensions of a core controller class, you can really add whatever properties you want to them. However, each local controller should have a template defined at a minimum (and a title if being used for an   HTML project):</p>
  <pre>
    class DemoController extends GenericController {
  
      var $pageTitle;
      
      function __construct() {
        parent::__construct();
        $this->template = 'mutt/views/demo.php';
        $this->pageTitle = 'Welcome To Mutt-PHP';
      }
    }
  </pre>
  
  <h2>Views</h2>
  <p>Mutt-PHP doesn't support a specific templating engine out-of-the-box, but there's no reason you couldn't add one.</p>
  <p>View files should be placed in mutt/views/ and then pointed to from a page controller.</p>
  
  <h2>Logging</h2>
  <code>log::write('This is my logged message.');</code>
  <p>Mutt-PHP has native support for basic logging. Log name and directory can be set in config.php.</p>
  
  <h2>Debugging Tools</h2>
  <h3 class="indent-1">debug::pVarDump($var)</h3>
  <p class="indent-1">Format var_dump for readability:</p>
  <p class="indent-1">
    <?php
      $a = new stdCLass();
      $a->firtName = "John";
      $a->lastName = "Doe";
      debug::pVarDump($a);
    ?>
  </p>
  
  <h2>Dates and Times</h2>
  <p>Mutt-PHP supports a variety of time() manipulations through the moment class, most of which are just obfuscations of date() broken into a different syntax, with a little modularity to faciliate date math.</p>
  <p>If we assume that <code>$moment = new moment()</code>, then:</p>
  <pre>
    <?php
    $moment = new moment();
    echo '<p>'.$moment->nowMMDDYYYY(). ' //echo $moment->nowMMDDYYYY();</p>';
    echo '<p>'.$moment->nowYYYYMMDD(). ' //echo $moment->nowYYYYMMDD();</p>';
    echo '<p>'.$moment->nowTimestamp(). ' //echo $moment->nowTimestamp();</p>';
    ?>
  </pre>
  
  <h2>Troubleshooting</h2>
  <h3 class="indent-1">500 Errors</h3>
  <p class="indent-1">If you are getting a 500 error immediately after starting a new project, ensure that you're file permissions are correct. 755 is a good place to start.</p>
</div>