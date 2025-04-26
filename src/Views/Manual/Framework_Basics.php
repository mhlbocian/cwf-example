<p>
    CWF-PHP Framework is distributed via <code>composer</code>. All you need, is
    to type this command in your project directory.
</p>
<pre>
$ composer require cwf-php/cwf-php
</pre>
<p>
    Thats all. In next steps, we assume that your project directory is named
    <code>src</code>. Follow the next steps to run your first application.
</p>

<p><b>Basic directory structure</b></p>
<p>
    CWF-PHP requires specific directory structure. You must provide <b>exact</b>
    names for theese directories and files. Additional directories are allowed.
</p>
<pre>
[D] Config                      Application configuration files
    [.] application.json        CWF main configuration
[D] Controllers                 Controllers directory
[D] Data                        Application data directory, like json, sqlite
[D] Models                      Models directory
[D] Public                      Public http server directory
    [.] index.php               Bootstrap app and parse URL route
[D] Views                       Views directory
</pre>

<p><b>Classes namespace convention</b></p>
<p>
    Each class (like controller) must be located in a separate namespace. You
    must provide the PSR-4 naming standard, as is required by
    <code>composer</code>.
</p>
<p>
    Eg. For controller Test, which source is in <code>class Test</code> and the
    file is located in the <code>Controllers</code> directory, the class
    <b>must be</b> inside <code>Controllers</code> namespace (followed by your
    project namespace) and the file name <b>must be</b> the same as class name
    (in eg <code>Test.php</code>).
</p>
<?php
$example = <<<'CODE'
<?php
use YourName\YourProject\Controllers;
    
class Test {
    // your code
}
CODE;
highlight_string($example);
?>

<p><b>Minimal configuration</b></p>
<p>
    For a minimal configuration create the <code>application.json</code> file in
    in the <code>Config</code> directory.
</p>
<p>Assume, we have a configuration:</p>
<ul>
    <li>Web server: PHP Development server</li>
    <li>Protocol: HTTP</li>
    <li>Hostname: localhost</li>
    <li>Port: 8000</li>
    <li>DOCROOT: Public</li>
    <li>DOCROOT URL path: /</li>
    <li>Database engine: SQLite (database file: mydb.sqlite)</li>
</ul>
<p>Create following files <code>Config/application.json</code>,
    <code>Controllers/Main.php</code> and
    <code>Public/index.php</code>:</p>
<pre>
<b>Config/application.json</b>

{
    "router": {
        "namespace": "YourName\\YourProject\\Controllers",
        "default_controller": "Main",
        "default_action": "Index"
    },
    "url": {
        "protocol": "http",
        "host": "localhost",
        "port": 8000,
        "path": "/",
        "index": "index.php",
        "omit_index": false
    }
}

<b>Controllers/Main.php</b>
</pre>
<?php
$code = <<<HERE
<?php
namespace YourName\YourProject\Controllers;

class Main {
    public function Index(): void {
        echo "Hello, world!";
    }
}
HERE;
highlight_string($code);
?>
<pre>
<b>Public/index.php</b>
</pre>
<?php
$code = <<<HERE
<?php
require_once __DIR__ . "/../../vendor/autoload.php";

use CwfPhp\CwfPhp\Exceptions\Router_Exception;
use CwfPhp\CwfPhp\Framework;
use CwfPhp\CwfPhp\Router;

Framework::Setup(__DIR__ . "/..");

try {
    // parse route and execute it
    new Router(\$_SERVER["PATH_INFO"] ?? null)->Execute();
} catch (Router_Exception) {
    // 
}
HERE;
highlight_string($code);
?>
<p>
    Run the PHP development server by typing:
</p>
<pre>
~/your-project$ php -S localhost:8000 -t src/Public
</pre>
<p>
    When you enter <code>http://localhost:8000/index.php/Main/Index</code> or
    just <code>http://localhost:8000</code> you should see "Hello, world!" on
    the screen.
</p>