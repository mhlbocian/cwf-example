<p>
    When the <code>index.php</code> file is accessed via http, the <code>PATH_INFO</code>
    data is transferred into <code>Router</code> object. <code>PATH_INFO</code>
    value is the string after slash at the end of <code>index.php</code>. For
    example: <code>index.php/controller/action/arg1/arg2...</code>. If no
    <code>PATH_INFO</code> is provided, default action in default controller is
    executed. When only controller name is available, default action is performed.
</p>

<p>
    You can change router settings in the <code>application.json</code> file in
    the section "router".
</p>

<pre>
"router": {
    "namespace": "YourName\\YourProject\\Controllers",
    "default_controller": "Main",
    "default_action": "Index"
}
</pre>

You can change theese parameters:

<ul>
    <li><code>namespace</code> - controllers namespace</li>
    <li><code>default_controller</code> - default controller name</li>
    <li><code>default_action</code> - default action name</li>
</ul>

<p>
    ⚠️ Remember, to check your <code>namespace</code> key to fit it, to your project
    namespace.
</p>

<p>
    When the controller or action does not exist, <code>Router</code> throws
    the <code>Router_Exception</code>. By default, then <code>index.php</code> script
    redirects an action to default action in default controller. You can change this
    behaviour, by manually editing the code inside <code>catch (Router_Exception)</code>
    section.
</p>