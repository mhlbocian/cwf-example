<p>
    The configuration for the <code>CwfPhp\CwfPhp\Url</code> class, which is
    responsible for creating sites and resources Urls is located in the section
    <code>url</code> in the <code>Config/application.json</code>.
</p>

<pre>
"url": {
    "protocol": "http",
    "host": "localhost",
    "port": 8000,
    "path": "/",
    "index": "index.php",
    "omit_index": false
}
</pre>

<p>
    <code><b>protocol</b></code> - <code>http</code> or <code>https</code>
</p>

<p>
    <code><b>hostname</b></code> - server hostname
</p>

<p>
    <code><b>path</b></code> - path where the index.php file is accessible for
    the web server via URL. If your Public directory is further in the URL path,
    like:<br/> <code>http://hostname/app_dir/index.php</code><br/>
    change it to <code>/app_dir/</code> in this case.
</p>

<p>
    <code><b>port</b></code> - http server port
</p>

<p>
    <code><b>index</b></code> - bootstrap file name
    (usually <code>index.php</code>)
</p>

<p>
    <code><b>omit_index</b></code> - omit the "index.php" in the address,
    when accessing controller-action. If you have rewrite engine
    configured, you can set this to <code>true</code>. Then, instead of:<br/>
    <code>http://hostname/index.php/Controller/Action/Arg1/Arg2...</code><br/>
    you have:<br/>
    <code>http://hostname/Controller/Action/Arg1/Arg2...</code>
</p>

<p><b>Usage</b></p>

<p><code>public static function Resource(string $path): string;</code></p>

<p>
    Type path to static resource (like stylesheets, scripts, images). If your
    path string begins with `/`, then the absolute url is created (omits the
    `path` from the url section).
</p>

<p><code>public static function Site(string $path = ""): string;</code></p>

<p>
    If your path string begins with `/`, then the absolute url is created,
    otherwise the current controller is used.
</p>

<p><code>public static function Redirect(string $path = ""): void;</code></p>

<p>
    Redirect, to the specified site (path string requirements the same, like in
    <code>Site</code> method).
</p>

<p><b>Examples</b></p>

<?=
highlight_string(
        "<?= CwfPhp\\CwfPhp\\Url::Resource('/images/background.png') ?>", true)
?>
<p><code><?= CwfPhp\CwfPhp\Url::Resource('/images/background.png') ?></code></p>

<?=
highlight_string(
        "<?= CwfPhp\\CwfPhp\\Url::Site('Action1/Param2') ?>", true)
?>
<p><code><?= CwfPhp\CwfPhp\Url::Site('Action1/Param2') ?></code></p>

<?=
highlight_string(
        "<?= CwfPhp\\CwfPhp\\Url::Site('/Controller1/Action2/Param3') ?>", true)
?>
<p><code><?= CwfPhp\CwfPhp\Url::Site('/Controller1/Action2/Param3') ?></code></p>