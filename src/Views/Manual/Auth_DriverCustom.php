<p>
    Auth API driver must follow theese requirements:
</p>

<ul>
    <li>Class name: <code>Xyzabcde...</code> (first letter uppercase)</li>
    <li>Implements: <code>CwfPhp\CwfPhp\Interfaces\Auth\Driver</code></li>
</ul>

<pre>
<b>Config/authentication.json</b>
{
    "driver": "CuStoM_Driver",
    "namespace": "MyName\\MyProject\\Classes",
    <i>[driver specific data]</i>
}
</pre>

<p>
    Specify namespace, to tell CWF-PHP to search for the driver outside. In
    example, the driver name is converted to <code>Custom_driver</code>, so the
    driver class must be named in this way.
</p>

<p>
    Remember, that some of the logic is done outside the driver, like checking
    the user or group existance. Look at the CWF-PHP Auth drivers code, to see
    how they are implemented.
</p>