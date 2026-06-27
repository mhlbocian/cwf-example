<p>When you invoke <code>CwfPhp\CwfPhp\Framework::Setup(<i>application_path</i>)</code>,
    where <code><i>application_path</i></code> is your main application directory,
    CWF-PHP checks your installation and sets up the environment.</p>

<p>CWF-PHP bootstrap defines some basic, framework-specific constants, which are
    available outside framework and can be used in your application code.</p>

<ul>
    <li><code>DS</code> - directory separator - <code><?= DS ?></code></li>
    <li><code>CWF_ROOT</code> - framework directory - <code><?= CWF_ROOT ?></code></li>
    <li><code>APP_ROOT</code> - application directory - <code><?= APP_ROOT ?></code></li>
    <li><code>APP_CFG</code> - configuration directory - <code><?= APP_CFG ?></code></li>
    <li><code>APP_DATA</code> - data directory - <code><?= APP_DATA ?></code></li>
</ul>