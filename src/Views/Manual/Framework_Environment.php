<p>When you invoke <code>CwfPhp\CwfPhp\Framework::Setup(<i>application_path</i>)</code>,
    where <code><i>application_path</i></code> is your main application directory,
    CWF-PHP checks your installation and sets up the environment.</p>

<p>CWF-PHP bootstrap defines some basic, framework-specific constants, which are
    available outside framework and can be used in your application code.</p>

<ul>
    <li><code>DS</code> - directory separator - <code><?= DS ?></code></li>
    <li><code>CWFDIR</code> - framework directory - <code><?= CWFDIR ?></code></li>
    <li><code>APPDIR</code> - application directory - <code><?= APPDIR ?></code></li>
    <li><code>CFGDIR</code> - configuration directory - <code><?= CFGDIR ?></code></li>
    <li><code>DATADIR</code> - data directory - <code><?= DATADIR ?></code></li>
</ul>